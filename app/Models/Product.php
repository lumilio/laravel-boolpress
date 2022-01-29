<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [            
        'name',
        'image',
        'price',
        'quantity',
        'description',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
