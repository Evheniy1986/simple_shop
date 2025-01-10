<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\OptionProductController;
use App\Http\Controllers\Admin\OptionValueController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/categories', [\App\Http\Controllers\Front\CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [\App\Http\Controllers\Front\CategoryController::class, 'show'])->name('categories.show');
Route::get('products/{product}', [\App\Http\Controllers\Front\ProductController::class, 'show'])->name('product.show');
Route::get('get-brands/{categoryId}', [BrandController::class, 'getBrand'])->name('getBrand');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', \App\Http\Controllers\Admin\MainController::class)->name('index');
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::get('products/{product}/values/create', [OptionProductController::class, 'create'])->name('values.create');
    Route::get('products/{product}/property-options/create', [PropertyProductController::class, 'create'])->name('property_products.create');
    Route::post('products/{product}/values', [OptionProductController::class, 'store'])->name('values.store');
    Route::post('products/{product}/property-options', [PropertyProductController::class, 'store'])->name('property_products.store');
    Route::get('products/{product}/values/edit', [OptionProductController::class, 'edit'])->name('values.edit');
    Route::get('products/{product}/property-options/edit', [PropertyProductController::class, 'edit'])->name('property_products.edit');
    Route::put('products/{product}/values/update', [OptionProductController::class, 'update'])->name('values.update');
    Route::put('products/{product}/property-options/update', [PropertyProductController::class, 'update'])->name('property_products.update');
    Route::get('products/{product}/values/delete', [OptionProductController::class, 'destroy'])->name('values.destroy');
    Route::get('products/{product}/property-options/delete', [PropertyProductController::class, 'destroy'])->name('property_products.destroy');
    Route::resource('properties', PropertyController::class);
    Route::resource('options', OptionController::class);
    Route::resource('option-values', OptionValueController::class);

});



Route::prefix('basket')->group(function () {
    Route::post('add-to-cart', [CartController::class, 'addTooCart'])->name('basket.add');
    Route::get('/', [CartController::class, 'index'])->name('basket.show');
    Route::post('add-quantity', [CartController::class, 'addQuantity'])->name('basket.addQuantity');
    Route::post('remove-quantity', [CartController::class, 'removeQuantity'])->name('basket.removeQuantity');
    Route::get('form', [CartController::class, 'basketForm'])->name('basket.form');
    Route::post('form', [CartController::class, 'confirmCart'])->name('confirm.cart');
});


require __DIR__.'/auth.php';
