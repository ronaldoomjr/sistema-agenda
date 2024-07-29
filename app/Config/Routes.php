<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Usuarios::login');
$routes->post('usuarios/login', 'Usuarios::login');
$routes->get('usuarios/cadastro', 'Usuarios::cadastro');
$routes->post('usuarios/cadastro', 'Usuarios::cadastro');
$routes->get('usuarios/logout', 'Usuarios::logout');

$routes->get('atividades', 'Atividades::index', ['filter' => 'auth']);
$routes->get('atividades/create', 'Atividades::create', ['filter' => 'auth']);
$routes->post('atividades/create', 'Atividades::create', ['filter' => 'auth']);
$routes->get('atividades/edit/(:num)', 'Atividades::edit/$1', ['filter' => 'auth']);
$routes->put('atividades/(:num)', 'Atividades::edit/$1', ['filter' => 'auth']);
$routes->delete('atividades/(:num)', 'Atividades::delete/$1', ['filter' => 'auth']);