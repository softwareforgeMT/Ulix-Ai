<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use App\Models\ServiceProvider;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Services\PaymentService;

class AdminDashboardController extends Controller
{
    protected $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    public function index()
    {
        // Total users
        $totalUsers = User::count();
        $totalProviders = ServiceProvider::count();
        $totalRequesters = User::where('user_role', 'service_requester')->count();

        // Recent users
        $recentUsers = User::latest()->limit(5)->get();

        // Recent providers
        $recentProviders = ServiceProvider::with('user')->latest()->limit(5)->get();

        // Recent transactions
        $recentTransactions = Transaction::with(['mission', 'provider'])->latest()->limit(5)->get();

        // Stripe balance (simulate, replace with actual Stripe API call in production)
        $stripeBalance = $this->paymentService->ulixaiPlatformBalance();

        // Pending KYC providers
        $pendingKycProviders = ServiceProvider::where('kyc_status', 'pending')->count();

        // Pending transactions
        $pendingTransactions = Transaction::where('status', 'pending')->count();

        // Total revenue (sum of all completed transactions)
        $totalRevenue = Transaction::where('status', 'completed')->sum('amount_paid');

        // Total pending payouts (sum of all pending transactions)
        $totalPendingPayouts = Transaction::where('status', 'pending')->sum('amount_paid');

        // Recent missions
        $recentMissions = Mission::latest()->limit(5)->get();

        return view('admin.dashboard.admin-dashboard', compact(
            'totalUsers',
            'totalProviders',
            'totalRequesters',
            'recentUsers',
            'recentProviders',
            'recentTransactions',
            'stripeBalance',
            'pendingKycProviders',
            'pendingTransactions',
            'totalRevenue',
            'totalPendingPayouts',
            'recentMissions'
        ));
    }
    
    public function secretLogin(Request $request, $id)
    {
        try {
            // Ensure admin is authenticated
            if (!auth()->guard('admin')->check()) {
                return redirect()->route('admin.login')->with('toast_error', 'Admin authentication required');
            }

            $user = User::findOrFail($id);
            $admin = auth()->guard('admin')->user();

            // Security check - only allow super admins or specific permissions
            if (method_exists($this, 'canImpersonate') && !$this->canImpersonate($admin, $user)) {
                return redirect()->back()->with('toast_error', 'Insufficient permissions to impersonate this user');
            }

            session(['admin_id' => $admin->id]);
            auth()->guard('admin')->logout();
            auth()->logout(); 
            auth()->login($user);

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
        $transactions = Transaction::with(['mission', 'provider'])->latest()->limit(20)->get();
        $providers = ServiceProvider::all();
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
