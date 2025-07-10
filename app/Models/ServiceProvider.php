<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceProvider extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'native_language',
        'spoken_language',
        'services_to_offer',
        'services_to_offer_category',
        'provider_address',
        'operational_countries',
        'communication_online',
        'communication_inperson',
        'profile_description',
        'profile_photo',
        'provider_docs',
        'phone_number',
        'country',
        'preferred_language',
        'special_status',
        'email',
        'documents',
        'ip_address',
    ];

    protected $casts = [
        'spoken_language' => 'array',
        'operational_countries' => 'array',
        'special_status' => 'array',
        'documents' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
