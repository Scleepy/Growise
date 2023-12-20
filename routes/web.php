<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionHeaderController;

// USER ROUTE

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('aboutUs');
// Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contactUs');

// user login + register
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/signup', [UserController::class, 'create']);
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/users/authenticate', [UserController::class, 'authenticate']);
    Route::post('/users', [UserController::class, 'store']);
});

Route::get('/user', function () {
    return view('screens/user');
});

// catalogue
Route::get('/catalogue', [ProductController::class, 'getAllProducts'])->name('products');
Route::get('/catalogue/{slug}', [ProductController::class, 'getAllProductsBySlug'])->name('getProductsBySlug');
Route::get('/catalogue/{categorySlug}/{productSlug}', [ProductController::class, 'productDetails'])->name('productDetails');

// history transaction
Route::get('/order', [UserController::class, 'getHistoryTransaction'])->name("userGetHistoryTransaction");

// cart and payment
Route::post('/cart', [CartItemController::class, 'addToCartOrUpdateQuantity'])->name('addToCartOrUpdateQuantity');
Route::post('/cart/buy-now', [CartController::class, 'buyNow'])->name('buyNow');

Route::get('/cart', [CartItemController::class, 'getItemsByCartId'])->name('cart');
Route::delete('/cart/{cartItem}', [CartItemController::class, 'destroy'])->name('cartItemDestroy');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout/payment', [CartController::class, 'payment'])->name('payment');

// ADMIN ROUTE

Route::get('/admin', [AdminController::class, 'loginView'])->name('admin.loginView');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', [AdminController::class, 'home'])->name('admin.home');

Route::get('/admin/product', [ProductController::class, 'getAllProducts'])->name('admin.products');

Route::get('/admin/transaction', [AdminController::class, 'transactions'])->name('admin.transactions');

Route::get('/admin/transaction-detail/{id}', [AdminController::class, 'transactionDetails'])->name('admin.transactionDetails');

Route::post('/admin/transaction/shipmentstatus/{id}', [TransactionHeaderController::class, 'updateTransactionStatus'])->name('admin.updateTransactionStatus');

Route::get('/admin/new-product', [AdminController::class, 'newProduct'])->name('admin.newProduct');

Route::get('/admin/edit-product/{id}', [AdminController::class, 'editProduct'])->name('admin.editProduct');

Route::delete('/admin/remove-product/{product}', [ProductController::class, 'destroy'])->name('destroy');

Route::post('/product/add', [ProductController::class, 'store'])->name('product.store');

Route::post('/product/edit/{id}', [ProductController::class, 'update'])->name('product.update');
