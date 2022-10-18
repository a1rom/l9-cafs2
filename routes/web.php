<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

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
    return view('home');
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::prefix('/contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/', [ContactController::class, 'store'])->name('contact.store');
});

Route::prefix('/orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/{order}', [OrderController::class, 'show'])->name('orders.show');
});

Route::controller(QueryController::class)->group(function () {
    Route::get('/query-count', 'queryCountProducts')->name('query.all');
    Route::get('/query-by-name', 'allProductsSortedByName')->name('query.byName');
    Route::get('/query-active', 'queryActiveProductsLimitByThreeFromEnd')->name('query.active');
    Route::get('/query-orders', 'selectTwoFirstOrdersAndCountNumberOfProducts')->name('query.orders');
});
