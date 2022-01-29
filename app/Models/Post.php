<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [            
        'cover',
        'description',
        'slug',
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
