<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Dashboard\Auth\LoginAdminRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {
        return view('dashboard.auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth('admin')->attempt($credentials, $request?->remember_me)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.home'))->with('success', __('auth.login_message'));
        } else {
            return redirect()->back()->with('error', __('auth.not_match'));
        }
    }

    public function destroy()
    {
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return to_route('admin.index')->with('success', __('auth.logout_message'));
    }
}
