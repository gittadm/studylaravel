<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CarbonController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\DatetimeCarbonController;
use App\Http\Controllers\ExceptionController;
use App\Http\Controllers\FlexController;
use App\Http\Controllers\HabrController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\VuexyController;
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

Route::get('homework1/task1', [HomeworkController::class, 'task1']);
Route::get('homework1/task2', [HomeworkController::class, 'task2']);
Route::get('database/crud', [DatabaseController::class, 'crud']);

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

// Route::get('subjects', ['App\Http\Controllers\SubjectsController', 'subjects']);
Route::get('students', [StudentsController::class, 'students']);
Route::get('subjects', [SubjectsController::class, 'subjects']);
Route::get('subjects2', [SubjectsController::class, 'subjects2']);

Route::get('tasks', [TasksController::class, 'tasks']);
Route::get('lessons', [LessonsController::class, 'lessons']);


Route::get('carbon', [CarbonController::class, 'task1']);
Route::get('cast/json', [CarbonController::class, 'task2']);
Route::get('soft-delete', [CarbonController::class, 'task3']);


Route::get('habr/article/{id}', [HabrController::class, 'article']);

Route::get('habr/article/{id}/comments/{name}', [HabrController::class, 'article2']);


Route::get('books', [BooksController::class, 'index']);
Route::get('books/from/database', [BooksController::class, 'getFromDatabase']);

Route::get('vuexy/profile', [VuexyController::class, 'profile'])->name('vuexy.profile');
Route::get('vuexy/books', [VuexyController::class, 'books'])->name('vuexy.books');
Route::get('vuexy/books/create', [VuexyController::class, 'create'])->name('vuexy.books.create');

// для получения данных с формы
Route::post('vuexy/books/store', [VuexyController::class, 'store'])->name('vuexy.books.store');

Route::get('cars', [CarController::class, 'index']);
Route::get('cars/relations', [CarController::class, 'relations']);

Route::get('datetime/carbon', [DatetimeCarbonController::class, 'index']);
Route::get('recursion', [DatetimeCarbonController::class, 'recursion']);

Route::group(
    ['prefix' => 'flex', 'as' => 'flex.'],
    function () {
        Route::controller(FlexController::class)->group(
            function () {
                Route::get('/', 'index')->name('index');
                Route::post('form', 'storeForm')->name('form');
            }
        );
    }
);

Route::group(
    ['prefix' => 'admin', 'as' => 'admin.'],
    function () {
        Route::get('profile', [AdminController::class, 'profile'])->name('profile');

        Route::group(
            ['prefix' => 'users', 'as' => 'users.'],
            function () {
                Route::controller(AdminUsersController::class)->group(
                    function () {
                        Route::get('/', 'users')->name('index');
                        Route::get('create', 'create')->name('create');
                        Route::post('create', 'store')->name('store');
                        Route::get('delete/{id}', 'delete')->name('delete');
                        Route::get('edit/{id}', 'edit')->name('edit');
                        Route::post('update/{id}', 'update')->name('update');
                        Route::post('update/password/{id}', 'updatePassword')->name('update.password');
                    }
                );
            }
        );
    }
);

Route::get('session', [SessionController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('exception', [ExceptionController::class, 'index']);
