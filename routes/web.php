<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//Route::get('/login', [UserController::class, 'login']);

// Route::get('/signup', function () {
//     return view('screens/signup');
// });

Route::get('/signup', [UserController::class, 'create'])->name('user.create');

Route::post('/users', [UserController::class, 'store'])->name('user.store');

Route::get('/product-detail', function () {
    return view('screens/product-detail');
});

Route::get('/checkout', function () {
    return view('screens/checkout');
});

Route::get('/admin', function () {
    return view('screens/admin');
});

Route::get('/admin/dashboard', function () {
    return view('screens/dashboard');
});

Route::get('/admin/product', function () {
    return view('screens/product');
});

Route::get('/admin/transaction', function () {
    return view('screens/transaction');
});

Route::get('/admin/transaction-detail', function () {
    return view('screens/transaction-detail');
});

Route::get('/admin/new-product', function () {
    return view('screens/newproduct');
});

Route::get('/admin/edit-product', function () {
    return view('screens/editproduct');
});
