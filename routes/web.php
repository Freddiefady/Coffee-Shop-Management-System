<?php

use App\Http\Controllers\Generals\AboutController;
use App\Http\Controllers\Generals\ContactController;
use App\Http\Controllers\Generals\servicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Users\BookingController;
use App\Http\Controllers\Product\CartController;
use App\Http\Controllers\Users\OrdersController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CheckoutController;
use App\Http\Controllers\Users\ReviewsController;

Auth::routes();

Route::group([
    'middleware' => 'auth'
], function ()
{
    //? Generals
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/services', servicesController::class)->name('services');
    Route::get('/about', AboutController::class)->name('about');
    Route::get('/contact', ContactController::class)->name('contact');

    Route::get('/single-product/{name}', ProductController::class)->name('product-single');

    // This route handles the cart functionality
    Route::group([
        'prefix' => 'cart',
        'as' => 'cart.',
        'controller' => CartController::class,
    ], function ()
    {
        Route::get('/', 'index')->name('index');
        Route::post('/{id}', 'store')->name('store');
        Route::get('/delete/{id}', 'destroy')->name('destroy');
    });

    Route::group([
        'prefix' => '/checkout',
        'as' => 'checkout.',
        'controller' => CheckoutController::class,
    ], function ()
    {
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
    //? write reviews for users
    Route::get('/user/reviews', [ReviewsController::class, 'index'])->name('review.index');
    Route::post('/user/reviews', [ReviewsController::class, 'store'])->name('review.store');
});
