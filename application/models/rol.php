<?php 
/**
* 
*/
class Rol extends CI_Model
{
	public function Consultar($like,$donde)
	{
		$consulta = $this->db->select("idRol,nombreRol")
			->like($like)
			->where($donde)
			->get("roles");
		return $consulta->result();
	}

}