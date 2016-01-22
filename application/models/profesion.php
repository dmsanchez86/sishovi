<?php 
/**
* 
*/
class Profesion extends CI_Model
{
	public function Consultar($like,$donde,$like1)
	{

		$consulta=$this->db->select('idProfesion,nombreProfesion,profesiones.estadoId,nombreEstado')
			->order_by("idProfesion", "asc")
			->like($like)
			->or_like($like1)
			->join('estados', 'estados.idEstado = profesiones.estadoId')
       		->having($donde)
			->get("profesiones");
		return $consulta->result();	

	}

	public function ingresar($datos)
	{
		$this->db->insert("profesiones",$datos) ?  $c = 1 : $c =0;
		return $c;
	}

	public function Actualizar($datos,$donde)
	{	
		$this->db->update('profesiones', $datos,$donde) ?  $c = 1 : $c =0;
		return $c;
	}

}