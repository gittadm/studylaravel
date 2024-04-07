<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BooksController extends Controller
{
    public function index()
    {
        // Добавить одну книгу в books

//        $book = new Book();
//        $book->name = 'Мартин Иден';
//        $book->author = 'Джек Лондон';
//        $book->year = 1958;
//        $book->save();

        // Добавить одну книгу в books (2 способ)

//        $book = Book::create(
//            [
//                'name' => 'Название 1', // поле name должно быть в fillable модели Book
//                'author' => 'Достоевский',
//                'year' => 2000,
//            ]
//        );

        // Добавить несколько книг сразу

        $books = [
            [
                'name' => 'Название 1', // поле name должно быть в fillable модели Book
                'author' => 'Достоевский',
                'year' => 2005,
            ],
            [
                'name' => 'Название 2', // поле name должно быть в fillable модели Book
                'author' => 'Достоевский',
                'year' => 2020,
            ],
            [
                'name' => 'Название 3', // поле name должно быть в fillable модели Book
                'author' => 'Достоевский',
                'year' => 2000,
            ],
            [
                'name' => 'Название 4', // поле name должно быть в fillable модели Book
                'author' => 'Достоевский',
                'year' => 2000,
            ],
        ];

        Book::insert($books);
    }

    public function getFromDatabase()
    {
        $books = Book::all(); // коллекция
        // $books->toArray() - это уже обычный массив

        $books =
        dd($books);
    }
}
