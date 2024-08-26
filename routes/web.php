<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctoersController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth','verified')->group(function(){

        ################## Start Questions ################
        Route::prefix('questions')->group(function(){
            Route::get('/index',[QuestionsController::class,'index'])->name('admin.Question.index');
            Route::get('/create',[QuestionsController::class,'create'])->name('admin.Question.create');
            Route::post('/questions',[QuestionsController::class,'store'])->name('admin.Question.store');
            Route::get('show/{id}',[QuestionsController::class,'show'])->name('admin.Question.show');
            Route::get('questions/edit/{id}', [QuestionsController::class, 'edit'])->name('admin.Question.edit');
            Route::post('questions/update/{id}', [QuestionsController::class, 'update'])->name('admin.Question.update');
            Route::get('destroy/{id}',[QuestionsController::class,'destroy'])->name('admin.Question.delete');
        });
######################### End Questions Table ###################

 ################## Start User Table ###################

 Route::prefix('users')->group(function(){
    Route::get('/index',[UserController::class,'index'])->name('admin.users.index');
    Route::get('/create',[UserController::class,'create'])->name('admin.users.create');
    Route::post('/users',[UserController::class,'store'])->name('admin.users.store');
    Route::get('show/{id}',[UserController::class,'show'])->name('admin.users.show');
    Route::get('edit/{id}', [UserController::class,'edit'])->name('admin.users.edit');
    Route::post('update/{id}',[UserController::class,'update'])->name('admin.users.update');
    Route::get('destroy/{id}',[UserController::class,'destroy'])->name('admin.users.delete');
    Route::get('changStatus/{id}',[UserController::class,'changStatus'])->name('admin.users.changStatus');
});
################ End User Table #########################

################## Start Reports Table ####################
Route::prefix('reports')->group(function(){
    Route::get('/index',[ReportsController::class,'index'])->name('admin.reports.index');
    Route::get('/create',[ReportsController::class,'create'])->name('admin.reports.create');
    Route::post('/store', [ReportsController::class, 'store'])->name('admin.reports.store');
    Route::get('show/{id}',[ReportsController::class,'show'])->name('admin.reports.show');
    Route::get('reports/edit/{id}', [ReportsController::class, 'edit'])->name('admin.reports.edit');
    Route::post('reports/update/{id}', [ReportsController::class, 'update'])->name('admin.reports.update');
    Route::get('destroy/{id}',[ReportsController::class,'destroy'])->name('admin.reports.delete');
});
################### End The Reports Table ######################

################## Start supplies Table #######################
Route::prefix('supplies')->group(function(){
    Route::get('/index',[SuppliesController::class,'index'])->name('admin.supplies.index');
    Route::get('/create',[SuppliesController::class,'create'])->name('admin.supplies.create');
    Route::post('/supplies', [SuppliesController::class, 'store'])->name('admin.supplies.store');
    Route::get('show/{id}',[SuppliesController::class,'show'])->name('admin.supplies.show');
    Route::get('supplies/edit/{id}', [SuppliesController::class, 'edit'])->name('admin.supplies.edit');
    Route::post('supplies/update/{id}', [SuppliesController::class, 'update'])->name('admin.supplies.update');
    Route::get('destroy/{id}',[SuppliesController::class,'destroy'])->name('admin.supplies.delete');
});

###################### End supplies Table ###################

###################### Start Doctoer Table #################
Route::prefix('doctoers')->group(function(){
    Route::get('/index',[DoctoersController::class,'index'])->name('admin.doctoers.index');
    Route::get('/create',[DoctoersController::class,'create'])->name('admin.doctoers.create');
    Route::post('/doctoers', [DoctoersController::class, 'store'])->name('admin.doctoers.store');
    Route::get('doctoers/edit/{id}', [DoctoersController::class, 'edit'])->name('admin.doctoers.edit');
    Route::post('doctoers/update/{id}', [DoctoersController::class, 'update'])->name('admin.doctoers.update');

    Route::get('destroy/{id}',[DoctoersController::class,'destroy'])->name('admin.doctoers.delete');
});

#################### End Doctoer Table ######################
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/{page}', [AdminController::class,'index']);
