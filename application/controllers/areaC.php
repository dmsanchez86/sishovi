<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AreaC extends CI_Controller {

	protected $cabecera;
	protected $perfil;
	protected $permiso;

	/*
		Permisos:
		Si:1
		No:0
	*/

	public function __construct() {

		parent::__construct();
		$this->permiso["menu"] = 0;
		$this->permiso["agregar"] = 0;

		if (!$this->session->userdata('rol')) redirect(base_url());
		$this->perfil = $this->session->userdata('rol');

		switch ($this->perfil) {
			case '1':
				$this->cabecera = "administrador/cabecera";
				$this->permiso["menu"] = 1;
				$this->permiso["agregar"] = 1;
				break;

			case '2':
				$this->cabecera = "usuario/cabecera";
				$this->permiso["menu"] = 1;
				$this->permiso["agregar"] = 1;
			break;

			default:
				# code...
				break;
		}
	}

	public function menu($tipo ="",$idArea="")
	{

		if (!$this->permiso["menu"]) redirect(base_url());

		switch ($tipo) {
			case 'agregar':
				if (!$this->permiso["agregar"]) redirect(base_url());
				// if (!$this->permiso["agregar"]) redirect(base_url()."index.php/usuarioC/menu");
					$operacion="agregar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/areas/menu.php",compact("operacion"));
					$this->load->view("administrador/areas/ingresar.php");
					$this->load->view("administrador/pie.php");
				break;

				case 'actualizar':
						$this->load->model("area");
						$like      =  array('idArea' =>$idArea);
						$like1     =  array('nombreArea' =>$idArea);
						$donde     =  array('idArea' =>$idArea);
						
						$area      =  $this->area->Consultar($like,$donde,$like1);
						
						$operacion ="actualizar";

						$this->load->view($this->cabecera);
						$this->load->view("administrador/areas/menu.php",compact("operacion"));
						$this->load->view("administrador/areas/actualizar.php",compact("area"));
						$this->load->view("administrador/pie.php");
					break;
			
			default:
						$operacion="consultar";
						$this->load->view($this->cabecera);
						$this->load->view("administrador/areas/menu.php",compact("operacion"));
						$this->load->view("administrador/areas/consultar.php");
						$this->load->view("administrador/pie.php");
					break;
		}
	}

	public function consultar()
	{

		$area         = $this->input->post("area",TRUE);
		$areaBusqueda = $area;
		$tipo         = $this->input->post("tipo",TRUE);
		
		$like         =  array('idArea' =>$area);
		$like1        =  array('nombreArea' =>$area);
		$donde        = array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("areas.estadoId"=>$tipo):null;
		$this->load->model("area");
		$area =  $this->area->Consultar($like, $donde,$like1);
		$this->load->view('administrador/areas/consultas/area',compact("area","tipo","areaBusqueda"));

	}


	public function ingresar()
	{
		if (!$this->permiso["agregar"]) redirect(base_url());
		$this->load->model("area");

		$nombreArea = $this->input->post("nombreArea",TRUE);
		$estadoId   = 1;

		$datos = array(
			"nombreArea" => $nombreArea,
			"estadoId" => $estadoId,

		);
		$this->area->ingresar($datos);

	}

	function cambiarEstado(){
		$this->load->model("area");

		$idArea = $this->input->post("idArea",TRUE);
		$estado = $this->input->post("activo",TRUE);

		$datos = array(
			"estadoId" =>$estado,
		);
		$donde = array(
			"idArea" =>$idArea,
		);
		$this->area->Actualizar($datos,$donde);
		$this->output->enable_profiler(TRUE);

	}

	public function actualizar()
	{
		$this->load->model("area");
		
		$nombreArea = $this->input->post("nombreArea",TRUE);
		$idArea     = $this->input->post("idArea",TRUE);

		$donde =  array('idArea' => $idArea);

		$datos = array(
			"nombreArea" => $nombreArea,

		);
		
		$this->area->Actualizar($datos,$donde);
	}


}