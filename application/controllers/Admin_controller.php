<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_controller extends CI_Controller
{
    function __contruct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('inicio_sesion');
        }
    }

    public function usuario_admin()
    {
        $data['titulo'] = 'Administrador';
        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/nav-admin_view');
        $this->load->view('contenido/contenido_admin_view');
        $this->load->view('Plantillas/footer');
    }

    public function indexAdmin()
    {
        $data['titulo'] = 'Admin';
        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/nav-car_admin_view');
        $this->load->view('contenido/principal');
        $this->load->view('Plantillas/footer');
    }
    public function ver_ventas(){
        $data['titulo'] = 'Ver ventas';

        $this->load->model('ventas_model');
        $data['las_ventas'] = $this->ventas_model->traer_detalle_ventas();
        $this->load->model('ventas_model');
        $data['ventas'] = $this->ventas_model->traer_ventas();

        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/nav-admin_view');
        $this->load->view('contenido/ventas_view');
        $this->load->view('Plantillas/footer');
    }

    public function buscar_venta()
    {
        $this->load->model('ventas_model');
        $data['titulo'] = 'Ventas';

        $fecha_inicio = $this->input->post("fecha_inicio");
        $fecha_fin  = $this->input->post("fecha_fin");

        if ($fecha_inicio > $fecha_fin) {
            echo "<script>alert('Ingrese fechas validas');</script>";
            redirect('admin_ventas', 'refresh');
        } else {

            $data['las_ventas'] = $this->ventas_model->buscar_venta($fecha_inicio, $fecha_fin);

            $this->load->view('Plantillas/header', $data);
            $this->load->view('Plantillas/nav-admin_view');
            $this->load->view('contenido/ventas_view');
            $this->load->view('Plantillas/footer');
        }
    }
}
