<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    // Route::get('/create', 'ProductController@create')->name('products.create');
    // Route::post('/', 'ProductController@store')->name('products.store');
    Route::get('/{product}', 'ProductController@show')->name('products.show');
    // Route::get('/{product}/edit', 'ProductController@edit')->name('products.edit');
    // Route::put('/{product}', 'ProductController@update')->name('products.update');
    // Route::delete('/{product}', 'ProductController@destroy')->name('products.destroy');
});
