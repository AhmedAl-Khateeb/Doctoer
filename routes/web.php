<?php

use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FrontController;
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
    return view('front.user');
});

Route::get('/user/home', [FrontController::class, 'index'])->name('front.user');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/home', [FrontController::class, 'index'])->name('front.user');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact_us', [ContactUsController::class, 'store'])->name('contact.send');


Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead']);

Route::post('/process-order', [OrderController::class, 'processOrder']);
Route::post('/notifications/delete-all', [NotificationController::class, 'deleteAll'])->name('notifications.deleteAll');

Route::post('/send-notification', [NotificationController::class, 'sendNotification']);

Route::get('/notifications/count', [NotificationController::class, 'getNotificationCount']);






Route::get('/index', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'home'])->name('home');


Auth::routes();



Route::get('/{page}', [AdminController::class,'index']);
