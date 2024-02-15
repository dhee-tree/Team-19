<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserPanelController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('/about', 'about');

Route::view('/categories', 'categories');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');

//Display single product
Route::get('/product/{product_id}', [ProductController::class,'show']);

// Basket URLS
Route::get('/basket', [BasketController::class,'show'])->middleware('auth');
//Store product in basket
Route::post('/basket/{product_id}', [BasketController::class,'store'])->middleware('auth');
// Delete product from basket
Route::delete('/basket/{basket}', [BasketController::class,'destroy'])->name('basket.destroy');

// Checkout URLS
Route::get('/checkout', [CheckoutController::class,'show']);
Route::post('/checkout/success', [OrderController::class,'store'])->name('checkout.store')->middleware('auth');

//Store single review
Route::post('/review/{product}', [ReviewController::class,'store'])->middleware('auth');
//Delete single review
Route::delete('/review/{review}', [ReviewController::class,'destroy']);
// search
Route::get('/products/search', [ProductController::class, 'search']);
//showcases products
Route::get('/products', [ProductController::class,'index'])->name('products.filter');

Route::view('/admin-panel', 'admin-panel');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin panel pages
Route::view('/admin-panel/orders', 'orders-admin');
Route::view('/admin-panel/tickets', 'tickets-admin');
Route::view('/admin-panel/users', 'users-admin');
Route::view('/admin-panel/inventory', 'inventory');

//user panel pages
Route::view('/user-panel/tickets', 'tickets-user');
Route::view('/user-panel/user-panel', 'user-panel');
Route::get('/user-panel', [App\Http\Controllers\UserPanelController::class, 'show'])->name('user-panel')->middleware('auth');
Route::get('/user/purchases', [App\Http\Controllers\OrderController::class, 'show'])->name('user.purchases')->middleware('auth');
Route::get('/user/purchases/view/{order}', [App\Http\Controllers\OrderController::class, 'showOrderProducts'])->name('user.view-purchase')->middleware('auth');
Route::get('/user/purchases/return/{order}/{product}', [App\Http\Controllers\OrderController::class, 'returnOrder'])->name('user.return-purchase')->middleware('auth');

// Display categories

Route::get('/categories', [CategoryController::class, 'getCategories']);
//Display three random categories and products on home page
Auth::routes();
Route::get('/', [ProductController::class, 'getThreeRandom']);

Route::get('/password/change', [App\Http\Controllers\ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change.form');
Route::post('/password/change', [App\Http\Controllers\ChangePasswordController::class, 'changePassword'])->name('password.change');
