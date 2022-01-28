<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function posts(Tag $tag)
    {
        $posts = $tag->posts()->paginate(6);
        return view('guest.tags.posts', compact('posts', 'tag'));
    }
}
