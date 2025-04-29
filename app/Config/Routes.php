<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Login', 'Login::index');


$routes->post('PendaftaranController/store', 'PendaftaranController::store');

$routes->get('PendaftaranController/getKuotaSemua', 'PendaftaranController::getKuotaSemua');

