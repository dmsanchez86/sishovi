<?php 
/**
* 
*/
class TipoSoporte extends CI_Model
{
	public function Consultar($like,$donde)
	{
		$consulta = $this->db->select("idSoporte, nombreSoporte, estadoId")
			->like($like)
			->join("estados","estados.idEstado = tiposoporte.estadoId")
			->where($donde)
			->order_by("nombreSoporte","asc")
			->get("tiposoporte");
		return $consulta->result();
	}

}