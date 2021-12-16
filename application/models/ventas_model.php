<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ventas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }



    public function guardar_venta($data)
    {
        $this->db->insert('venta', $data);
    }

    public function guardar_detalle_venta($data)
    {
        $this->db->insert('detalle_venta', $data);
    }
    
    public function traer_detalle_ventas(){
        $this->db->select('*');
        $this->db->from('venta');
        $this->db->join('detalle_venta', 'detalle_venta.id_venta = venta.venta_id');
        $this->db->join('registro', 'registro.id_persona = venta.id_cliente');
        $query = $this->db->get();
        return $query->result();
    }
    public function traer_ventas(){
        $this->db->select('*');
        $this->db->from('venta');
        $query = $this->db->get();
        return $query->result();
    }
    public function select_venta_id($id){
        $this->db->select('*');
        $this->db->from('detalle_venta');
        $this->db->where('id_venta', $id);
        $this->db->join('producto', 'producto.id_producto = detalle_venta.id_producto', $id);
  
        $query = $this->db->get();
   
        return $query->result();
      }
    
      public function buscar_venta($fecha_inicio, $fecha_fin )
    {
        $this->db->select('*');
        $this->db->from('venta');
        $this->db->where("venta_fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'");
        $this->db->join('detalle_venta', 'detalle_venta.id_venta = venta.venta_id');
        $this->db->join('registro', 'registro.id_persona = venta.id_cliente');
        $query = $this->db->get();
        return $query->result();
    }
}
