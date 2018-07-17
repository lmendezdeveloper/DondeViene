<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// RUTAS PRINCIPALES //
$route['default_controller'] = 'welcome';
$route['signin'] = 'Welcome/signin';
$route['logout'] = 'Welcome/logout';
$route['home'] = 'Welcome/home';

// RUTAS USUARIOS //
$route['modulo_usuarios'] = 'Welcome/modulo_usuarios';

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

// RUTAS LINEAS //
$route['modulo_lineas'] = 'Welcome/modulo_lineas';
$route['list_lineas'] = 'Welcome/list_lineas';
$route['add_lineas'] = 'Welcome/add_lineas';
$route['edit_lineas'] = 'Welcome/edit_lineas';
$route['delete_lineas'] = 'Welcome/delete_lineas';

// RUTAS HORARIOS //
$route['modulo_horarios'] = 'Welcome/modulo_horarios';
$route['list_horarios'] = 'Welcome/list_horarios';
$route['add_horarios'] = 'Welcome/add_horarios';
$route['edit_horarios'] = 'Welcome/edit_horarios';
$route['delete_horarios'] = 'Welcome/delete_horarios';

// RUTAS TARIFAS //
$route['modulo_tarifas'] = 'Welcome/modulo_tarifas';
$route['list_tarifas'] = 'Welcome/list_tarifas';
$route['add_tarifas'] = 'Welcome/add_tarifas';
$route['edit_tarifas'] = 'Welcome/edit_tarifas';
$route['delete_tarifas'] = 'Welcome/delete_tarifas';

// RUTAS RECORRIDO //
$route['modulo_recorrido'] = 'Welcome/modulo_recorrido';
$route['list_recorrido'] = 'Welcome/list_recorrido';
$route['add_recorrido'] = 'Welcome/add_recorrido';

// RUTAS TRAYECTO //
$route['modulo_trayecto'] = 'Welcome/modulo_trayecto';
$route['list_trayecto'] = 'Welcome/list_trayecto';
$route['add_trayecto'] = 'Welcome/add_trayecto';

// RUTAS COMENTARIOS //
$route['list_comentarios'] = 'Welcome/list_comentarios';
$route['add_comentarios'] = 'Welcome/add_comentarios';

// RUTAS PREFERENCIAS //
$route['list_preferencias'] = 'Welcome/list_preferencias';
$route['add_preferencias'] = 'Welcome/add_preferencias';


// RUTAS CONTINGENCIAS //
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
