<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'href',
        'overview',
        'detail',
        'image',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
