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

$routes->get('/dashboard/anggota', 'Perpustakaan::anggota', ['filter' => 'auth']);
    $routes->get('/dashboard/tambahAnggotaForm', 'Perpustakaan::tambahAnggotaForm', ['filter' => 'auth']);
        $routes->post('/dashboard/tambahAnggota', 'Perpustakaan::tambahAnggota', ['filter' => 'auth']);
    $routes->get('/dashboard/editAnggota/(:any)', 'Perpustakaan::editAnggota/$1', ['filter' => 'auth']);
    $routes->post('/dashboard/updateAnggota/(:any)', 'Perpustakaan::updateAnggota/$1', ['filter' => 'auth']);
        $routes->get('/dashboard/hapusAnggota/(:any)', 'Perpustakaan::hapusAnggota/$1', ['filter' => 'auth']);

    $routes->get('/dashboard/buku', 'Perpustakaan::buku', ['filter' => 'auth']);
    $routes->get('/dashboard/tambahBukuForm', 'Perpustakaan::tambahBukuForm', ['filter' => 'auth']);
        $routes->post('/dashboard/tambahBuku', 'Perpustakaan::tambahBuku', ['filter' => 'auth']);
    $routes->get('/dashboard/editBuku/(:any)', 'Perpustakaan::editBuku/$1', ['filter' => 'auth']);
        $routes->post('/dashboard/updateBuku/(:any)', 'Perpustakaan::updateBuku/$1', ['filter' => 'auth']);
    $routes->get('/dashboard/hapusBuku/(:any)', 'Perpustakaan::hapusBuku/$1', ['filter' => 'auth']);




