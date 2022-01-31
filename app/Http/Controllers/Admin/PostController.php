<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::orderBy('id', 'desc')->paginate(9);
        $posts = Auth::user()->posts()->orderBy('id', 'desc')->paginate(9);

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
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
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
            'image' => 'nullable|image|max:100',
            'title' => 'required|unique:posts|max:255',
            'description' => 'nullable',
            'posted_at' => 'required|date_format:Y-m-d',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
        ]);

        if ($request->file('image')) {
            $image_path = Storage::put('post_img', $request->file('image'));

            $validated_data['image'] = $image_path;

        }
        //ddd($validated_data, $image_path);

        $validated_data['slug'] = Str::slug($validated_data['title']);

        $validated_data['user_id'] = Auth::id();

        Post::create($validated_data)->tags()->attach($request->tags);

        return redirect()->route('admin.posts.index')->with('message', "Post '{$request->title}' inserito correttamente");
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
        $categories = Category::all();
        $tags = Tag::all();
        if (Auth::id() === $post->user_id) {
            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        } else {
            abort(403);
        }

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
        if (Auth::id() === $post->user_id) {

            $validated_data = $request->validate([
                'image' => 'nullable|image|max:100',
                'title' => ['required',
                    Rule::unique('posts')->ignore($post->id),
                    'max:255',
                ],
                'description' => 'nullable',
                'posted_at' => 'required|date_format:Y-m-d',
                'category_id' => 'nullable|exists:categories,id',
                'tags' => 'nullable|exists:tags,id',
            ]);

            if ($request->file('image')) {
                Storage::delete($post->image);
                $image_path = Storage::put('post_img', $request->file('image'));

                $validated_data['image'] = $image_path;

            }
            //ddd($validated_data, $image_path);

            $validated_data['slug'] = Str::slug($validated_data['title']);

            $post->update($validated_data);
            $post->tags()->sync($request->tags);

            return redirect()->route('admin.posts.index')->with(session()->flash('message', "Post '{$post->title}' aggiornato correttamente"));
        } else {
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::id() === $post->user_id) {
            Storage::delete($post->image);
            $post->delete();

            return redirect()->route('admin.posts.index')->with(session()->flash('message', "Post '{$post->title}' eliminato"));
        } else {
            abort(403);
        }
    }
}
