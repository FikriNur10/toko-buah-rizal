<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/contact', 'Home::contact');
$routes->get('/about', 'Home::about');

$routes->setDefaultController('Register');
$routes->get('/', 'Register::index', ['filter' => 'guestFilter']);
$routes->get('/register', 'Register::index', ['filter' => 'guestFilter']);
$routes->post('/register', 'Register::register', ['filter' => 'guestFilter']);

$routes->get('/login', 'Login::index', ['filter' => 'guestFilter']);
$routes->post('/login', 'Login::authenticate', ['filter' => 'guestFilter']);

$routes->get('/logout', 'Login::logout', ['filter' => 'authFilter']);
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authFilter']);

// admin route
$routes->get('/dashboard/produk', 'Admin::productDash', ['filter' => 'authFilter']);
$routes->get('/dashboard/tambahproduk', 'Admin::tambahProduk', ['filter' => 'authFilter']);

$routes->get('/dashboard/user', 'Admin::daftarUser', ['filter' => 'authFilter']);
$routes->get('/user/(:num)/delete', 'Admin::deleteUser/$1', ['filter' => 'authFilter']);
$routes->post('/user/update/(:num)', 'User::userUpdate/$1');

$routes->get('/dashboard/tambahadmin', 'Admin::tambahUser', ['filter' => 'authFilter']);
$routes->post('/dashboard/tambahadmin/store', 'Admin::registerAdmin', ['filter' => 'authFilter']);

$routes->get('/dashboard/adminsetting', 'Admin::settingAdmin', ['filter' => 'authFilter']);

//Tambah produk
$routes->post('/dashboard/tambahproduk/store', 'ProdukController::store', ['filter' => 'authFilter']);
//Delete Produk
$routes->get('/dashboard/produk/delete/(:num)', 'ProdukController::deleteProduk/$1', ['filter' => 'authFilter']);
//Edit Produk
$routes->get('/edit/(:any)', 'ProdukController::edit/$1', ['filter' => 'authFilter']);
$routes->post('/dashboard/produk/update/(:any)', 'ProdukController::updateProduk/$1', ['filter' => 'authFilter']);

//Transaksi
$routes->get('/dashboard/transaksi', 'Admin::daftarTransaksi', ['filter' => 'authFilter']);
//konfirmasi
$routes->get('/konfirmasi/(:any)', 'Admin::detailKonfirmasi/$1', ['filter' => 'authFilter']);
$routes->post('/konfirmasi/(:num)/update', 'Admin::updateStatus/$1', ['filter' => 'authFilter']);

$routes->get('/dashboard/table', 'Dashboard::table', ['filter' => 'authFilter']);


// User route front end
$routes->get('/keranjang', 'User::cart', ['filter' => 'authFilter']);
$routes->get('/produk', 'User::productSingel');
$routes->get('/dashboard/setting', 'User::setting');
// User route backend
$routes->post('/cart/add', 'ProdukController::addCart', ['filter' => 'authFilter']);
// menghapus cart
$routes->get('/cart/remove/(:num)', 'User::removeFromCart/$1', ['filter' => 'authFilter']);
// mengupdate cart
$routes->post('/cart/update/(:num)', 'User::updateCart/$1', ['filter' => 'authFilter']); // Route to update cart item quantity

$routes->get('/payment', 'Pembayaran::index', ['filter' => 'authFilter']);
$routes->post('/payment/checkout', 'Pembayaran::store', ['as' => 'checkout']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}


namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
