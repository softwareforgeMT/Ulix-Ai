<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProviderReview;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ProviderReviewController extends Controller
{
    public function store(Request $request, $providerId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000'
        ]);

        $provider = ServiceProvider::findOrFail($providerId);
        $user = Auth::user();

        // Prevent provider from rating/commenting on own profile
        if ($provider->user_id == $user->id) {
            return redirect()->route('provider-details', ['id' => $provider->id])
                ->with('toast_error', 'You cannot rate or comment on your own profile.');
        }

        // Only one review per user per provider
        $review = ProviderReview::updateOrCreate(
            [
                'provider_id' => $provider->id,
                'user_id' => $user->id
            ],
            [
                'rating' => $request->rating,
                'comment' => $request->comment
            ]
        );

        return redirect()->route('provider-details', ['id' => $provider->id])
            ->with('toast_success', 'Your review has been submitted.');
    }
}
