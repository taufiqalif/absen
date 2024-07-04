<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/siswa', 'Home::siswa');
$routes->get('/absensi', 'Home::absen'); // URL yang benar

$routes->get('daftarabsen', 'Home::daftarabsen');

$routes->post('/home/save_attendance', 'Home::save_attendance'); // Perhatikan ada '/' sebelum 'home'
