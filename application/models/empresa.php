<?php 
/**
* 
*/
class Empresa extends CI_Model
{
	public function Consultar($like, $donde,$like1)
	{

		$consulta=$this->db->select('idEmpresa,nombreEmpresa,direccionEmpresa,nit,empresa.estadoId,nombreEstado')
			->like($like)
			->or_like($like1)
			->join('estados', 'estados.idEstado = empresa.estadoId')
       		->having($donde)
			->get("empresa");
		return $consulta->result();	
	}

	public function Actualizar($datos,$donde)
	{	
		$this->db->update('empresa', $datos,$donde) ?  $c = 1 : $c =0;
		return $c;
	}

	public function ingresar($datos)
	{
		$this->db->insert("empresa",$datos) ?  $c = 1 : $c =0;
		return $c;
	}

}
 