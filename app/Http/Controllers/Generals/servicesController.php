<?php

namespace App\Http\Controllers\Generals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class servicesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('general.services');
    }
}
