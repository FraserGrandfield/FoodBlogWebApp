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
        'cook_time',
        'Ingrediants',
        'Instructions',

    ];

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function favourites()
    {
        return $this->belongsToMany(Profile::class);
    }
}
