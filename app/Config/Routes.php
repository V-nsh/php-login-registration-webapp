<?php

namespace Config;

use App\Controllers\Home;
use App\Controllers\Users;
// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get', 'post'], 'user/register', [Users::class, 'create']);
$routes->match(['get', 'post'], 'user/loginAuth', [Users::class, 'loginAuth']);
$routes->match(['get', 'post'], 'user/editProfile', [Users::class, 'editAuth']);
$routes->match(['get', 'delete'],'user/delete', [Users::class, 'deleteAuth']);
$routes->get('/', 'Home::index');
// TODO : CHANGE THE HOME PAGE WHEN USER IS LOGGED OUT
$routes->get('home', [Home::class, 'index']);
$routes->get('user/signin', [Users::class, 'signinIndex']);
$routes->get('user/edit', [Users::class, 'editIndex']);
// $routes->delete('user/delete', [Users::class, 'deleteAuth']);
$routes->get('(:segment)', [Home::class, 'view']);
$routes->get('user/(:segment)', [Users::class, 'view']);
// post requests
// $routes->match(['get', 'post'], 'user/register', [Users::class, 'create']);
// $routes->get('user/register', [Users::class, 'create']);

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
