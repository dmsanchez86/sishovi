<?php 
/**
* 
*/
class Hojadevida extends CI_Model
{
	public function Consultar($like,$donde,$like1)
	{
		$consulta = $this->db->select("hojadevida.documento,hojadevida.profesionId,nombreProfesion,foto,hojadevida.fechaIngreso,hojadevida.cargoAspiracion,nombreCargo,telefono,celular,direccion,nombreCompleto,primerApellido,vinculado,segundoApellido,datosvinculacion.estadoId as estadoVin ,datosvinculacion.idDatoVinculacion as vinId")
			->like($like)
			->or_like($like1)
			->join("cargos","cargos.idcargos = hojadevida.cargoAspiracion")
			->join("profesiones","profesiones.idProfesion = hojadevida.profesionId")
			->join("persona","persona.documento = hojadevida.documento")
			->join("datosvinculacion","persona.documento = datosvinculacion.documento","left")
			->having($donde)
			->get("hojadevida");
		return $consulta->result();
	}
	
	public function ingresarExp($datos)
	{
		$this->db->insert("hojadevidaexperiencia",$datos)?  $c = 1 : $c =0;
		return $c;
	}

	public function consultarExp($like,$donde){
		$consulta = $this->db->select("idHojaDeVidaExperiencia,nombreCargo, documento,nombreEmpresa, empresaId, cargoOcupo, fechaIngreso, fechaTermino, observacionTareas, nombreJefeInmediato, TelefonoEmpresa")
			->like($like)
			->where($donde)
			->join("cargos","cargos.idcargos = hojadevidaexperiencia.cargoOcupo")
			->join("empresa","empresa.idEmpresa = hojadevidaexperiencia.empresaId")
			->get("hojadevidaexperiencia");
		return $consulta->result();
	}

	public function soportesPersona($like,$donde){
		$consulta = $this->db->select("soportes.idSoporte,nombreSoporte, archivoRuta, tipoSoporte, documento, descripcion")
			->like($like)
			->where($donde)
			->join("tipoSoporte","tipoSoporte.idSoporte = soportes.tipoSoporte")
			->get("soportes");
		return $consulta->result();
	}

	public function descargarSoporte($like,$donde){
		$consulta = $this->db->select("soportes.idSoporte,nombreSoporte, archivoRuta, tipoSoporte, documento, descripcion")
			->like($like)
			->where($donde)
			->join("tipoSoporte","tipoSoporte.idSoporte = soportes.tipoSoporte")
			->get("soportes");
		return $consulta->row();
	}
	
	public function datosHojaVida($like,$donde)
	{
		$consulta = $this->db->select("hojadevida.documento,hojadevida.profesionId,nombreProfesion,hojadevida.fechaIngreso,hojadevida.cargoAspiracion,nombreCargo,telefono,celular,direccion,nombreCompleto,tipoDocumento,primerApellido,vinculado,segundoApellido,email,foto")
			->like($like)
			->join("cargos","cargos.idcargos = hojadevida.cargoAspiracion")
			->join("profesiones","profesiones.idProfesion = hojadevida.profesionId")
			->join("persona","persona.documento = hojadevida.documento")
			->where($donde)
			->get("hojadevida");
		return $consulta->row();
	}
	public function datosHojaVidaC($like,$donde,$like1)
	{
		$consulta = $this->db->select("hojadevida.documento,hojadevida.profesionId,nombreProfesion,hojadevida.fechaIngreso,hojadevida.cargoAspiracion,nombreCargo,telefono,celular,direccion,nombreCompleto,tipoDocumento,primerApellido,vinculado,segundoApellido,email,foto")
			->like($like)
			->or_like($like1)
			->join("cargos","cargos.idcargos = hojadevida.cargoAspiracion")
			->join("profesiones","profesiones.idProfesion = hojadevida.profesionId")
			->join("persona","persona.documento = hojadevida.documento")
			->having($donde)
			->get("hojadevida");
		return $consulta->result();
	}
}