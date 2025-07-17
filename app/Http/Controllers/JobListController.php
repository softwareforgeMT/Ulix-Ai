<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mission;
use App\Models\MissionOffer;

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
                ->whereIn('status', ['in_progress', 'ongoing', 'accepted'])
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
}
