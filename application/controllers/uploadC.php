<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class uploadC extends CI_Controller {

	public function descargar($documento= 0,$idSoporte = 0)
	{
		$this->load->model("hojadevida");
		$like = array();
		$donde = array('soportes.idSoporte' => $idSoporte);
		$descargar = $this->hojadevida->descargarSoporte($like,$donde);
		if ($descargar) {
			$nombreArchivo = $descargar->archivoRuta;
			$datos = "soportes/$documento/$nombreArchivo";
			ignore_user_abort(true);
			set_time_limit(0);
			  ob_end_clean();
			  header("Content-Type: application/octet-stream; "); 
			  header("Content-Transfer-Encoding: binary"); 
			  header("Content-Length: ". filesize($datos).";"); 
			  header("Content-disposition: attachment; filename=" . $datos);
			  readfile($datos);
			  die();
		}
	}

	function upload (){
		
			$tipo        = $this->input->post("tipo",TRUE);
			$documento   = $this->input->post("documento",TRUE) ;
			$descripcion = $this->input->post("descripcion",TRUE) ;
			$this->load->helper(array("upload"));
			$opciones = array(
				"nom_archivo" => "archivo",
				"Arch_permitido" => array("xls","xlsx","doc","ods","docx","odt","pdf","jpg","jpeg","png"),
				"tama_archivo" => 10000, // defecto null
				"ruta_guardado" => "soportes/$documento", // defecto carpeta fotos
				// "Nombre_Final" => date('U').".jpg",
				// "Reemplazar_Archivo" => TRUE, // defecto false
			);
			$subir = new CargaArchivo($opciones);
			if ($subir->contieneErrores()===0) {
				$this->load->model("persona");
				$datos = array(
					"archivoRuta" => $subir->obtieneNombre(),
					"tipoSoporte" => $tipo,
					"documento" => $documento,
					"descripcion" => $descripcion,
				);
				$tabla = "soportes";
				$this->persona->ingresar($datos,$tabla);
			}
	}

	public function actualizarTablaSoporte($documento=0){
		$this->load->model("hojadevida");
		$documento = $this->input->post("documento",TRUE);
		$like      = array();
		$donde     = array("soportes.documento"=>$documento);
		$soportes = $this->hojadevida->soportesPersona($like,$donde);
		$this->load->view("hojaDeVida/consultas/tablasoporte",compact('soportes','documento'));
	}
}