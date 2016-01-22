<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hojadevidaC extends CI_Controller {

	protected $cabecera;
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('rol')) redirect(base_url());
		if ($this->session->userdata('rol')==1) $this->cabecera = "administrador/cabecera";
		if ($this->session->userdata('rol')==2) $this->cabecera = "usuario/cabecera";
	}

	public function menu($tipo ="",$documento="")
	{
		$this->load->model("tipoDoc");
		$this->load->model("cargo");
		$this->load->model("profesion");
		$this->load->model("tipoSoporte");
		$this->load->model("empresa");
		$like           = array();
		$like1          = array();
		$donde          = array();
		$donde1         = array("estadoId"=>1);
		$tipoDocumento  = $this->tipoDoc->Consultar($like,$donde);
		$tipoCargos     = $this->cargo->Consultar($like,$donde1,$like1);
		$tipoProfession = $this->profesion->Consultar($like,$donde1,$like1);
		$tipoSoporte    = $this->tipoSoporte->Consultar($like,$donde1);
		$empresa        = $this->empresa->Consultar($like,$donde1,$like1);
		
		switch ($tipo) {
			case 'agregar':
					$operacion="agregar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/hojasdevida/menu.php",compact("operacion"));
					$this->load->view("administrador/hojasdevida/ingresar.php",compact('tipoDocumento','tipoCargos','tipoProfession','tipoSoporte','empresa'));
					$this->load->view("administrador/pie.php");
				break;

				case 'actualizar':

					$this->load->model("hojadevida");
					$this->load->model("persona");
					$like                        =  array('hojadevida.documento' =>$documento);
					$like1                       =  array();
					$donde                       =  array();
					
					$hojadevida                  =  $this->hojadevida->datosHojaVida($like,$donde,$like1);
					$like                        = array();
					$tipoDocument                = $this->tipoDoc->Consultar($like,$donde);
					$tipoProfession              = $this->profesion->Consultar($like,$donde1,$like1);
					$tipoCargos                  = $this->cargo->Consultar($like,$donde1,$like1);
					$empresa                     = $this->empresa->Consultar($like,$donde1,$like1);
					$persona                     = $this->persona->Consultar($like,$donde,$like1);
					$donde                       = array("soportes.documento"=>$documento);
					$soportes                    = $this->hojadevida->soportesPersona($like,$donde);
					
					$operacion                   ="actualizar";				
					$resultado["hojadevida"]     = $hojadevida;
					$resultado["tipoDocument"]   = $tipoDocument;
					$resultado["tipoProfession"] = $tipoProfession;
					$resultado["tipoCargos"]     = $tipoCargos;
					$resultado["persona"]        = $persona;
					$resultado["empresa"]        = $empresa;
					$resultado["soportes"]       = $soportes;
					$resultado["documento"]      = $documento;
					$resultado["tipoSoporte"]    = $tipoSoporte;

					$this->load->view($this->cabecera);
					$this->load->view("administrador/hojasdevida/menu.php",compact("operacion"));
					$this->load->view("administrador/hojasdevida/actualizar.php",$resultado);
					$this->load->view("administrador/pie.php");
				break;
			
			default:
					$operacion="consultar";
					$this->load->view($this->cabecera);
					$this->load->view("administrador/hojasdevida/menu.php",compact("operacion"));
					$this->load->view("administrador/hojasdevida/consultar.php");
					$this->load->view("administrador/pie.php");
				break;
		}
	}

	public function consultar()
	{
		// $this->output->enable_profiler(true);
		$this->load->model("hojadevida");

		$hojadevida   = $this->input->post("hojadevida",TRUE);
		$hojaBusqueda = $hojadevida;
		$tipo         = $this->input->post("tipo",TRUE);
		
		$like         =  array('hojadevida.documento' =>$hojadevida);
		$like1 		  =  array('nombreCargo' =>$hojadevida);
		$donde        =  array();

		switch ($tipo) {
			case '1':
				 $donde +=  array("hojadevida.vinculado"=>$tipo);
				break;
			case '2':
				 $donde +=  array("hojadevida.vinculado"=>$tipo);
				break;
			default:
				# code...
				break;
		}
		
		$hojadevida =  $this->hojadevida->datosHojaVidaC($like,$donde,$like1);
		$this->load->view('administrador/hojasdevida/consultas/hojadevida',compact("hojadevida","hojaBusqueda","tipo"));

		//$this->output->enable_profiler();
	}

	public function ingresar()
	{
		// carga de modelos
		$this->load->model("persona");
		$this->load->model("hojadevida");

		//INFORMACION GENERAL
		$documento       = $this->input->post("documento",TRUE);
		$tipoDocumento   = $this->input->post("tipoDocumento",TRUE);
		$nombre          = $this->input->post("nombre",TRUE);
		$PrimerApellido  = $this->input->post("PrimerApellido",TRUE);
		$SegundoApellido = $this->input->post("SegundoApellido",TRUE);
		$email           = $this->input->post("email",TRUE);
		$TipoGenero      = $this->input->post("TipoGenero",TRUE);
		$fotoUsuario      = trim($this->input->post("fotoUsuario",TRUE));
		
		//INFORMACION PERSONAL
		$telefono        = $this->input->post("telefono",TRUE);
		$celular         = $this->input->post("celular",TRUE);
		$direccion       = $this->input->post("direccion",TRUE);
		$profesion       = $this->input->post("profesion",TRUE);
		$cargo           = $this->input->post("cargo",TRUE);

		$datosPersonales = array(
			//DATOS PERSONALES
			"documento" =>   $documento,
			"profesionId" =>   $profesion,
			"fechaIngreso" =>   date("y-m-d"),
			"cargoAspiracion" =>   $cargo,
			"telefono" =>   $telefono,
			"celular" =>   $celular,
			"direccion" =>   $direccion,
		);

		$datos = array(
			//DATOS GENERALES
			"documento" => $documento,
			"nombreCompleto" => $nombre,
			"primerApellido" => $PrimerApellido,
			"segundoApellido" => $SegundoApellido,
			"tipoDocumento" => $tipoDocumento,
			"email" => $email,
			"tipoGenero" => $TipoGenero,
		);
		
		if ($this->persona->ingresar($datos,"persona")) {
			$rutafoto = "fotosTemporal/".$fotoUsuario;
			$nuevaRuta = "soportes/fotosUsuario/".$fotoUsuario;
			if (is_file($rutafoto)) {
				if (copy($rutafoto,$nuevaRuta) ){
					$datosPersonales = $datosPersonales +  array('foto' =>$fotoUsuario);
					unlink($rutafoto);
				}
			}


			if ($this->persona->ingresar($datosPersonales,"hojadevida")) {

					$empresaId           = $this->input->post("empresaId",TRUE);
					$cargoOcupo          = $this->input->post("cargoOcupo",TRUE);
					$fechaIngreso        = $this->input->post("fechaIngreso",TRUE);
					$fechaTermino        = $this->input->post("fechaTermino",TRUE);
					$observacionTareas   = $this->input->post("observacionTareas",TRUE);
					$nombreJefeInmediato = $this->input->post("nombreJefeInmediato",TRUE);
					$TelefonoEmpresa     = $this->input->post("TelefonoEmpresa",TRUE);
			
				if ($empresaId) {
						
					 for ($i=0; $i < count($empresaId) ; $i++) { 

					 $a_experiencia = array( 
					 	"documento"=>$documento,
					 	"empresaId"=>$empresaId[$i],
					 	"cargoOcupo"=>$cargoOcupo[$i],
					 	"fechaIngreso"=>$fechaIngreso[$i],
					 	"fechaTermino"=>$fechaTermino[$i],
					 	"observacionTareas"=>$observacionTareas[$i],
					 	"nombreJefeInmediato"=>$nombreJefeInmediato[$i],
					 	"TelefonoEmpresa"=>$TelefonoEmpresa[$i],
					 	);
					 	$this->hojadevida->ingresarExp($a_experiencia);
					}
				}
			}
		}
		//Muestra todos los datos que envia
			//$this->output->enable_profiler(true);

	}
	public function detalle($documento="0")
	{
		$this->load->model("persona");
		$this->load->model("hojadevida");
		$this->load->view($this->cabecera);
		$like        =  array();
		$donde       = array("persona.documento"=>$documento);
		$informacion = $this->persona->detallePersona($like,$donde);
		$donde       = array("hojadevidaexperiencia.documento"=>$documento);
		$experiencia = $this->hojadevida->consultarExp($like,$donde);
		$donde       = array("soportes.documento"=>$documento);
		$soportes = $this->hojadevida->soportesPersona($like,$donde);
		$this->load->view("hojaDeVida/detalle/informacion",compact('informacion'));
		$this->load->view("hojaDeVida/detalle/experiencia",compact('experiencia'));
		$this->load->view("hojaDeVida/detalle/archivos",compact('soportes','documento'));

	}

	public function foto(){
			$this->load->helper(array("upload"));
			$rutafoto = trim($this->input->post("rutafoto",TRUE));
			$rutafoto = "fotosTemporal/".$rutafoto;
			if (is_file($rutafoto)) {
				unlink($rutafoto);
			}
			$opciones = array(
				"nom_archivo" => "archivo",
				"Arch_permitido" => array("jpg","jpeg","png"),
				"tama_archivo" => 10000, // defecto null
				"ruta_guardado" => "fotosTemporal", // defecto carpeta fotos
				"Nombre_Final" => date("U").".jpg",
				"Reemplazar_Archivo" => TRUE, // defecto false
			);
			$subir = new CargaArchivo($opciones);
			echo $subir->obtieneNombre();
	}

	public function actualizar()
	{
		// carga de modelos
		$this->load->model("persona");
		$this->load->model("hojadevida");
		
		//INFORMACION GENERAL
		$documento           = $this->input->post("documento",TRUE);
		$nombre              = $this->input->post("nombre",TRUE);
		$PrimerApellido      = $this->input->post("PrimerApellido",TRUE);
		$SegundoApellido     = $this->input->post("SegundoApellido",TRUE);
		$telefono            = $this->input->post("telefono",TRUE);
		$celular             = $this->input->post("celular",TRUE);
		$direccion           = $this->input->post("direccion",TRUE);
		//INFORMACION PERSONAL
		$profesion           = $this->input->post("profesion",TRUE);
		$cargo               = $this->input->post("cargo",TRUE);
		
		//INFORMACION EXP LABORAL
		$empresaId           = $this->input->post("empresaId",TRUE);
		$cargoOcupo          = $this->input->post("cargoOcupo",TRUE);
		$fechaIngreso        = $this->input->post("fechaIngreso",TRUE);
		$fechaTermino        = $this->input->post("fechaTermino",TRUE);
		$nombreJefeInmediato = $this->input->post("nombreJefeInmediato",TRUE);
		$TelefonoEmpresa     = $this->input->post("TelefonoEmpresa",TRUE);
		$observacionTareas   = $this->input->post("observacionTareas",TRUE);

		
		$datosPersonales = array(
			//DATOS PERSONALES
			"profesionId" =>   $profesion,
			"cargoAspiracion" =>   $cargo,
			"telefono" =>   $telefono,
			"celular" =>   $celular,
			"direccion" =>   $direccion,
		);

		$datos = array(
			//DATOS GENERALES
			"nombreCompleto" => $nombre,
			"primerApellido" => $PrimerApellido,
			"segundoApellido" => $SegundoApellido,
		);
		if ($empresaId) {
						
					 for ($i=0; $i < count($empresaId) ; $i++) { 

					 $a_experiencia = array( 
					 	"documento"=>$documento,
					 	"empresaId"=>$empresaId[$i],
					 	"cargoOcupo"=>$cargoOcupo[$i],
					 	"fechaIngreso"=>$fechaIngreso[$i],
					 	"fechaTermino"=>$fechaTermino[$i],
					 	"observacionTareas"=>$observacionTareas[$i],
					 	"nombreJefeInmediato"=>$nombreJefeInmediato[$i],
					 	"TelefonoEmpresa"=>$TelefonoEmpresa[$i],
					 	);
					 	$this->hojadevida->ingresarExp($a_experiencia);
					}
				}

		$donde = array("documento"=>$documento);
	    $this->persona->actualizar($datos,"persona",$donde);
		$this->persona->actualizar($datosPersonales,"hojadevida",$donde);

	}

}
