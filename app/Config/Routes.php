<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');

$routes->get('/login', 'Main::login');

$routes->post('/login_submit', 'Main::login_submit');

$routes->get('/logout', 'Main::logout');

// Ne task
$routes->get('/new_task', 'Main::new_task');
$routes->post('/new_task_submit', 'Main::new_task_submit');

// filter status
$routes->get('/filter/(:alpha)', 'Main::filter/$1');

// Search and filter tasks
$routes->post('/search', 'Main::search');

// tmp
$routes->get('/session', 'Main::session');
