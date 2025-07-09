<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check() && Auth::user()) {
            return view('dashboard.dashboardindex', ['user' => Auth::user()]);
        }
        return redirect()->route('login')->with('toast_error', 'Please log in to access the dashboard.');
    }
}
