<?php 
/**
* 
*/
class Persona extends CI_Model
{
	public function Consultar($like,$donde)
	{
		$consulta = $this->db->select("documento, nombreCompleto, primerApellido, segundoApellido, tipoDocumento,tipoGenero,nombreTipoDocumento")
			->like($like)
			->join("tipodocumento","tipodocumento.idTipoDocumento = persona.tipoDocumento")
			->where($donde)
			->get("persona");
		return $consulta->result();
	}

	public function ingresar($datos,$tabla)
	{
		$this->db->insert($tabla,$datos) ?  $c = 1 : $c =0;
		return $c;
	}

	public function actualizar($datos,$tabla,$donde)
	{
		$this->db->update($tabla,$datos,$donde) ?  $c = 1 : $c =0;
		return $c;
	}

	public function ingresarVinculado($datos)
	{
		$this->db->update("hojadevida",$datos) ?  $c = 1 : $c =0;
		return $c;
	}

	public function existencia($donde)
	{
		$consulta = $this->db->select("documento")
			->where($donde)
			->get("persona");
		return $consulta->row();
	}
	public function detallePersona($like,$donde)
	{
		$consulta = $this->db->select("persona.documento, nombreCompleto, primerApellido, segundoApellido, tipoDocumento,tipoGenero,nombreTipoDocumento,nombreProfesion, nombreCargo,fechaIngreso, cargoAspiracion, telefono, celular, direccion,email,foto")
			->like($like)
			->join("tipodocumento","tipodocumento.idTipoDocumento = persona.tipoDocumento")
			->join("hojadevida","hojadevida.documento = persona.documento")
			->join("profesiones","profesiones.idProfesion = hojadevida.profesionId")
			->join("cargos","cargos.idcargos = hojadevida.cargoAspiracion")
			->where($donde)
			->get("persona");
		return $consulta->row();
	}

}
