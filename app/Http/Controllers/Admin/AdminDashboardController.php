<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }
    
    public function secretLogin(Request $request, $id)
    {
        try {
            // Ensure admin is authenticated
            if (!auth()->guard('admin')->check()) {
                return redirect()->route('admin.login')->with('toast_error', 'Admin authentication required');
            }

            $user = \App\Models\User::findOrFail($id);
            $admin = auth()->guard('admin')->user();

            // Security check - only allow super admins or specific permissions
            // (You can adjust this logic as needed)
            if (method_exists($this, 'canImpersonate') && !$this->canImpersonate($admin, $user)) {
                return redirect()->back()->with('toast_error', 'Insufficient permissions to impersonate this user');
            }

            // Store admin id in session for restoration
            session(['admin_id' => $admin->id]);

            // Logout admin guard and login as user
            auth()->guard('admin')->logout();
            auth()->logout(); // logout any user guard
            auth()->login($user);

            // Mark impersonation in session
            session(['is_impersonating' => true]);

            return redirect('/dashboard')->with('toast_success', 'You are now impersonating ' . $user->name . ' (' . $user->email . ')');
        } catch (\Exception $e) {
            \Log::error('Admin impersonation failed', [
                'admin_id' => auth()->guard('admin')->id(),
                'target_user_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('toast_error', 'Failed to impersonate user: ' . $e->getMessage());
        }
    }

    public function restoreAdmin()
    {
        $adminId = session()->pull('admin_id');
        if ($adminId) {
            auth()->logout();
            auth()->guard('admin')->loginUsingId($adminId);
            session()->forget('is_impersonating');
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


    public function transactions()
    {
        $transactions = \App\Models\Transaction::with(['mission', 'provider'])->latest()->limit(20)->get();
        $providers = \App\Models\ServiceProvider::all();
        return view('admin.dashboard.transactions', compact('transactions', 'providers'));
    }

     private function canImpersonate($admin, $user)
    {
        if ($admin->role === 'super_admin') {
            return true;
        }
        if ($admin->role === 'admin' && !$user->hasRole('admin')) {
            return true;
        }
        if ($user->email === 'system@example.com' || $user->hasRole('admin')) {
            return false;
        }

        return false; 
    }
}
