<?php

namespace App\Http\Controllers\Product;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    /**
     * Handle the view.
     */
    public function index()
    {
        // Fetch the user's cart items
        $carts = auth()->user()->carts()->with('product')->get();

        $totalPrice = $carts->sum(function ($cart) {
            return $cart->product->price;
        });

        return view('cart.cart', compact('carts' ,'totalPrice'));
    }
    /**
     * Handle the incoming request.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            auth('web')->user()->carts()->create([
                'product_id' => $request->product_id,
                'user_id' => auth('web')->id()
            ]);
        });

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Remove the specified item from the cart.
     */
    public function destroy(string $id): RedirectResponse
    {
        $cart = Cart::where('product_id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        $cart->delete();

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }
}
