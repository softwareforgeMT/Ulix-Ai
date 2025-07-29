<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\AffiliateCommission;
use App\Models\Transaction;
use App\Models\Mission;
use App\Models\MissionOffer;
use App\Models\ServiceProvider;
use App\Services\PaymentService;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Stripe\Transfer;
use Stripe\Account;
use Stripe\AccountLink;
use Illuminate\Support\Facades\DB;



class EarningsController extends Controller
{
    protected $PaymentService;

    public function __construct(PaymentService $PaymentService) {
        $this->PaymentService = $PaymentService;
    }

    public function index(Request $reqest) {
        $user= auth()->user();
        $provider = $user->serviceprovider;
        if ($provider && $provider->stripe_account_id) {
            try {
                $stripeBalance = $this->PaymentService->providerAccountBalance($provider);
            } catch (\Exception $e) {
                $stripeBalance = ['error' => 'Unable to fetch Stripe balance.'];
            }
            return view('dashboard.my-earnings', [
                'user' => $user,
                'provider' => $provider,
                'balance' => $stripeBalance,
            ]);
            
        }
        return view('dashboard.my-earnings', [
            'user' => $user
        ]);        
    }

    public function manageUserFunds(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return back()->with('error','You must be logged in to withdraw.');
        }

        DB::beginTransaction();

        try {
            $affiliateAmount = $user->pending_affiliate_balance ?? 0;

            if (
                $user->user_role === 'service_provider' &&
                $affiliateAmount >= 20 &&
                isset($user->serviceprovider->stripe_account_id)
            ) {
                $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
                $accountId = $user->serviceprovider->stripe_account_id;
                $account = $stripe->accounts->retrieve($accountId);
                if ($account->charges_enabled && $account->payouts_enabled) {
                    $transfer = $stripe->transfers->create([
                        'amount' => (int) round($affiliateAmount * 100),
                        'currency' => 'eur',
                        'destination' => $accountId,
                        'description' => 'Affiliate commission payout',
                        'transfer_group' => 'affiliate_withdrawal_' . $user->id,
                    ]);

                    if ($transfer && $transfer->id) {
                        $user->affiliate_balance = 0;
                        $user->pending_affiliate_balance = 0;
                        $user->save();
                    }
                } else {
                    return back()->with('error',
                        'Your Stripe account is not fully verified or payouts are disabled. Please complete your onboarding.'
                    );
                }
            } else {
                return back()->with('error',
                    'You must be a service provider with at least 20€ pending affiliate balance and a valid Stripe account.'
                );
            }

            DB::commit();

            return back()->with('success', 'Affiliate funds transferred to your Stripe account.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error','Withdrawal failed: ' . $e->getMessage());
        }
    }

}
