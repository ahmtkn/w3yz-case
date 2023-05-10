<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'post', 'as' => 'post.'], function (){
    Route::get('/', [\App\Http\Controllers\PostController::class,'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\PostController::class,'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\PostController::class,'store'])->name('store');

    Route::group(['prefix' => '{post}'], function () {
        Route::get('edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('edit');
        Route::post('/', [\App\Http\Controllers\PostController::class, 'update'])->name('update');
        Route::get('/', [\App\Http\Controllers\PostController::class, 'destroy'])->name('destroy');
    });
});

Route::group(['prefix' => 'category', 'as' => 'category.'], function (){
    Route::get('/', [\App\Http\Controllers\CategoryController::class,'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\CategoryController::class,'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\CategoryController::class,'store'])->name('store');

    Route::group(['prefix' => '{category}'], function () {
        Route::get('edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('edit');
        Route::post('/', [\App\Http\Controllers\CategoryController::class, 'update'])->name('update');
        Route::get('/', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('destroy');
    });
});
