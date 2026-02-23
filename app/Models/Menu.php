<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'url',
        'icon',
        'category',
        'keywords',
        'sort_order',
        'is_active',
    ];
}
