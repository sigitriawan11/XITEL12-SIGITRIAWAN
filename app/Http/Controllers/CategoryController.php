<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::whereNotIn('is_active', [false])->latest()->get();
        return view('Category.index', [
            'title' => 'Kategori',
            'categories' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.create', [
            'title' => 'Buat Kategori'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string'
        ]);

        $validate['slug'] = Str::slug($validate['name']);

        $data = Category::create($validate);

        return redirect('/categories')->with('flash', 'Berhasil membuat kategori ' . $data->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('Category.edit', [
            'title' => 'Edit Kategori ' . $category->name,
            'category' => $category
        ]);
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
        $validate = $request->validate([
            'name' => 'required|string'
        ]);

        $validate['slug'] = Str::slug($validate['name']);

        $category->update($validate);

        return redirect('/categories')->with('flash', 'Berhasil merubah kategori ' . $category->name);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->update(['is_active' => false]);

        Book::whereHas('category', function($query) use ($category) {
            $query->where('id', $category->id);
        })->update(['is_active' => false]);

        return redirect('/categories')->with('flash', 'Berhasil menghapus kategori ' . $category->name);
    }
}
