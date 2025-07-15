<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [__DIR__.'/../routes/web.php',
            __DIR__.'/../routes/dashboard.php'],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append([
            \App\Http\Middleware\CheckForPrice::class,
        ]);
        $middleware->redirectGuestsTo(function(){
            if(request()->is('admin/*')) {
                return route('admin.index');
            } else {
                return route('login');
            }
        });
        $middleware->redirectUsersTo(function(){
            if (auth('admin')->check()) {
                return route('admin.home');
            } else {
                return route('home');
            }
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
