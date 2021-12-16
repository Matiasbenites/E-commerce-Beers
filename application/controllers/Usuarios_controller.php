<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $data['titulo'] = 'Login';
        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/navbar');
        $this->load->view('contenido/login');
        $this->load->view('Plantillas/footer');
    }
    public function registrarse()
    {
        $data['titulo'] = 'Registro';
        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/navbar');
        $this->load->view('contenido/registrarse');
        $this->load->view('Plantillas/footer');
    }

    public function olvid_contra()
	{

		$data['titulo']='Recuperar contraseña';
		$this->load->view('Plantillas/header', $data);
		$this->load->view('Plantillas/navbar');
		$this->load->view('contenido/olvido_contraseña');
		$this->load->view('Plantillas/footer');
         
	}

    public function registrar_usuario()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[registro.email]');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required|integer');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Repetir contraseña', 'trim|required|matches[password]');
        $this->form_validation->set_message('is_unique', 'El cliente ya se encuentra registrado');
        $this->form_validation->set_message('valid_email', 'El campo %s debe ser un email');
        $this->form_validation->set_message('integer', 'El campo %s debe contener numeros');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_message('min_lenght', 'El campo %s debe contener como minimo %d caracteres');
        $this->form_validation->set_message('matches', 'contraseñas no coinciden');

        if ($this->form_validation->run() == FALSE) {
            $this->registrarse();
        } else {
            $this->insertar_usuario();
        }
    }

    public function insertar_usuario()
    {
        $usuario = array(
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'email' => $this->input->post('email'),
            'telefono' => $this->input->post('telefono'),
            'password' => base64_encode($this->input->post('password')),
            'perfil_id' => 2,
            'estado' => 1
        );

        $this->load->model('usuario_model');
        $this->usuario_model->guardar_usuario($usuario);

        redirect('index');
    }

    public function iniciar_sesion()
    {

        $this->form_validation->set_rules('email', 'Usuario');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_verificar_password');

        if ($this->form_validation->run() == FALSE) {
            $this->login();
        } else {
            $this->usuario_logueado();
        }
    }

    function verificar_password($pass)
    {

        $usuario = $this->input->post('email');
        $pass = $this->input->post('password');

        $contrasenia = base64_encode($pass);
        $this->load->model('usuario_model');
        $usuario = $this->usuario_model->buscar_usuario($usuario, $contrasenia);

        if ($usuario) {

            $datos_usuario = array(
                'id_usuario' => $usuario->id_persona,
                'nombre' => $usuario->nombre,
                'apellido' => $usuario->apellido,
                'perfil' => $usuario->perfil_id,
                'login' => TRUE
            );

            $this->session->set_userdata($datos_usuario);
            return true;
        } else {
            $this->form_validation->set_message('verificar_password', 'Usuario y/o contrase&ntilde;a invalidos');

            return false;
        }
    }

    public function usuario_logueado()
    {

        if ($this->session->userdata('login')) {
            switch ($this->session->userdata('perfil')) {

                case '1':
                    redirect('administrador');
                    break;

                case '2':
                    redirect('index');
                    break;
            }
        }
    }

    public function cerrar_sesion()
    {
        $this->session->sess_destroy();
        redirect('index');
    }
}
