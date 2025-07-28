<?php

namespace App\Services;
use Stripe\Stripe;
use Stripe\StripeClient;
use App\Models\Transaction;
use Stripe\PaymentIntent;
use Stripe\Transfer;
use Stripe\Balance;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    protected $stripe;

    public function __construct()
    {
        // Initialize Stripe client with the secret key
        $this->stripe = Stripe::setApiKey(config('services.stripe.secret'));
        $this->stripe = new StripeClient(config('services.stripe.secret'));
    }

    // Method to handle payment processing
    public function processPayment($amount, $currency, $paymentMethod, $customerId)
    {
        try {
            // Create a Payment Intent
            $paymentIntent = $this->stripe->paymentIntents->create([
                'amount' => $amount * 100, // Convert to cents
                'currency' => $currency,
                'payment_method' => $paymentMethod,
                'customer' => $customerId,
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            // Store transaction details in the database
            $transaction = new Transaction();
            $transaction->user_id = $customerId;
            $transaction->amount_paid = $amount;
            $transaction->status = 'completed';
            $transaction->stripe_payment_intent_id = $paymentIntent->id;
            $transaction->save();

            return $transaction;
        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            return null;
        }
    }

    // Method to handle refunds
    public function processRefund($transactionId)
    {
        try {
            $transaction = Transaction::findOrFail($transactionId);
            
            // Refund the payment using Stripe
            $refund = $this->stripe->refunds->create([
                'payment_intent' => $transaction->stripe_payment_intent_id,
            ]);

            // Update the transaction status to refunded
            $transaction->status = 'refunded';
            $transaction->save();

            return $refund;
        } catch (\Exception $e) {
            Log::error('Refund Error: ' . $e->getMessage());
            return null;
        }
    }

    // Method to handle fund transfer
    public function transferFunds($mission, $provider)
    {
        try {

            $stripeImtent = PaymentIntent::retrieve($mission->transactions()->first()->stripe_payment_intent_id);
            $transferAmount = floor($stripeImtent->amount_received - ($stripeImtent->amount_received * config('ulixai.fees.provider', 15) / 100));

            $transfer = Transfer::create([
                'amount' => $transferAmount, 
                'currency' => 'eur',
                'destination' => $provider->stripe_account_id,
                'transfer_group' => 'MISSION_'.$mission->id,
            ]);
            return $transfer;
        } catch (\Exception $e) {
            Log::error('Transfer Error: ' . $e->getMessage());
            return ['message' => $e->getMessage()];
        }
    }

    public function providerAccountBalance($provider) {
        try {
            $balance = Balance::retrieve([], [
                'stripe_account' => $provider->stripe_account_id,
            ]);

            return [
                'available' => $balance->available[0]->amount / 100,
                'pending' => $balance->pending[0]->amount / 100,
                'currency' => strtoupper($balance->available[0]->currency)
            ];
            
        } catch (\Exception $e) {
            \Log::error('Stripe balance fetch failed: ' . $e->getMessage());
            return ['error' => $e->getMessage()];
        }
    }
}
