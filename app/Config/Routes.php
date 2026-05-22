<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Auth Routes
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');

// Frontend - Produk
$routes->get('produk', 'Produk::index');
$routes->get('produk/kategori/(:segment)', 'Produk::kategori/$1');
$routes->get('produk/(:segment)', 'Produk::detail/$1');

// Frontend - Order
$routes->get('order/success/(:segment)', 'Order::success/$1');
$routes->get('order/(:segment)', 'Order::create/$1');
$routes->post('order/store', 'Order::store');

// Admin Routes (protected by auth filter)
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin::index');

    // Kategori
    $routes->get('kategori', 'AdminKategori::index');
    $routes->get('kategori/create', 'AdminKategori::create');
    $routes->post('kategori/store', 'AdminKategori::store');
    $routes->get('kategori/edit/(:num)', 'AdminKategori::edit/$1');
    $routes->post('kategori/update/(:num)', 'AdminKategori::update/$1');
    $routes->post('kategori/delete/(:num)', 'AdminKategori::delete/$1');

    // Produk
    $routes->get('produk', 'AdminProduk::index');
    $routes->get('produk/create', 'AdminProduk::create');
    $routes->post('produk/store', 'AdminProduk::store');
    $routes->get('produk/edit/(:num)', 'AdminProduk::edit/$1');
    $routes->post('produk/update/(:num)', 'AdminProduk::update/$1');
    $routes->post('produk/delete/(:num)', 'AdminProduk::delete/$1');

    // Pesanan
    $routes->get('pesanan', 'AdminOrder::index');
    $routes->get('pesanan/detail/(:num)', 'AdminOrder::detail/$1');
    $routes->post('pesanan/status/(:num)', 'AdminOrder::updateStatus/$1');
});
