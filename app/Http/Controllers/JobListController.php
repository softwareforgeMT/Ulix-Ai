<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobListController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.provider.jobs.job-list');
    }

    public function viewJob(Request $request) {
        return view('dashboard.provider.jobs.view-job');
    }

    public function quoteOffer(Request $request) {
        return view('dashboard.provider.jobs.quote-offer');
    }
}
