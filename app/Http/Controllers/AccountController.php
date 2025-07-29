<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function index(Request $request) {
        return view('dashboard.account.my-account');
    }

    public function personalInfo(Request $request) {
        $user = auth()->user();
        $countries = ['Afghanistan','Albania','Algeria','Andorra','Angola','Argentina','Armenia','Australia','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belarus','Belgium','Belize','Benin','Bhutan','Bolivia','Bosnia and Herzegovina','Botswana','Brazil','Brunei','Bulgaria','Burkina Faso','Burundi','Cabo Verde','Cambodia','Cameroon','Canada','Central African Republic','Chad','Chile','China','Colombia','Comoros','Congo','Costa Rica','Croatia','Cuba','Cyprus','Czech Republic','Denmark','Djibouti','Dominica','Dominican Republic','Ecuador','Egypt','El Salvador','Equatorial Guinea','Eritrea','Estonia','Eswatini','Ethiopia','Fiji','Finland','France','Gabon','Gambia','Georgia','Germany','Ghana','Greece','Grenada','Guatemala','Guinea','Guinea-Bissau','Guyana','Haiti','Honduras','Hungary','Iceland','India','Indonesia','Iran','Iraq','Ireland','Israel','Italy','Jamaica','Japan','Jordan','Kazakhstan','Kenya','Kiribati','Kuwait','Kyrgyzstan','Laos','Latvia','Lebanon','Lesotho','Liberia','Libya','Liechtenstein','Lithuania','Luxembourg','Madagascar','Malawi','Malaysia','Maldives','Mali','Malta','Marshall Islands','Mauritania','Mauritius','Mexico','Micronesia','Moldova','Monaco','Mongolia','Montenegro','Morocco','Mozambique','Myanmar','Namibia','Nauru','Nepal','Netherlands','New Zealand','Nicaragua','Niger','Nigeria','North Korea','North Macedonia','Norway','Oman','Pakistan','Palau','Palestine','Panama','Papua New Guinea','Paraguay','Peru','Philippines','Poland','Portugal','Qatar','Romania','Russia','Rwanda','Saint Kitts and Nevis','Saint Lucia','Saint Vincent and the Grenadines','Samoa','San Marino','Sao Tome and Principe','Saudi Arabia','Senegal','Serbia','Seychelles','Sierra Leone','Singapore','Slovakia','Slovenia','Solomon Islands','Somalia','South Africa','South Korea','South Sudan','Spain','Sri Lanka','Sudan','Suriname','Sweden','Switzerland','Syria','Taiwan','Tajikistan','Tanzania','Thailand','Timor-Leste','Togo','Tonga','Trinidad and Tobago','Tunisia','Turkey','Turkmenistan','Tuvalu','Uganda','Ukraine','United Arab Emirates','United Kingdom','United States','Uruguay','Uzbekistan','Vanuatu','Vatican City','Venezuela','Vietnam','Yemen','Zambia','Zimbabwe'];

        $languages = ['Afrikaans','Albanian','Amharic','Arabic','Armenian','Azerbaijani','Basque','Belarusian','Bengali','Bosnian','Bulgarian','Catalan','Chinese (Simplified)','Chinese (Traditional)','Croatian','Czech','Danish','Dutch','English','Estonian','Filipino','Finnish','French','Galician','Georgian','German','Greek','Gujarati','Hausa','Hebrew','Hindi','Hungarian','Icelandic','Igbo','Indonesian','Irish','Italian','Japanese','Javanese','Kannada','Kazakh','Khmer','Korean','Kurdish','Kyrgyz','Lao','Latin','Latvian','Lithuanian','Luxembourgish','Macedonian','Malagasy','Malay','Malayalam','Maltese','Maori','Marathi','Mongolian','Myanmar (Burmese)','Nepali','Norwegian','Pashto','Persian','Polish','Portuguese','Punjabi','Romanian','Russian','Samoan','Serbian','Sesotho','Shona','Sindhi','Sinhala','Slovak','Slovenian','Somali','Spanish','Sundanese','Swahili','Swedish','Tajik','Tamil','Telugu','Thai','Turkish','Ukrainian','Urdu','Uzbek','Vietnamese','Welsh','Xhosa','Yiddish','Yoruba','Zulu'];

        $provider = null;
        if ($user->user_role === 'service_provider') {
            
            $provider = $user->serviceProvider;
        }
        return view('dashboard.account.my-personal-info', compact('user', 'provider', 'countries', 'languages'));
    }


    public function updatePersonalInfo(Request $request)
    {
        try {
            $user = User::findorfail($request->user_id);
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            // Validation rules
            $rules = [
                'name' => 'required|string|max:255',
                'dob' => 'nullable|date|before:today',
                'gender' => 'nullable|in:Male,Female',
                'address' => 'nullable|string|max:500',
                'country' => 'nullable|string|max:255',
                'preferred_language' => 'nullable|string|max:255',
                'whatsapp_number' => 'nullable|string|max:20',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($user->id)
                ]
            ];

            // Add service provider specific validation
            if ($user->user_role === 'service_provider') {
                $rules['provider_native_language'] = 'nullable|string|max:255';
                $rules['spoken_languages'] = 'nullable|array';
                $rules['spoken_languages.*'] = 'string|max:255';
            } else {
                $rules['spoken_languages_text'] = 'nullable|string|max:500';
            }

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Update user information
            $userData = [
                'name' => $request->name,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'address' => $request->address,
                'country' => $request->country,
                'preferred_language' => $request->preferred_language,
                'email' => $request->email,
            ];

            // Add phone number if provided
            if ($request->whatsapp_number) {
                $userData['phone_number'] = $request->whatsapp_number;
            }

            $user->update(array_filter($userData));

            // Update service provider information if applicable
            if ($user->user_role === 'service_provider' && $user->serviceProvider) {
                $providerData = [];
                
                if ($request->provider_native_language) {
                    $providerData['native_language'] = $request->provider_native_language;
                }
                
                if ($request->spoken_languages) {
                    $providerData['spoken_language'] = json_encode($request->spoken_languages);
                }

                if (!empty($providerData)) {
                    $user->serviceProvider->update($providerData);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Personal information updated successfully',
                'data' => [
                    'user' => $user->fresh(),
                    'service_provider' => $user->user_role === 'service_provider' ? $user->serviceProvider : null
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating information',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update individual field
     */
    public function updateField(Request $request)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            // Get the field name and value
            $allowedFields = ['email', 'whatsapp_number'];
            $fieldName = null;
            $fieldValue = null;

            foreach ($allowedFields as $field) {
                if ($request->has($field)) {
                    $fieldName = $field;
                    $fieldValue = $request->input($field);
                    break;
                }
            }

            if (!$fieldName) {
                return response()->json([
                    'success' => false,
                    'message' => 'No valid field provided'
                ], 400);
            }

            // Validation based on field
            $rules = [];
            switch ($fieldName) {
                case 'email':
                    $rules['email'] = [
                        'required',
                        'email',
                        Rule::unique('users')->ignore($user->id)
                    ];
                    break;
                case 'whatsapp_number':
                    $rules['whatsapp_number'] = 'nullable|string|max:20';
                    break;
            }

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Update the field
            if ($fieldName === 'whatsapp_number') {
                $user->update(['phone_number' => $fieldValue]);
            } else {
                $user->update([$fieldName => $fieldValue]);
            }

            return response()->json([
                'success' => true,
                'message' => ucfirst(str_replace('_', ' ', $fieldName)) . ' updated successfully',
                'data' => [
                    'field' => $fieldName,
                    'value' => $fieldValue
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the field',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get user profile information
     */
    public function getProfile()
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $data = [
                'user' => $user
            ];

            if ($user->user_role === 'service_provider' && $user->serviceProvider) {
                $data['service_provider'] = $user->serviceProvider;
            }

            return response()->json([
                'success' => true,
                'data' => $data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $validator = Validator::make($request->all(), [
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Check current password
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Current password is incorrect'
                ], 400);
            }

            // Update password
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Password updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating password',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function myDocuments(Request $request) {
        return view('dashboard.account.my-documents');
    }


    public function pointCalculation(Request $request) {
        return view('dashboard.account.points-calculation');
    }

    public function uploadPicture(Request $request) {
        return view('dashboard.account.upload-picture');
    }

    public function uploadDocument(Request $request) {
        return view('dashboard.account.upload-document');
    }

    public function affiliationAccounts(Request $request) {
        $user = Auth::user();
        if($user) {
            $affiliates = $user->referrals()->get() ?? [];
            return view('dashboard.my-affiliate-account', compact('affiliates', 'user'));
        }
    }


}
