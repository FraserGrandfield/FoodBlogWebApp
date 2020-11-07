<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'body',
    ];

    public function comments() 
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function profile()
    {
        return $this->belongsTo('App\Models\Profile');
    }
}
