<?php 
/**
* 
*/
class Tipovinculacion extends CI_Model
{
	public function Consultar($like,$donde,$like1)
	{

		$consulta=$this->db->select('idTipoVinculacion, nombreTipoVinculacion,tipovinculacion.estadoId,nombreEstado')
			->like($like)
			->or_like($like1)
			->join('estados', 'estados.idEstado = tipovinculacion.estadoId')
       		->having($donde)
			->get("tipovinculacion");
		return $consulta->result();	
	}

	public function ingresar($datos)
	{
		$this->db->insert("tipovinculacion",$datos) ?  $c = 1 : $c =0;
		return $c;
	}

	public function Actualizar($datos,$donde)
	{	
		$this->db->update('tipovinculacion', $datos,$donde) ?  $c = 1 : $c =0;
		return $c;
	}

}