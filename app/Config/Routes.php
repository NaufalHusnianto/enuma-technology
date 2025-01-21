<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// AUTH
$routes->get('admin/login', 'Auth::login');
$routes->post('admin/processLogin', 'Auth::processLogin');
$routes->get('admin/logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'adminauth'], function ($routes) {
    $routes->get('/', 'Admin::index');
});
