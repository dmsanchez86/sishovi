<?php 
/**
* 
*/
class TipoDoc extends CI_Model
{
	public function Consultar($like,$donde)
	{
		$consulta = $this->db->select("idTipoDocumento, nombreTipoDocumento")
			->like($like)
			->where($donde)
			->get("tipodocumento");
		return $consulta->result();
	}


	public function ingresar($datos)
	{
		$this->db->insert("tipodocumento",$datos) ?  $c = 1 : $c =0;
		return $c;
	}

	public function Actualizar($datos,$donde)
	{	
		$this->db->update('tipodocumento', $datos,$donde) ?  $c = 1 : $c =0;
		return $c;
	}

}