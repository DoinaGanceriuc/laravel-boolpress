<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ddd($request->all());
        $validated_data = $request->validate([
            'name' => 'required|max:255|unique:tags',
        ]);
        $validated_data['slug'] = Str::slug($validated_data['name']);

        Tag::create($validated_data);

        return redirect()->back()->with('message', "Tag '{$request->name}' inserito correttamente");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //ddd($request->all());
        $validated_data = $request->validate([
            'name' => 'required|max:255|unique:tags',
        ]);

        $validated_data['slug'] = Str::slug($validated_data['name']);

        $tag->update($validated_data);

        return redirect()->back()->with('message', "Tag '{$tag->name}' aggiornato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->back()->with('message', "Tag '{$tag->name}' eliminato correttamente");
    }
}
