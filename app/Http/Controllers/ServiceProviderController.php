<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    public function serviceproviders(Request $request) {
        return view('dashboard.provider.service-providers');
    }

    public function providerDetails(Request $request) {
        return view('dashboard.provider.provider-details');
    }
}
