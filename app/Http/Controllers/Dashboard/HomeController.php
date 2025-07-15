<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\{Admin, Product, Order, Booking};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $productCount = Product::count();
        $OrderCount = Order::count();
        $BookingCount = Booking::count();
        $AdminCount = Admin::count();
        
        return view('dashboard.home',
        compact('productCount', 'OrderCount', 'BookingCount', 'AdminCount'));
    }
}
