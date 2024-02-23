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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;

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
// Update product in basket
Route::put('/update-basket/{basket}', [BasketController::class,'update'])->name('basket.update');

// Checkout URLS
Route::get('/checkout', [CheckoutController::class,'show']);
Route::post('/checkout/success', [OrderController::class,'store'])->name('checkout.store')->middleware('auth');

//Store single review
Route::post('/review/{product}', [ReviewController::class,'store'])->middleware('auth');
//Delete single review
Route::delete('/review/{review}', [ReviewController::class,'destroy'])->middleware('auth');
// search
Route::get('/products/search', [ProductController::class, 'search']);
//showcases products
Route::get('/products', [ProductController::class,'index'])->name('products.filter');

Route::view('/admin-panel', 'admin-panel');


Route::get('/home', [HomeController::class, 'index'])->name('home');

//admin panel pages
Route::view('/admin-panel/orders', 'orders-admin');
Route::view('/admin-panel/tickets', 'tickets-admin');
Route::get('/admin-panel/users', [AdminController::class,'users'])->name('admin-panel.users');

Route::get('/admin-panel/inventory', [AdminController::class,'inventory'])->name('admin-panel.inventory');

//The additional information modal to expand fields in inventory managment
Route::get('/admin-panel/inventory/product-info/{id}', [AdminController::class,'ProductInfo'])->name('components.products-info');
//editing the products modal
Route::get('/admin-panel/inventory/product-edit/{id}', [AdminController::class,'ProductEdit'])->name('components.products-edit');
//The modal to open the add modal for products
Route::get('/admin-panel/inventory/product-add', [AdminController::class,'ProductAdd'])->name('components.products-add');
//stores products, either edits or creates a new ones
Route::post('/admin-panel/inventory/store/{id}', [AdminController::class,'ProductStore'])->name('product-store');
//stores products, either edits or creates a new ones
Route::post('/admin-panel/inventory/delete/{id}', [AdminController::class,'ProductDelete'])->name('product-delete');;
//The additional information modal to expand fields in user admin panel
Route::get('/admin-panel/users/user-info/{id}', [AdminController::class,'UserInfo'])->name('components.user-info');//saving to database, either edited or a new product
//Used to edit the user
Route::get('/admin-panel/users/user-edit/{id}', [AdminController::class,'UserEdit'])->name('components.user-edit');//saving to database, either edited or a new product
//stores products, either edits or creates a new ones
Route::post('/admin-panel/users/user-store/{id}', [AdminController::class,'UserStore'])->name('user-store');

//user panel pages
Route::get('/user-panel', [App\Http\Controllers\UserPanelController::class, 'show'])->name('user-panel')->middleware('auth');
Route::get('/user-panel/tickets', [TicketController::class, 'show'])->name('user.tickets')->middleware('auth');
Route::post('/user-panel/tickets', [TicketController::class, 'store'])->name('user.tickets.store')->middleware('auth');
Route::get('/user-panel/tickets/{id}', [TicketController::class, 'view'])->name('user.tickets.view')->middleware('auth');
Route::get('/user-panel/details', [App\Http\Controllers\UserPanelController::class, 'showDetails'])->name('user-details')->middleware('auth');
Route::put('/user-panel/details/update/{id}', [App\Http\Controllers\UserPanelController::class, 'update'])->name('user-details.update')->middleware('auth');
Route::get('/user-panel/purchases', [App\Http\Controllers\OrderController::class, 'show'])->name('user.purchases')->middleware('auth');
Route::get('/user-panel/purchases/view/{order}', [App\Http\Controllers\OrderController::class, 'showOrderProducts'])->name('user.view-purchase')->middleware('auth');
Route::get('/user-panel/purchases/return/{order}/{product}', [App\Http\Controllers\OrderController::class, 'returnOrderItem'])->name('user.return-purchase')->middleware('auth');
Route::get('/user-panel/purchases/cancel-return/{order}/{product}', [App\Http\Controllers\OrderController::class, 'cancelReturnOrderItem'])->name('user.cancel-return-purchase')->middleware('auth');

// Display categories

Route::get('/categories', [CategoryController::class, 'getCategories']);
//Display three random categories and products on home page
Auth::routes();
Route::get('/', [ProductController::class, 'getThreeRandom']);

Route::get('/password/change', [App\Http\Controllers\ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change.form');
Route::post('/password/change', [App\Http\Controllers\ChangePasswordController::class, 'changePassword'])->name('password.change');
