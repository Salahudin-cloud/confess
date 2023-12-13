<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// login 
$routes->get('/', 'Login::index');

// regiter 
$routes->get('/register', 'Register::index');

// register proicecss 
$routes->post('register/process', 'Register::proccessRegister');

// validasi login 
$routes->post('/login/auth', 'Login::auth');

//logout
$routes->get('/logout', 'Logout::index');

// render : admind dashboard 
$routes->get('/dashboard', 'DashboardAdmin::index');

