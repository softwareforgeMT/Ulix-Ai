<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ServiceRequestController extends Controller
{
    public function index(Request $request) {
        $user = auth()->user();
        $missions = [];
        if ($user) {
            $missions = Mission::where('requester_id', $user->id)
                ->where('status', 'published')
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
    
        return view('dashboard.service.ongoing-service-requests', compact('missions'));
    }
    

    public function createRequest(Request $request) {
        return view('pages.request-for-help');
    }

    public function saveRequestForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'countryNeed' => 'required|string',
            'currentCity' => 'required|string',
            'requestTitle' => 'required|string',
            'moreDetails' => 'required|string',
        ]);

        // Check/Create User
        $user = User::where('email', $request->email)->first();
        $affiliateLink = $this->generateAffiliateLink($request->email ?? '', $request->firstName ?? '', $request->lastName ?? '');
        if (!$user) {
            $user = User::create([
                'name' => trim($request->firstName . ' ' . $request->lastName),
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

    private function generateAffiliateLink($email, $first, $last)
    {
        $base = $first . $last . explode('@', $email)[0] . rand(100, 999);
        $slug = strtolower(Str::slug($base));
        $domain = config('app.url') ?? env('APP_URL', 'http://localhost');
        return rtrim($domain, '/') . '/affiliate/' . $slug;
    }
}
