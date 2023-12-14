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

// render : mengelola pengguna 
$routes->get('/mengelola_pengguna', 'MengelolaPengguna::index');

// render : tambah pengguna 
$routes->get('/tambah_pengguna', 'TambahPengguna::index');

// process tambah pengguna 
$routes->post('process/tambah_pengguna', 'TambahPengguna::processMenambahPengguna');

//render : update pengguna 
$routes->get('update_pengguna/(:any)', 'UpdatePengguna::index/$1');

// update pengguna process 
$routes->put('update_pengguna/process/(:any)', 'UpdatePengguna::updatePenggunaProcess/$1');





// PENGGUNA 

// dashboard 
$routes->get('/homepage', 'DashboardPengguna::index');
