<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'mission_id',
        'provider_id',
        'offer_id',
        'stripe_session_id',
        'amount_paid',
        'client_fee',
        'provider_fee',
        'country',
        'user_role',
        'status',
        'stripe_payment_intent_id'
    ];
}
