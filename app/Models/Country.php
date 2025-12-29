<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'href',
        'country_code',
        'currency',
        'currency_code',
        'currency_symbol',
        'overview',
        'detail',
        'image',
        'status',
    ];

    public function universities()
    {
        return $this->hasMany(University::class);
    }
}
