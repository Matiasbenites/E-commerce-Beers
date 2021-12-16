<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ventas_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function guardar_venta()
    {

        $this->load->model('ventas_model');
        $this->load->model('producto_model');

        $encabezado_venta = array(
            'id_cliente'  => $this->session->userdata('id_usuario'),
            'venta_fecha' => date('Y-m-d'),
        );

        $this->ventas_model->guardar_venta($encabezado_venta);

        $venta_id = $this->db->insert_id();

        $cart = $this->cart->contents();


        foreach ($cart as $item) {

            $detalle_venta = array(
                'id_venta'  => $venta_id,
                'id_producto' => $item['id'],
                'nombre_producto' => $item['name'],
                'detalle_cantidad'  => $item['qty'],
                'detalle_precio' => $item['price']

            );


            $producto = $this->producto_model->select_producto_id($item['id']);

            $cantidad = $producto->stock;

            if ($cantidad >= $item['qty']) {

                $cantidad = $cantidad - $item['qty'];
                $data = array(
                    'stock' => $cantidad
                );


                $this->producto_model->actualizar_producto($data, $item['id']);
                $this->ventas_model->guardar_detalle_venta($detalle_venta);
            }
        }

        $this->cart->destroy();


        echo "<script>alert('Su compra se registró correctamente. ¡Gracias por elegirnos!.')</script>";

        redirect('Proyecto_controller', 'refresh');
    }

    public function listado_ventas()
    {


        $this->load->model('ventas_model');
        $data['mensajes'] = $this->ventas_model->traer_ventas();
        $data['titulo'] = 'Listado de Ventas | Beers & Cheers';


        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/nav-admin_view');
        $this->load->view('contenido/ventas_view.php');
        $this->load->view('Plantillas/footer');
    }

    public function mostrar_detalle($id)
    {
        $data['titulo'] = 'Detalle de venta';

        $this->load->model('ventas_model');
        $data['detalles'] = $this->ventas_model->select_venta_id($id);

        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/nav-admin_view');
        $this->load->view('Productos/listar_detalle_venta', $data);
        $this->load->view('Plantillas/footer');
    }
}
