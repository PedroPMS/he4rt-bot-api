<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $table = "badges";

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'redeem_code',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];
}