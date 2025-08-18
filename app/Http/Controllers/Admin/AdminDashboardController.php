<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use App\Models\ServiceProvider;
use App\Models\Mission;
use App\Models\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminDashboardController extends Controller
{
    protected $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    public function index()
    {
        
        $now = Carbon::now();
        $lastMonthStart = $now->copy()->subMonth()->startOfMonth();
        $lastMonthEnd = $now->copy()->subMonth()->endOfMonth();
        // Total users
        $totalUsers = User::count();
        $totalProviders = ServiceProvider::count();
        $totalRequesters = User::where('user_role', 'service_requester')->count();

        $newUsersLastMonth = User::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
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
            'recentMissions',
            'newUsersLastMonth',
        ));
    }
    
    public function secretLogin(Request $request, $id)
    {
        try {
            if (!auth()->guard('admin')->check()) {
                return redirect()->route('admin.login')->with('error', 'Admin authentication required');
            }
            $adminId = auth()->guard('admin')->id();
            
            // Find user to impersonate
            $user = User::findOrFail($id);

            auth()->guard('admin')->logout();
            auth()->guard('web')->logout();
            
            session()->forget('password_hash');
            session(['admin_id' => $adminId]);
            session(['is_impersonating' => true]);

            auth()->guard('web')->login($user, true);
            
            session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Now impersonating ' . $user->name);

        } catch (\Exception $e) {
            Log::error('Secret login failed:', [
                'admin_id' => auth()->guard('admin')->id() ?? null,
                'target_user_id' => $id,
                'error' => $e->getMessage()
            ]);
            
            return redirect()->back()->with('error', 'Failed to impersonate user: ' . $e->getMessage());
        }
    }

    public function restoreAdmin()
    {
        try {
            if (!session()->has('admin_id')) {
                return redirect()->route('admin.login');
            }

            $adminId = session()->get('admin_id');
            auth()->guard('web')->logout();
            session()->forget(['admin_id', 'is_impersonating']);
            auth()->guard('admin')->loginUsingId($adminId, true);
            session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Returned to admin account');
        } catch (\Exception $e) {
            Log::error('Restore admin failed:', ['error' => $e->getMessage()]);
            return redirect()->route('admin.login')->with('error', 'Could not restore admin session');
        }
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
        $provider = ServiceProvider::findOrFail($providerId);
        $user = $provider->user;

        // Send KYC reminder email to provider
        Mail::send([], [], function ($message) use ($provider, $user) {
            $message->to($provider->email)
                ->subject('KYC Verification Reminder')
                ->html("
                    Dear {$provider->first_name},<br><br>
                    This is a reminder to complete your KYC verification on Ulixai.<br>
                    Please log in to your account and complete the required steps.<br><br>
                    If you have any questions, contact support.<br><br>
                    Thank you,<br>
                    Ulixai Team
                ");
        });

        return back()->with('success', 'KYC reminder sent!');
    }


    public function transactions()
    {
        $transactions = Transaction::with(['mission', 'provider'])->latest()->limit(20)->get();
        $providers = ServiceProvider::all();
        return view('admin.dashboard.transactions', compact('transactions', 'providers'));
    }

    

    public function badges(Request $request)
    {
        // Handle create
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:badges,slug',
                'icon' => 'nullable|string|max:1000',
                'type' => 'required|string|max:50',
                'threshold' => 'nullable|integer',
                'is_active' => 'boolean',
                'is_auto' => 'boolean',
                'sort_order' => 'integer',
            ]);
            $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
            Badge::create($validated);
            return redirect()->route('admin.badges')->with('success', 'Badge created!');
        }

        // Handle update
        if ($request->isMethod('patch')) {
            $badge = Badge::findOrFail($request->input('id'));
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:badges,slug,' . $badge->id,
                'icon' => 'nullable|string|max:255',
                'type' => 'required|string|max:50',
                'threshold' => 'nullable|integer',
                'is_active' => 'boolean',
                'is_auto' => 'boolean',
                'sort_order' => 'integer',
            ]);
            $validated['slug'] = $validated['slug'] ?? Str::slug($validated['title']);
            $badge->update($validated);
            return redirect()->route('admin.badges')->with('success', 'Badge updated!');
        }

        // Handle delete
        if ($request->isMethod('delete')) {
            $badge = Badge::findOrFail($request->input('id'));
            $badge->delete();
            return redirect()->route('admin.badges')->with('success', 'Badge deleted!');
        }

        // Show all badges
        $badges = Badge::orderBy('sort_order')->get();
        return view('admin.dashboard.badges.index', compact('badges'));
    }
}
