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


