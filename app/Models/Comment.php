<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
    ];

    public  function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public  function profile()
    {
        return $this->belongsTo('App\Models\Profile');
    }
}
