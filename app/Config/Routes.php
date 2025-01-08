<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index'); // Halaman login
$routes->post('/login', 'Login::authenticate'); // Proses login
$routes->get('/logout', 'Login::logout'); // Logout
$routes->get('/dashboard', 'Perpustakaan::dashboard', ['filter' => 'auth']);





