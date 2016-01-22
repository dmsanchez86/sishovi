<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reportesC extends CI_Controller {

	protected $cabecera;
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('rol')) redirect(base_url());
	}

	function usuarios($usuario= "",$tipo=""){
		$this->load->model("usuario");
		$like  =  array('documentoUsuario' =>$usuario);
		$like1 =  array('nombreUsuario' =>$usuario);
		$donde = array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("usuarios.estadoId"=>$tipo):null;
		$datos["miusuario"] =  $this->usuario->Consultar($like,$donde,$like1);
		$fecha = date("d-m-y");
		// pdf 
		$this->load->helper(array("dompdf"));
		$vista = $this->load->view("reportes/usuarios.php",$datos,true);
		$NombreArchivo = "Reporte de usuarios"." $fecha";
		pdf_create($vista, $NombreArchivo." soporte",true);
	}

	function areas($area= "0",$tipo="0"){
		$this->load->model("area");
		$like  =  array();
		$like1 =  array();
		$area  = utf8_decode(urldecode($area));
		$donde = array();
		$area ? $like1 += array('idArea' =>$area):null;
		$area ? $like += array('nombreArea' =>$area):null;
		($tipo == 1 || $tipo == 2) ? $donde +=  array("areas.estadoId"=>$tipo):null;
		$datos["miarea"] =  $this->area->Consultar($like,$donde,$like1);
		$fecha = date("d-m-y");
		// pdf 
		$this->load->helper(array("dompdf"));
		$vista = $this->load->view("reportes/areas.php",$datos,true);
		$NombreArchivo = "Reporte de areas"." $fecha";
		pdf_create($vista, $NombreArchivo." soporte",true);
		// $this->output->enable_profiler(true);
	}

	function hojasdevida($hojadevida= "",$tipo=""){
		$this->load->model("hojadevida");
		$like  =  array('hojadevida.documento' =>$hojadevida);
		$like1 =  array();
		$donde = array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("hojadevida.estadoId"=>$tipo):null;
		$datos["mihojadevida"] =  $this->hojadevida->Consultar($like,$donde,$like1);
		$fecha = date("d-m-y");
		// pdf 
		$this->load->helper(array("dompdf"));
		$vista = $this->load->view("reportes/hojasdevida.php",$datos,true);
		$NombreArchivo = "Reporte de hojas de vida"." $fecha";
		pdf_create($vista, $NombreArchivo." soporte",true);
	}

	function empresas($empresa= "",$tipo=""){
		$this->load->model("empresa");
		$like    =  array();
		$like1   =  array();
		$empresa = utf8_decode(urldecode($empresa));
		$donde   = array();
		$empresa ? $like1 += array('idEmpresa' =>$empresa):null;
		$empresa ? $like += array('nombrEempresa' =>$empresa):null;
		($tipo == 1 || $tipo == 2) ? $donde +=  array("estadoId"=>$tipo):null;
		$datos["miempresa"] =  $this->empresa->Consultar($like,$donde,$like1);
		$fecha = date("d-m-y");
		// pdf 
		$this->load->helper(array("dompdf"));
		$vista = $this->load->view("reportes/empresas.php",$datos,true);
		$NombreArchivo = "Reporte de empresas"." $fecha";
		pdf_create($vista, $NombreArchivo." soporte",true);
	}

	function cargos($cargo= "",$tipo=""){
		$this->load->model("cargo");
		$like  =  array();
		$like1 =  array();
		$donde = array();
		$cargo = utf8_decode(urldecode($cargo));
		$cargo ? $like1 += array('idcargos' =>$cargo):null;
		$cargo ? $like += array('nombreCargo' =>$cargo):null;
		($tipo == 1 || $tipo == 2) ? $donde +=  array("estadoId"=>$tipo):null;
		$datos["micargo"] =  $this->cargo->Consultar($like,$donde,$like1);
		$fecha = date("d-m-y");
		// pdf 
		$this->load->helper(array("dompdf"));
		$vista = $this->load->view("reportes/cargos.php",$datos,true);
		$NombreArchivo = "Reporte de cargos"." $fecha";
		pdf_create($vista, $NombreArchivo." soporte",true);
	}

	function vinculaciones($vinculacion= "",$tipo=""){
		$this->load->model("vinculacion");
		$like  =  array('datosvinculacion.documento' =>$vinculacion);
		$like1 =  array();
		$donde = array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("estadoId"=>$tipo):null;
		$datos["mivinculacion"] =  $this->vinculacion->Consultar($like,$donde,$like1);
		$fecha = date("d-m-y");
		// pdf 
		$this->load->helper(array("dompdf"));
		$vista = $this->load->view("reportes/vinculaciones.php",$datos,true);
		$NombreArchivo = "Reporte de vinculaciones"." $fecha";
		pdf_create($vista, $NombreArchivo." soporte",true);
	}

	function profesiones($profesion= "",$tipo=""){
		$this->load->model("profesion");
		$like      =  array();
		$like1     =  array();
		$donde     = array();
		$profesion = utf8_decode(urldecode($profesion));
		$profesion ? $like1 += array('idProfesion' =>$profesion):null;
		$profesion ? $like += array('nombreProfesion' =>$profesion):null;
		($tipo == 1 || $tipo == 2) ? $donde +=  array("estadoId"=>$tipo):null;
		$datos["miprofesion"] =  $this->profesion->Consultar($like,$donde,$like1);
		$fecha = date("d-m-y");
		// pdf 
		$this->load->helper(array("dompdf"));
		$vista = $this->load->view("reportes/profesiones.php",$datos,true);
		$NombreArchivo = "Reporte de profesiones"." $fecha";
		pdf_create($vista, $NombreArchivo." soporte",true);
	}

	function programas($programa= "",$tipo=""){
		$this->load->model("programa");
		$like  =  array('idTipoPrograma' =>$programa);
		$like1 =  array();
		$donde = array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("estadoId"=>$tipo):null;
		$datos["miprograma"] =  $this->programa->Consultar($like,$donde,$like1);
		$fecha = date("d-m-y");
		// pdf 
		$this->load->helper(array("dompdf"));
		$vista = $this->load->view("reportes/programas.php",$datos,true);
		$NombreArchivo = "Reporte de programas"." $fecha";
		pdf_create($vista, $NombreArchivo." soporte",true);
	}

	function tipoVinculaciones($tipovinculacion= "",$tipo=""){
		$this->load->model("tipovinculacion");
		$like  =  array('idTipoVinculacion' =>$tipovinculacion);
		$like1 =  array();
		$donde = array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("estadoId"=>$tipo):null;
		$datos["mivinculacion"] =  $this->tipovinculacion->Consultar($like,$donde,$like1);
		$fecha = date("d-m-y");
		// pdf 
		$this->load->helper(array("dompdf"));
		$vista = $this->load->view("reportes/tipoVinculaciones.php",$datos,true);
		$NombreArchivo = "Reporte de tipos de vinculaciones"." $fecha";
		pdf_create($vista, $NombreArchivo." soporte",true);
	}

	function tipoSoporte($tipoSoporte= "",$tipo=""){
		$this->load->model("tsoporte");
		$like  =  array('idSoporte' =>$tipoSoporte);
		$like1 =  array();
		$donde = array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("estadoId"=>$tipo):null;
		$datos["misoporte"] =  $this->tsoporte->Consultar($like,$donde,$like1);
		$fecha = date("d-m-y");
		// pdf 
		$this->load->helper(array("dompdf"));
		$vista = $this->load->view("reportes/tipoSoportes.php",$datos,true);
		$NombreArchivo = "Reporte de tipos de soportes"." $fecha";
		pdf_create($vista, $NombreArchivo." soporte",true);
	}

}