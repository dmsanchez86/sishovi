<?php
/**
*
*/
class Usuario extends CI_Model
{
	public function loginUsuario($donde)
	{
		$consulta = $this->db->select("idUsuario, nombreUsuario, areaId, documentoUsuario, password, rolId, estadoId, cargoId")
			->where($donde)
			->get("usuarios");
		return $consulta->row();
	}

	public function Consultar($like, $donde,$like1)
	{
		
		$consulta = $this->db->select('idUsuario,nombreArea,nombreRol,nombreCargo,nombreEstado,nombreUsuario, areaId, documentoUsuario, password, rolId, usuarios.estadoId, cargoId')
			->order_by("idUsuario","asc")
			->like($like)
			->or_like($like1)
			->join('areas', 'areas.idArea = usuarios.areaId')
			->join('roles', 'roles.idRol = usuarios.rolId')
			->join('cargos', 'cargos.idCargos = usuarios.cargoId')
			->join('estados', 'estados.idEstado = usuarios.estadoId')
			->having($donde)
			->get("usuarios");
        return $consulta->result();

    }	


	public function ingresar($datos)
	{
		$this->db->insert("usuarios",$datos) ?  $c = 1 : $c =0;
		return $c;
	}

	public function existencia($donde)
	{
		$consulta = $this->db->select("documentoUsuario")
			->where($donde)
			->get("usuarios");
		return $consulta->row();
	}

	public function Actualizar($datos,$donde)
	{	
		$this->db->update('usuarios',$datos,$donde) ?  $c = 1 : $c =0;
		return $c;
	}
}
