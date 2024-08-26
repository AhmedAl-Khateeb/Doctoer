<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\doctoerController;
use App\Http\Controllers\Api\questionsController;
use App\Http\Controllers\Api\reportController;
use App\Http\Controllers\Api\suppliesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route::middleware('auth:sanctum')->group( function () {
    Route::prefix('users')->group(function(){
        Route::get('/index',[AuthController::class,'index']);
        Route::post('/store',[AuthController::class,'store']);
        Route::get('show/{id}',[AuthController::class,'show']);
        Route::put('/update/{id}', [AuthController::class, 'update']);
        Route::delete('destroy/{id}',[AuthController::class,'destroy']);
    });

    Route::prefix('questions')->group(function(){
        Route::get('/index',[questionsController::class,'index']);
        Route::post('/store',[questionsController::class,'store']);
        Route::get('show/{id}',[questionsController::class,'show']);
        Route::put('/update/{id}', [questionsController::class, 'update']);
        Route::delete('destroy/{id}',[questionsController::class,'destroy']);
    });

    Route::prefix('reports')->group(function(){
        Route::get('/index',[reportController::class,'index']);
        Route::post('/store', [reportController::class, 'store']);
        Route::get('show/{id}',[reportController::class,'show']);
        Route::put('update/{id}', [reportController::class, 'update']);
        Route::delete('destroy/{id}',[reportController::class,'destroy']);
    });

    ################## Start supplies Table #######################
Route::prefix('supplies')->group(function(){
    Route::get('/index',[suppliesController::class,'index'])->name('admin.supplies.index');
    Route::post('/store', [suppliesController::class, 'store'])->name('admin.supplies.store');
    Route::get('show/{id}',[suppliesController::class,'show'])->name('admin.supplies.show');
    Route::post('/update/{id}', [suppliesController::class, 'update'])->name('admin.supplies.update');
    Route::get('destroy/{id}',[suppliesController::class,'destroy'])->name('admin.supplies.delete');
});

###################### End supplies Table ###################

###################### Start Doctoer Table #################
Route::prefix('doctoers')->group(function(){
    Route::get('/index',[doctoerController::class,'index']);
    Route::post('/doctoers', [doctoerController::class, 'store']);
    Route::get('show/{id}', [doctoerController::class, 'show']);
    Route::put('doctoers/update/{id}', [doctoerController::class, 'update']);
    Route::delete('destroy/{id}',[doctoerController::class,'destroy']);
});

// });
