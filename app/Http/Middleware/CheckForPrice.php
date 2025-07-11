<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckForPrice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the 'price' session variable is set
        if ($request->is('checkout/*') || $request->is('checkout')) {
            if (Session::get('price') == 0) {
                return abort(403, 'You cannot proceed to checkout with a zero or negative price.');
            }
        }
        return $next($request);
    }
}
