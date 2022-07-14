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
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// I don't wanna let CI guess
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// No Filters:::https://github.com/Gadrawingz
$routes->get('/', 'HomeController::index');
$routes->get('farmer/logout',   'DashController::farmerLogout');
$routes->get('admin/logout',   'DashController::adminLogout');



// NoAuthFilters:::https://github.com/Gadrawingz
$routes->group('farmer', ['filter'=>'farmerNoAuth'], function ($routes){
    $routes->get('login', 'AuthController::loginFarmer');
    $routes->get('register', 'AuthController::registerFarmer');
});

// Admin group
$routes->group('admin', ['filter'=>'adminNoAuth'], function ($routes){
    $routes->get('login', 'AuthController::loginAdmin');
});



// AuthFilters:::https://github.com/Gadrawingz
$routes->group('farmer', ['filter'=>'farmerAuth'], function ($routes){
    $routes->get('dashboard', 'DashController::farmerDashboard');
    $routes->get('profile',   'DashController::farmerProfile'); 
});

$routes->group('admin', ['filter'=>'adminAuth'], function ($routes){
    $routes->get('dashboard', 'DashController::adminDashboard');
    $routes->get('profile',  'DashController::adminProfile');

    $routes->get('register', 'AdminController::adminRegistration');
    $routes->get('all', 'AdminController::adminViewAll');
    $routes->get('disabled', 'AdminController::adminViewDisabled');
    $routes->get('view/(:num)' , 'AdminController::adminView/$1');
    //$routes->get('delete/(:num)', 'AdminController::delete/$1');
    $routes->get('enable/(:num)',  'AdminController::enable/$1');
    $routes->get('disable/(:num)', 'AdminController::disable/$1');
    
});


//$routes->get('/admins', 'AdminController::index');
//$routes->get('admin/(:num)', 'AdminController::adminById/$1');
//$routes->get('admin/(:slug)', 'AdminController::adminBySlug/$1');
//$routes->get('admin/login', 'AuthController::loginAdmin');

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
