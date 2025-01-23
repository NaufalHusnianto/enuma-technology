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
    $routes->get('news/show/(:segment)', 'News::show/$1');
    $routes->get('news/create', 'News::create');
    $routes->post('news/store', 'News::store');
    $routes->get('news/edit/(:segment)', 'News::edit/$1');
    $routes->post('news/update/(:segment)', 'News::update/$1');
    $routes->get('news/delete/(:segment)', 'News::delete/$1');

    $routes->get('admin-users', 'User::index');
    $routes->get('admin-users/create', 'User::create');
    $routes->post('admin-users/store', 'User::store');
    $routes->get('admin-users/edit/(:segment)', 'User::edit/$1');
    $routes->post('admin-users/update/(:segment)', 'User::update/$1');
    $routes->get('admin-users/delete/(:segment)', 'User::delete/$1');

    $routes->get('contacts', 'Contact::index');
    $routes->get('contact/delete/(:segment)', 'Contact::delete/$1');

    $routes->get('profile', 'Auth::edit');
    $routes->post('profile/update', 'Auth::update');
});

// File Uploads (General)
$routes->post('upload/image', 'News::uploadToTemp', ['as' => 'upload.image']);
$routes->get('temp-image-preview', 'News::previewTempImage', ['as' => 'temp.image.preview']);

