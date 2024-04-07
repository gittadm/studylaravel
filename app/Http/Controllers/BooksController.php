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
        $books = Book::all(); // коллекция все книги
        // $books->toArray() - это уже обычный массив

        // все книги упорядоченные по году
        $books = Book::orderBy('year')->get();

        // все книги упорядоченные по году по убыванию
        $books = Book::orderBy('year', 'desc')->get();

        // получить книгу по данному id
        $book = Book::find(5); // null если не найдена

        // получить все книги с годом от 2000 до 2005
        $books = Book::where('year', '<=', 2005)
            ->where('year', '>=', 2000)
            ->orderBy('year')
            ->get();

        // все книги автора Достоевский
        $books = Book::where('author', '=', 'Достоевский')
            //Book::where('author', 'Достоевский')
            ->orderBy('name')
            ->get();

        dd($books);
    }
}
