<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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

Route::get('/signup', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/product-detail', function () {
    return view('screens/product-detail');
});

Route::get('/checkout', function () {
    return view('screens/checkout');
});

// Route::get('/admin', function () {
//     return view('screens/admin');
// });

// Route::get('/admin/dashboard', function () {
//     return view('screens/dashboard');
// });

// Route::get('/admin/product', function () {
//     return view('screens/product');
// });

// Route::get('/admin/transaction', function () {
//     return view('screens/transaction');
// });

// Route::get('/admin/transaction-detail', function () {
//     return view('screens/transaction-detail');
// });

Route::get('/admin', [AdminController::class, 'loginView'])->name('admin.loginView');

Route::get('/admin/dashboard', [AdminController::class, 'home'])->name('admin.home');

Route::get('/admin/product', [AdminController::class, 'products'])->name('admin.products');

Route::get('/admin/transaction', [AdminController::class, 'transactions'])->name('admin.transactions');

Route::get('/admin/transaction-detail', [AdminController::class, 'transactionDetails'])->name('admin.transactionDetails');

Route::get('/admin/new-product', [AdminController::class, 'newProduct'])->name('admin.newProduct');

Route::get('/admin/edit-product', [AdminController::class, 'editProduct'])->name('admin.editProduct');

Route::post('/product/add', [ProductController::class, 'store'])->name('product.store');
