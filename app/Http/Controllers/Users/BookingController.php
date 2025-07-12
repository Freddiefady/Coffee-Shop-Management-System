<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderByDesc('id')
            ->where('user_id', request()->user()->id)
            ->get();

        return view('users.booking', compact('bookings'));
    }

    /**
     * Handle the incoming request.
     */
   public function store(BookingRequest $request)
    {
        DB::transaction(function ()  use ($request){
            Booking::create($request->validated());
        });

        return redirect()->back()->with('success', 'you booked now successfully!');
    }
}
