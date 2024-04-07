<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\CarbonController;
use App\Http\Controllers\HabrController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('subjects', ['App\Http\Controllers\SubjectsController', 'subjects']);
Route::get('students', [StudentsController::class, 'students']);
Route::get('subjects', [SubjectsController::class, 'subjects']);
Route::get('subjects2', [SubjectsController::class, 'subjects2']);

Route::get('tasks', [TasksController::class, 'tasks']);
Route::get('lessons', [LessonsController::class, 'lessons']);


Route::get('carbon', [CarbonController::class, 'task1']);

Route::get('habr/article/{id}', [HabrController::class, 'article']);

Route::get('habr/article/{id}/comments/{name}', [HabrController::class, 'article2']);


Route::get('books', [BooksController::class, 'index']);
Route::get('books/from/database', [BooksController::class, 'getFromDatabase']);
