<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Mengarahkan rute default ke halaman login
$routes->get('/', 'LoginController::login');
$routes->get('/siswa', 'Home::siswa');
$routes->get('/absensi', 'Home::absen');
$routes->get('daftarabsen', 'Home::daftarabsen');
$routes->get('registrasi', 'LoginController::registrasi');
$routes->post('/register/submit', 'LoginController::submit_registration');
$routes->post('/home/save_attendance', 'Home::save_attendance');

// login
$routes->get('/', 'LoginController::login');
$routes->post('/login/submit', 'LoginController::submit');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/dashboard', 'Home::index');
