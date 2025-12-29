<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'href',
        'country_id',
        'city',
        'ranking',
        'tuition_fee',
        'intake_months',
        'ielts_score',
        'image',
        'status',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
