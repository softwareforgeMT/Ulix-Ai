<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\MissionCancellationReason;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Refund;
use Stripe\Transfer;
use Stripe\Account as StripeAccount;
use Carbon\Carbon;
use App\Models\MissionOffer;
use App\Services\ReputationPointService;

class ServiceRequestController extends Controller
{

    protected $ReputationPointService;
    public function __construct(ReputationPointService $ReputationPointService)
    {
        $this->ReputationPointService = $ReputationPointService;
    }
    public function index(Request $request) {
        $user = auth()->user();
        $missions = [];
        if ($user) {
            $missions = Mission::where('requester_id', $user->id)
                ->orderByDesc('created_at')
                ->get();
        }
        return view('dashboard.service.service-requests', compact('user', 'missions'));
    } 

    public function viewServiceRequest(Request $request)
    {
        $id = $request->query('id') ?? $request->route('id');
        $mission = null;
        if ($id) {
            $mission = \App\Models\Mission::find($id);
        }
        return view('dashboard.service.view-request', compact('mission'));
    }

    public function ongoingServiceRequest(Request $request) {
        
        $missions = Mission::with('requester') 
            ->where('status', 'published')     
            ->where('payment_status', 'unpaid')
            ->get();  

        $category = Category::where('level', 1)->with('subcategories')->get();
    
        return view('dashboard.service.ongoing-service-requests', compact('missions', 'category'));
    }
    

    public function createRequest(Request $request) {
        return view('pages.request-for-help');
    }

