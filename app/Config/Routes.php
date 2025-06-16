<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/store', 'Barang::store');
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
$routes->post('/barang/update/(:num)', 'Barang::update/$1');
$routes->get('/barang/delete/(:num)', 'Barang::delete/$1');

$routes->get('/barang/exportExcel', 'Barang::exportExcel');
$routes->get('/barang/sendEmail', 'Barang::sendEmail');
$routes->post('barang/importExcel', 'Barang::importExcel');
$routes->get('barang/printPdf', 'Barang::printPdf');
$routes->get('barang/exportPdf', 'Barang::exportPdf');
$routes->get('barang/imported-files', 'Barang::listImportedFiles');
$routes->get('barang/downloadFile/(:any)', 'Barang::downloadFile/$1');
$routes->get('/kirim-email', 'EmailController::index');
$routes->post('/kirim-email', 'EmailController::send');
