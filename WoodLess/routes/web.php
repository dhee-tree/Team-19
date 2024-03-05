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
use App\Http\Controllers\EmailVerificationController;
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


Route::view('/about', 'about')->name("about-us");
Route::get('/verify/{code}', [EmailVerificationController::class, 'verifyUserEmail'])->name('user.verify');

Route::view('/categories', 'categories');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');

//Display single product
Route::get('/product/{product_id}', [ProductController::class, 'show']);

// Basket URLS
Route::get('/basket', [BasketController::class, 'show'])->middleware('auth');
//Store product in basket
Route::post('/basket/{product_id}', [BasketController::class, 'store'])->middleware('auth');
// Delete product from basket
Route::delete('/basket/{basket}', [BasketController::class, 'destroy'])->name('basket.destroy');
// Update product in basket
Route::put('/update-basket/{basket}', [BasketController::class, 'update'])->name('basket.update');

// Checkout URLS
Route::get('/checkout', [CheckoutController::class, 'show'])->middleware('auth');
Route::post('/checkout/success', [OrderController::class, 'store'])->name('checkout.store')->middleware('auth');

//Store single review
Route::post('/review/{product}', [ReviewController::class, 'store'])->middleware('auth');
//Delete single review
Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->middleware('auth');
// search
Route::get('/products/search', [ProductController::class, 'search']);
//showcases products
Route::get('/products', [ProductController::class, 'index'])->name('products.filter');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::view('/admin-panel', 'admin-panel')->middleware('admin');;
//admin panel pages

#region admin panel warehouses / categories

Route::view('/admin-panel/warehouse', 'warehouse-admin')->middleware('admin');



#endregion

#region admin panel orders

Route::get('/admin-panel/orders', [AdminController::class, 'orders'])->name('admin-panel-orders')->middleware('admin');

Route::get('/admin-panel/orders/info/{id}', [AdminController::class, 'OrderInfo'])->name('order-info')->middleware('admin');

Route::post('/admin-panel/orders/accept/{id}', [OrderController::class, 'OrderAccept'])->name('order-accept')->middleware('admin');

Route::post('/admin-panel/return/accept/{id}/{productids}', [OrderController::class, 'AcceptReturn'])->name('admin.order.accept-return')->middleware('admin');
Route::post('/admin-panel/return/cancel/{id}/{productids}', [OrderController::class, 'CancelReturn'])->name('admin.order.cancel-return')->middleware('admin');


Route::post('/admin-panel/orders/details/{id}', [AdminController::class, 'OrderDetails'])->name('order-details')->middleware('admin');


#endregion


#region admin panel tickets

Route::get('/admin-panel/tickets', [AdminController::class, 'tickets'])->name('admin-panel.tickets')->middleware('admin');

Route::get('', [AdminController::class, 'tickets'])->name('admin-panel.tickets')->middleware('admin');

Route::get('/admin-panel/tickets/info/{id}', [AdminController::class, 'TicketInfo'])->name('ticket-info')->middleware('admin');

//The additional information modal to expand fields in tickets for user or admin that claimed a ticket admin panel
Route::get('/admin-panel/tickets/user-info/{id}', [AdminController::class, 'UserInfo'])->name('components.user-info')->middleware('admin');

//used to claim a ticket
Route::post('/admin-panel/tickets/claim/{id}', [AdminController::class, 'TicketClaim'])->name('ticket-claim')->middleware('admin');
//used to resolve a ticket
Route::get('/admin-panel/tickets/admin-resolve/{id}', [AdminController::class, 'TicketResolve'])->name('ticket-resolve')->middleware('admin');
//used to delete a ticket
Route::post('/admin-panel/tickets/delete/{id}', [AdminController::class, 'TicketDelete'])->name('ticket-delete')->middleware('admin');


#endregion

#region admin panel inventory

Route::get('/admin-panel/inventory', [AdminController::class, 'inventory'])->name('admin-panel.inventory')->middleware('admin');

//The additional information modal to expand fields in inventory managment
Route::get('/admin-panel/inventory/product-info/{id}', [AdminController::class, 'ProductInfo'])->name('components.products-info')->middleware('admin');
//editing the products modal
Route::get('/admin-panel/inventory/product-edit/{id}', [AdminController::class, 'ProductEdit'])->name('components.products-edit')->middleware('admin');
//The modal to open the add modal for products
Route::get('/admin-panel/inventory/product-add', [AdminController::class, 'ProductAdd'])->name('components.products-add')->middleware('admin');
//stores products, either edits or creates a new ones
Route::post('/admin-panel/inventory/store/{id}', [AdminController::class, 'ProductStore'])->name('product-store')->middleware('admin');
//stores products, either edits or creates a new ones
Route::post('/admin-panel/inventory/delete/{id}', [AdminController::class, 'ProductDelete'])->name('product-delete')->middleware('admin');

#endregion


#region admin panel users

Route::get('/admin-panel/users', [AdminController::class, 'users'])->name('admin-panel.users')->middleware('admin');

//The additional information modal to expand fields in user admin panel
Route::get('/admin-panel/users/user-info/{id}', [AdminController::class, 'UserInfo'])->name('components.user-info')->middleware('admin');
//Used to edit the user
Route::get('/admin-panel/users/user-edit/{id}', [AdminController::class, 'UserEdit'])->name('components.user-edit')->middleware('admin');
//create a user
Route::get('/admin-panel/users/user-add', [AdminController::class, 'UserAdd'])->name('components.user-add')->middleware('admin');
//stores products, either edits or creates a new ones
Route::post('/admin-panel/users/user-store/{id}', [AdminController::class, 'UserStore'])->name('user-store')->middleware('admin'); //saving to database, either edited or a new product
//deletes the user
Route::post('/admin-panel/users/delete/{id}', [AdminController::class, 'UserDelete'])->name('user-delete')->middleware('admin');

#endregion

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
