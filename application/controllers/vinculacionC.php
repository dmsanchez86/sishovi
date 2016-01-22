<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VinculacionC extends CI_Controller {

	protected $cabecera;
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('rol')) redirect(base_url());
		if ($this->session->userdata('rol')==1) $this->cabecera = "administrador/cabecera";
		if ($this->session->userdata('rol')==2) $this->cabecera = "usuario/cabecera";
	}

	public function menu($tipo ="",$documento="")
	{
		$this->load->model("cargo");
		$this->load->model("programa");
		$this->load->model("tipovinculacion");
		$this->load->model("vinculacion");
		$this->load->model("hojadevida");
		$like            = array();
		$like1           = array();
		$donde           = array();
		$donde1          = array("estadoId"=>1);
		$tipoCargos      = $this->cargo->Consultar($like,$donde1,$like1);
		$tipoPrograma    = $this->programa->Consultar($like,$donde1,$like1);
		$tipoVinculacion = $this->tipovinculacion->Consultar($like,$donde1,$like1);

		$like =  array();
		$donde =  array('datosvinculacion.documento' =>$documento,"datosvinculacion.estadoId"=>1);
		$vinculacion =  $this->vinculacion->Consultar($like,$donde);

		switch ($tipo) {
			case 'agregar':

					$like  =  array('hojadevida.documento' =>$documento);
					$donde =  array();
					$this->load->model("hojadevida");
					$hojadevida =  $this->hojadevida->datosHojaVida($like,$donde);
					$operacion  ="agregar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/vinculaciones/menu.php",compact("operacion"));
					$this->load->view("administrador/vinculaciones/ingresar.php",compact('tipoCargos','tipoPrograma','tipoVinculacion',"vinculacion","hojadevida"));
					$this->load->view("administrador/pie.php");
				break;

				case 'actualizar':
					$this->load->model("vinculacion");
					$this->load->model("cargo");
					$this->load->model("programa");
					$like            =  array('datosvinculacion.documento' =>$documento);
					$like1           =  array();
					$donde           =  array('datosvinculacion.estadoId'=>1);
						
					$vinculacion     =  $this->vinculacion->Consultar($like,$donde,$like1);
					$like            =  array();
					$donde           =  array();
					$cargo           = 	$this->cargo->Consultar($like,$donde,$like1);
					$programa        = 	$this->programa->Consultar($like,$donde,$like1);
					$tipoVinculacion = 	$this->tipovinculacion->Consultar($like,$donde,$like1);

					$operacion="actualizar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/vinculaciones/menu.php",compact("operacion"));
					$this->load->view("administrador/vinculaciones/actualizar.php",compact("vinculacion","cargo","programa","tipoVinculacion"));
					$this->load->view("administrador/pie.php");
				break;
			
			default:
					$operacion="consultar";
					$this->load->view($this->cabecera);
					$this->load->view("administrador/vinculaciones/menu.php",compact("operacion"));
					$this->load->view("administrador/vinculaciones/consultar.php");
					$this->load->view("administrador/pie.php");
			
				break;
		}
	}

	public function consultar()
	{

			$vinculacion         = $this->input->post("vinculacion",TRUE);
			$vinculacionBusqueda = $vinculacion;
			$tipo                = $this->input->post("tipo",TRUE);
			
			$like                =  array('datosvinculacion.documento' =>$vinculacion);
			$donde               =  array();
			($tipo == 1 || $tipo ==2) ? $donde +=  array("datosvinculacion.estadoId"=>$tipo):null;
			$this->load->model("vinculacion");
			$vinculacion =  $this->vinculacion->Consultar($like,$donde);
			$this->load->view('administrador/vinculaciones/consultas/vinculacion',compact("vinculacion","vinculacionBusqueda","tipo"));
	}


	public function ingresar()
	{
			$this->load->model("vinculacion");
			$this->load->model("persona");

			$documento              = $this->input->post("documento",TRUE);
			$cargoId                = $this->input->post("cargoId",TRUE);
			$tipoDePrograma         = $this->input->post("tipoDePrograma",TRUE);
			$tipoVinculacion        = $this->input->post("tipoVinculacion",TRUE);
			$sueldo                 = $this->input->post("sueldo",TRUE);
			$cuentaBancaria         = $this->input->post("cuentaBancaria",TRUE);
			$fechaIngreso           = $this->input->post("fechaIngreso",TRUE);
			$fechaTermino           = $this->input->post("fechaTermino",TRUE);
			$calificacion           = $this->input->post("calificacion",TRUE);
			$eps                    = $this->input->post("eps",TRUE);
			$fondoEmpleado          = $this->input->post("fondoEmpleado",TRUE);
			$observacionVinculacion = $this->input->post("observacionVinculacion",TRUE);
			$estadoId               = 1;

			$datos = array(
				"documento"              => $documento,
				"cargoId"                => $cargoId,
				"tipoDePrograma"         => $tipoDePrograma,
				"tipoVinculacion"        => $tipoVinculacion,
				"sueldo"                 => $sueldo,
				"cuentaBancaria"         => $cuentaBancaria,
				"eps"                    => $eps,
				"fondoEmpleado"          => $fondoEmpleado,
				"fechaIngreso"           => $fechaIngreso,
				"fechaTermino"           => $fechaTermino,
				"calificacion"           => $calificacion,
				"observacionVinculacion" => $observacionVinculacion,
				"estadoId"               => $estadoId,

			);
			$this->vinculacion->ingresar($datos);

			$donde = array('documento'=>$documento);

			$datos = array('vinculado'=>1);

			$this->persona->actualizar($datos,"hojadevida",$donde);

	}

	function cambiarEstado(){

			$this->load->model("vinculacion");

			$idDatoVinculacion = $this->input->post("idDatoVinculacion",TRUE);
			$estado            = $this->input->post("activo",TRUE);

			$datos = array(
				"estadoId" =>$estado,
			);

			$donde = array(
				"idDatoVinculacion" =>$idDatoVinculacion,
			);
			
			$this->vinculacion->Actualizar($datos,$donde);
			//Muestra todos los datos enviados por POST:
			//$this->output->enable_profiler(TRUE);

	}

	public function actualizar(){

		$this->load->model("vinculacion");

		$idDatoVinculacion      = $this->input->post("idVinculaion",TRUE);
		$cargo                  = $this->input->post("cargo",TRUE);
		$tipoDePrograma         = $this->input->post("tipoDePrograma",TRUE);
		$tipoVinculacion        = $this->input->post("tipoVinculacion",TRUE);
		$sueldo                 = $this->input->post("sueldo",TRUE);
		$fechaIngreso           = $this->input->post("fechaIngreso",TRUE);
		$fechaTermino           = $this->input->post("fechaTermino",TRUE);
		$calificacion           = $this->input->post("calificacion",TRUE);
		$observacionVinculacion = $this->input->post("observacionVinculacion",TRUE);

		$donde =  array('datosvinculacion.idDatoVinculacion' => $idDatoVinculacion);

		$datos = array(
			"cargoId" => $cargo,
			"tipoDePrograma" => $tipoDePrograma,
			"tipoVinculacion" => $tipoVinculacion,
			"sueldo" => $sueldo,
			"fechaIngreso" => $fechaIngreso,
			"fechaTermino" => $fechaTermino,
			"calificacion" => $calificacion,
			"observacionVinculacion" => $observacionVinculacion,
		);

		$this->vinculacion->Actualizar($datos,$donde);

	}

	public function desvincular(){
		
			$this->load->model("vinculacion");
			$this->load->model("persona");

			$idVinculaion = $this->input->post("idVinculaion",TRUE);
			$razon        = $this->input->post("razon",TRUE);
			$detalle      = $this->input->post("detalle",TRUE);
			$fecha        = $this->input->post("fechaDesvinculacion",TRUE);
			$documento    = $this->input->post("documento",TRUE);
			$donde        =  array('idDatoVinculacion' => $idVinculaion);
			$vinculado    = 2;

			$datos = array(
				"estadoId"              => $vinculado,
				"razon"                 => $razon,
				"detalleDesvinculacion" => $detalle,
				"fechaDesvinculacion"   => $fecha,
			);
			$this->vinculacion->Actualizar($datos,$donde);

			$donde = array('documento'=>$documento);
			$datos = array('vinculado'=>2);

			$this->persona->actualizar($datos,"hojadevida",$donde);

			//$this->output->enable_profiler();
	}

	public function detalle($idVinculaion="0")
	{
			$this->load->model("vinculacion");
			$this->load->view($this->cabecera);
			$like        =  array();
			$donde       = array("datosvinculacion.idDatoVinculacion"=>$idVinculaion);
			$informacion = $this->vinculacion->detalleVinculacion($like,$donde);

			$this->load->view("infoVinculacion/detalle/informacion",compact('informacion'));

	}

}