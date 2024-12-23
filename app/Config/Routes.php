<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', function () {
    return redirect()->to('/login');
});

$routes->get('/login', 'UserController::index');
$routes->post('auth', 'UserController::auth');  
$routes->get('logout', 'UserController::logout');

// Group all routes under 'dashboard' and add 'auth' filter
$routes->group('dashboard', ['filter' => 'auth'], function($routes) {

    $routes->get('/', 'DashboardController::index');

    // make group route author
    $routes->group('author', function($routes) {
        $routes->get('/', 'AuthorController::index');
        $routes->get('add_form', 'AuthorController::add_form');
        $routes->get('edit/(:any)', 'AuthorController::edit/$1');
        $routes->post('create', 'AuthorController::create');
        $routes->post('update/(:any)', 'AuthorController::update/$1');
        $routes->get('delete/(:any)', 'AuthorController::delete/$1');
    });

    // make group route artikel
    $routes->group('artikel', function($routes) {
        $routes->get('/', 'ArtikelController::index');
        $routes->get('add', 'ArtikelController::add_form');
        $routes->get('edit/(:any)', 'ArtikelController::edit/$1');
        $routes->post('create', 'ArtikelController::create');
        $routes->post('update/(:any)', 'ArtikelController::update/$1');
        $routes->get('delete/(:any)', 'ArtikelController::delete/$1');
    });

    // make group route arsip_terbitan
    $routes->group('arsipterbitan', function($routes) {
        $routes->get('/', 'ArsipTerbitanController::index');
        $routes->get('add_form', 'ArsipTerbitanController::add_form');
        $routes->get('edit/(:any)', 'ArsipTerbitanController::edit/$1');
        $routes->post('create', 'ArsipTerbitanController::create');
        $routes->post('update/(:any)', 'ArsipTerbitanController::update/$1');
        $routes->get('delete/(:any)', 'ArsipTerbitanController::delete/$1');
    });

    // make group route detail_artikel
    $routes->group('detailartikel', function($routes) {
        $routes->get('/', 'DetailArtikelController::index');
        $routes->get('add', 'DetailArtikelController::add_form');
        $routes->get('edit/(:any)', 'DetailArtikelController::edit/$1');
        $routes->post('create', 'DetailArtikelController::create');
        $routes->post('update/(:any)', 'DetailArtikelController::update/$1');
        $routes->get('delete/(:any)', 'DetailArtikelController::delete/$1');
    });

    // make group route editor
    $routes->group('editor', function($routes) {
        $routes->get('/', 'EditorController::index');
        $routes->get('add_form', 'EditorController::add_form');
        $routes->get('edit/(:any)', 'EditorController::edit/$1');
        $routes->post('create', 'EditorController::create');
        $routes->post('update/(:any)', 'EditorController::update/$1');
        $routes->get('delete/(:any)', 'EditorController::delete/$1');
    });

    // make group route issue
    $routes->group('issue', function($routes) {
        $routes->get('/', 'IssueController::index');
        $routes->get('add_form', 'IssueController::add_form');
        $routes->get('edit/(:any)', 'IssueController::edit/$1');
        $routes->post('create', 'IssueController::create');
        $routes->post('update/(:any)', 'IssueController::update/$1');
        $routes->get('delete/(:any)', 'IssueController::delete/$1');
    });

    // make group route review
    $routes->group('review', function($routes) {
        $routes->get('/', 'ReviewController::index');
        $routes->get('add_form', 'ReviewController::add_form');
        $routes->get('edit/(:any)', 'ReviewController::edit/$1');
        $routes->post('create', 'ReviewController::create');
        $routes->post('update/(:any)', 'ReviewController::update/$1');
        $routes->get('delete/(:any)', 'ReviewController::delete/$1');
    });

    // make group route reviewer 
    $routes->group('reviewer', function($routes) {
        $routes->get('/', 'ReviewerController::index');
        $routes->get('add_form', 'ReviewerController::add_form');
        $routes->get('edit/(:any)', 'ReviewerController::edit/$1');
        $routes->post('create', 'ReviewerController::create');
        $routes->post('update/(:any)', 'ReviewerController::update/$1');
        $routes->get('delete/(:any)', 'ReviewerController::delete/$1');
    });

    // make a group route status
    $routes->group('status', function($routes) {
        $routes->get('/', 'StatusController::index');
        $routes->get('add_form', 'StatusController::add_form');
        $routes->get('edit/(:any)', 'StatusController::edit/$1');
        $routes->post('create', 'StatusController::create');
        $routes->post('update/(:any)', 'StatusController::update/$1');
        $routes->get('delete/(:any)', 'StatusController::delete/$1');
    });

    // make a group route submit
    $routes->group('submit', function($routes) {
        $routes->get('/', 'SubmitController::index');
        $routes->get('add_form', 'SubmitController::add_form');
        $routes->get('edit/(:any)', 'SubmitController::edit/$1');
        $routes->post('create', 'SubmitController::create');
        $routes->post('update/(:any)', 'SubmitController::update/$1');
        $routes->get('delete/(:any)', 'SubmitController::delete/$1');
    });

});
