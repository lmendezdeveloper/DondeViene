<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// RUTAS PRINCIPALES //
$route['default_controller'] = 'welcome';
$route['signin'] = 'Welcome/signin';
$route['logout'] = 'Welcome/logout';
$route['home'] = 'Welcome/home';

// RUTAS CHOFERES //
$route['modulo_choferes'] = 'Welcome/modulo_choferes';
$route['list_choferes'] = 'Welcome/list_choferes';
$route['add_choferes'] = 'Welcome/add_choferes';
$route['edit_choferes'] = 'Welcome/edit_choferes';
$route['delete_choferes'] = 'Welcome/delete_choferes';

// RUTAS MICROS //
$route['modulo_micros'] = 'Welcome/modulo_micros';
$route['list_micros'] = 'Welcome/list_micros';
$route['add_micros'] = 'Welcome/add_micros';
$route['edit_micros'] = 'Welcome/edit_micros';
$route['delete_micros'] = 'Welcome/delete_micros';

// RUTAS MICROS //
$route['modulo_lineas'] = 'Welcome/modulo_lineas';
$route['list_lineas'] = 'Welcome/list_lineas';
$route['add_lineas'] = 'Welcome/add_lineas';
$route['edit_lineas'] = 'Welcome/edit_lineas';
$route['delete_lineas'] = 'Welcome/delete_lineas';

// RUTAS CONTINGENCIAS //
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
