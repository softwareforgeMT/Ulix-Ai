<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\User;
use App\Models\MissionOffer;
use App\Models\ServiceProvider;
use App\Models\Transaction;
use App\Models\AffiliateCommission;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Stripe\Transfer;
use Stripe\Account;
use Stripe\AccountLink;
use Stripe\Account as StripeAccount;
use Illuminate\Support\Facades\DB;

class StripePaymentController extends Controller
{
    
    public function checkout(Request $request)
    {
    
        $mission = Mission::findOrFail($request->mission_id);
        $provider = ServiceProvider::findOrFail($request->provider_id);
        $offer = MissionOffer::findOrFail($request->offer_id);

        if (!$provider->stripe_account_id) {

            $stripeAccount = $this->createStripeConnectCustomAccount($provider);
            
            $provider->stripe_account_id = $stripeAccount['account_id'];
            $provider->kyc_status = $stripeAccount['isKYCCompele'] ? 'verified' : 'pending';
            $provider->stripe_chg_enabled = $stripeAccount['isKYCCompele'] ? true : false;
            $provider->stripe_pts_enabled = $stripeAccount['isKYCCompele'] ? true : false;
            $provider->kyc_link = $stripeAccount['onboarding_url'] ?? null;
            $provider->save();
        }
        // Calculate fees
        $amount = (float) $request->amount;
        $clientFee = (float) $request->client_fee;
        $total = (float) $request->total;
        
        Stripe::setApiKey(config('services.stripe.secret'));

        $platformFeeInCents = intval($clientFee * 100);
        $totalInCents = intval($total * 100);

        $paymentIntent = PaymentIntent::create([
            'amount' => $totalInCents, 
            'currency' => 'eur',
            'payment_method_types' => ['card'],
            'metadata' => [
                'mission_id' => $mission->id,
                'provider_id' => $provider->id,
                'offer_id' => $offer->id,
                'client_fee' => $clientFee,
                'mission_amount' => $amount,
            ],
        ]);

        // Update mission status
        $mission->status = 'waiting_to_start';
        $mission->payment_status = 'held';
        $mission->selected_provider_id = $provider->id;
        $mission->save();

        return view('dashboard.pay-card', [
            'mission' => $mission,
            'provider' => $provider,
            'offer' => $offer,
            'amount' => $amount,
            'clientFee' => $clientFee,
            'total' => $total,
            'clientSecret' => $paymentIntent->client_secret,
        ]);
    }


