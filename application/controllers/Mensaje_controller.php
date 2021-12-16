<?php

defined('BASEPATH') or exit('No direct scrpits access allowed');

class Mensaje_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function form_agregar_consulta()
    {
        $this->load->model('consulta_model');


        $data['titulo'] = 'Contacto';
        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/navbar');
        $this->load->view('contenido/contacto');
        $this->load->view('Plantillas/footer');
    }

    public function insertar_consulta()
    {
        $data = array(
            'nombre_apellido' => $this->input->post('nombre_apellido'),
            'email' => $this->input->post('email'),
            'telefono' => $this->input->post('telefono'),
            'motivo' => $this->input->post('motivo'),
            'mensaje' => $this->input->post('mensaje')
        );
        $this->load->model('consulta_model');
        $this->consulta_model->guardar_consulta($data);
        echo "<script>alert('Su mensaje fue enviado con exito!');</script>";
        redirect('contacto');

    }

    public function registrar_consulta()
    {
        $this->form_validation->set_rules('nombre_apellido', 'Ingresar Nombre y Apellido', 'required');
        $this->form_validation->set_rules('email', 'Ingrese su Email', 'required|valid_email');
        $this->form_validation->set_rules('telefono', 'Ingresar Telefono', 'required|numeric');
        $this->form_validation->set_rules('motivo', 'Ingresar Motivo', 'required');
        $this->form_validation->set_rules('mensaje', 'Ingrese Mensaje', 'required');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('numeric', 'Debe ingresar valores numericos');
        $this->form_validation->set_message('valid_email', 'Debe ingresar un email valido');

        if ($this->form_validation->run() == FALSE) {
            $this->form_agregar_consulta();
        } else {
            $this->insertar_consulta();
        }
    }

    public function listar_mensajes()
    {
        $this->load->model('consulta_model');
        $data['mensajes'] = $this->consulta_model->select_mensajes();
        $data['titulo'] = 'Lista de mensajes';

        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/nav-admin_view');
        $this->load->view('contenido/mensajes_admin_view');
        $this->load->view('Plantillas/footer');
    }

    public function buscar_clientes()
    {
        $this->load->model('consulta_model');
        $data['titulo'] = 'Lista de mensajes';

        $email = $this->input->post('email');
        $data['mensajes'] = $this->consulta_model->buscar_mensaje_email($email);

        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/nav-admin_view');
        $this->load->view('contenido/mensajes_admin_view', $data);
        $this->load->view('Plantillas/footer');
    }

    public function eliminar_mensaje($id = NULL)
    {
        $data = array(
            'estado' => '0'
        );
        $this->load->model('consulta_model');
        $this->consulta_model->actualizar_mensaje($data, $id);
        redirect('listar_mensajes');
    }
    public function activar_mensaje($id = NULL)
    {
        $data = array(
            'estado' => '1'
        );
        $this->load->model('consulta_model');
        $this->consulta_model->actualizar_mensaje($data, $id);
        redirect('listar_mensajes');
    }
}