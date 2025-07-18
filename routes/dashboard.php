<?php

use App\Http\Controllers\Dashboard\admins\AdminController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\Orders\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/home', HomeController::class)->name('admin.home')->middleware('auth:admin');

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
    'controller' => AuthController::class,
], function() {
    Route::get('/login', 'index')->name('index');
    Route::post('/loggin', 'store')->name('store');
    Route::post('/logout', 'destroy')->name('logout');

});

Route::resource('/admin/admins', AdminController::class)
        ->only(['index', 'create', 'store']);

Route::resource('/admin/orders', OrderController::class)
        ->only(['index', 'edit', 'update','destroy']);
