<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'email_otp',
        'country',
        'affiliate_code',
        'referred_by',
        'referral_stats',
        'status',
        'user_role',
        'preferred_language',
        'is_fake',
        'last_login_at',
        'remember_token',
        'gender',
        'affiliate_balance',
        'pending_affiliate_balance',
        'dob', 
        'address',
        'phone_number'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'referral_stats' => 'array',
        'is_fake' => 'boolean',
        'last_login_at' => 'datetime',
    ];

    // ===========================================
    // RELATIONSHIPS
    // ===========================================

    public function serviceProvider(): HasOne
    {
        return $this->hasOne(ServiceProvider::class);
    }

    public function emailVerification()
    {
        return $this->hasOne(EmailVerification::class);
    }
   
    public function referrer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'referred_by');
    }

    /**
     * Get all users referred by this user.
     */
    public function referrals(): HasMany
    {
        return $this->hasMany(User::class, 'referred_by');
    }

    public function commissions(): HasMany
    {
        return $this->hasMany(AffiliateCommission::class, 'referrer_id');
    }
}


// // Creating a user with all data in single table
// $user = User::create([
//     'f_name' => 'John',
//     'l_name' => 'Doe',
//     'email' => 'john@example.com',
//     'country_code' => 'US',
//     'affiliate_code' => User::generateAffiliateCode(),
//     'spoken_languages' => [
//         ['code' => 'en', 'proficiency' => 'native', 'is_primary' => true],
//         ['code' => 'es', 'proficiency' => 'advanced', 'is_primary' => false]
//     ],
//     'operational_countries' => [
//         ['code' => 'US', 'name' => 'United States', 'is_primary' => true],
//         ['code' => 'CA', 'name' => 'Canada', 'is_primary' => false]
//     ],
//     'preferences' => [
//         'notifications' => ['email' => true, 'sms' => false],
//         'privacy' => ['profile_visible' => true]
//     ]
// ]);

// // Adding languages dynamically
// $user->addLanguage('fr', 'intermediate', false);

// // Adding operational countries
// $user->addOperationalCountry('MX', 'Mexico', false);

// // Adding documents
// $user->addDocument('passport', '/docs/passport.pdf', true);

// // Getting data
// $primaryLang = $user->getPrimaryLanguage();
// $primaryCountry = $user->getPrimaryOperationalCountry();
// $verifiedDocs = $user->getVerifiedDocuments();

// // Setting preferences
// $user->setPreference('theme', 'dark');
// $theme = $user->getPreference('theme', 'light');
