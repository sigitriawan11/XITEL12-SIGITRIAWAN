<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('app', [
            'title' => 'Home',
            'data' => [
            'books' => Book::whereNotIn('is_active', [false])->get()->count(),
            'deleted_books' => Book::whereNotIn('is_active', [true])->get()->count(),
            'categories' => Category::whereNotIn('is_active', [false])->get()->count(),
            'deleted_categories' => Category::whereNotIn('is_active', [true])->get()->count(),
            ]
        ]);
    }
}
