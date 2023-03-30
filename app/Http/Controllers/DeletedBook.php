<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class DeletedBook extends Controller
{
    public function index(){
        $data = Book::whereNotIn('is_active', [true])->latest()->get();
        return view('Book.deleted', [
            'title' => 'Data Buku Terhapus',
            'books' => $data
        ]);
    }

    public function store(Book $book){
        $category = Category::where('id', $book->category->id)->first();

        if($category->is_active){
            $book->update(['is_active' => true]);

            return redirect('/books')->with('flash', 'Berhasil backup data buku ' . $book->title);
        } else {
            return back()->with('flash', 'Kategori pada buku ini sedang tidak aktif');
        }

    }
}
