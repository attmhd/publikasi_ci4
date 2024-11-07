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

// make group route artikel
$routes->group('artikel', function($routes) {
    $routes->get('/', 'ArtikelController::index');
    $routes->get('add_form', 'ArtikelController::add_form');
    $routes->get('edit/(:any)', 'ArtikelController::edit/$1');
    $routes->post('create', 'ArtikelController::create');
    $routes->put('update/(:any)', 'ArtikelController::update/$1');
    $routes->delete('delete/(:any)', 'ArtikelController::delete/$1');
});

$routes->get('/', function () {
    return view('components/sidebar');
});