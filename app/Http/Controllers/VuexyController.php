<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class VuexyController extends Controller
{
    public function profile()
    {
        return view('vuexy.profile');
    }

    public function books()
    {
        $books = Book::orderBy('id', 'desc')->paginate(3);

        return view('vuexy.books', ['books' => $books]);
    }

    public function create()
    {
        return view('vuexy.create_book');
    }

    public function store(Request $request)
    {
        Book::create($request->all());

        return redirect()->route('vuexy.books');
    }
}
