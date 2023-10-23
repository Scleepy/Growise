<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('screens/home');
});

Route::get('/user', function () {
    return view('screens/user');
});

Route::get('/cart', function () {
    return view('screens/cart');
});

Route::get('/about', function () {
    return view('screens/about');
});

Route::get('/contact', function () {
    return view('screens/contact');
});

Route::get('/catalogue', function () {
    return view('screens/catalogue');
});

Route::get('/order', function () {
    return view('screens/order');
});

Route::get('/login', function () {
    return view('screens/login');
});

Route::get('/signup', function () {
    return view('screens/signup');
});

Route::get('/product-detail', function () {
    return view('screens/product-detail');
});

// Admin route
Route::get('/admin', function () {
    return view('screens/admin');
});

Route::get('/admin/dashboard', function () {
    return view('screens/dashboard');
});

Route::get('/admin/product', function () {
    return view('screens/product');
});
