<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{

    protected $fillable = [ 
        'token1',
        'token2',           
        'cover',
        'description',
        'slug',
        'category_id',
        'user_id',
    ];

    
    protected $table = 'posts';
    

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
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

}
