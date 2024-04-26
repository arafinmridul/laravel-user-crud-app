<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id'];

    public function user()
    {
        // model is sort of abstraction layer between what we want and the database
        // it has create update delete and we can add more functions to power relationships
        return $this->belongsTo(User::class, 'user_id');
    }
}
