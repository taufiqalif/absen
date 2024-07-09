<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Mengarahkan rute default ke halaman login
// $routes->get('/', 'LoginController::index'); 
$routes->get('/', 'Home::index');
$routes->get('/siswa', 'Home::siswa');
$routes->get('/absensi', 'Home::absen'); // URL yang benar
$routes->get('daftarabsen', 'Home::daftarabsen');
$routes->get('registrasi', 'LoginController::registrasi');
$routes->post('/home/save_attendance', 'Home::save_attendance'); // Perhatikan ada '/' sebelum 'home'

// login
$routes->get('/login', 'LoginController::index');
$routes->post('/login/submit', 'LoginController::submit');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/dashboard', 'DashboardController::index'); // Assuming you have a DashboardController
