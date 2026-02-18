<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageElement extends Model
{
    protected $fillable = [
        'how_to_apply',
        'what_we_offer',
        'counters',
        'footer_cta',
        'btn_text',
        'url',
        'status',
    ];

    protected $casts = [
        'what_we_offer' => 'array',
        'counters' => 'array',
    ];
}
