<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\admins\AdminController;
use App\Http\Controllers\Dashboard\Booking\BookingController;
use App\Http\Controllers\Dashboard\Orders\OrderController;
use App\Http\Controllers\Dashboard\Products\ProductController;

Route::group([
    'prefix' => '/admin',
    'middleware' => 'auth:admin',
], function() {
    Route::get('/home', HomeController::class)->name('admin.home');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('admin.logout');

    Route::resource('/admins', AdminController::class)
            ->only(['index', 'create', 'store']);

    Route::resource('/orders', OrderController::class)
            ->only(['index', 'edit', 'update', 'destroy']);

    Route::resource('/products', ProductController::class)
            ->only(['index', 'create', 'store', 'destroy']);

    Route::resource('/booked-up', BookingController::class)
            ->only(['index', 'edit', 'update', 'destroy']);

});

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
    'controller' => AuthController::class,
    'middleware' => 'guest:admin',
], function() {
    Route::get('/login', 'index')->name('index');
    Route::post('/loggin', 'store')->name('store');
});
