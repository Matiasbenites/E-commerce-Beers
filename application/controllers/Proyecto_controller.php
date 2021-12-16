<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto_controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		$data['titulo']='Inicio';
		$this->load->view('Plantillas/header', $data);
		$this->load->view('Plantillas/navbar-car');
		$this->load->view('contenido/principal');
		$this->load->view('Plantillas/footer');
	}

	public function quienes_somos()
	{
		$data['titulo']='Quienes Somos';
		$this->load->view('Plantillas/header', $data);
		$this->load->view('Plantillas/navbar');
		$this->load->view('contenido/quienes_somos_view');
		$this->load->view('Plantillas/footer');
	}


	public function productoA()
	{	
		
		$data['titulo']='Productos';
		$this->load->model('producto_model');
		$data['producto'] = $this->producto_model->get_productos(); 

		$this->load->view('Plantillas/header', $data);
		$this->load->view('Plantillas/navbar');
		$this->load->view('Productos/listar_productos_view');
		$this->load->view('Plantillas/footer');
	}

	public function productoB()
	{
		
		$data['titulo']='Productos';
		

		$this->load->view('Plantillas/header', $data);
		$this->load->view('Plantillas/navbar');
		$this->load->view('contenido/producto_ale_B');
		$this->load->view('Plantillas/footer');
	}

	public function combos()
	{
		$data['titulo']='Productos';
		$this->load->view('Plantillas/header', $data);
		$this->load->view('Plantillas/navbar');
		$this->load->view('contenido/combos');
		$this->load->view('Plantillas/footer');
	}

	public function terminos()
	{
		$data['titulo']='Términos & Condiciones';
		$this->load->view('Plantillas/header', $data);
		$this->load->view('Plantillas/navbar');
		$this->load->view('contenido/terminos&cond');
		$this->load->view('Plantillas/footer');
	}


	public function preguntas()
	{
		$data['titulo']='Preguntas Frecuentes';
		$this->load->view('Plantillas/header', $data);
		$this->load->view('Plantillas/navbar');
		$this->load->view('contenido/preg_frecuentes');
		$this->load->view('Plantillas/footer');
	}
   
	public function contacto()
    {
        $this->load->model('consulta_model');


        $data['titulo'] = 'Contacto';
        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/navbar');
        $this->load->view('contenido/contacto');
        $this->load->view('Plantillas/footer');
    }

	// public function catalogo()
	// {
	// 	$data['titulo']='Catalogo';
	// 	$this->load->model('producto_model');
	// 	$data['producto'] = $this->producto_model->get_productos();
		
	// 	$this->load->model('producto_model');
	// 	$this->load->view('Plantillas/header', $data);
	// 	$this->load->view('Plantillas/nav-admin_view');
	// 	$this->load->view('Productos/listar_productos_view');
	// 	$this->load->view('Plantillas/footer');
	// }

	public function catalogo($vari)
    {

        $data['titulo'] = 'Catalogo';
        $this->load->model('producto_model');
        $data['producto'] = $this->producto_model->get_productos();;

        $this->load->view('Plantillas/header', $data);

        if ($vari == 0) {
            $this->load->view('Plantillas/navbar');
            $this->load->view('Productos/listar_productos_view_admin');
        } else {
            if ($vari == 2) {
                $this->load->view('Plantillas/nav-admin_view');
                $this->load->view('Productos/listar_productos_view_admin');
            } else {
                $this->load->view('Plantillas/navbar');
                $this->load->view('Productos/listar_productos_view');
            }
        }
        $this->load->view('Plantillas/footer');
    }
	
}