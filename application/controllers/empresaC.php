<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EmpresaC extends CI_Controller {

	protected $cabecera;
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('rol')) redirect(base_url());
		if ($this->session->userdata('rol')==1) $this->cabecera = "administrador/cabecera";
		if ($this->session->userdata('rol')==2) $this->cabecera = "usuario/cabecera";
	}


	public function menu($tipo ="",$idEmpresa="")
	{
		switch ($tipo) {

			case 'agregar':
					$operacion="agregar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/empresas/menu.php",compact("operacion"));
					$this->load->view("administrador/empresas/ingresar.php");
					$this->load->view("administrador/pie.php");
				break;

				case 'actualizar':
						$this->load->model("empresa");
						$like    =  array('idEmpresa' =>$idEmpresa);
						$like1   =  array();
						$donde   =  array('idEmpresa' =>$idEmpresa);
						
						$empresa =  $this->empresa->Consultar($like,$donde,$like1);

						$operacion="actualizar";
						$this->load->view($this->cabecera);				
						$this->load->view("administrador/empresas/menu.php",compact("operacion"));
						$this->load->view("administrador/empresas/actualizar.php",compact("empresa"));
						$this->load->view("administrador/pie.php");
					break;
			
				default:
						$operacion="consultar";
						$this->load->view($this->cabecera);
						$this->load->view("administrador/empresas/menu.php",compact("operacion"));
						$this->load->view("administrador/empresas/consultar.php");
						$this->load->view("administrador/pie.php");
				
					break;
		}
	}

	public function consultar()
	{

		$empresa         = $this->input->post("empresa",TRUE);
		$empresaBusqueda = $empresa;
		$tipo            = $this->input->post("tipo",TRUE);
		
		$like            =  array('idEmpresa' =>$empresa);
		$like1           =  array('nombreEmpresa' =>$empresa);
		$donde           =  array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("empresa.estadoId"=>$tipo):null;
		$this->load->model("empresa");
		$empresa =  $this->empresa->Consultar($like, $donde,$like1);
		$this->load->view('administrador/empresas/consultas/empresa',compact("empresa","empresaBusqueda","tipo"));
	}

	public function actualizar()
	{
		$this->load->model("empresa");
		
		$nombreEmpresa = $this->input->post("nombreEmpresa",TRUE);
		$nit           = $this->input->post("nit",TRUE);
		$direccion     = $this->input->post("direccionEmpresa",TRUE);
		$idEmpresa     = $this->input->post("idEmpresa",TRUE);
		
		$donde         =  array('idEmpresa' => $idEmpresa);


		$datos = array(
			"nombreEmpresa" => $nombreEmpresa,
			"nit" => $nit,
			"direccionEmpresa" => $direccion,

		);
		
		$this->empresa->Actualizar($datos,$donde);
	}


	function cambiarEstado(){
		$this->load->model("empresa");

		$idEmpresa = $this->input->post("idEmpresa",TRUE);
		$estado    = $this->input->post("activo",TRUE);

		$datos = array(
			"estadoId" =>$estado,
		);
		$donde = array(
			"idEmpresa" =>$idEmpresa,
		);
		$this->empresa->Actualizar($datos,$donde);

		//$this->output->enable_profiler(TRUE);
	}

	public function ingresar()
	{
		$this->load->model("empresa");

		$nombreEmpresa    = $this->input->post("nombreEmpresa",TRUE);
		$direccionEmpresa = $this->input->post("direccionEmpresa",TRUE);
		$nit              = $this->input->post("nit",TRUE);
		$estadoId         = 1;

		$datos = array(
			"nombreEmpresa" => $nombreEmpresa,
			"direccionEmpresa" => $direccionEmpresa,
			"nit" => $nit,
			"estadoId" => $estadoId,

		);
		$this->empresa->ingresar($datos);

	}

}


