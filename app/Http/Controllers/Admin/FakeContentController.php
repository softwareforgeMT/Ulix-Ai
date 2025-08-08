<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ServiceProvider;
use App\Models\Mission;
use App\Models\Category;
use App\Models\Country;
use App\Models\SpecialStatus;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Services\ReputationPointService;

class FakeContentController extends Controller
{
    protected $reputationPointService;
    public function __construct(ReputationPointService $reputationPointService)
    {
        $this->reputationPointService = $reputationPointService;
    }

    public function index(Request $request)
    {
        // Only super_admin can access
        if (auth()->guard('admin')->user()->user_role !== 'super_admin') {
            abort(403, 'Unauthorized');
        }

        $users = User::where('is_fake', true)->where('user_role', 'service_requester')->get();
        $providers = ServiceProvider::whereHas('user', function ($query) {
        $query->where('is_fake', true)
            ->where('user_role', 'service_provider');
            })
            ->with('user')
            ->get();

        $missions = Mission::where('is_fake', true)->with(['requester', 'provider'])->get();

        return view('admin.dashboard.admin-fcg.fake-dashboard', compact('users', 'providers', 'missions'));
    }

    public function createRequesterForm()
    {
        return view('admin.dashboard.admin-fcg.create-fake-requester');
    }

    public function createProviderForm()
    {
        $categories = Category::where('level', 1)->with('subcategories.subSubCategories')->get();
        $countries = Country::where('status', true)->get();
        $languages = [
            'English', 'French', 'Spanish', 'Portuguese', 'German', 'Italian',
            'Arabic', 'Japanese', 'Korean', 'Hindi', 'Turkish'
        ];
        $specialStatuses = SpecialStatus::all();

        return view('admin.dashboard.admin-fcg.create-fake-provider', compact(
            'categories', 'countries', 'languages', 'specialStatuses'
        ));
    }

    public function createMissionForm()
    {
        return view('admin.dashboard.admin-fcg.create-fake-mission');
    }

    public function createFake(Request $request)
    {

        if (auth()->guard('admin')->user()->user_role !== 'super_admin') {
            abort(403, 'Unauthorized');
        }

        $type = $request->input('type');
        if ($type === 'provider') {
            $email = Str::random(8) . '@fake.com';
            if (User::where('email', $email)->exists()) {
                return back()->with('error', 'A user with this email already exists.');
            }

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $email,
                'password' => bcrypt('password'),
                'user_role' => 'service_provider',
                'is_fake' => true,
                'status' => 'active',
                'gender' => $request->input('gender'),
                'phone_number' => $request->input('phone_number'),
            ]);

            $profilePhoto = null;
            if ($request->hasFile('profile_photo')) {
                $image = $request->file('profile_photo');
                $filename = 'profile-' . $user->id . '-' . time() . '.' . $image->getClientOriginalExtension();

                $profilePhoto = 'assets/profileImages/' . $filename;
                $image->move(public_path('assets/profileImages'), $filename);
            }
            
            $categoryId = $request->filled('category_id')
                        ? [(int) $request->input('category_id')]
                        : null;

            $subcategoryId = $request->filled('subcategory_id')
                        ? [(int) $request->input('subcategory_id')]
                        : null;

            $subsubcategoryId = $request->filled('subsubcategory_id')
                        ? [(int) $request->input('subsubcategory_id')]
                        : null;
          
            $operationalCountries = $request->input('operational_countries', []);
            if (!is_array($operationalCountries)) {
                $operationalCountries = [$operationalCountries];
            }
            if (count($operationalCountries) < 1) {
                return back()->with('error', 'Please select at least 2 operational countries.');
            }

            $spokenLanguages = $request->input('spoken_language', []);
            if (!is_array($spokenLanguages)) {
                $spokenLanguages = [$spokenLanguages];
            }

            $specialStatuses = $request->input('special_status', []);

            if (!is_array($specialStatuses)) {
                $specialStatuses = [$specialStatuses];
            }
            $specialStatusesAssoc = array_fill_keys($specialStatuses, true);
            $specialStatusesJson = json_encode($specialStatusesAssoc, JSON_UNESCAPED_UNICODE);
            $countryName = $request->input('country');
            $coords = null;
            if($countryName) {
                $countryCoords = Country::where('country', $countryName)->first();
                $coords = $countryCoords->coordinates ?? null;
            }
            
