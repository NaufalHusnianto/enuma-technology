<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/news', 'News::newsPage');

// AUTH
$routes->get('admin/login', 'Auth::login');
$routes->post('admin/processLogin', 'Auth::processLogin');
$routes->get('admin/logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'adminauth'], function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('news', 'News::index');
    $routes->get('admin-users', 'User::index');
});
