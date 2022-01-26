<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['posted_at'];
    protected $fillable = ['image', 'title', 'description', 'author', 'posted_at'];
}
