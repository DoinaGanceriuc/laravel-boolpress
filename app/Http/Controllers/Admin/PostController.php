<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(9);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //ddd($request->all());

        $validated_data = $request->validate([
            'image' => 'nullable|url',
            'title' => 'required|max:255',
            'description' => 'nullable',
            'posted_at' => 'nullable|date_format:Y-m-d',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $validated_data['slug'] = Str::slug($validated_data['title']);

        Post::create($validated_data);

        return redirect()->route('admin.posts.index')->with('message', 'Post inserito correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('guest.posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //ddd($request->all());
        $validated_data = $request->validate([
            'image' => 'nullable|url',
            'title' => 'required|max:255',
            'description' => 'nullable',
            'posted_at' => 'nullable|date_format:Y-m-d',
        ]);

        $post->update($validated_data);

        return redirect()->route('admin.posts.index')->with(session()->flash('message', 'Post aggiornato correttamente'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with(session()->flash('message', 'Post eliminato'));
    }
}
