<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['e-mail-user', 'content-answer'];
    
    protected $table = 'answers';
}
