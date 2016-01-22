<?php 
/**
* 
*/
class Programa extends CI_Model
{
	public function Consultar($like,$donde,$like1)
	{

		$consulta=$this->db->select('idTipoPrograma,nombreTipoPrograma,tipoprograma.estadoId, nombreEstado')
			->order_by("idTipoPrograma","asc")
			->like($like)
			->or_like($like1)
			->join('estados', 'estados.idEstado = tipoprograma.estadoId')
       		->having($donde)
			->get("tipoprograma");
		return $consulta->result();	

	}


	public function ingresar($datos)
	{
		$this->db->insert("tipoprograma",$datos) ?  $c = 1 : $c =0;
		return $c;
	}

	public function Actualizar($datos,$donde)
	{	
		$this->db->update('tipoprograma', $datos,$donde) ?  $c = 1 : $c =0;
		return $c;
	}

}