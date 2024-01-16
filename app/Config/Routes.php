<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/editar/(:num)', "Home::screenEditar/$1");
$routes->add('/atualizar/consequencia', "Home::atualizarConsequencia");

$routes->post('/send', 'Home::sendConsequencia');

$routes->add('/delete/(:num)', 'Home::deleteConsequencia/$1');