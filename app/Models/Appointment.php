<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'name','email','phone','qualification','cgpa',
        'city','country_id','course','comments'
    ];

     public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
