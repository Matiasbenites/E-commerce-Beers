<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Proyecto_controller';

$route['index'] = 'Proyecto_controller';

$route['contacto'] = 'Proyecto_controller/contacto';

$route['quienes_somos'] = 'Proyecto_controller/quienes_somos';

$route['productoA'] = 'Proyecto_controller/productoA';
$route['productoB'] = 'Proyecto_controller/productoB';
$route['combos'] = 'Proyecto_controller/combos';

$route['terminos'] = 'Proyecto_controller/terminos';

$route['preguntas'] = 'Proyecto_controller/preguntas';

$route['registrar'] = 'Usuarios_controller/registrar_usuario';
$route['inicio_sesion'] = 'Usuarios_controller/login';
$route['Recuperar_password'] = 'Usuarios_controller/olvid_contra';
$route['ingresar'] = 'Usuarios_controller/iniciar_sesion';
$route['salir'] = 'Usuarios_controller/cerrar_sesion';

$route['administrador'] = 'Admin_controller/usuario_admin';
$route['indexAdmin'] = 'Admin_controller/indexAdmin';
$route['ver_ventas'] = 'Admin_controller/ver_ventas';


$route['Agregar'] = 'productos_controller/form_agregar_producto';
$route['insertar_producto'] = 'productos_controller/registrar_producto';
$route['editar_producto/(:num)'] = 'productos_controller/editar_producto/$1';
$route['eliminar_producto/(:num)'] = 'productos_controller/eliminar_producto/$1';
$route['activar_producto/(:num)'] = 'productos_controller/activar_producto/$1';

$route['gestionar'] = 'productos_controller/gestionar_producto';
$route['catalogo/(:num)'] = 'Proyecto_controller/catalogo/$1';

$route['detalle_venta/(:num)'] = 'Ventas_controller/mostrar_detalle/$1';

$route['ver_carrito'] = 'Carrito_controller/ver_carrito';

$route['registrar_consulta'] = 'Mensaje_controller/registrar_consulta';

$route['buscar_venta'] = 'Admin_controller/buscar_venta';

$route['buscar_producto'] = 'productos_controller/buscar_producto';
$route['buscar_clientes'] = 'Mensaje_controller/buscar_clientes';
$route['listar_mensajes'] = 'Mensaje_controller/listar_mensajes';

$route['agregar_carrito'] = 'Carrito_controller/agregar_carrito';







$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
