<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeletedBook;
use App\Http\Controllers\DeletedCategory;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::resource('/categories', CategoryController::class)->name('index', 'category');
Route::resource('/books', BookController::class)->name('index', 'book');
Route::get('/categories-deleted', [DeletedCategory::class, 'index'])->name('deleted-category');
Route::post('/categories-deleted/{category:slug}', [DeletedCategory::class, 'store'])->name('deleted-category-store');
Route::get('/books-deleted', [DeletedBook::class, 'index'])->name('deleted-book');
Route::post('/books-deleted/{book:slug}', [DeletedBook::class, 'store'])->name('deleted-book-store');
