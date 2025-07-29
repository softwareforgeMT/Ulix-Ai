<?php

namespace App\Services;
use App\Models\ReputationPoint;
use Illuminate\Support\Facades\Log;

class ReputationPointService
{
 public function updateReputationPointsBasedOnMissionCompletedWithReviews($provider)
 {
     try {
        $reputationPoint = ReputationPoint::first();
        $provider->increment('points', $reputationPoint->mission_with_review);
        // $provider->update(['points' => $provider->points + $reputationPoint->mission_with_review]);

        $this->updateUlysseStatus($provider);
     } catch (\Exception $e) {
         Log::error("Failed to update reputation points for provider ID: {$providerId}. Error: {$e->getMessage()}");
     }
 }

 public function updateReputationBasedOnUserReviews($provider, $rating) {
    try {
        $reputationPoint = ReputationPoint::first();
        if($rating >= 5 ) {
            $provider->increment('points', $reputationPoint->five_star_review);
            //  $provider->update(['points' => $provider->points + $reputationPoint->five_star_review]);
        }
       
        if($rating > 4 && $rating < 5 ) {
            $provider->increment('points', $reputationPoint->four_star_review);
            //  $provider->update(['points' => $provider->points + $reputationPoint->four_star_review]);
        }
        $this->updateUlysseStatus($provider);
     } catch (\Exception $e) {
         Log::error("Failed to update reputation points for provider ID: {$providerId}. Error: {$e->getMessage()}");
     }
 }


 public function updateReputationPointsBasedOnMissionCancellationByProvider($provider) {
    
    $reputationPoint = ReputationPoint::first();

    $provider->decrement('points', $reputationPoint->provider_canceled);
    $this->updateUlysseStatus($provider);
 }

 public function updateReputationPointsBasedOnDisputeResolvedByProvider($provider) {
    
    $reputationPoint = ReputationPoint::first();
    $provider->decrement('points', $reputationPoint->dispute_refund);
    $this->updateUlysseStatus($provider);
 }

 public function updateUlysseStatus($provider) 
 {
    try {
        if($provider->points <= 200) {
            $provider->update(['ulysse_status' => 'Ulysse+']);
        } 

        if($provider->points > 200 && $provider->points <= 300) {
            $provider->update(['ulysse_status' => 'Top Ulysse']);
        }

        if($provider->points > 300) {
            $provider->update(['ulysse_status' => 'Ulysse Diamond']);
        }
    } catch (\Exception $e) {
        Log::error("Failed to update reputation points for provider ID: {$providerId}. Error: {$e->getMessage()}");
    }
 
}
}