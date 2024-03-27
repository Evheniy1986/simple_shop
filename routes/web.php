<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\PropertyOptionController;
use App\Http\Controllers\Admin\SkuController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ResetController;
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


Auth::routes();

Route::get('locale/{locale}', [MainController::class, 'changeLocale'])->name('locale');
Route::get('currency/{currencyCode}', [MainController::class, 'changeCurrency'])->name('currency');

Route::get('reset', [ResetController::class, 'reset'])->name('reset');

Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

Route::middleware('set_locale')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::prefix('person')->group(function () {
            Route::get('/orders', [\App\Http\Controllers\Person\OrderController::class, 'index'])->name('person.orders.index');
            Route::get('/orders/{order}', [\App\Http\Controllers\Person\OrderController::class, 'show'])->name('person.orders.show');
        });
        Route::middleware(['is_admin'])->prefix('admin')->group(function () {
            Route::get('/orders', [OrderController::class, 'index'])->name('home');
            Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

            Route::resource('categories', CategoryController::class);
            Route::resource('products', ProductController::class);
            Route::resource('products/{product}/skus', SkuController::class);
            Route::resource('properties', PropertyController::class);
            Route::resource('properties/{property}/property-options', PropertyOptionController::class);
        });
    });


    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/categories', [MainController::class, 'categories'])->name('categories');
    Route::post('/subscription/{sku}', [MainController::class, 'subscribe'])->name('subscription');

    Route::prefix('basket')->group(function () {
        Route::post('/add/{sku}', [BasketController::class, 'basketAdd'])->name('basket-add');

        Route::middleware('basket_not_empty')->group(function () {
            Route::get('/', [BasketController::class, 'basket'])->name('basket');
            Route::get('/place', [BasketController::class, 'basketPlace'])->name('basket-place');
            Route::post('/place', [BasketController::class, 'basketConfirm'])->name('basket-confirm');
            Route::post('/remove/{sku}', [BasketController::class, 'basketRemove'])->name('basket-remove');
        });
    });

    Route::get('/{category}', [MainController::class, 'category'])->name('category');
    Route::get('/{category}/{product}/{sku}', [MainController::class, 'product'])->name('product');
});




