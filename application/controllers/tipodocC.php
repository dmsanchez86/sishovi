<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TipodocC extends CI_Controller {

	protected $cabecera;
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('rol')) redirect(base_url());
		if ($this->session->userdata('rol')==1) $this->cabecera = "administrador/cabecera";
		if ($this->session->userdata('rol')==2) $this->cabecera = "usuario/cabecera";
	}

	public function menu($tipo ="",$idTipoDocumento="")
	{

		switch ($tipo) {
			case 'agregar':
					$operacion="agregar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/tdocumentos/menu.php",compact("operacion"));
					$this->load->view("administrador/tdocumentos/ingresar.php");
					$this->load->view("administrador/pie.php");
				break;

				case 'actualizar':
					$this->load->model("tipoDoc");
						$like    =  array('idTipoDocumento' =>$idTipoDocumento);
						$like1   =  array();
						$donde   =  array('idTipoDocumento' =>$idTipoDocumento);
						
						$tipoDoc =  $this->tipoDoc->Consultar($like,$donde,$like1);

					$operacion="actualizar";				
					$this->load->view($this->cabecera);
					$this->load->view("administrador/tdocumentos/menu.php",compact("operacion"));
					$this->load->view("administrador/tdocumentos/actualizar.php",compact("tipoDoc"));
					$this->load->view("administrador/pie.php");
				break;
			
			default:
					$operacion="consultar";
					$this->load->view($this->cabecera);
					$this->load->view("administrador/tdocumentos/menu.php",compact("operacion"));
					$this->load->view("administrador/tdocumentos/consultar.php");
					$this->load->view("administrador/pie.php");
			
				break;
		}
	}

	public function consultar()
	{
		$tdocumento = $this->input->post("tdocumento",TRUE);
		$like       =  array('idTipoDocumento' =>$tdocumento);
		$donde      =  array();
		$this->load->model("tipoDoc");
		$tdocumento =  $this->tipoDoc->Consultar($like,$donde);
		$this->load->view('administrador/tdocumentos/consultas/tdocumento',compact("tdocumento"));
	}

	public function ingresar()
	{
		$this->load->model("tipoDoc");

		$nombreTipoDocumento = $this->input->post("nombreTipoDocumento",TRUE);

		$datos = array(
			"nombreTipoDocumento" => $nombreTipoDocumento,

		);
		$this->tipoDoc->ingresar($datos);

	}


	public function actualizar()
	{
		$this->load->model("tipoDoc");
		
		$nombreTipoDocumento = $this->input->post("nombreTipoDocumento",TRUE);
		$idTipoDocumento     = $this->input->post("idTipoDocumento",TRUE);

		$donde =  array('idTipoDocumento' => $idTipoDocumento);


		$datos = array(
			"nombreTipoDocumento" => $nombreTipoDocumento,

		);
		
		$this->tipoDoc->Actualizar($datos,$donde);
	}


}
