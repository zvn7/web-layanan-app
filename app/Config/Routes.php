<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Dashboard::index');

$routes->get('/users', 'Users::index', ['filter' => 'role:admin']);
$routes->get('/users/index', 'Users::index', ['filter' => 'role:admin']);

$routes->get('/groups', 'Groups::index', ['filter' => 'role:admin']);
$routes->get('/groups/index', 'Groups::index', ['filter' => 'role:admin']);


// $routes->get('app', 'App::index');
// $routes->get('app/add', 'App::create');
// $routes->post('app', 'App::store');
// $routes->get('app/edit/(:num)', 'App::edit/$1');
// $routes->put('app/(:any)', 'App::update/$1');
// $routes->delete('app/(:segment)', 'App::destroy/$1');

$routes->get('app/trash', 'App::trash');
$routes->get('app/restore/(:any)', 'App::restore/$1');
$routes->get('app/restore', 'App::restore');
$routes->delete('app/delete2/(:any)', 'App::delete2/$1');
$routes->delete('app/delete2', 'App::delete2');

$routes->get('developer/trash', 'Developer::trash');
$routes->get('developer/restore/(:any)', 'Developer::restore/$1');
$routes->get('developer/restore', 'Developer::restore');
$routes->delete('developer/delete2/(:any)', 'Developer::delete2/$1');
$routes->delete('developer/delete2', 'Developer::delete2');

$routes->get('users/trash', 'Users::trash');
$routes->get('users/restore/(:any)', 'Users::restore/$1');
$routes->get('users/restore', 'Users::restore');
$routes->delete('users/delete2/(:any)', 'Users::delete2/$1');
$routes->delete('users/delete2', 'Users::delete2');

$routes->get('groups/trash', 'Groups::trash');
$routes->get('groups/restore/(:any)', 'Groups::restore/$1');
$routes->get('groups/restore', 'Groups::restore');
$routes->delete('groups/delete2/(:any)', 'Groups::delete2/$1');
$routes->delete('groups/delete2', 'Groups::delete2');

$routes->get('pemohon/trash', 'Pemohon::trash');
$routes->get('pemohon/restore/(:any)', 'Pemohon::restore/$1');
$routes->get('pemohon/restore', 'Pemohon::restore');
$routes->delete('pemohon/delete2/(:any)', 'Pemohon::delete2/$1');
$routes->delete('pemohon/delete2', 'Pemohon::delete2');

$routes->get('permohonanapp/trash', 'PermohonanApp::trash');
$routes->get('permohonanapp/restore/(:any)', 'PermohonanApp::restore/$1');
$routes->get('permohonanapp/restore', 'PermohonanApp::restore');
$routes->delete('permohonanapp/delete2/(:any)', 'Papp::delete2/$1');
$routes->delete('permohonanapp/delete2', 'PermohonanApp::delete2');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
