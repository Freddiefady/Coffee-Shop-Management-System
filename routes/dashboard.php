<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/dashoard', HomeController::class)->name('admin.home')->middleware('auth:admin');

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
], function() {
    Route::get('/login', [AuthController::class, 'index'])->name('index');
    Route::post('/loggin', [AuthController::class, 'store'])->name('store');
    Route::post('/login', [AuthController::class, 'destroy'])->name('destroy');

});
