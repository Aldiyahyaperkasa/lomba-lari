<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home/semuaPeserta', 'Home::semuaPeserta');
$routes->get('/LoginController', 'LoginController::index');


$routes->get('PendaftaranController/getKuotaSemua', 'PendaftaranController::getKuotaSemua');
$routes->post('PendaftaranController/store', 'PendaftaranController::store');

$routes->post('/LoginController/submit', 'LoginController::submit'); 
$routes->get('/PesertaController/index', 'PesertaController::index');
$routes->get('LoginController/logout', 'LoginController::logout');


$routes->get('/AdminController/index', 'AdminController::index');

$routes->get('AdminPesertaController/menunggu', 'AdminPesertaController::menunggu');
$routes->get('AdminPesertaController/terkonfirmasi', 'AdminPesertaController::terkonfirmasi');
$routes->get('bukti_bayar/(:any)', 'AdminPesertaController::buktiBayar/$1');
$routes->get('AdminPesertaController/konfirmasi/(:num)', 'AdminPesertaController::konfirmasi/$1');
$routes->get('AdminPesertaController/tolak/(:num)', 'AdminPesertaController::tolak/$1');


// $routes->get('AdminPesertaController/kirimEmailTes', 'AdminPesertaController::kirimEmailTes');



$routes->get('LaporanController/terkonfirmasi', 'LaporanController::terkonfirmasi');
$routes->get('LaporanController/sudahAmbilBaju', 'LaporanController::sudahAmbilBaju');
$routes->get('LaporanController/exportPesertaTerkonfirmasiExcel', 'LaporanController::exportPesertaTerkonfirmasiExcel');
$routes->get('LaporanController/exportSudahAmbilBajuExcel', 'LaporanController::exportSudahAmbilBajuExcel');


$routes->get('admin/pengambilan/scan', 'PengambilanBajuController::scan');
$routes->post('admin/pengambilan/scan', 'PengambilanBajuController::prosesScan');
$routes->get('admin/pengambilan/manual', 'PengambilanBajuController::manual');
$routes->post('admin/pengambilan/update/(:num)', 'PengambilanBajuController::updateManual/$1');