    public function saveRequestForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'firstName' => 'required|string|max:255',
            // 'lastName' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'countryNeed' => 'required|string',
            'currentCity' => 'required|string',
            'requestTitle' => 'required|string',
            'moreDetails' => 'required|string',
        ]);

        // Check/Create User
        $user = User::where('email', $request->email)->first();
        $affiliateLink = $this->generateAffiliateLink($request->email ?? '', $request->firstName ?? '');
        if (!$user) {
            $user = User::create([
                'name' => trim($request->firstName),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'country' => $request->countryNeed,
                'user_role' => 'service_requester',
                'status' => 'active',
                'affiliate_code' => $affiliateLink,
                'preferred_language' => $request->language ?? null,
                'last_login_at' => now(),
            ]);
        }

        // Handle urgency level
        $urgencyLevels = [
            'within_week' => 'high',
            'urgent' => 'high',
            '1_2_weeks' => 'medium',
            '2_weeks_1_month' => 'low',
            'more_than_month' => 'low',
        ];
        $urgency = $urgencyLevels[$request->urgency] ?? 'medium';

        // Parse categories
        $category = json_decode($request->category, true) ?? [];
        $subcategory = json_decode($request->subcategory, true) ?? [];
        $subcategory2 = json_decode($request->subcategory2, true) ?? [];

        // Handle photos
        $imagePaths = [];

        foreach (['photo1', 'photo2', 'photo3', 'photo4'] as $photoKey) {
            if ($request->hasFile($photoKey) && $request->file($photoKey)->isValid()) {
                $file = $request->file($photoKey);

                // Ensure the directory exists
                $destinationPath = public_path('assets/mission');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                // Generate unique file name
                $fileName = $photoKey . '_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();

                // Move file to public/assets/mission
                $file->move($destinationPath, $fileName);

                // Save relative path
                $imagePaths[] = 'assets/mission/' . $fileName;
            }
        }

        // Save mission
        $mission = Mission::create([
            'requester_id' => $user->id,
            'category_id' => $category['id'],
            'subcategory_id' => $subcategory['id'], 
            'subsubcategory_id' => $subcategory2['id'],
            'title' => $request->requestTitle,
            'description' => $request->moreDetails,
            'budget_min' => null,
            'budget_max' => null,
            'budget_currency' => 'EUR',
            'service_durition' => $request->serviceDuration ?? null,
            'location_country' => $request->countryNeed,
            'location_city' => $request->currentCity,
            'is_remote' => $request->supportOnline === 'yes',
            'language' => $request->language ?? null,
            'urgency' => $urgency,
            'status' => 'published',
            'selected_provider_id' => null,
            'payment_status' => 'unpaid',
            'is_fake' => false,
            'attachments' => json_encode($imagePaths),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Your request has been submitted successfully!',
            'mission_id' => $mission->id,
        ]);
    }

    private function generateAffiliateLink($email, $first, $last = null)
    {
        $base = $first . $last . explode('@', $email)[0] . rand(100, 999);
        $slug = strtolower(Str::slug($base));
        return $slug;
    }

    public function getSubcategories($categoryId)
    {
        // Fetch the subcategories for the selected category
        $subcategories = Category::where('parent_id', $categoryId)->get();

        return response()->json($subcategories);
    }

    public function getMissions(Request $request)
    {
        
        $categoryId = $request->input('category_id');
        $subcategoryId = $request->input('subcategory_id');
        $country = $request->input('country');
        $language = $request->input('language');
        // Fetch missions based on category and subcategory
        $missions = Mission::where('category_id', $categoryId)
                           ->where('subcategory_id', $subcategoryId)
                        //    ->where('location_country', $country)
                           ->where('language', $language)
                           ->where('status', 'published')
                           ->with(['category', 'subcategory', 'requester'])
                           ->get();
        return response()->json($missions);
    }

    public function cancelMissionRequest(Request $request) 
    {

        $request->validate([
            'mission_id' => 'required|exists:missions,id',
            'reason' => 'required|string|max:255',
            'cancelled_by' => 'required|in:requester,provider,admin',
            'cancelled_on' => 'required|date',
        ]);

        $mission = Mission::findOrFail($request->mission_id);
        
        if ($mission->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if($mission->payment_status === 'unpaid' && $mission->status == 'published') {
            $mission->delete();
            return response()->json(['message' => 'Mission canceled successfully']);
        }

        if( $mission->status === 'waiting_to_start' && $mission->payment_status === 'paid') {
            // Refund the payment
            try {
                $this->refundMissionPayment($mission, $request);
                $cancellationReason = MissionCancellationReason::create([
                    'mission_id' => $mission->id,
                    'cancelled_by' => $request->cancelled_by,
                    'reason' => $request->reason,
                    'email_sent' => false,
                    'custum_description' => $request->description ?? null,
                ]);

                return response()->json(['message' => 'Mission canceled successfully']);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Refund failed: ' . $e->getMessage()], 500);
            }
        } elseif ($mission->status === 'in_progress') {
           try {
                $cancellationReason = MissionCancellationReason::create([
                    'mission_id' => $mission->id,
                    'cancelled_by' => $request->cancelled_by,
                    'reason' => $request->reason,
                    'email_sent' => false,
                    'custum_description' => $request->description ?? null,
                ]);

                // Update mission status
                $mission->status = 'disputed';
                $mission->payment_status = 'held';
                $mission->cancelled_by = $request->cancelled_by;
                $mission->cancelled_on = Carbon::parse($request->cancelled_on);
                $mission->save();

                return response()->json(['message' => 'Mission canceled successfully']);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Refund failed: ' . $e->getMessage()], 500);
            }
        } else {
            return response()->json(['error' => 'Mission cannot be canceled at this stage'], 400);
        }

        $cancellationReason = MissionCancellationReason::create([
            'mission_id' => $mission->id,
            'cancelled_by' => $request->cancelled_by,
            'reason' => $request->reason,
            'email_sent' => false,
            'custum_description' => $request->description ?? null,
        ]);

        $mission->update([
            'status' => 'disputed',
            'cancelled_by' => $request->cancelled_by,
            'cancelled_on' => Carbon::parse($request->cancelled_on),
            'payment_status' => 'refunded',
            'selected_provider_id' => null,
        ]);
        return response()->json(['message' => 'Mission canceled successfully']);
    }

    

    public function providerCancelMisssion(Request $request) {
         $request->validate([
            'mission_id' => 'required|exists:missions,id',
            'reason' => 'required|string|max:255',
            'cancelled_by' => 'required|in:requester,provider,admin',
            'cancelled_on' => 'required|date',
        ]);

        $mission = Mission::findOrFail($request->mission_id);
        $provider = $mission->selectedProvider;

        if($mission) {
            $this->refundMissionPayment($mission, $request);
            $cancellationReason = MissionCancellationReason::create([
                'mission_id' => $mission->id,
                'cancelled_by' => $request->cancelled_by,
                'reason' => $request->reason,
                'email_sent' => false,
                'custum_description' => $request->description ?? null,
            ]);
            // Updating Providers Reputation Points Point 
            $this->ReputationPointService->updateReputationPointsBasedOnMissionCancellationByProvider($provider);
        }
        
        return response()->json(['success' => true,  'message' => 'Mission canceled successfully']);
    }


    private function refundMissionPayment($mission, $request) {
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

            $offer = MissionOffer::where('provider_id', $mission->selected_provider_id)->where('mission_id', $mission->id)->first()?->delete();
            // Update mission status
            $mission->status = 'published';
            $mission->payment_status = 'unpaid';
            $mission->selected_provider_id = null;
            $mission->cancelled_by = $request->cancelled_by;
            $mission->cancelled_on = Carbon::parse($request->cancelled_on);
            $mission->save();
            $transaction->update(['status' => 'refunded']);
    }
}
