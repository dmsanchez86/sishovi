<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProgramaC extends CI_Controller {

	protected $cabecera;
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('rol')) redirect(base_url());
		if ($this->session->userdata('rol')==1) $this->cabecera = "administrador/cabecera";
		if ($this->session->userdata('rol')==2) $this->cabecera = "usuario/cabecera";
	}

	public function menu($tipo ="",$idTipoPrograma="")
	{

		switch ($tipo) {
				case 'agregar':
						$operacion="agregar";				
						$this->load->view($this->cabecera);
						$this->load->view("administrador/programas/menu.php",compact("operacion"));
						$this->load->view("administrador/programas/ingresar.php");
						$this->load->view("administrador/pie.php");
					break;

				case 'actualizar':
						$this->load->model("programa");
						$like     =  array('idTipoPrograma' =>$idTipoPrograma);
						$like1    =  array();
						$donde    =  array('idTipoPrograma' =>$idTipoPrograma);
						
						$programa =  $this->programa->Consultar($like,$donde,$like1);

						$operacion="actualizar";				
						$this->load->view($this->cabecera);
						$this->load->view("administrador/programas/menu.php",compact("operacion"));
						$this->load->view("administrador/programas/actualizar.php",compact("programa"));
						$this->load->view("administrador/pie.php");
					break;
				
				default:
						$operacion="consultar";
						$this->load->view($this->cabecera);
						$this->load->view("administrador/programas/menu.php",compact("operacion"));
						$this->load->view("administrador/programas/consultar.php");
						$this->load->view("administrador/pie.php");
				
					break;
		}
	}

	public function consultar()
	{
		$this->load->model("programa");

		$programa         = $this->input->post("programa",TRUE);
		$programaBusqueda = $programa;
		$tipo             = $this->input->post("tipo",TRUE);
		
		$like             =  array('idTipoPrograma' =>$programa);
		$like1            =  array('nombreTipoPrograma' =>$programa);
		$donde            = array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("tipoprograma.estadoId"=>$tipo):null;
		$programa =  $this->programa->Consultar($like,$donde,$like1);
		$this->load->view('administrador/programas/consultas/programa',compact("programa","programaBusqueda","tipo"));
	}


	function cambiarEstado(){
		$this->load->model("programa");

		$idTipoPrograma = $this->input->post("idTipoPrograma",TRUE);
		$estado = $this->input->post("activo",TRUE);

		$datos = array(
			"estadoId" =>$estado,
		);
		$donde = array(
			"idTipoPrograma" =>$idTipoPrograma,
		);
		$this->programa->Actualizar($datos,$donde);
		
		/*Muestra todos las consultas enviadas por POST
		$this->output->enable_profiler(TRUE);*/

	}


	public function ingresar()
	{
		$this->load->model("programa");

		$nombreTipoPrograma = $this->input->post("nombreTipoPrograma",TRUE);
		$estadoId           = 1;

		$datos = array(
			"nombreTipoPrograma" => $nombreTipoPrograma,
			"estadoId" => $estadoId,

		);
		$this->programa->ingresar($datos);

	}

	public function actualizar()
	{
		$this->load->model("programa");
		
		$nombreTipoPrograma = $this->input->post("nombreTipoPrograma",TRUE);
		$idTipoPrograma     = $this->input->post("idTipoPrograma",TRUE);

		$donde =  array('idTipoPrograma' => $idTipoPrograma);


		$datos = array(
			"nombreTipoPrograma" => $nombreTipoPrograma,

		);
		
		$this->programa->Actualizar($datos,$donde);
	}


}
