<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

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
Route::get('/basket', [BasketController::class,'show']);
//Store product in basket
Route::post('/basket/{product}', [BasketController::class,'store']);
// Delete product from basket
Route::delete('/basket/{basket}', [BasketController::class,'destroy'])->name('basket.destroy');

//Store single review
Route::post('/review/{product}', [ReviewController::class,'store']);
//Delete single review
Route::delete('/review/{review}', [ReviewController::class,'destroy']);

Route::get('/products', [ProductController::class,'index']);

Route::view('/admin-panel', 'admin-panel');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
