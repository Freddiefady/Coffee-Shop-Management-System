<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\CartController;
use App\Http\Controllers\Product\CheckoutController;
use App\Http\Controllers\Product\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/single-product/{name}', ProductController::class)->name('product-single');
// This route handles the cart functionality
Route::group([
    'prefix' => 'cart',
    'as' => 'cart.',
    'controller' => CartController::class,
    'middleware' => 'auth'
    ],function () {
    Route::get('/', 'index')->name('index');
    Route::post('/{id}', 'store')->name('store');
    Route::get('/delete/{id}', 'destroy')->name('destroy');
});

Route::group([
    'prefix' => '/checkout',
    'as' => 'checkout.',
    'controller' => CheckoutController::class,
   
    ],function () {
        Route::get('/', 'index')->name('index');
        Route::post('/prepare', 'store')->name('store');
        Route::post('/prepare', 'progress')->name('process');

        Route::get('/pay', 'pay')->name('pay');
        Route::get('/success', 'success')->name('pay.success');
});
