<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// make group route author
$routes->group('author', function($routes) {
    $routes->get('/', 'Author::index');
    $routes->get('add_form', 'Author::add_form');
    $routes->get('edit/(:any)', 'Author::edit/$1');
    $routes->post('create', 'Author::create');
    $routes->put('update/(:any)', 'Author::update/$1');
    $routes->delete('delete/(:any)', 'Author::delete/$1');
});
