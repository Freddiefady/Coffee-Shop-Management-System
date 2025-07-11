<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return view('checkout.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $value = $request->input('price');
        $price = Session::put(key: 'price', value: $value);
        $newPrice = Session::get($price);

        if ($newPrice <= 0) {
            return redirect()->back()->with('error', 'You cannot proceed to checkout with a zero or negative price.');
        }

        return redirect()->back()->with('success', 'Checkout successful!');
    }

    public function progress(OrderRequest $request)
    {
        Order::Create($request->validated());

        return view('checkout.pay')->with('success', 'Order placed successfully!');
    }

    public function pay()
    {
        return view('checkout.pay');
    }

    public function success()
    {
        $deletedItems = Cart::where('user_id', auth()->id())->delete();
        // Check if items were deleted successfully
        if ($deletedItems) {
            Session::forget('price'); // Clear the price session variable
            return view('checkout.success')->with('success', 'Order placed successfully!');
        }
    }
}
