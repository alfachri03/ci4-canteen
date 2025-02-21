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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
// Route untuk regis user
$routes->get('regis', 'Home::regis');
//Route submit Registrasi
$routes->post('submitRegis', 'Home::submitRegis');
$routes->post('login/submit', 'Login::auth');
$routes->get('Home', 'Home::index');
$routes->get('food', 'Cmakanan::index');
$routes->get('drink', 'Cminuman::index');
$routes->get('signout', 'Home::signout');
$routes->get('cart', 'Ccart::index');
// Route untuk menambah cart via url
$routes->post('cart/add', 'Ccart::addItems');
// Route untuk menghapus item cart
$routes->get('cart/delete/(:any)', 'Ccart::deleteItems/$1');
// Route untuk trigger vocer
$routes->get('cart/addVoucher/(:any)', 'Ccart::addVoucher/$1');
// Route untuk submit order
$routes->post('order/submit', 'Corder::add');
//Route untuk trascation
$routes->get('transaction/(:any)', 'Ctransaksi::index/$1');
//Route untuk cetak PDF
$routes->get('pdf/(:any)', 'Ctransaksi::CetakPDF/$1');
//Route untuk edit profile
$routes->get('profile/edit', 'Home::editProfile');
//Route untuk submit edit profile
$routes->post('EditProfile/submit', 'Home::submitedit');
// Route untuk history pembelian
$routes->get('history', 'Ctransaksi::history');

//Route Admin
$routes->group('admin', function ($routes) {
    // Tambahkan rute-rute yang hanya dapat diakses oleh admin di sini.
    $routes->get('salesReport', 'Admin\AdminController::laporanPenjualan');
    // Route detail Report
    $routes->get('detailReport/(:any)', 'Admin\AdminController::detailLaporan/$1');
    $routes->get('listProduk', 'Admin\AdminController::listProduk');
    $routes->get('listAkun', 'Admin\AdminController::listAkun');
    $routes->get('accSettings', 'Admin\AdminController::accSetting');
    $routes->get('tambahProduk', 'Admin\AdminController::addProduct');
    $routes->post('insertProduct', 'Admin\AdminController::insProduct');
    //$route untuk edit Produk
    $routes->get('editProduct/(:any)', 'Admin\AdminController::editProduk/$1');
    $routes->post('productEdit/submit', 'Admin\AdminController::submitEditProduk');
    // Route untuk accs setting
    $routes->get('accSetting', 'Admin\AdminController::accSetting');
    // Route untuk submit accs setting
    $routes->post('accSetting/submit', 'Admin\AdminController::submitAccSetting');
    // Route untuk hapus produk
    $routes->get('removeProduct/(:any)', 'Admin\AdminController::removeProduct/$1');
    //Route untuk hapus
    $routes->get('removeUser/(:any)', 'Admin\AdminController::removeUser/$1');
    //Route untuk ganti role
    $routes->get('role/(:any)/(:any)', 'Admin\AdminController::role/$1/$2');
});

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
