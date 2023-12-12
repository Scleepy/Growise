<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contactUs');

Route::get('/user', function () {
    return view('screens/user');
});

Route::get('/cart', function () {
    return view('screens/cart');
});

Route::get('/catalogue', function () {
    return view('screens/catalogue');
});

Route::get('/order', function () {
    return view('screens/order');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/signup', [UserController::class, 'create']);
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/users/authenticate', [UserController::class, 'authenticate']);
    Route::post('/users', [UserController::class, 'store']);
});

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

Route::get('/admin/product', [ProductController::class, 'adminProducts'])->name('admin.products');

Route::get('/admin/transaction', [AdminController::class, 'transactions'])->name('admin.transactions');

Route::get('/admin/transaction-detail', [AdminController::class, 'transactionDetails'])->name('admin.transactionDetails');

Route::get('/admin/new-product', [AdminController::class, 'newProduct'])->name('admin.newProduct');

Route::get('/admin/edit-product/{id}', [AdminController::class, 'editProduct'])->name('admin.editProduct');

Route::delete('/admin/remove-product/{product}', [ProductController::class, 'destroy'])->name('destroy');

Route::post('/product/add', [ProductController::class, 'store'])->name('product.store');

Route::post('/product/edit/{id}', [ProductController::class, 'update'])->name('product.update');
