<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = [
        'status',
        'email1',
        'email2',
        'phone',
        'whatsapp',
        'addresses',
    ];

    protected $casts = [
        'addresses' => 'array',
        'status'    => 'boolean',
    ];
}
