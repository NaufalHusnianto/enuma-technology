<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->group('admin', static function (RouteCollection $routes) {
    $routes->get('/', 'Admin::index');
});
