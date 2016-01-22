<?php 
/**
* 
*/
class Area extends CI_Model
{
	public function Consultar($like, $donde, $like1)
	{

		$consulta=$this->db->select('idArea,nombreArea,areas.estadoId,nombreEstado')
			->like($like)
			->or_like($like1)
			->join('estados', 'estados.idEstado = areas.estadoId')
			->having($donde)
			->get("areas");
		return $consulta->result();	
	}


	public function borrar($donde,$datos)
	{
		$this->db->delete("areas",$datos,$donde) ?  $c = 1 : $c =0;
		return $c;
	}

	public function ingresar($datos)
	{
		$this->db->insert("areas",$datos) ?  $c = 1 : $c =0;
		return $c;
	}

	public function Actualizar($datos,$donde)
	{	
		$this->db->update('areas', $datos,$donde) ?  $c = 1 : $c =0;
		return $c;
	}


}
