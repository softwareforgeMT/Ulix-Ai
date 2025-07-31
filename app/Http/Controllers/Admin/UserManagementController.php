<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Transaction;
use App\Models\ServiceProvider;
use App\Models\Mission;


class UserManagementController extends Controller
{
    public function users()
    {
        $users = User::orderByDesc('created_at')->paginate(20);
        $transactions = Transaction::with(['mission', 'provider'])->latest()->limit(20)->get();
        $providers = ServiceProvider::all();
        return view('admin.dashboard.users', compact('users', 'transactions', 'providers'));
    }
    
    public function manage(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        // Handle PATCH request for user status update
        if ($request->isMethod('patch')) {
            // Manual edit of payable amount
            if ($request->has('edit_payable_user_id')) {
                $refUser = User::find($request->input('edit_payable_user_id'));
                if ($refUser) {
                    $refUser->update([
                        'pending_affiliate_balance' => $request->input('payable_amount', 0)
                    ]);
                }
                return back()->with('success', 'Payable amount updated.');
            }

            // Retroactive linking (reassign referrals) by email or ID
            if ($request->has('retroactive_user_id') && $request->has('new_referrer_id')) {
                $refUser = User::find($request->input('retroactive_user_id'));
                $newReferrer = null;
                $newReferrerInput = $request->input('new_referrer_id');
                if (filter_var($newReferrerInput, FILTER_VALIDATE_EMAIL)) {
                    $newReferrer = User::where('email', $newReferrerInput)->first();
                } else {
                    $newReferrer = User::find($newReferrerInput);
                }
                if ($refUser && $newReferrer) {
                    $refUser->referred_by = $newReferrer->id;
                    $refUser->save();
                    return back()->with('success', 'Referral reassigned.');
                } else {
                    return back()->with('error', 'Referrer not found.');
                }
            }

            // Block affiliate account
            if ($request->has('block_affiliate_user_id')) {
                $refUser = User::find($request->input('block_affiliate_user_id'));
                if ($refUser) {
                    $refUser->status = 'suspended';
                    $refUser->save();
                }
                return back()->with('success', 'Affiliate account blocked.');
            }

            // User status update
            if ($request->has('status')) {
                $request->validate([
                    'status' => 'required|in:active,suspended',
                ]);
                $user->status = $request->input('status');
                $user->save();
                return redirect()->route('admin.users.manage', $userId)->with('success', 'User status updated.');
            }
        }

        $missions = Mission::where('requester_id', $userId)->with('transactions')->get();
        $provider = ServiceProvider::where('user_id', $userId)->first();

        $transactionsQuery = Transaction::with(['mission', 'provider'])
            ->whereIn('mission_id', $missions->pluck('id'));
        if ($provider) {
            $transactionsQuery->orWhere('provider_id', $provider->id);
        }
        $transactions = $transactionsQuery->get();

        // AJAX for affiliate filter
        if ($request->ajax() && $request->has('ajax_affiliate')) {
            $referredUsers = User::where('referred_by', $user->id)
                ->when($request->date, fn($q) => $q->whereDate('dob', $request->date))
                ->when($request->country, fn($q) => $q->where('country', $request->country))
                ->when($request->role, fn($q) => $q->where('user_role', $request->role))
                ->when($request->language, fn($q) => $q->where('preferred_language', $request->language))
                ->when($request->influencer !== null, fn($q) => $q->where('special_status', 'like', '%influencer%'))
                ->when($request->entity, fn($q) => $q->where('affiliate_code', $request->entity))
                ->get();

            $html = view('admin.dashboard.partials.affiliate-accounts-table', compact('referredUsers', 'user'))->render();
            return response()->json(['html' => $html]);
        }

        return view('admin.dashboard.user-manage', compact('user', 'missions', 'transactions', 'provider'));
    }

    public function manageMission(Request $request, $missionId)
    {
        $mission = Mission::findOrFail($missionId);

        $request->validate([
            'status' => 'required|in:pending,in_progress,completed,cancelled',
            'payment_status' => 'required|in:paid,unpaid',
            'selected_provider_id' => 'nullable|exists:service_providers,id',
        ]);

        $mission->status = $request->input('status');
        $mission->payment_status = $request->input('payment_status');
        $mission->selected_provider_id = $request->input('selected_provider_id') ?: null;
        $mission->save();

        return back()->with('success', 'Mission updated successfully.');
    }
}
