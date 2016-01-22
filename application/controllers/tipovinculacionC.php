<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TipovinculacionC extends CI_Controller {

	protected $cabecera;
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('rol')) redirect(base_url());
		if ($this->session->userdata('rol')==1) $this->cabecera = "administrador/cabecera";
		if ($this->session->userdata('rol')==2) $this->cabecera = "usuario/cabecera";
	}

	public function menu($tipo ="",$idTipoVinculacion="")
	{

		switch ($tipo) {
			case 'agregar':
					$operacion="agregar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/tipovinculaciones/menu.php",compact("operacion"));
					$this->load->view("administrador/tipovinculaciones/ingresar.php");
					$this->load->view("administrador/pie.php");
				break;

				case 'actualizar':
					$this->load->model("tipovinculacion");
					$like            =  array('idTipoVinculacion' =>$idTipoVinculacion);
					$like1           =  array();
					$donde           =  array('idTipoVinculacion' =>$idTipoVinculacion);
						
					$tipoVinculacion =  $this->tipovinculacion->Consultar($like,$donde,$like1);

					$operacion="actualizar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/tipovinculaciones/menu.php",compact("operacion"));
					$this->load->view("administrador/tipovinculaciones/actualizar.php",compact("tipoVinculacion"));
					$this->load->view("administrador/pie.php");
				break;
			
			default:
					$operacion="consultar";
					$this->load->view($this->cabecera);
					$this->load->view("administrador/tipovinculaciones/menu.php",compact("operacion"));
					$this->load->view("administrador/tipovinculaciones/consultar.php");
					$this->load->view("administrador/pie.php");
			
				break;
		}
	}

	public function consultar()
	{

		$tipoVinculacion      = $this->input->post("vinculacion",TRUE);
		$tvinculacionBusqueda = $tipoVinculacion;
		$tipo                 = $this->input->post("tipo",TRUE);
		
		$like                 =  array('idTipoVinculacion' =>$tipoVinculacion);
		$like1                =  array('nombreTipoVinculacion' =>$tipoVinculacion);
		$donde                =array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("tipovinculacion.estadoId"=>$tipo):null;

		$this->load->model("tipovinculacion");
		$tipoVinculacion =  $this->tipovinculacion->Consultar($like,$donde,$like1);
		$this->load->view('administrador/tipovinculaciones/consultas/vinculacion',compact("tipoVinculacion","tvinculacionBusqueda","tipo"));

	}

	public function actualizar()
	{
		$this->load->model("tipovinculacion");
		
		$nombreTipoVinculacion = $this->input->post("nombreTipoVinculacion",TRUE);
		$idTipoVinculacion     = $this->input->post("idTipoVinculacion",TRUE);

		$donde =  array('idTipoVinculacion' => $idTipoVinculacion);


		$datos = array(
			"nombreTipoVinculacion" => $nombreTipoVinculacion,

		);
		
		$this->tipovinculacion->Actualizar($datos,$donde);
	}


	function cambiarEstado(){
		$this->load->model("tipovinculacion");

		$idTipoVinculacion = $this->input->post("idTipoVinculacion",TRUE);
		$estado            = $this->input->post("activo",TRUE);

		$datos = array(
			"estadoId" =>$estado,
		);
		$donde = array(
			"idTipoVinculacion" =>$idTipoVinculacion,
		);
		$this->tipovinculacion->Actualizar($datos,$donde);

	}

	public function ingresar()
	{
		$this->load->model("tipovinculacion");

		$nombreTipoVinculacion = $this->input->post("nombreTipoVinculacion",TRUE);
		$estadoId              = 1;

		$datos = array(
			"nombreTipoVinculacion" => $nombreTipoVinculacion,
			"estadoId" => $estadoId,

		);
		$this->tipovinculacion->ingresar($datos);

	}

}