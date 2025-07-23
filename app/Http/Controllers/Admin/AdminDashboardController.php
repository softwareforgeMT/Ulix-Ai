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

    public function users()
    {
        $users = User::orderByDesc('created_at')->paginate(20);
        $transactions = Transaction::with(['mission', 'provider'])->latest()->limit(20)->get();
        $providers = \App\Models\ServiceProvider::all();
        return view('admin.dashboard.users', compact('users', 'transactions', 'providers'));
    }

    public function secretLogin(Request $request, $id)
    {
        try {
            // Ensure admin is authenticated
            if (!Auth::guard('admin')->check()) {
                return redirect()->route('admin.login')->with('toast_error', 'Admin authentication required');
            }

            $user = User::findOrFail($id);
            $admin = Auth::guard('admin')->user();

            // Security check - only allow super admins or specific permissions
            if (!$this->canImpersonate($admin, $user)) {
                return redirect()->back()->with('toast_error', 'Insufficient permissions to impersonate this user');
            }


            // Log the impersonation for audit trail
            Log::info('Admin impersonation started', [
                'admin_id' => $admin->id,
                'admin_email' => $admin->email,
                'user_id' => $user->id,
                'user_email' => $user->email,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'timestamp' => now()
            ]);

            // Store impersonation data
            Session::put('impersonation', [
                'admin_id' => $admin->id,
                'admin_name' => $admin->name,
                'admin_email' => $admin->email,
                'started_at' => now(),
                'original_user_id' => $user->id,
                'original_user_name' => $user->name
            ]);

            // Store original admin session data
            Session::put('admin_return_url', url()->previous());
            
            // Logout admin and login as user
            Auth::guard('admin')->logout();
            Auth::login($user);

            // Add impersonation flag to user session
            Session::put('is_impersonating', true);

            return redirect()->route('dashboard')->with('toast_success', 
                'You are now impersonating ' . $user->name . ' (' . $user->email . ')'
            );

        } catch (\Exception $e) {
            Log::error('Admin impersonation failed', [
                'admin_id' => Auth::guard('admin')->id(),
                'target_user_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('toast_error', 'Failed to impersonate user: ' . $e->getMessage());
        }
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
