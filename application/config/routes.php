<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
// rutas principales //
$route['default_controller'] = 'welcome';
$route['login'] = 'Welcome/login';
$route['signin'] = 'Welcome/signin';
$route['home'] = 'Welcome/home';

// rutas chofer //
$route['chofer'] = 'Welcome/chofer';
$route['lista_choferes'] = 'Welcome/lista_choferes';
$route['agregar_chofer'] = 'Welcome/agregar_chofer';
$route['editar_chofer'] = 'Welcome/editar_chofer';
$route['eliminar_chofer'] = 'Welcome/eliminar_chofer';

// rutas microbus //
$route['microbus'] = 'Welcome/microbus';
$route['lista_microbus'] = 'Welcome/lista_microbus';
$route['agregar_microbus'] = 'Welcome/agregar_microbus';
$route['editar_microbus'] = 'Welcome/editar_microbus';
$route['eliminar_microbus'] = 'Welcome/eliminar_microbus';

// rutas linea //
$route['linea'] = 'Welcome/linea';
$route['lista_lineas'] = 'Welcome/lista_lineas';
$route['agregar_linea'] = 'Welcome/agregar_linea';
$route['editar_linea'] = 'Welcome/editar_linea';
$route['eliminar_linea'] = 'Welcome/eliminar_linea';

// rutas tarifa //
$route['tarifa'] = 'Welcome/tarifa';
$route['lista_tarifas'] = 'Welcome/lista_tarifas';

// rutas horario //
$route['horario'] = 'Welcome/horario';
$route['lista_horarios'] = 'Welcome/lista_horarios';

// rutas errores //
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
