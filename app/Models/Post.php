<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['posted_at'];
    protected $fillable = ['image', 'title', 'slug', 'description', 'posted_at', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
