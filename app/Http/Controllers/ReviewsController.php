<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function reviews(Request $request) {
        return view('dashboard.payments.reviews');
    }
    
    public function reviewUlysse(Request $request) {
        return view('dashboard.payments.review-ulysse');
    }

    public function reviewOptions(Request $request) {
        return view('dashboard.payments.review-options');
    }

    public function reviewEnd(Request $request) {
        return view('dashboard.payments.review-end');
    }
}
