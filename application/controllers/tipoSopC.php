<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TipoSopC extends CI_Controller {

	protected $cabecera;
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('rol')) redirect(base_url());
		if ($this->session->userdata('rol')==1) $this->cabecera = "administrador/cabecera";
		if ($this->session->userdata('rol')==2) $this->cabecera = "usuario/cabecera";
	}

	public function menu($tipo ="",$idTipoSoporte="")
	{

		switch ($tipo) {
			case 'agregar':
					$operacion="agregar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/tsoportes/menu.php",compact("operacion"));
					$this->load->view("administrador/tsoportes/ingresar.php");
					$this->load->view("administrador/pie.php");
				break;

				case 'actualizar':
					$this->load->model("tsoporte");
					$like        =  array('idSoporte' =>$idTipoSoporte);
					$like1       =  array();
					$donde       =  array('idSoporte' =>$idTipoSoporte);
						
					$tipoSoporte =  $this->tsoporte->Consultar($like,$donde,$like1);

					$operacion="actualizar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/tsoportes/menu.php",compact("operacion"));
					$this->load->view("administrador/tsoportes/actualizar.php",compact("tipoSoporte"));
					$this->load->view("administrador/pie.php");
				break;
			
			default:
					$operacion="consultar";
					$this->load->view($this->cabecera);	
					$this->load->view("administrador/tsoportes/menu.php",compact("operacion"));
					$this->load->view("administrador/tsoportes/consultar.php");
					$this->load->view("administrador/pie.php");
			
				break;
		}
	}

	public function consultar()
	{

		$tsoporte         = $this->input->post("tsoporte",TRUE);
		$tsoporteBusqueda = $tsoporte;
		$tipo             = $this->input->post("tipo",TRUE);
		
		$like             =  array('nombreSoporte' =>$tsoporte);
		$like1            =  array('idSoporte' =>$tsoporte);
		$donde            = array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("tiposoporte.estadoId"=>$tipo):null;
		$this->load->model("tsoporte");
		$tsoporte =  $this->tsoporte->Consultar($like,$donde,$like1);
		$this->load->view('administrador/tsoportes/consultas/tsoporte',compact("tsoporte","tsoporteBusqueda","tipo"));
	}

	function cambiarEstado(){
		$this->load->model("tsoporte");

		$idSoporte = $this->input->post("idTipoSoporte",TRUE);
		$estado = $this->input->post("activo",TRUE);

		$datos = array(
			"estadoId" =>$estado,
		);
		$donde = array(
			"idSoporte" =>$idSoporte,
		);
		$this->tsoporte->Actualizar($datos,$donde);

	}

	public function ingresar()
	{
		$this->load->model("tsoporte");

		$nombreSoporte = $this->input->post("nombreSoporte",TRUE);
		$estadoId      = 1;

		$datos = array(
			"nombreSoporte" => $nombreSoporte,
			"estadoId" => $estadoId,

		);
		$this->tsoporte->ingresar($datos);

	}

	public function actualizar()
	{
		$this->load->model("tsoporte");
		
		$nombreSoporte = $this->input->post("nombreTipoSoporte",TRUE);
		$idSoporte     = $this->input->post("idTipoSoporte",TRUE);

		$donde =  array('idSoporte' => $idSoporte);


		$datos = array(
			"nombreSoporte" => $nombreSoporte,

		);
		
		$this->tsoporte->Actualizar($datos,$donde);
	}


}
