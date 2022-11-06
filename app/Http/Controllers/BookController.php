<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index(){  

        $title = '';
        if(request('kategori')){
            $category = Category::firstWhere('slug', request('kategori'));
            $title = $category->name;
        }

        return view('books', [
            "title" => "Buku " . $title,
            "active" => "buku",
            "books" => Book::latest()->filter(request(['cari', 'kategori']))->paginate(12)->withQueryString()
        ]);
    }

    public function show(Book $book){
        return view('book', [
            "title" => $book->title,
            "active" => "buku",
            "book" => $book
        ]);
    }
}
