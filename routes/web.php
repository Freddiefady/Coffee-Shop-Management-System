<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Users\BookingController;
use App\Http\Controllers\Product\CartController;
use App\Http\Controllers\Users\OrdersController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CheckoutController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/single-product/{name}', ProductController::class)->name('product-single')
    ->middleware('auth');
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
    'middleware' => 'auth'
    ],function () {
        Route::get('/', 'index')->name('index');
        Route::post('/preparee', 'store')->name('store');
        Route::post('/prepare', 'progress')->name('process');

        Route::get('/pay', 'pay')->name('pay');
        Route::get('/success', 'success')->name('pay.success');
    });
    //? Booking functionlity
    Route::get('/user/booking', [BookingController::class, 'index'])->name('user.booking.index');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    //? Menu functionality
    Route::get('/menu', MenuController::class)->name('menu.index');
    //? Order's User functionality
    Route::get('/user/orders', OrdersController::class)->name('user.orders');
