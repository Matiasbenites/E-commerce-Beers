<?php
defined('BASEPATH') or exit('No direct script access allowed');

class producto_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }



    public function guardar_producto($data)
    {
        $this->db->insert('producto', $data);
    }

    public function select_categoria()
    {
        $query = $this->db->get('producto_categoria');
        return $query->result();
    }

    public function select_productos()
    {

        $this->db->select('*');
        $this->db->from('producto');
        $this->db->join('producto_categoria', 'producto_categoria.categoria_id = producto.categoria');
        $query = $this->db->get();
        return $query->result();
    }

    public function select_producto_id($id)
    {
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('id_producto', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function select_producto_idd($id)
    {
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->where('id_producto', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function actualizar_producto($data, $id)
    {
        $this->db->where('id_producto', $id);
        $this->db->update('producto', $data);
    }

    public function get_productos()
    {
        $this->db->select('*');
        $this->db->from('producto');

        $this->db->where('stock >', 0);
        $this->db->where('estado', 1);

        $this->db->join('producto_categoria', 'producto_categoria.categoria_id = producto.categoria');
        $query = $this->db->get();
        return $query->result();
    }

    public function buscar_producto_nombre($nombre){
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->like('nombre', $nombre, 'match');
        $this->db->join('producto_categoria', 'producto_categoria.categoria_id = producto.categoria');
        $query = $this->db->get();
        return $query->result();
    }
}
