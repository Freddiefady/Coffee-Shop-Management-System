<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function __invoke(BookingRequest $request)
    {
        DB::transaction(function ()  use ($request){
            Booking::create($request->validated());
        });

        return redirect()->back()->with('success', 'you booked now successfully!');
    }
}
