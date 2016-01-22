<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CargoC extends CI_Controller {

	protected $cabecera;
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('rol')) redirect(base_url());
		if ($this->session->userdata('rol')==1) $this->cabecera = "administrador/cabecera";
		if ($this->session->userdata('rol')==2) $this->cabecera = "usuario/cabecera";
	}

	public function menu($tipo ="",$cargo="")
	{
		switch ($tipo) {
			case 'agregar':
					$operacion="agregar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/cargos/menu.php",compact("operacion"));
					$this->load->view("administrador/cargos/ingresar.php");
					$this->load->view("administrador/pie.php");
				break;

				case 'actualizar':
					$this->load->model("cargo");
						$like  =  array();
						$like1 =  array();
						$donde =  array('idcargos' =>$cargo);
						
						$cargo =  $this->cargo->Consultar($like,$donde,$like1);

						$operacion="actualizar";				
						$this->load->view($this->cabecera);
						$this->load->view("administrador/cargos/menu.php",compact("operacion"));
						$this->load->view("administrador/cargos/actualizar.php",compact("cargo"));
						$this->load->view("administrador/pie.php");
					break;
			
			default:
						$operacion="consultar";
						$this->load->view($this->cabecera);
						$this->load->view("administrador/cargos/menu.php",compact("operacion"));
						$this->load->view("administrador/cargos/consultar.php");
						$this->load->view("administrador/pie.php");
				
					break;
		}
	}

	
	public function consultar()
	{

		$cargo         = $this->input->post("cargo",TRUE);
		$cargoBusqueda = $cargo;
		$tipo          = $this->input->post("tipo",TRUE);
		
		$like          =  array('idcargos' =>$cargo);
		$like1         =  array('nombreCargo' =>$cargo);
		$donde         =  array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("cargos.estadoId"=>$tipo):null;
		$this->load->model("cargo");
		$cargo =  $this->cargo->Consultar($like, $donde,$like1);
		$this->load->view('administrador/cargos/consultas/cargo',compact("cargo","cargoBusqueda","tipo"));
	}

	function cambiarEstado(){
		$this->load->model("cargo");

		$idcargo = $this->input->post("idCargo",TRUE);
		$estado  = $this->input->post("activo",TRUE);

		$datos = array(
			"estadoId" =>$estado,
		);
		$donde = array(
			"idcargos" =>$idcargo,
		);
		$this->cargo->actualizar($datos,$donde);
		$this->output->enable_profiler(TRUE);

	}

	public function ingresar()
	{
		$this->load->model("cargo");

		$nombreCargo = $this->input->post("nombreCargo",TRUE);
		$estadoId    = 1;

		$datos = array(
			"nombreCargo" => $nombreCargo,
			"estadoId" => $estadoId,

		);
		$this->cargo->ingresar($datos);

	}

	public function actualizar()
	{
		$this->load->model("cargo");

		$nombreCargo = $this->input->post("nombreCargo",TRUE);
		$idCargo     = $this->input->post("idCargo",TRUE);
		
		$donde       =  array('idcargos' => $idCargo);

		$datos = array(
			"nombreCargo" => $nombreCargo,

		);

		$this->cargo->actualizar($datos,$donde);

	}

}

