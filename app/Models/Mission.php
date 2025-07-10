<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $table = 'missions';

    protected $fillable = [
        'requester_id',
        'category_id',
        'subcategory_id',
        'subsubcategory_id',
        'title',
        'description',
        'budget_min',
        'budget_max',
        'budget_currency',
        'service_durition',
        'location_country',
        'location_city',
        'is_remote',
        'language',
        'urgency',
        'status',
        'selected_provider_id',
        'payment_status',
        'is_fake',
        'attachments'
    ];

    // Relationships
    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'subcategory_id');
    }

    public function selectedProvider()
    {
        return $this->belongsTo(User::class, 'selected_provider_id');
    }
}
