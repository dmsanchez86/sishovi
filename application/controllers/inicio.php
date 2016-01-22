<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('rol')) {
			
			$this->load->view("inicio/cabecera.php");
			$this->load->view("inicio/cuerpo.php");
			$this->load->view("inicio/pie.php");
		}
		if ($this->session->userdata('rol')== 1) {
			
			$this->load->view("administrador/cabecera.php");
			$this->load->view("administrador/cuerpo.php");
			$this->load->view("administrador/pie.php");
		}
		if ($this->session->userdata('rol')== 2) {
			
			$this->load->view("usuario/cabecera.php");
			$this->load->view("usuario/cuerpo.php");
			$this->load->view("usuario/pie.php");
		}
	}

	public function formularios()
	{
		$formulario = $this->input->post("formulario",TRUE);

		switch ($formulario) {
			case 'area':
				 $this->load->view("administrador/areas/ingresar.php");
				break;
			case 'cargo':
				$this->load->view("administrador/cargos/ingresar.php");
				break;
			case 'tipoDocumento':
				$this->load->view("administrador/tdocumentos/ingresar.php");
				break;
			case 'profesion':
				$this->load->view("administrador/profesiones/ingresar.php");
				break;
			case 'empresa':
				$this->load->view("administrador/empresas/ingresar.php");
				break;
			case 'soporte':
				$this->load->view("administrador/tsoportes/ingresar.php");
				break;

			case 'programa':
				$this->load->view("administrador/programas/ingresar.php");
				break;

			case 'tipoVinculacion':
				$this->load->view("administrador/tipovinculaciones/ingresar.php");
				break;

			default:
				# code...
				break;
		}

	}
	public function actualizarGenrico()
	{
		$formulario = $this->input->post("formulario",TRUE);
		
		switch ($formulario) {
			case 'areaId':
				$this->load->model("area");
						$like = array();
						$like1 = array();
						$donde = array("estadoId"=>1);
				$area = $this->area->Consultar($like,$donde,$like1);
				$this->load->view("inicio/consultasGenricas",compact('area',"formulario"));
				break;

			case 'cargoId':
				$this->load->model("cargo");
						$like = array();
						$like1 = array();
						$donde = array("estadoId"=>1);
				$cargo = $this->cargo->Consultar($like,$donde,$like1);
				$this->load->view("inicio/consultasGenricas",compact('cargo',"formulario"));
				break;

			case 'cargo':
				$this->load->model("cargo");
						$like = array();
						$like1 = array();
						$donde = array("estadoId"=>1);
				$cargo = $this->cargo->Consultar($like,$donde,$like1);
				$this->load->view("inicio/consultasGenricas",compact('cargo',"formulario"));
				break;

			case 'tipoDocumento':
				$this->load->model("tipoDoc");
						$like = array();
						$donde = array();
				$tipoDocumento = $this->tipoDoc->Consultar($like,$donde);
				$this->load->view("inicio/consultasGenricas",compact('tipoDocumento',"formulario"));
				break;

			case 'profesion':
				$this->load->model("profesion");
						$like = array();
						$like1 = array();
						$donde = array("estadoId"=>1);
				$profesion = $this->profesion->Consultar($like,$donde,$like1);
				$this->load->view("inicio/consultasGenricas",compact('profesion',"formulario"));
				break;

			case 'empresa':
				$this->load->model("empresa");
						$like = array();
						$like1 = array();
						$donde = array();
				$empresa = $this->empresa->Consultar($like,$donde,$like1);
				$this->load->view("inicio/consultasGenricas",compact('empresa',"formulario"));
				break;

			case 'soporteTipo':
				$this->load->model("tsoporte");
						$like = array();
						$like1 = array();
						$donde = array();
				$soporte = $this->tsoporte->Consultar($like,$donde,$like1);
				$this->load->view("inicio/consultasGenricas",compact('soporte',"formulario"));
				break;

			case 'tipoDePrograma':
				$this->load->model("programa");
						$like = array();
						$donde = array();
						$like1 = array();
				$programa = $this->programa->Consultar($like,$donde,$like1);
				$this->load->view("inicio/consultasGenricas",compact('programa',"formulario"));
				break;

			case 'tipoVinculacion':
				$this->load->model("tipovinculacion");
						$like = array();
						$like1 = array();
						$donde = array();
				$tipovinculacion = $this->tipovinculacion->Consultar($like,$donde,$like1);
				$this->load->view("inicio/consultasGenricas",compact('tipovinculacion',"formulario"));
				break;

			default:
				
				break;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */