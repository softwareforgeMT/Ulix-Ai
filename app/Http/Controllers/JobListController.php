<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mission;
use App\Models\MissionOffer;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Refund;
use Stripe\Transfer;
use Stripe\Account as StripeAccount;

class JobListController extends Controller
{
    public function index(Request $request)
    {
        $provider = auth()->user()->serviceProvider;
        $jobs = [];
        $offers = [];

        if ($provider) {
            // Missions where provider's offer is accepted and is under work
            $jobs = Mission::where('selected_provider_id', $provider->id)
                ->whereIn('status', ['in_progress', 'waiting_to_start', 'cancelled', 'disputed', 'completed'])
                ->orderByDesc('created_at')
                ->get();

            // All quote offers made by provider that are NOT accepted yet
            $offers = MissionOffer::where('provider_id', $provider->id)
                ->where('status', 'pending')
                ->with('mission')
                ->orderByDesc('created_at')
                ->get();
        }

        return view('dashboard.provider.jobs.job-list', compact('jobs', 'offers'));
    }

    public function viewJob(Request $request) {
        $job = Mission::findOrFail($request->id);
        return view('dashboard.provider.jobs.view-job', compact('job'));
    }

    public function quoteOffer(Request $request) {
        $id = $request->query('id') ?? $request->route('id');
        $mission = null;
        $offers = [];
        if ($id) {
            $mission = Mission::find($id);
            // Assuming Mission hasMany Offer (or Proposal)
            $offers = $mission ? $mission->offers()->with('provider')->get() : [];
        }

        return view('dashboard.provider.jobs.quote-offer', compact('mission', 'offers'));
    }

    public function submitOffer(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric|min:1',
            'delivery_time' => 'required|string|max:50',
            'message' => 'required|string|max:300',
        ]);

        $mission = Mission::findOrFail($id);
        $provider = auth()->user()->serviceProvider; // assumes relation: User hasOne ServiceProvider

        if (!$provider) {
            return response()->json(['status' => 'error', 'message' => 'Provider profile not found.'], 403);
        }

        // Check if offer already exists for this mission and provider
        $existing = MissionOffer::where('mission_id', $mission->id)
            ->where('provider_id', $provider->id)
            ->first();

        if ($existing) {
            // Update the existing offer
            $existing->update([
                'price' => $request->price,
                'delivery_time' => $request->delivery_time,
                'message' => $request->message,
                'status' => 'pending',
            ]);
            return response()->json(['status' => 'success', 'message' => 'Offer updated successfully!', 'offer' => $existing]);
        }

        $offer = MissionOffer::create([
            'mission_id' => $mission->id,
            'provider_id' => $provider->id,
            'price' => $request->price,
            'delivery_time' => $request->delivery_time,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return response()->json(['status' => 'success', 'message' => 'Offer submitted successfully!', 'offer' => $offer]);
    }

    public function startMission(Request $request)
    {
        $request->validate([
            'mission_id' => 'required|exists:missions,id',
        ]);

        $mission = Mission::findOrFail($request->mission_id);
        
        $provider = ServiceProvider::where('id', $mission->selected_provider_id)->first();
        if (!$provider) {
            return response()->json([
                'success' => false,
                'message' => 'Provider profile not found.'
            ], 403);
        }

        if ($mission->selected_provider_id !== $provider->id) {
            return response()->json([
                'success' => false,
                'message' => 'You are not authorized to start this mission.'
            ], 403);
        }

        if ($mission->status === 'in_progress') {
            return response()->json([
                'success' => false,
                'message' => 'Mission is already in progress.'
            ]);
        }

        // Update mission status
        $mission->status = 'in_progress';
        $mission->save();

        return response()->json([
            'success' => true,
            'message' => 'Mission started successfully!',
            'mission' => $mission
        ]);
    }

    public function resolveMission(Request $request)
    {
        $request->validate([
            'mission_id' => 'required|exists:missions,id',
        ]);

        $mission = Mission::findOrFail($request->mission_id);
        
        if ($mission->status !== 'disputed') {
            return response()->json([
                'success' => false,
                'message' => 'Mission is not in dispute status.'
            ], 400);
        }

        $this->refundMissionPayment($mission, $request);

        return response()->json([
            'success' => true,
            'message' => 'Dispute resolved successfully!',
            'mission' => $mission
        ]);
    }

    private function refundMissionPayment($mission, $request) {
        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $transaction = $mission->transactions()->where('status', 'paid')->first();
            $paymentIntent = PaymentIntent::retrieve($transaction->stripe_payment_intent_id);
            
            $refundAmountInCents = ($paymentIntent->metadata->mission_amount ?? null) * 100; // Convert to cents

            if (!$refundAmountInCents) {
                return response()->json(['error' => 'Refund amount not found in metadata'], 400);
            }
            $refund = Refund::create([
                'payment_intent' => $paymentIntent->id,
                'amount' => (int) $refundAmountInCents,
            ]);


            if ($refund->status !== 'succeeded') {
                return response()->json(['error' => 'Refund failed'], 500);
            }
            // Update mission status
            $mission->status = 'cancelled';
            $mission->payment_status = 'refunded';
            $mission->selected_provider_id = null;
            $mission->save();
            $transaction->update(['status' => 'refunded']);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Refund failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function confirmDelivery(Request $request)
    {
        $request->validate([
            'mission_id' => 'required|exists:missions,id',
        ]);

        $mission = Mission::findOrFail($request->mission_id);
        
        if ($mission->status !== 'in_progress') {
            return response()->json([
                'success' => false,
                'message' => 'Mission is not in progress.'
            ], 400);
        }

        // Update mission status to completed
        $mission->status = 'completed';
        $mission->save();

        return response()->json([
            'success' => true,
            'message' => 'Delivery confirmed successfully!',
            'mission' => $mission
        ]);
    }

}
