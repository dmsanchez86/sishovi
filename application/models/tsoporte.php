<?php 
/**
* 
*/
class Tsoporte extends CI_Model
{
	public function Consultar($like, $donde,$like1)
	{

		$consulta=$this->db->select('idSoporte,nombreSoporte,tiposoporte.estadoId,nombreEstado')
			->like($like)
			->or_like($like1)
			->join('estados', 'estados.idEstado = tiposoporte.estadoId')
			->having($donde)
			->get("tiposoporte");
		return $consulta->result();	
	}

	public function ingresar($datos)
	{
		$this->db->insert("tiposoporte",$datos) ?  $c = 1 : $c =0;
		return $c;
	}

	public function Actualizar($datos,$donde)
	{	
		$this->db->update('tiposoporte', $datos,$donde) ?  $c = 1 : $c =0;
		return $c;
	}

}