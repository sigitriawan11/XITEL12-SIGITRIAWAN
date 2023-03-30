<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DeletedCategory extends Controller
{
    public function index(){
        $data = Category::whereNotIn('is_active', [true])->latest()->get();
        return view('Category.deleted', [
            'title' => 'Data Kategori Terhapus',
            'categories' => $data
        ]);
    }

    public function store(Category $category){
        $category->update(['is_active' => true]);

        return redirect('/categories')->with('flash', 'Berhasil backup data kategori ' . $category->name);
    }
}