            ServiceProvider::create([
                'user_id' => $user->id,
                'first_name' => $request->input('first_name', $user->name),
                'last_name' => $request->input('last_name', ''),
                'country' => $request->input('country'),
                'provider_address' => $countryName ?? null,
                'native_language' => $request->input('native_language'),
                'spoken_language' => $spokenLanguages,
                'preferred_language' => $request->input('preferred_language'),
                'operational_countries' => $operationalCountries,
                'special_status' => $specialStatusesJson,
                'provider_visibility' => true,
                'points' => 0,
                'slug' => Str::slug($user->name . '-' . Str::random(4)),
                'profile_description' => $request->input('profile_description'),
                'profile_photo' => $profilePhoto,
                'services_to_offer' => json_encode($categoryId),
                'services_to_offer_category' => json_encode($subcategoryId),
                'communication_online' => $request->boolean('communication_online'),
                'communication_inperson' => $request->boolean('communication_inperson'),
                'phone_number' => $request->input('phone_number'),
                'country_coords' => json_encode($coords),
                'email' => $user->email,
            ]);
            return redirect()->route('admin.fake-content-generation')->with('success', 'Fake provider created.');
        } elseif ($type === 'requester') {
            $email = Str::random(8) . '@fake.com';
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $email,
                'password' => bcrypt('password'),
                'user_role' => 'service_requester',
                'is_fake' => true,
                'status' => 'active',
                'gender' => $request->input('gender'),
            ]);
            if ($request->expectsJson()) {
                return response()->json(['success' => true, 'user' => $user]);
            }
        } elseif ($type === 'mission') {
            $mission = Mission::create([
                'requester_id' => $request->input('requester_id'),
                'category_id' => $request->input('category_id', 1),
                'subcategory_id' => $request->input('subcategory_id', 1),
                'subsubcategory_id' => $request->input('subsubcategory_id', 1),
                'title' => $request->input('title', 'Fake Mission'),
                'description' => $request->input('description', 'Fake mission description'),
                'budget_min' => $request->input('budget_min', 10),
                'budget_max' => $request->input('budget_max', 100),
                'budget_currency' => $request->input('budget_currency', 'EUR'),
                'service_durition' => $request->input('service_durition', '1h'),
                'location_country' => $request->input('location_country', 'France'),
                'location_city' => $request->input('location_city', 'Paris'),
                'is_remote' => $request->input('is_remote', false),
                'language' => $request->input('language', 'en'),
                'urgency' => $request->input('urgency', 'medium'),
                'status' => $request->input('status', 'published'),
                'selected_provider_id' => $request->input('selected_provider_id', null),
                'payment_status' => $request->input('payment_status', 'unpaid'),
                'is_fake' => true,
            ]);
        }

        return redirect()->route('admin.fake-content-generation')->with('success', 'Fake content created.');
    }

    public function updateFake(Request $request, $type, $id)
    {
        
        if (auth()->guard('admin')->user()->user_role !== 'super_admin') {
            abort(403, 'Unauthorized');
        }

        if ($type === 'requester') {
            $user = User::where('is_fake', true)->where('user_role', 'service_requester')->findOrFail($id);
            $user->update($request->only(['name', 'email', 'status']));
        } elseif ($type === 'provider') {
            $provider = ServiceProvider::findOrFail($id);
            $provider->update($request->only(['first_name', 'last_name', 'country', 'ulysse_status', 'points']));
            $provider->user->update($request->only(['name', 'email', 'status']));
            $this->reputationPointService->updateUlysseStatusManually($provider);
        } elseif ($type === 'mission') {
            $mission = Mission::where('is_fake', true)->findOrFail($id);
            $mission->update($request->only([
                'title', 'description', 'budget_min', 'budget_max', 'budget_currency',
                'service_durition', 'location_country', 'location_city', 'is_remote',
                'language', 'urgency', 'status', 'payment_status'
            ]));
        }

        return redirect()->route('admin.fake-content-generation')->with('success', 'Fake content updated.');
    }

    public function deleteFake(Request $request, $type, $id)
    {
        // Only super_admin can access
        if (auth()->guard('admin')->user()->user_role !== 'super_admin') {
            abort(403, 'Unauthorized');
        }

        $success = false;
        if ($type === 'requester') {
            $success = (bool) User::where('is_fake', true)->where('user_role', 'service_requester')->findOrFail($id)->delete();
        } elseif ($type === 'provider') {
            $provider = ServiceProvider::findOrFail($id);
            if ($provider->profile_photo && File::exists(public_path($provider->profile_photo))) {
                File::delete(public_path($provider->profile_photo));
            }

            $provider->user()->delete();
            $success = (bool) $provider->delete();
        } elseif ($type === 'mission') {
            $success = (bool) Mission::where('is_fake', true)->findOrFail($id)->delete();
        }

        if ($request->expectsJson()) {
            return response()->json(['success' => $success]);
        }

        return redirect()->route('admin.fake-content-generation')->with('success', 'Fake content deleted.');
    }
}
