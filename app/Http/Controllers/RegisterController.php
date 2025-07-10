<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ServiceProvider;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Services\GeolocationService;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $expats = $request->all();
        $ip = $request->ip();
        $geoLocationService = new GeolocationService();
        $countryName = $geoLocationService->getCountryFromRequest($request);

        $user = User::where('email', $expats['email'])->first();

        if ($user) {
            // User exists: update user_role and create provider record
            $user->user_role = 'service_provider';
            $user->save();
        } else {
            // Create new user
            $affiliateLink = $this->generateAffiliateLink($expats['email'] ?? '', $expats['first_name'] ?? '', $expats['last_name'] ?? '');
            $user = User::create([
                'name' => trim(($expats['first_name'] ?? '') . ' ' . ($expats['last_name'] ?? '')),
                'email' => $expats['email'],
                'password' => Hash::make($expats['password'] ?? Str::random(12)),
                'country' => $countryName,
                'preferred_language' => $expats['native_language'] ?? null,
                'user_role' => 'service_provider',
                'affiliate_code' => $affiliateLink,
                'referred_by' => $expats['referred_by'] ?? null,
                'referral_stats' => $expats['referral_stats'] ?? null,
                'status' => 'active',
                'is_fake' => $expats['is_fake'] ?? false,
                'last_login_at' => now(),
            ]);
        }

        $profileImagePath = null;
        if (!empty($expats['profile_image'])) {
            $profileImagePath = saveBase64Image($expats['profile_image'], 'assets/profileImages', 'profile-' . $user->id);
        }

        $documents = [];
        $docTypes = ['passport', 'european_id', 'license'];
        foreach ($docTypes as $docType) {
            if (!empty($expats['documents'][$docType])) {
                $docData = $expats['documents'][$docType];
                $docArr = [];
                if (isset($docData['image'])) {
                    $docArr['image'] = saveBase64Image($docData['image'], 'assets/userDocs/docs-' . $user->id, $docType);
                }
                if (isset($docData['front'])) {
                    $docArr['front'] = saveBase64Image($docData['front'], 'assets/userDocs/docs-' . $user->id, $docType . '-front');
                }
                if (isset($docData['back'])) {
                    $docArr['back'] = saveBase64Image($docData['back'], 'assets/userDocs/docs-' . $user->id, $docType . '-back');
                }
                $docArr['uploaded_at'] = $docData['uploaded_at'] ?? now();
                $documents[$docType] = $docArr;
            }
        }
 
        $provider = ServiceProvider::where('user_id', $user->id)->where('email', $expats['email'])->first();

        if($provider) {
            return response()->json([
                'status' => 'success',
                'user' => $user,
                'provider' => $provider,
                'message' => 'Provider Already Exists',
            ]);
        }
        
        $provider = ServiceProvider::create([
            'user_id' => $user->id,
            'first_name' => $expats['first_name'] ?? null,
            'last_name' => $expats['last_name'] ?? null,
            'native_language' => $expats['native_language'] ?? null,
            'spoken_language' => isset($expats['spoken_language']) ? json_encode($expats['spoken_language']) : null,
            'services_to_offer' => isset($expats['provider_services']) ? json_encode($expats['provider_services']) : null,
            'services_to_offer_category' => isset($expats['provider_subcategories']) ? json_encode($expats['provider_subcategories']) : null,
            'provider_address' => $expats['location'] ?? null,
            'operational_countries' => isset($expats['operational_countries']) ? json_encode($expats['operational_countries']) : null,
            'communication_online' => $this->truthy($expats, 'communication_preference.Online'),
            'communication_inperson' => $this->truthy($expats, 'communication_preference.In Person'),
            'profile_description' => $expats['profile_description'] ?? null,
            'profile_photo' => $profileImagePath,
            'provider_docs' => null, // deprecated, use 'documents'
            'phone_number' => $expats['phone_number'] ?? null,
            'country' => $countryName,
            'preferred_language' => $expats['native_language'] ?? null,
            'special_status' => isset($expats['special_status']) ? json_encode($expats['special_status']) : null,
            'email' => $expats['email'],
            'documents' => !empty($documents) ? json_encode($documents) : null,
            'ip_address' => $ip,
        ]);

        $otp = random_int(100000, 999999);
        EmailVerification::create([
            'user_id' => $user->id,
            'email' => $user->email,
            'otp' => $otp,
            'is_verified' => false,
        ]);

        Mail::raw(
            "Welcome to Ulixai!\n\nYour verification code is: {$otp}\n\nPlease enter this code to verify your email address.",
            function ($message) use ($user) {
                $fromAddress = config('mail.from.address') ?: 'noreply@ulixai.com';
                $fromName = config('mail.from.name') ?: 'Ulixai';
                $message->to($user->email)
                        ->from($fromAddress, $fromName)
                        ->subject('Welcome to Ulixai - Email Verification');
            }
        );

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'provider' => $provider,
            'message' => 'Registration successful. Please check your email for the verification code.',
        ]);
    }

    public function signupRegister(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
                'gender' => 'nullable|in:Male,Female'
            ]);
            if (User::where('email', $request->input('email'))->exists()) {
                return redirect()->back()->with('error', 'A user with this email already exists.');
            }
            $affiliateLink = $this->generateAffiliateLink($request->input('email') ?? '', $request->input('name') ?? '', $request->input('last_name') ?? '');
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'user_role' => 'service_requester',
                'status' => 'active',
                'affiliate_code' => $affiliateLink,
                'gender' => $request->input('gender')
            ]);

            $otp = random_int(100000, 999999);
            EmailVerification::create([
                'user_id' => $user->id,
                'email' => $user->email,
                'otp' => $otp,
                'is_verified' => false,
            ]);

            Mail::raw(
                "Welcome to Ulixai!\n\nYour verification code is: {$otp}\n\nPlease enter this code to verify your email address.",
                function ($message) use ($user) {
                    $fromAddress = config('mail.from.address') ?: 'noreply@ulixai.com';
                    $fromName = config('mail.from.name') ?: 'Ulixai';
                    $message->to($user->email)
                            ->from($fromAddress, $fromName)
                            ->subject('Welcome to Ulixai - Email Verification');
                }
            );

            return view('user-auth.verify_otp', compact('user'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Registration failed: ' . $e->getMessage());
        }
        
    }

    private function truthy($array, $keyPath)
    {
        $value = data_get($array, $keyPath, false);
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    private function generateAffiliateLink($email, $first, $last)
    {
        $base = $first . $last . explode('@', $email)[0] . rand(100, 999);
        $slug = strtolower(Str::slug($base));
        $domain = config('app.url') ?? env('APP_URL', 'http://localhost');
        return rtrim($domain, '/') . '/affiliate/' . $slug;
    }

    public function verifyEmailOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string|size:6'
        ]);

        $verification = EmailVerification::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('is_verified', false)
            ->first();

        if (!$verification) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid or expired code.'
            ], 422);
        }

        $verification->is_verified = true;
        $verification->verified_at = now();
        $verification->save();
        $user = $verification->user;
        if ($user && !$user->email_verified_at) {
            $user->email_verified_at = now();
            $user->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Email verified successfully.'
        ]);
    }

    public function resendEmailOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'No user found with this email.'
            ], 404);
        }

        // Generate new OTP and update/create verification record
        $otp = random_int(100000, 999999);
        $verification = EmailVerification::updateOrCreate(
            ['user_id' => $user->id, 'email' => $user->email],
            ['otp' => $otp, 'is_verified' => false]
        );

        Mail::raw(
            "Welcome to Ulixai!\n\nYour new verification code is: {$otp}\n\nPlease enter this code to verify your email address.",
            function ($message) use ($user) {
                $fromAddress = config('mail.from.address') ?: 'noreply@ulixai.com';
                $fromName = config('mail.from.name') ?: 'Ulixai';
                $message->to($user->email)
                        ->from($fromAddress, $fromName)
                        ->subject('Ulixai - New Email Verification Code');
            }
        );

        return response()->json([
            'status' => 'success',
            'message' => 'A new verification code has been sent to your email.'
        ]);
    }
}
