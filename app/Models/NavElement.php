<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavElement extends Model
{
    use HasFactory;

    protected $table = 'nav_elements';

    protected $fillable = [
        'location',
        'name',
        'is_visible',
        'sort_order',
    ];
}
