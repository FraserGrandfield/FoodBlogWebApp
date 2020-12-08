<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'profile_picture',
        'bio',
    ];

    public function posts() 
    {
        return $this->hasMany(Post::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favourites()
    {
        return $this->belongsToMany(Post::class)->as('favourites');
    }
}
