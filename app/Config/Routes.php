<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');
$routes->get('books', 'Books::index');
$routes->get('books/create', 'Books::create');
$routes->post('books/store', 'Books::store');
$routes->get('books/edit/(:num)', 'Books::edit/$1');
$routes->post('books/update/(:num)', 'Books::update/$1');
$routes->get('books/delete/(:num)', 'Books::delete/$1');
