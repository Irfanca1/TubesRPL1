<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');

# Login
$routes->get('/login', 'Login::index');

# Beranda
$routes->get('/beranda', 'Beranda::index', ['filter' => 'auth']);

# Meja
$routes->get('/meja/create', 'Meja::create');
$routes->get('/meja/(:num)', 'Meja::delete/$1');

# Menu
$routes->get('/menu', 'Menu::index', ['filter' => 'auth']);
$routes->get('/menu/create', 'Menu::create', ['filter' => 'auth']);
$routes->get('/menu/edit/(:segment)', 'Menu::edit/$1', ['filter' => 'auth']);
$routes->get('/menu/(:any)', 'Menu::detail/$1', ['filter' => 'auth']);

# Pemesanan
$routes->get('/pemesanan', 'Pemesanan::index', ['filter' => 'auth']);
$routes->get('/pemesanan/tambah_pemesanan', 'Pemesanan::tambah_pemesanan', ['filter' => 'auth']);
$routes->get('/pemesanan/ubah_pemesanan/(:num)', 'Pemesanan::ubah_pemesanan/$1', ['filter' => 'auth']);
$routes->get('/pemesanan/ubah_status/(:num)/(:alpha)', 'Pemesanan::ubah_status/$1/$2', ['filter' => 'auth']);
$routes->delete('/pemesanan/(:num)', 'Pemesanan::delete_pemesanan/$1', ['filter' => 'auth']);
$routes->delete('/pemesanan/(:num)/(:any)', 'Pemesanan::delete_detail_pemesanan/$1/$2', ['filter' => 'auth']);
$routes->get('/pemesanan/(:num)', 'Pemesanan::detail_pemesanan/$1', ['filter' => 'auth']);





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
