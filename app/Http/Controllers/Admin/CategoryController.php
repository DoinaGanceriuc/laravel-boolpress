<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
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
            'name' => 'required|max:255|unique::categories',
        ]);

        $validated_data['slug'] = Str::slug($validated_data['name']);

        Category::create($validated_data);

        return redirect()->back()->with('message', 'Categoria aggiunta correttamente');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //ddd($request->all());
        $validated_data = $request->validate([
            'name' => 'required|max:255',
        ]);
        $validated_data['slug'] = Str::slug($validated_data['name']);

        $category->update($validated_data);

        return redirect()->back()->with('message', 'Categoria aggiornata correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
