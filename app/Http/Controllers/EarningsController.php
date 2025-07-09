<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EarningsController extends Controller
{
    public function index(Request $reqest) {
        return view('dashboard.my-earnings');
    }
}
