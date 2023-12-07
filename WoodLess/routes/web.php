<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserPanelController;
use App\Http\Controllers\ChangePasswordController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/about', 'about');

Route::view('/categories', 'categories');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');

//Display single product
Route::get('/product/{product}', [ProductController::class,'show']);

// Basket URLS
Route::get('/basket', [BasketController::class,'show'])->middleware('auth');
//Store product in basket
Route::post('/basket/{product}', [BasketController::class,'store'])->middleware('auth');
// Delete product from basket
Route::delete('/basket/{basket}', [BasketController::class,'destroy'])->name('basket.destroy');

//Store single review
Route::post('/review/{product}', [ReviewController::class,'store'])->middleware('auth');
//Delete single review
Route::delete('/review/{review}', [ReviewController::class,'destroy']);

Route::get('/products', [ProductController::class,'index']);

Route::view('/admin-panel', 'admin-panel');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

// User panel links
Route::get('/user-panel', [App\Http\Controllers\UserPanelController::class, 'show'])->name('user-panel')->middleware('auth');

Route::get('/password/change', [App\Http\Controllers\ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change.form');
Route::post('/password/change', [App\Http\Controllers\ChangePasswordController::class, 'changePassword'])->name('password.change');
