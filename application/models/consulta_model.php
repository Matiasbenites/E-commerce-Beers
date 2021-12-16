<?php

class consulta_model extends CI_Model {

    function construct()
    {
        parent::__construct();
    }

    public function guardar_consulta($data){
        $this->db->insert('contacto', $data);
     }

     public function select_mensajes()
     {
        $this->db->select('*');
        $this->db->from('contacto');
        $query = $this->db->get();
        return $query->result();
     }

     public function buscar_mensaje_email($email){
        $this->db->select('*');
        $this->db->from('contacto');
        $this->db->like('email', $email, 'match');
        $query = $this->db->get();
        return $query->result();
    }
    public function actualizar_mensaje($data, $id){
        $this->db->where('id_mensaje', $id);
        $this->db->update('contacto', $data);
     }

}