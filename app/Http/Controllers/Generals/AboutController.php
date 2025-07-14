<?php

namespace App\Http\Controllers\Generals;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $reviews = Review::latest()->limit(4)->get();
        $imageMenu = Product::whereType('drinks')->limit(4)->latest()->get();

       return view('general.about', compact('reviews', 'imageMenu'));
    }
}
