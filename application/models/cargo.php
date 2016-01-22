<?php 
/**
* 
*/
class Cargo extends CI_Model
{
	public function Consultar($like, $donde,$like1)
	{

		$consulta=$this->db->select('idcargos,nombreCargo,cargos.estadoId,nombreEstado')
			->like($like)
			->or_like($like1)
			->join('estados', 'estados.idEstado = cargos.estadoId')
       		->having($donde)
			->get("cargos");
		return $consulta->result();	

	}

	public function ingresar($datos)
	{
		$this->db->insert("cargos",$datos) ?  $c = 1 : $c =0;
		return $c;
	}

	public function actualizar($datos,$donde)
	{
		$this->db->update('cargos',$datos,$donde) ?  $c = 1 : $c =0;
		return $c;
	}
}