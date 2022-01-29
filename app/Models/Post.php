<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [            
        'cover',
        'description',
        'slug',
        'category_id',
    ];
    

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
