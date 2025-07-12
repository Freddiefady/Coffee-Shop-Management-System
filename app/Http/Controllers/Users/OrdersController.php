<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $orders = Order::orderByDesc('id')
            ->where('user_id', $request->user()->id)
            ->get();

        return view('users.orders', compact('orders'));
    }
}
