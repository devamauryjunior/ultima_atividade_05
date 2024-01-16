<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('/send', 'Home::sendConsequencia');

$routes->add('/delete/(:num)', 'Home::deleteConsequencia/$1');