    public function processPayment(Request $request)
    {
        $request->validate([
            'payment_intent_id' => 'required|string',
        ]);

        Stripe::setApiKey(config('services.stripe.secret'));
        
        try {
            // Retrieve the payment intent
            $paymentIntent = PaymentIntent::retrieve($request->payment_intent_id);
            
            if ($paymentIntent->status === 'succeeded') {
                $missionId = $paymentIntent->metadata['mission_id'];
                $providerId = $paymentIntent->metadata['provider_id'];
                $offerId = $paymentIntent->metadata['offer_id'];
                $clientFee = $paymentIntent->metadata['client_fee'];
                $missionAmount = $paymentIntent->metadata['mission_amount'];
                // Mark mission as paid
                $mission = Mission::find($missionId);
                $mission->status = 'waiting_to_start';
                $mission->payment_status = 'paid';
                $mission->save();

                $missionOffer = MissionOffer::find($offerId);
                $missionOffer->status = 'accepted'; 
                $missionOffer->save();

                // Log transaction
                Transaction::create([
                    'mission_id' => $missionId,
                    'provider_id' => $providerId,
                    'offer_id' => $offerId,
                    'stripe_payment_intent_id' => $paymentIntent->id,
                    'amount_paid' => $paymentIntent->amount / 100,
                    'client_fee' => $clientFee,
                    'provider_fee' => ($paymentIntent->amount / 100) * 0.15,
                    'country' => $mission->location_country,
                    'user_role' => auth()->user()->user_role,
                    'status' => 'paid',
                ]);

                $referee = auth()->user();

                if ($referee->referred_by) {
                    $referrer = User::find($referee->referred_by);

                    if ($referrer) {
                        $commissionAmount = round($clientFee * 0.15, 2);
                        $commissionData = [
                            'referrer_id' => $referrer->id,
                            'referee_id' => $referee->id,
                            'mission_id' => $mission->id,
                            'amount' => $commissionAmount,
                            'status' => 'available',
                        ];

                        if (
                            $referrer->user_role === 'service_provider' &&
                            !empty($referrer->serviceProvider->stripe_account_id)
                        ) {
                            try {
                                Stripe::setApiKey(config('services.stripe.secret'));
                                $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

                                // Transfer to provider via Stripe Connect
                                $transfer = $stripe->transfers->create([
                                    'amount' => $commissionAmount * 100,
                                    'currency' => 'eur',
                                    'destination' => $referrer->serviceProvider->stripe_account_id,
                                    'transfer_group' => 'affiliate_commission_' . $mission->id,
                                ]);

                                $commissionData['status'] = 'paid';
                                $commissionData['payout_method'] = 'stripe';
                                $commissionData['stripe_transfer_id'] = $transfer->id;
                                $referrer->increment('affiliate_balance', $commissionAmount);
                                $referrer->increment('pending_affiliate_balance', $commissionAmount);
                                // You may optionally skip updating balances since it's paid out
                            } catch (\Exception $e) {
                                // If Stripe transfer fails, fallback to wallet credit
                                $referrer->increment('affiliate_balance', $commissionAmount);
                                $referrer->increment('pending_affiliate_balance', $commissionAmount);
                            }
                        } else {
                            // Not a provider or no stripe account — just add to wallet
                            $referrer->increment('affiliate_balance', $commissionAmount);
                            $referrer->increment('pending_affiliate_balance', $commissionAmount);
                        }

                        // Create commission record
                        AffiliateCommission::create($commissionData);
                    }
                }

                return response()->json([
                    'success' => true,
                    'redirect_url' => route('payments.success', ['mission' => $mission->id])
                ]);
            }

            return response()->json([
                'success' => false,
                'error' => 'Payment not completed'
            ], 400);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function success(Mission $mission)
    {
        $provider = $mission->selectedProvider;
        if (!$provider) {
            return redirect()->route('dashboard')->with('error', 'No provider selected for this mission.');
        }
        $reviews = $provider->reviews()->get() ?? [];
        return view('dashboard.order-confirm', compact('mission', 'provider', 'reviews'));
    }

    public function cancel()
    {
        return view('dashboard.payments-cancel');
    }

    private function createStripeConnectCustomAccount(ServiceProvider $provider)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        $token = $stripe->tokens->create([
            'account' => [
                'business_type' => 'individual',
                'individual' => [
                    'first_name' => $provider->first_name,
                    'last_name' => $provider->last_name,
                    'email' => $provider->email,
                ],
                'tos_shown_and_accepted' => true,
            ],
        ]);
        $account = $stripe->accounts->create([
            'type' => 'custom',
            'country' => 'FR',
            'email' => $provider->email,
            'account_token' => $token->id,
            'capabilities' => [
                'card_payments' => ['requested' => true],
                'transfers' => ['requested' => true],
            ],
            'business_profile' => [
                'product_description' => 'Ulixai Service Provider',
            ],
        ]);

        if (!$account->details_submitted) {
           
            $accountLink = $stripe->accountLinks->create([
                'account' => $account->id,
                'refresh_url' => route('stripe.refresh'), 
                'return_url' => route('stripe.return'),
                'type' => 'account_onboarding',
            ]);
            return [
                'account_id' => $account->id,
                'onboarding_url' => $accountLink->url,
                'isKYCCompele' => false
            ];
        }

        return [
            'account_id' => $account->id,
            'onboarding_url' => null,
            'isKYCCompele' => true
        ];
    }

    public function getOnboardingLink(Request $request)
    {
        $provider = auth()->user()->serviceProvider;
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

        if (!$provider->stripe_account_id) {
            return response()->json(['error' => 'Stripe account not found.'], 404);
        }

        $account = $stripe->accounts->retrieve($provider->stripe_account_id);

        if ($account->details_submitted) {
            $provider->kyc_status = 'verified';
            $provider->stripe_chg_enabled = true;
            $provider->stripe_pts_enabled = true;
            $provider->kyc_link = null;
            $provider->save();
            return response()->json(['completed' => true]);
        }

        $accountLink = $stripe->accountLinks->create([
            'account' => $provider->stripe_account_id,
            'refresh_url' => route('stripe.refresh'),
            'return_url' => route('stripe.return'),
            'type' => 'account_onboarding',
        ]);

        return response()->json(['completed' => false, 'url' => $accountLink->url]);
    }
}