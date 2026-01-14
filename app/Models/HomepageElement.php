<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageElement extends Model
{
    protected $fillable = [
        'how_to_apply',
        'what_we_offer',
        'status',
    ];

    protected $casts = [
        'what_we_offer' => 'array',
    ];
}
