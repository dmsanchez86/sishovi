<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsuarioC extends CI_Controller {

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
		if ($this->session->userdata('rol')==1) $this->cabecera = "administrador/cabecera";
		if ($this->session->userdata('rol')==2) $this->cabecera = "usuario/cabecera";

		$this->permiso["menu"] = 0;
		$this->permiso["agregar"] = 1;

		switch ($this->perfil) {
			case '1':
				$this->permiso["menu"] = 1;
				$this->permiso["agregar"] = 1;
				break;

			case '2':
				$this->permiso["menu"] = 1;
				$this->permiso["agregar"] = 0;
			break;

			default:
				# code...
				break;
		}
	}

	public function menu($tipo ="",$documento="")
	{

		$this->load->model("area");
		$this->load->model("rol");
		$this->load->model("cargo");
		$like       = array();
		$like1      = array();
		$donde      = array();
		$donde1     = array("estadoId"=>1);
		$area       = $this->area->Consultar($like,$donde1,$like1);
		$rol        = $this->rol->Consultar($like,$donde,$like1);
		$tipoCargos = $this->cargo->Consultar($like,$donde1,$like1);

		switch ($tipo) {
			case 'agregar':
				if (!$this->permiso["agregar"]) redirect(base_url());
					$operacion="agregar";
					$this->load->view($this->cabecera);
					$this->load->view("administrador/usuarios/menu.php",compact("operacion"));
					$this->load->view("administrador/usuarios/ingresar.php",compact('area','rol','tipoCargos'));
					$this->load->view("administrador/pie.php");
				break;

				case 'actualizar':
						$this->load->model("usuario");
						$this->load->model("area");
						$this->load->model("cargo");
						$this->load->model("rol");

						$like  = array();
						$like1 = array("estadoId"=>1);
						$donde = array();
						
						$area  = $this->area->Consultar($like,$donde,$like1);
						$cargo = $this->cargo->Consultar($like,$donde,$like1);
						$rol   = $this->rol->Consultar($like,$donde);
						
						
						$like  =  array('documentoUsuario' =>$documento);
						$donde =  array();
						$like1 =  array();
						
						$usuario =  $this->usuario->Consultar($like,$donde,$like1);


					$operacion="actualizar";
					$this->load->view($this->cabecera);
					$this->load->view("administrador/usuarios/menu.php",compact("operacion"));
					$this->load->view("administrador/usuarios/actualizar",compact("area","cargo","rol","usuario"));
					$this->load->view("administrador/pie.php");
				break;

				case 'clave':
					$this->load->view($this->cabecera);
					$this->load->view("administrador/usuarios/configuracion");
					$this->load->view("administrador/pie.php");
					break;

				case 'contacto':
					$this->cabecera = "inicio/cabecera";
					$this->load->view($this->cabecera);
					$this->load->view("administrador/usuarios/contacto");
					$this->load->view("administrador/pie.php");
					break;

				case 'acerca':
					$this->cabecera = "inicio/cabecera";
					$this->load->view($this->cabecera);
					$this->load->view("administrador/usuarios/acerca");
					$this->load->view("administrador/pie.php");
					break;

			default:
					$operacion="consultar";
					$this->load->view($this->cabecera);
					$this->load->view("administrador/usuarios/menu.php",compact("operacion"));
					$this->load->view("administrador/usuarios/consultar.php");
					$this->load->view("administrador/pie.php");
				break;
		}
	}

	public function inicio(){
					$this->load->view($this->cabecera);
					$this->load->view("administrador/cuerpo.php");
					$this->load->view("administrador/pie.php");
	}


	public function login()
	{
		$usuDoc = $this->input->post("usuDoc",TRUE);
		$clave  = md5($this->input->post("clave",TRUE));
		
		$dondeU =  array('documentoUsuario' =>$usuDoc , 'password' => $clave,"estadoId"=>1);
		$this->load->model("usuario");
		$usuario =  $this->usuario->loginUsuario($dondeU);
		if ($usuario) {

			$nuevosdatos = array(
				"idUsuario" => $usuario->idUsuario,
				"nombre"    => $usuario->nombreUsuario,
				"areaId"    => $usuario->areaId,
				"doc"       => $usuario->documentoUsuario,
				"password"  => $usuario->password,
				"rol"       => $usuario->rolId,
				"estadoId"  => $usuario->estadoId,
				"cargoId"   => $usuario->cargoId,
               );
			
			$this->session->set_userdata($nuevosdatos);
			$this->load->model("persona");
			$this->load->model("vinculacion");
			//$this->load->model("hojadevida");
			
			$donde       = array("fechaTermino <"=>date("y-m-d"),"datosVinculacion.estadoId"=>1);
			$like        = array();
			$vinculacion =  $this->vinculacion->Consultar($like,$donde);
			//$donde       = array("vinculado"=>1);
			//$like1       = array();
			//$hojadevida =  $this->hojadevida->Consultar($like,$donde,$like1);


			foreach ($vinculacion as $vin) {
				$datosVinculacion = array("datosVinculacion.estadoId"=>2,"razon"=>"Fin de contrato","detalleDesvinculacion"=>"Usuario desvinculado por finalizacion del contato","fechaDesvinculacion"=>date("y-m-d H:i:s"));
				$datosHojadeVida  = array("vinculado"=>2);
				$donde            = array("idDatoVinculacion"=>$vin->idDatoVinculacion);
			    $this->persona->actualizar($datosVinculacion,"datosVinculacion",$donde);

			    //$donde            = array("datosVinculacion.documento"=>$hojadevida->documento);
				$this->persona->actualizar($datosHojadeVida,"hojadevida",$donde);
			}


			echo "<script>
					window.location='".base_url()."';
				</script>";
		}
		else{
			"0";
		}
	}


	public function consultar()
	{

		$this->load->model("usuario");
		
		$usuario     = $this->input->post("usuario",TRUE);
		$usuBusqueda = $usuario;
		$tipo        = $this->input->post("tipo",TRUE);
		
		$like        =  array('documentoUsuario' =>$usuario);
		$like1       =  array('nombreUsuario' =>$usuario);
		$donde       = array();
		($tipo == 1 || $tipo == 2) ? $donde +=  array("usuarios.estadoId"=>$tipo):null;
		$usuario =  $this->usuario->Consultar($like,$donde,$like1);
		$this->load->view('administrador/usuarios/consultas/usuario',compact("usuario","usuBusqueda","tipo"));
		// $this->output->enable_profiler(true);
	}

	public function salir()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	// funcion que verifica un usuario en la base de datos
	public function verificarPersona()
	{
		$this->load->model("persona");
		$usuario = $this->input->post("usuario",TRUE);
		$dondeU  = array("documento"=>$usuario);
		$existe  =  $this->persona->existencia($dondeU);
		$existe ? $exis = 1 : $exis = 0;
		echo $exis;
	}

	public function verificarUsuario()
	{
		$this->load->model("usuario");
		$documentoUsuario = $this->input->post("documentoUsuario",TRUE);
		$dondeU           = array("documentoUsuario"=>$documentoUsuario);
		$existe           =  $this->usuario->existencia($dondeU);
		$existe ? $exis = 1 : $exis = 0;
		echo $exis;
	}

	public function ingresar()
	{
		$this->load->model("usuario");

		$nombreUsuario    = $this->input->post("nombreUsuario",TRUE);
		$areaId           = $this->input->post("areaId",TRUE);
		$password         = md5($this->input->post("password",TRUE));
		$documentoUsuario = $this->input->post("documentoUsuario",TRUE);
		$rolId            = $this->input->post("rolId",TRUE);
		$cargoId          = $this->input->post("cargoId",TRUE);
		$estadoId         = 1;

		$datos = array(
			"nombreUsuario" => $nombreUsuario,
			"areaId" => $areaId,
			"password" => $password,
			"documentoUsuario" => $documentoUsuario,
			"rolId" => $rolId,
			"cargoId" => $cargoId,
			"estadoId" => $estadoId,

		);
		$this->usuario->ingresar($datos);

	}

	function cambiarEstado(){
		$this->load->model("usuario");

		$idUsuario = $this->input->post("idUsuario",TRUE);
		$estado    = $this->input->post("activo",TRUE);

		$datos = array(
			"estadoId" =>$estado,
		);
		$donde = array(
			"idUsuario" =>$idUsuario,
		);
		$this->usuario->Actualizar($datos,$donde);
		$this->output->enable_profiler(TRUE);

	}


	public function actualizar()
	{
		$this->load->model("usuario");

		$documentoUsuario = $this->input->post("documentoUsuario",TRUE);
		$nombreUsuario    = $this->input->post("nombreUsuario",TRUE);
		
		$cargoId          = $this->input->post("cargoId",TRUE);
		$rolId            = $this->input->post("rolId",TRUE);
		
		$areaId           = $this->input->post("areaId",TRUE);
		
		$donde            =  array('documentoUsuario' => $documentoUsuario);

		$datos = array(
			"nombreUsuario" => $nombreUsuario,
			"cargoId" => $cargoId,
			"rolId" => $rolId,
			"areaId" => $areaId,

		);

		$this->usuario->Actualizar($datos,$donde);

	}

	public function cambiarclave(){
		$claveAnterior  = md5($this->input->post("claveAnterior",TRUE));
		$nuevaClave     = md5($this->input->post("nuevaClave",TRUE));
		$confirmarClave = $this->input->post("confirmarClave",TRUE);
		$usuDoc         = $this->session->userdata("doc");

		$dondeU =  array('documentoUsuario' =>$usuDoc , 'password' => $claveAnterior,"estadoId"=>1);
		$this->load->model("usuario");
		$usuario =  $this->usuario->loginUsuario($dondeU);

		if ($usuario) {

		$donde =  array('documentoUsuario' => $usuDoc);

		$datos = array(
			"password" => $nuevaClave,

		);
			$this->usuario->Actualizar($datos,$donde);
			echo 1;
		}
		else{
			echo 0;
		}
	}


	public function restablecerClave(){
		$this->load->model("usuario");
		$usuario = $this->input->post("usuario",TRUE);
		
		$donde   =  array('idUsuario' => $usuario);

		$datos = array(
			"password" => md5("123"),

		);

		$this->usuario->Actualizar($datos,$donde);
			echo 1;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
