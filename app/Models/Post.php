<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
