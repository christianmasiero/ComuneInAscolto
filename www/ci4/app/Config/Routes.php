<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/log', 'Utenti::vLogin');
$routes->get('uploads/(:any)', 'Segnalazioni::show/$1');


