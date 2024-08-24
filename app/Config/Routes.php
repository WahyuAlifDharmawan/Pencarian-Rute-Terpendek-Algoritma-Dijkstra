<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('admin/login', 'Admin\Login::index');
$routes->post('admin/login/login_action', 'Admin\Login::login_action');
$routes->get('admin/dashboard', 'Admin\Dashboard::index');
$routes->get('admin/data_tempat', 'Admin\Data_tempat::index');
$routes->post('admin/simpan_tempat_ibadah', 'Admin\Data_tempat::simpanTempatIbadah');
$routes->get('admin/edit_tempat/(:num)', 'Admin\Data_tempat::edit_tempat/$1');
$routes->get('admin/hapus_tempat/(:num)', 'Admin\Data_tempat::hapus_tempat/$1');
$routes->get('admin/data_fasilitasumum', 'Admin\Data_fasilitasumum::index');
$routes->post('admin/simpan_tempat_fasilitasumum', 'Admin\Data_fasilitasumum::simpanTempatFasilitasumum');
$routes->get('admin/edit_fasilitasumum/(:num)', 'Admin\Data_fasilitasumum::edit_fasilitasumum/$1');
$routes->get('admin/hapus_fasilitasumum/(:num)', 'Admin\Data_fasilitasumum::hapus_fasilitasumum/$1');
$routes->get('admin/data_perbatasan', 'Admin\Data_perbatasan::index');
$routes->post('admin/simpan_perbatasan', 'Admin\Data_perbatasan::simpanPerbatasan');
$routes->get('admin/edit_perbatasan/(:num)', 'Admin\Data_perbatasan::edit_perbatasan/$1');
$routes->get('admin/hapus_perbatasan/(:num)', 'Admin\Data_perbatasan::hapus_perbatasan/$1');
$routes->get('admin/logout', 'Admin\Login::logout');

$routes->get('user/get_route/(:any)/(:any)', 'User\CariRute::get_route/$1/$2');

$routes->get('user/landing_user', 'User\LandingUser::index');
$routes->get('user/cari_rute', 'User\CariRute::index');
$routes->get('user/tentang_user', 'User\TentangUser::index');
$routes->get('user/cari_rute/get_route_with_nodes/(:any)/(:any)', 'User\CariRute::get_route_with_nodes/$1/$2');
$routes->get('user/cari_rute/getManualNodes', 'User\CariRute::getManualNodes');

