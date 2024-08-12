<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Mengarahkan rute default ke halaman login
$routes->get('/', 'LoginController::login');
$routes->get('/siswa', 'Home::siswa');
$routes->get('/absensi', 'Home::absen');
$routes->get('/daftarabsen', 'Home::daftarabsen');
$routes->get('/registrasi', 'LoginController::registrasi');
$routes->post('/register/submit', 'LoginController::submit_registration');
$routes->post('/home/save_attendance', 'Home::save_attendance');

$routes->get('/tambahsiswa', 'Home::tambahSiswa');
$routes->post('/save_siswa', 'Home::saveSiswa');
$routes->get('/lihat/(:segment)', 'Home::lihat/$1');  // Route with NIS as a parameter
$routes->get('/hapus/(:segment)', 'Home::hapus/$1');


// login
$routes->get('/', 'LoginController::login');
$routes->post('/login/submit', 'LoginController::submit');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/dashboard', 'Home::index');
