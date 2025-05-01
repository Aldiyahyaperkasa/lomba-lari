<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/LoginController', 'LoginController::index');

$routes->get('PendaftaranController/getKuotaSemua', 'PendaftaranController::getKuotaSemua');
$routes->post('PendaftaranController/store', 'PendaftaranController::store');

$routes->post('/LoginController/submit', 'LoginController::submit'); 
$routes->get('/PesertaController/index', 'PesertaController::index');


