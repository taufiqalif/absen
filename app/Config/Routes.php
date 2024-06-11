<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/siswa', 'Home::siswa');
$routes->get('/absen', 'Home::absen');
