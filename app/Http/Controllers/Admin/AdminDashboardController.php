<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $transactions = \App\Models\Transaction::with(['mission', 'provider'])->latest()->limit(20)->get();
        $providers = \App\Models\ServiceProvider::all();
        return view('admin.dashboard.index', compact('transactions', 'providers'));
    }

    public function users()
    {
        $users = User::orderByDesc('created_at')->paginate(20);
        return view('admin.dashboard.users', compact('users'));
    }

    public function secretLogin($id)
    {
        $user = User::findOrFail($id);
        // Store admin id for later restoration
        Session::put('admin_id', Auth::guard('admin')->id());
        Auth::logout();
        Auth::login($user);
        return redirect()->route('dashboard')->with('toast_success', 'You are now logged in as ' . $user->name);
    }

    public function restoreAdmin()
    {
        $adminId = Session::pull('admin_id');
        if ($adminId) {
            Auth::logout();
            Auth::guard('admin')->loginUsingId($adminId);
            return redirect()->route('admin.dashboard')->with('toast_success', 'Returned to admin account.');
        }
        return redirect()->route('login')->with('toast_error', 'Could not restore admin session.');
    }

    public function updateCommission(Request $request)
    {
        // Save to config or DB as needed
        // Example: config(['ulixai.fees.client' => $request->client_fee, ...]);
        // Or update a settings table
        // ...
        return back()->with('success', 'Commission rates updated!');
    }

    public function remindKyc($providerId)
    {
        // Send KYC reminder to provider/admin
        // ...
        return back()->with('success', 'KYC reminder sent!');
    }
}
