<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'href',
        'institution',
        'representative',
        'event_date',
        'start_time',
        'end_time',
        'location',
        'contact_person',
        'contact_number',
        'overview',
        'detail',
        'image',
        'status',
    ];

    protected $dates = ['event_date'];
}
