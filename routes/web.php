<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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
Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/categories', [\App\Http\Controllers\Front\CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [\App\Http\Controllers\Front\CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/products/{product}', [\App\Http\Controllers\Front\ProductController::class, 'show'])->name('product.show');

Route::prefix('admin')-> name('admin.')->group(function () {
    Route::get('/', \App\Http\Controllers\MainController::class)->name('index');
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});


