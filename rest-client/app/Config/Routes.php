<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Define a route group for the BooksController
$routes->group('books', ['namespace' => 'App\Controllers'], function ($routes) {
    // Define routes for the index and create methods
    $routes->get('/', 'BooksController::index');
    $routes->get('create', 'BooksController::create');

    // Define routes for the show, edit, update, and delete methods with an ID parameter
    $routes->get('(:segment)', 'BooksController::show/$1');
    $routes->get('edit/(:segment)', 'BooksController::edit/$1');
    $routes->put('(:segment)', 'BooksController::update/$1');
    $routes->delete('(:segment)', 'BooksController::delete/$1');

    // Define a route for the store method, which handles POST requests to create a new book
    $routes->post('store', 'BooksController::store');
});

// You can also use the shorthand notation for a resource route:
// $routes->resource('books');