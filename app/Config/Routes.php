<?php

use App\Controllers\PerfilesController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::login');
$routes->get('Salir', 'LoginController::logout');
$routes->get('RegistrarUsuario', 'LoginController::registrarUsuario');
$routes->post('AuntetificaUsuario', 'LoginController::autentificacion');

//$routes->get('Inicio', 'Home::index');
$routes->get('Inicio', 'NuevoUsuarioController::GetFormularioRegistraUsuario');

$routes->post('Prueba/RegistrarActualizarUsuario','PruebaController::AgregarActualizarUsuario');
$routes->get('Prueba/VerUsuarios','PruebaController::VerUsuarios');
$routes->get('Prueba/GetUsuarios','PruebaController::GetUsuarios');
$routes->get('Prueba/DeshabilitarHabilitarUsuario/(:num)','PruebaController::DeshabilitarHabilitarUsuarioById/$1');
$routes->get('Prueba/GetUsuarioByID/(:num)','PruebaController::GetUsuarioByID/$1');

$routes->get('Modulos/Modulo_1','Modulo1Controller::index');
$routes->get('Modulos/Modulo_2','Modulo2Controller::index');
$routes->get('Modulos/Modulo_3','Modulo3Controller::index');
$routes->get('Modulos/Modulo_4','Modulo4Controller::index');
$routes->get('Modulos/Modulo_5','Modulo5Controller::index');

//rutas de registro de nuevos usuarios
$routes->get('Usuario/Nuevo', 'NuevoUsuarioController::GetFormularioRegistraUsuario');
$routes->post('Usuario/NuevoRegistrarActualizar', 'NuevoUsuarioController::RegistrarActualizarUsuario');
$routes->get('Usuario/VerUsuarios', 'NuevoUsuarioController::VerUsuarios');
$routes->get('Usuario/GetUsuarios', 'NuevoUsuarioController::GetUsuarios');
$routes->get('Usuario/DeshabilitarHabilitar/(:num)', 'NuevoUsuarioController::DesabilitarHabilitarUsuarioById/$1');
$routes->get('Usuario/GetUsuarioByID/(:num)', 'NuevoUsuarioController::GetUsuarioByID/$1');

//rutas de areas
$routes->get('Areas/Nueva', 'AreasController::MostrarAreas');
$routes->post('Areas/RegistrarActualizarAreas', 'AreasController::AgregarActualizarAreas');
$routes->get('Areas/VerAreas', 'AreasController::VerAreas');
$routes->get('Areas/GetAreas', 'AreasController::GetAreas');
$routes->get('Areas/GetAreasByID/(:num)', 'AreasController::GetAreaByID/$1');

$routes->get('Perfiles/Nuevo', 'PerfilesController::MostrarPerfiles');
$routes->post('Perfiles/RegistrarActualizarPerfiles', 'PerfilesController::AgregarActualizarPerfiles');
$routes->get('Perfiles/VerPerfiles', 'PerfilesController::VerPerfiles');
$routes->get('Perfiles/GetPerfiles', 'PerfilesController::GetPerfiles');
$routes->get('Perfiles/GetPerfilesByID/(:num)', 'PerfilesController::GetPerfilByID/$1');

$routes->get('Procuradurias/Nueva', 'ProcuraduriasController::MostrarProcuraduria');
$routes->post('Procuradurias/RegistrarActualizarProcuraduria', 'ProcuraduriasController::AgregarActualizarProcuradurias');
$routes->get('Procuradurias/VerProcuradurias', 'ProcuraduriasController::VerProcuradurias');
$routes->get('Procuradurias/GetProcuradurias', 'ProcuraduriasController::GetProcuradurias');
$routes->get('Procuradurias/GetProcuraduriasByID/', 'ProcuraduriasController::GetProcuraduriaByID/$1');

$routes->get('TipoFacultados/Nuevo', 'TipoFacultadoController::MostrarTipoFacultado');
$routes->post('TipoFacultados/RegistrarActualizarTipoFacultados', 'TipoFacultadoController::AgregarActualizarTipoFacultado');
$routes->get('TipoFacultados/VerTipoFacultados', 'TipoFacultadoController::VerTipoFacultados');
$routes->get('TipoFacultados/GetTipoFacultados', 'TipoFacultadoController::GetTipoFacultados');
$routes->get('TipoFacultados/GetTipoFacultadosByID/', 'TipoFacultadosController::GetTipoFacultadosByID');
