<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::whereNotIn('is_active', [false])->latest()->get();
        return view('Book.index', [
            'title' => 'Buku Perpustakaan',
            'books' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNotIn('is_active', [false])->orderBy('name')->get();
        return view('Book.create', [
            'title' => 'Buat Buku Perpustakaan',
            'categories' => $categories
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
            'category_id' => 'required|numeric',
            'image' => 'required|image',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'author' => 'required',
            'release' => 'required'
        ]);
        // return $validate;

        $validate['slug'] = Str::slug($validate['title']);


        if($request->file('image')){
            $path = $request->file('image')->store('book_image');
            $validate['image'] = $path;
        }

        $data = Book::create($validate);

        return redirect('/books')->with('flash', 'Berhasil menambahkan buku ' . $data->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::whereNotIn('is_active', [false])->whereNotIn('id', [$book->id])->orderBy('name')->get();
        return view('Book.edit', [
            'title' => 'Buat Buku Perpustakaan',
            'categories' => $categories,
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules  = [
            'category_id' => 'required|numeric',
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'author' => 'required',
            'release' => 'required'
        ];

        $rules['image'] = $request->files('image') ?  'required|image' : 'required';

        $validate = $request->validate($rules);
        $validate['slug'] = Str::slug($validate['title']);

        if($request->files('image')){
            Storage::delete($book->image);
            $path = $request->file('image')->store('book_image');
            $validate['image'] = $path;
        }

        $book->update($validate);

        return redirect('/books')->with('flash', 'Berhasil merubah data buku ' . $book->title);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->update(['is_active' => false]);

        return redirect('/books')->with('flash', 'Berhasil menghapus data buku ' . $book->title);
    }
}
