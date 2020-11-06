<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'profile_picture',
    ];

    public function posts() 
    {
        return $this->hasMany('App\Models\Post');
    }

    public function comments() 
    {
        return $this->hasMany('App\Models\Comment');
    }
}
