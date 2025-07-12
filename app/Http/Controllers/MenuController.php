<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $drinks = Product::select()->whereType('drinks')
                ->orderBy('id', 'desc')
                ->limit(4)
                ->get();

        $desserts = Product::select()->whereType('desserts')
                ->orderBy('id', 'desc')
                ->limit(4)
                ->get();

        return view('menu.index', compact('drinks', 'desserts'));
    }
}
