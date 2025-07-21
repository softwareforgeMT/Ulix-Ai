<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\MissionOffer;
use App\Models\ServiceProvider;
use App\Models\Transaction;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Account as StripeAccount;
use Illuminate\Support\Facades\DB;
use Stripe\Transfer;

class StripePaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $mission = Mission::findOrFail($request->mission_id);
        $provider = ServiceProvider::findOrFail($request->provider_id);
        $offer = MissionOffer::findOrFail($request->offer_id);

        // Ensure provider has a Stripe Connect Custom account
        if (!$provider->stripe_account_id) {
            $stripeAccountId = $this->createStripeConnectCustomAccount($provider);
            $provider->stripe_account_id = $stripeAccountId;
            $provider->save();
        }

        // Calculate fees
        $amount = (float) $request->amount;
        $clientFee = (float) $request->client_fee;
        $total = (float) $request->total;

        Stripe::setApiKey(config('services.stripe.secret'));

        // Create PaymentIntent instead of Checkout Session
        $paymentIntent = PaymentIntent::create([
            'amount' => intval($total * 100), // Amount in cents
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
        $mission->status = 'in_progress';
        $mission->payment_status = 'held';
        $mission->selected_provider_id = $provider->id;
        $mission->save();

        // Return view with payment intent client secret
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
                $mission->status = 'in_progress';
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
                    'provider_fee' => config('ulixai.fees.provider', 15),
                    'country' => $mission->location_country,
                    'user_role' => auth()->user()->user_role,
                    'status' => 'paid',
                ]);

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
        $account = StripeAccount::create([
            'type' => 'custom',
            'country' => 'US', // Fixed the null coalescing operator
            'email' => $provider->email,
            'business_type' => 'individual',
            'capabilities' => [
                'card_payments' => ['requested' => true],
                'transfers' => ['requested' => true],
            ],
            'business_profile' => [
                'product_description' => 'Ulixai Service Provider',
            ],
            'individual' => [
                'first_name' => $provider->first_name,
                'last_name' => $provider->last_name,
                'email' => $provider->email,
            ],
        ]);
        return $account->id;
    }
}