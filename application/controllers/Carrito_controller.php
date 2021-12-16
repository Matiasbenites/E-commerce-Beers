<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carrito_controller extends CI_Controller
{
    function __contruct()
    {
        parent::__construct();
    }

    public function ver_carrito()
    {
        $data['titulo'] = 'Carrito de compras';
        if (!$this->cart->contents()) {

            $data['message'] = 'El carrito está vacío!';
        } else {
            $data['message'] = '';
        }
        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/navbar');
        $this->load->view('Carrito/carrito_view', $data);
        $this->load->view('Plantillas/footer');
    }

    public function agregar_carrito()
    {

        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('nombre'),
            'price' => $this->input->post('precio'),
            'qty' => 1
        );

        $this->cart->insert($data);

        redirect('ver_carrito');
    }

    public function borrar($id)
    {
        if ($id == "all") {

            $this->cart->destroy();
        } else {
            $data = array(
                'rowid' => $id,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        redirect('ver_carrito');
    }
}
