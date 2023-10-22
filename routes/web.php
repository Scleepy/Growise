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

Route::get('/product-detail', function () {
    return view('screens/product-detail');
});
