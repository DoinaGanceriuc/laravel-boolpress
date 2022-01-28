<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function posts(Category $category)
    {
        $posts = $category->posts()->paginate(6);
        return view('guest.categories.posts', compact('posts', 'category'));
    }
}
