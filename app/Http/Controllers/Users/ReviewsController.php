<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        return view('users.reviews.index');
    }

    public function store(ReviewRequest $request)
    {
        Review::create($request->validated());
        return redirect()->back()->with('success', 'Review created successfully');
    }
}
