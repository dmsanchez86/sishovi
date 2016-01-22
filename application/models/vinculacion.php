<?php 
/**
* 
*/
class Vinculacion extends CI_Model
{
	public function Consultar($like,$donde)
	{
		$consulta = $this->db->select("idDatoVinculacion, datosvinculacion.documento,datosvinculacion.cargoId,datosvinculacion.tipoDePrograma,datosvinculacion.estadoId,datosvinculacion.tipoVinculacion,sueldo,fechaTermino,calificacion,observacionVinculacion,nombreEstado,nombreCargo,nombreTipoPrograma,nombreTipoVinculacion,datosvinculacion.fechaIngreso,persona.nombreCompleto,persona.primerApellido,persona.segundoApellido,fechaDesvinculacion")
			->order_by("idDatoVinculacion","asc")
			->like($like)
			->join("persona","persona.documento = datosvinculacion.documento")
			->join("tipovinculacion","tipovinculacion.idTipoVinculacion = datosvinculacion.tipoVinculacion")
			->join("tipoprograma","tipoprograma.idTipoPrograma = datosvinculacion.tipoDePrograma")
			->join("cargos","cargos.idcargos = datosvinculacion.cargoId")
			->join("estados","estados.idEstado = datosvinculacion.estadoId")
			->where($donde)
			->get("datosvinculacion");
		return $consulta->result();
	}

	public function ingresar($datos)
	{
		$this->db->insert("datosvinculacion",$datos) ?  $c = 1 : $c =0;
		return $c;
	}

	public function Actualizar($datos,$donde)
	{	
		$this->db->update('datosvinculacion', $datos,$donde) ?  $c = 1 : $c =0;
		return $c;
	}

	public function existencia($donde)
	{
		$consulta = $this->db->select("documento")
			->where($donde)
			->get("datosvinculacion");
		return $consulta->row();
	}

	public function detalleVinculacion($like,$donde)
	{
		$consulta = $this->db->select("idDatoVinculacion, datosvinculacion.documento,datosvinculacion.cargoId,datosvinculacion.tipoDePrograma,datosvinculacion.estadoId,datosvinculacion.tipoVinculacion,sueldo,fechaTermino,calificacion,observacionVinculacion,nombreEstado,nombreCargo,nombreTipoPrograma,nombreTipoVinculacion,datosvinculacion.fechaIngreso,persona.nombreCompleto,persona.primerApellido,persona.segundoApellido,cuentaBancaria,razon,fechaDesvinculacion,detalleDesvinculacion,eps,fondoEmpleado")
			->like($like)
			->join("tipovinculacion","tipovinculacion.idTipoVinculacion = datosvinculacion.tipoVinculacion")
			->join("tipoprograma","tipoprograma.idTipoPrograma = datosvinculacion.tipoDePrograma")
			->join("cargos","cargos.idcargos = datosvinculacion.cargoId")
			->join("persona","persona.documento = datosvinculacion.documento")
			->join("estados","estados.idEstado = datosvinculacion.estadoId")
			->where($donde)
			->get("datosvinculacion");
		return $consulta->result();
	}

	public function Desvincular($donde)
	{	
		$this->db->delete('datosvinculacion',$donde) ?  $c = 1 : $c =0;
		return $c;
	}


}