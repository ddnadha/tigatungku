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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/admin/menu', 'MenuController::index');
$routes->get('/admin/menu/(:num)', 'MenuController::show/$1');
$routes->get('/admin/menu/create', 'MenuController::create');
$routes->post('/admin/menu', 'MenuController::store');
$routes->get('/admin/menu/edit/(:num)', 'MenuController::edit/$1');
$routes->post('/admin/menu/edit/(:num)', 'MenuController::update/$1');
$routes->get('/admin/menu/delete/(:num)', 'MenuController::destroy/$1');

$routes->get('/admin/ingre', 'IngredientController::index');
$routes->get('/admin/ingre/(:num)', 'IngredientController::show/$1');
$routes->get('/admin/ingre/create', 'IngredientController::create');
$routes->post('/admin/ingre', 'IngredientController::store');
$routes->get('/admin/ingre/edit/(:num)', 'IngredientController::edit/$1');
$routes->post('/admin/ingre/edit/(:num)', 'IngredientController::update/$1');
$routes->get('/admin/ingre/delete/(:num)', 'IngredientController::destroy/$1');



$routes->get('/admin/menu', 'MenuController::index');
$routes->get('/admin/ingredient', 'IngredientController::index');

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
