<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $dates = ['posted_at'];
    protected $fillable = ['image', 'title', 'slug', 'description', 'posted_at', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The roles that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

}
