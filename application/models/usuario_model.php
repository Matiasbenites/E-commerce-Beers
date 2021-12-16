<?php

class Usuario_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

    public function guardar_usuario($data){
        $this->db->insert('registro', $data);
     }

     public function buscar_usuario($usuario, $contrasenia)
     {
        $this->db->select('*');
        $this->db->from('registro');
        $this->db->where('email', $usuario);
        $this->db->where('password', $contrasenia);
        $query = $this->db->get();
        $resultado = $query->row();
        return $resultado;
     }
}