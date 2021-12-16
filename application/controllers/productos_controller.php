<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productos_controller extends CI_Controller
{

    function __contruct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('inicio_sesion');
        }
    }

    public function form_agregar_producto()
    {
        $this->load->model('producto_model');

        $data['categorias'] = $this->producto_model->select_categoria();
        $data['titulo'] = 'Agregar producto';

        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/nav-admin_view');
        $this->load->view('Productos/agregar_producto_view');
        $this->load->view('Plantillas/footer');
    }


    public function registrar_producto()
    {
        $this->form_validation->set_rules('nombre', 'Ingrese nombre del producto', 'required');
        $this->form_validation->set_rules('categoria', 'Seleccionar una categoria', 'required|callback_select_validate');
        $this->form_validation->set_rules('imagen', 'Seleccionar una Imagen', 'callback_validar_imagen');
        $this->form_validation->set_rules('precio', 'Ingrese Precio $', 'required|numeric');
        $this->form_validation->set_rules('descripcion', 'Ingresar Descripcion', 'required');
        $this->form_validation->set_rules('stock', 'Ingrese Stock', 'required|numeric');

        $this->form_validation->set_message('numeric', 'Debe ingresar valores numericos');
        $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');



        if ($this->form_validation->run() == FALSE) {
            $this->form_agregar_producto();
        } else {
            $this->guardar_producto();
        }
    }

    public function validar_imagen($imagen)
    {
        $nombre_imagen = $_FILES['imagen']['name'];
        if (empty($nombre_imagen)) {
            $this->form_validation->set_message('validar_imagen', 'Seleccionar una imagen');
            return false;
        } else {
            return true;
        }
    }

    public function select_validate($categoria)
    {
        if ($categoria == "0") {
            $this->form_validation->set_message('select_validate', 'Seleccione una Categoria');
            return false;
        } else {
            return true;
        }
    }

    function guardar_producto()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
        $config['remove_spaces'] = 'TRUE';
        $config['max_size'] = '1024';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('imagen')) {
            echo "<script type = \"text/javascript\">alert('No se pudo cargar el archivo');</script>";
            $this->form_agregar_producto();
        } else {
            $data = array(
                'nombre' => $this->input->post('nombre'),
                'categoria' => $this->input->post('categoria'),
                'imagen' => $_FILES['imagen']['name'],
                'precio' => $this->input->post('precio'),
                'descripcion' => $this->input->post('descripcion'),
                'stock' => $this->input->post('stock'),
                'estado' => 1
            );
            $this->load->model('producto_model');
            $this->producto_model->guardar_producto($data);
            redirect('Agregar');
        }
    }
    public function gestionar_producto()
    {
        $this->load->model('producto_model');
        $data['producto'] = $this->producto_model->select_productos();
        $data['titulo'] = 'Gestionar producto';

        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/nav-admin_view');
        $this->load->view('Productos/gestionar_producto_view', $data);
        $this->load->view('Plantillas/footer');
    }

    public function eliminar_producto($id = NULL)
    {
        $data = array(
            'estado' => '0'
        );
        $this->load->model('producto_model');
        $this->producto_model->actualizar_producto($data, $id);
        redirect('gestionar');
    }
    public function activar_producto($id = NULL)
    {
        $data = array(
            'estado' => '1'
        );
        $this->load->model('producto_model');
        $this->producto_model->actualizar_producto($data, $id);
        redirect('gestionar');
    }

    public function editar_producto($id = NULL)
    {
        $this->load->model('producto_model');
        $producto = $this->producto_model->select_producto_idd($id);
        $data['categorias'] = $this->producto_model->select_categoria();
        $data['titulo'] = 'Editar producto';

        foreach ($producto as $row) {
            $data['id_producto'] = $row->id_producto;
            $data['nombre'] = $row->nombre;
            $data['categoria'] = $row->categoria;
            $data['imagen'] = $row->imagen;
            $data['precio'] = $row->precio;
            $data['descripcion'] = $row->descripcion;
            $data['stock'] = $row->stock;
        }
        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/nav-admin_view');
        $this->load->view('Productos/gestionar_producto_editar', $data);
        $this->load->view('Plantillas/footer');
    }


    public function actualizar_producto($id)
    {


        $this->form_validation->set_rules('nombre', 'Ingresar Nombre', 'required');
        $this->form_validation->set_rules('categoria', 'Seleccionar una categoria', 'required|callback_select_validate');
        $this->form_validation->set_rules('imagen', 'Seleccionar una Imagen', 'callback_validar_imagen');
        $this->form_validation->set_rules('precio', 'Ingrese Precio $', 'required|numeric');
        $this->form_validation->set_rules('descripcion', 'Ingresar Descripcion', 'required');
        $this->form_validation->set_rules('stock', 'Ingrese Stock', 'required|integer');

        $this->form_validation->set_message('numeric', 'Debe ingresar valores numericos');
        $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');


        if ($this->form_validation->run() == FALSE) {
            $this->editar_producto($id);
        } else {
            $imagen = $_FILES['imagen']['name'];

            if (!empty($imagen)) {
                $config['upload_path'] = './upload/';
                $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '1024';

                $this->load->library('upload', $config);
                $this->upload->do_upload('imagen');

                $data = array(
                    'nombre' => $this->input->post('nombre'),
                    'categoria' => $this->input->post('categoria'),
                    'imagen' => $imagen,
                    'precio' => $this->input->post('precio'),
                    'descripcion' => $this->input->post('descripcion'),
                    'stock' => $this->input->post('stock'),
                );
                $this->load->model('producto_model');
                $this->producto_model->actualizar_producto($data, $id);
            } else {
                $data = array(
                    'nombre' => $this->input->post('nombre'),
                    'categoria' => $this->input->post('categoria'),
                    'precio' => $this->input->post('precio'),
                    'descripcion' => $this->input->post('descripcion'),
                    'stock' => $this->input->post('stock'),
                    'estado' => 1
                );
                $this->load->model('producto_model');
                $this->producto_model->actualizar_producto($data, $id);
            }
            echo "<script>alert('Modificación exitosa!')</script>";
            redirect('gestionar');
        }
    }

    public function buscar_producto()
    {
        $this->load->model('producto_model');
        $data['titulo'] = 'Gestionar producto';

        $nombre = $this->input->post('nombre');
        $data['producto'] = $this->producto_model->buscar_producto_nombre($nombre);

        $this->load->view('Plantillas/header', $data);
        $this->load->view('Plantillas/nav-admin_view');
        $this->load->view('Productos/gestionar_producto_view', $data);
        $this->load->view('Plantillas/footer');
    }
}
