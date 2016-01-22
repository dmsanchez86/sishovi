<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProfesionC extends CI_Controller {

	protected $cabecera;
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('rol')) redirect(base_url());
		if ($this->session->userdata('rol')==1) $this->cabecera = "administrador/cabecera";
		if ($this->session->userdata('rol')==2) $this->cabecera = "usuario/cabecera";
	}

	public function menu($tipo ="",$idProfesion="")
	{
		switch ($tipo) {
			case 'agregar':
					$operacion="agregar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/profesiones/menu.php",compact("operacion"));
					$this->load->view("administrador/profesiones/ingresar.php");
					$this->load->view("administrador/pie.php");
				break;

				case 'actualizar':
					$this->load->model("profesion");
						$like      =  array('idProfesion' =>$idProfesion);
						$like1     =  array();
						$donde     =  array('idProfesion' =>$idProfesion);
						
						$profesion =  $this->profesion->Consultar($like,$donde,$like1);

						$operacion="actualizar";				
						$this->load->view($this->cabecera);
						$this->load->view("administrador/profesiones/menu.php",compact("operacion"));
						$this->load->view("administrador/profesiones/actualizar.php",compact("profesion"));
						$this->load->view("administrador/pie.php");
					break;
				
				default:
						$operacion="consultar";
						$this->load->view($this->cabecera);
						$this->load->view("administrador/profesiones/menu.php",compact("operacion"));
						$this->load->view("administrador/profesiones/consultar.php");
						$this->load->view("administrador/pie.php");
				
					break;
		}
	}

	
	public function consultar()
	{

		$profesion         = $this->input->post("profesion",TRUE);
		$profesionBusqueda = $profesion;
		$tipo              = $this->input->post("tipo",TRUE);
		
		$like              =  array('idProfesion' =>$profesion);
		$like1             =  array('nombreProfesion' =>$profesion);
		$donde             =  array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("profesiones.estadoId"=>$tipo):null;
		$this->load->model("profesion");
		$profesion =  $this->profesion->Consultar($like, $donde,$like1);
		$this->load->view('administrador/profesiones/consultas/profesion',compact("profesion","profesionBusqueda","tipo"));
	}

	function cambiarEstado(){
		$this->load->model("profesion");

		$idProfesion = $this->input->post("idProfesion",TRUE);
		$estado      = $this->input->post("activo",TRUE);

		$datos = array(
			"estadoId" =>$estado,
		);
		$donde = array(
			"idProfesion" =>$idProfesion,
		);
		$this->profesion->Actualizar($datos,$donde);
		$this->output->enable_profiler(TRUE);

	}

	public function ingresar()
	{
		$this->load->model("profesion");

		$nombreProfesion = $this->input->post("nombreProfesion",TRUE);
		$estadoId        = 1;

		$datos = array(
			"nombreProfesion" => $nombreProfesion,
			"estadoId" => $estadoId,

		);
		$this->profesion->ingresar($datos);

	}

	public function actualizar()
	{
		$this->load->model("profesion");
		
		$nombreProfesion = $this->input->post("nombreProfesion",TRUE);
		$idProfesion     = $this->input->post("idProfesion",TRUE);

		$donde =  array('idProfesion' => $idProfesion);


		$datos = array(
			"nombreProfesion" => $nombreProfesion,

		);
		
		$this->profesion->Actualizar($datos,$donde);
	}

}
