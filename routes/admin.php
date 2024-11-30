<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/admin/login', [AdminController::class, 'index'])->name('admin.auth.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.auth.login');

Route::get('/home', [HomeController::class, 'home'])->name('home');


// login use google

Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);






Route::middleware('auth:sanctum')->group(function(){

// ###############  Categories table #####################
Route::prefix('categories')->group(function () {
    Route::get('index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

################ End categories #########################

################### Products ########################

Route::prefix('products')->group(function () {
    Route::get('index', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('products.show');

    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // View Products in front
    Route::get('/products_details/{id}', [HomeController::class, 'products_details'])->name('products_details');

    // routes/web.php
Route::post('/products/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');

    Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');
    Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove_cart');

    Route::get('/product.search', [HomeController::class, 'product.search'])->name('product.search');


    Route::get('/product', [ProductController::class, 'product'])->name('product');

});
################### End Products ##########################3

#################### Start Order Table #####################
Route::prefix('orders')->group(function(){

    Route::get('/cash_order',[OrderController::class, 'cash_order'])->name('cash_order');
    Route::get('showall', [OrderController::class, 'showall'])->name('order.showall');
    Route::get('delivered/{id}', [OrderController::class, 'delivered'])->name('order.delivered');
    Route::get('print_pdf/{id}', [OrderController::class, 'print_pdf'])->name('order.print_pdf');
    Route::get('/orders/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
    // Route::get('/show/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/send_email/{id}', [OrderController::class, 'send_email'])->name('send_email');
    Route::post('/send_user_email/{id}', [OrderController::class, 'send_user_email'])->name('send_user_email');

    Route::get('/show_order', [OrderController::class, 'show_order'])->name('show_order');
    Route::get('/cancel_order/{id}', [OrderController::class, 'cancel_order'])->name('cancel_order');


    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

 Route::get('MarkAsRead_all',[OrderController::class,'MarkAsRead_all'])->name('MarkAsRead_all');

});

############################################################

Route::prefix('users')->group(function(){
    Route::get('index', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});


Route::prefix('contact_us')->group(function(){
  Route::get('/contact_us',[ContactUsController::class, 'index'])->name('contact.index');
  Route::get('/contact_us/{id}',[ContactUsController::class, 'show'])->name('contact.show');
  Route::delete('/contact_us/{id}',[ContactUsController::class, 'destroy'])->name('contact.destroy');
  Route::post('/contact_us', [ContactUsController::class, 'store'])->name('contact.send');

});


});
Route::prefix('permissions')->group(function(){
Route::get('index', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/show/{id}', [UserController::class, 'show'])->name('admin.users.show');
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/{id}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});


Route::prefix('roles')->group(function(){
    Route::get('index', [RoleController::class, 'index'])->name('admin.role.index');
    Route::get('/create', [RoleController::class, 'create'])->name('admin.role.create');
    Route::post('/store', [RoleController::class, 'store'])->name('admin.role.store');
    Route::get('/show/{id}', [RoleController::class, 'show'])->name('admin.role.show');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
    Route::put('/{id}', [RoleController::class, 'update'])->name('admin.role.update');
    Route::delete('/destroy/{id}', [RoleController::class, 'destroy'])->name('admin.role.destroy');
});









Auth::routes();

Route::get('/{page}', [AdminController::class,'index']);
