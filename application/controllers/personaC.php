<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PersonaC extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('rol')) { 
			echo "<script>";
			echo "window.location.replace('".base_url()."');";
			echo "</script>";

		}
	}

	public function menu($tipo ="")
	{

		$this->load->model("tipoDoc");
		$like          = array();
		$donde         = array();
		$tipoDocumento = $this->tipoDoc->Consultar($like,$donde);
		
		switch ($tipo) {
			case 'agregar':
					$operacion="agregar";				
					$this->load->view("administrador/cabecera.php");
					$this->load->view("administrador/personas/menu.php",compact("operacion"));
					$this->load->view("administrador/personas/ingresar.php",compact("tipoDocumento"));
					$this->load->view("administrador/pie.php");
				break;

				case 'actualizar':
					$operacion="actualizar";				
					$this->load->view("administrador/cabecera.php");
					$this->load->view("administrador/personas/menu.php",compact("operacion"));
					$this->load->view("administrador/personas/actualizar.php");
					$this->load->view("administrador/pie.php");
				break;
			
			default:
					$operacion="consultar";
					$this->load->view("administrador/cabecera.php");
					$this->load->view("administrador/personas/menu.php",compact("operacion"));
					$this->load->view("administrador/personas/consultar.php");
					$this->load->view("administrador/pie.php");
			
				break;
		}
	}

	public function consultar()
	{
		$persona = $this->input->post("persona",TRUE);
		$like    =  array('documento' =>$persona);
		$donde   =  array();
		$this->load->model("persona");
		$persona =  $this->persona->Consultar($like,$donde);
		$this->load->view('administrador/personas/consultas/persona',compact("persona"));
	}

	public function ingresar()
	{
		$this->load->model("persona");

		$tipoDocumento   = $this->input->post("tipoDocumento",TRUE);
		$documento       = $this->input->post("documento",TRUE);
		$nombreCompleto  = $this->input->post("nombreCompleto",TRUE);
		$primerApellido  = $this->input->post("primerApellido",TRUE);
		$segundoApellido = $this->input->post("segundoApellido",TRUE);
		$tipoGenero      = $this->input->post("tipoGenero",TRUE);

		$datos = array(
			"tipoDocumento" => $tipoDocumento,
			"documento" => $documento,
			"nombreCompleto" => $nombreCompleto,
			"primerApellido" => $primerApellido,
			"segundoApellido" => $segundoApellido,
			"tipoGenero" => $tipoGenero,

		);
		$this->persona->ingresar($datos);

	}

}
