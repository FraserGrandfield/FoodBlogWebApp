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
        'cook_time_hours',
        'cook_time_mins',
        'ingrediants',
        'instructions',
    ];

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
