<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ServiceProvider;

class ServiceProviderController extends Controller
{
    public function main(Request $request) {
        $providers = ServiceProvider::with(['user', 'reviews'])->latest()->get();
        return view('pages.index', compact('providers'));
    }
    
    public function serviceproviders(Request $request) {
        // Fetch all service providers with their user info
        $providers = ServiceProvider::with('user')->latest()->get();
        return view('dashboard.provider.service-providers', compact('providers'));
    }

    public function providerDetails(Request $request)
    {
        $id = $request->query('id') ?? $request->route('id');
        $provider = null;
        if ($id) {
            $provider = ServiceProvider::with('user')->find($id);
        }
        if (!$provider) {
            abort(404, 'Provider not found');
        }
        return view('dashboard.provider.provider-details', compact('provider'));
    }
}
