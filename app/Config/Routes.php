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
$routes->get('/', 'Home::index');
$routes->group('', ['filter' => 'authMiddleware'], function($routes) {
    $routes->resource('todo');
});
$routes->resource('register');
$routes->resource('login');
// Equivalent to the following:
$routes->get('todo/new',                    'Todo::new');
$routes->post('todo',                       'Todo::create');
$routes->get('todo',                        'Todo::index');
$routes->get('todo/(:segment)',             'Todo::show/$1');
$routes->get('todo/(:segment)/edit',        'Todo::edit/$1');
$routes->put('todo/(:segment)/update',      'Todo::update/$1');
$routes->patch('todo/(:segment)',           'Todo::update/$1');
$routes->delete('todo/(:segment)',          'Todo::delete/$1');
$routes->get('todo/(:segment)/finish',      'Todo::finish/$1');

$routes->post('todo/(:segment)/update',      'Todo::update/$1');



$routes->get('reply/new',                    'Reply::new');
$routes->get('todo/(:segment)/show',        'Todo::show/$1');
$routes->get('reply/(:segment)/view',        'Reply::view/$1');
$routes->get('reply/(:segment)/create',        'Reply::create/$1');

$routes->get('reply/(:segment)/new',        'Reply::new/$1');
$routes->delete('post/(:segment)',          'Todo::delete/$1');
$routes->delete('reply/(:segment)',          'reply::delete/$1');
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
