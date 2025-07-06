<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $name)
    {
        $product = Product::whereName($name)->firstOrFail();

        $relatedProducts = Product::where('type', $product->type)
        ->where('name', '!=', $name)->take(4)
        ->orderBy('id', 'desc')
        ->get();

        return view('products.single-product', compact('product', 'relatedProducts'));
    }
}
