<?php

namespace App\Http\Controllers;


use App\Models\Car;
use App\Models\User;

class CarController extends Controller
{
    public function relations()
    {
        $car = Car::find(1);
        // $user = User::where('id', $car->user_id)->first();
        // dd($car->user->name);

        $user = User::find(1);

        foreach ($user->cars as $car) {
            echo $car->model . ' ;';
        }

        // dd($user->cars);

        // Проблема n+1
        $users = User::with('cars')->get();
        dd($users);
        foreach ($users as $user) {
            // $user->cars
        }
    }

    public function index()
    {
//        $table->id();
//        $table->string('vin');
//        $table->string('model', 30);
//        $table->string('color', 30)->nullable();
//        $table->unsignedSmallInteger('year')->nullable();
//        $table->boolean('is_sold')->default(false);

        // поиск по id
//        $carId = 150;
//        $car = Car::find($carId);
//
//        if ($car) {
//           dd($car);
//        } else {
//            echo 'Car not found';
//        }

        // Найти все проданные авто цвета white

        $cars = Car::where('is_sold', 1)->where('color', 'white')->get();

        // Найти все проданные авто цвета white c годом от 2000 до 2005

        $cars = Car::where('is_sold', 1)
            ->where('color', 'white')
            ->where('year', '>=', 2000) // >=, >, <=, <, !=, <>
            ->where('year', '<=', 2005)
            ->get();

        $cars = Car::where('is_sold', 1)
            ->where('color', 'white')
            ->whereBetween('year', [2000, 2005])
            ->get();

        // Найти все проданные авто цвета white и показать первые три машины

        $cars = Car::where('is_sold', 1)
            ->where('color', 'white')
            ->limit(3)
            ->get();

        // Найти все проданные авто цвета white и сортировать по году

        $cars = Car::where('is_sold', 1)
            ->where('color', 'white')
            //->orderBy('year')
            ->orderBy('year', 'desc') // в обратном порядке
            ->get();

        // Найти первую из проданные авто цвета white и сортировать по году
        $car = Car::where('is_sold', 1)
            ->where('color', 'white')
            ->orderBy('year')
            ->first();

        // Найти  проданные авто цвета white и сортировать по году
        // получить с 10 по 15
        $cars = Car::where('is_sold', 1)
            ->where('color', 'white')
            ->orderBy('year')
            ->offset(10)
            ->limit(5)
            ->get();

        // Найти количество проданные авто цвета white
        $cars = Car::where('is_sold', 1)
            ->where('color', 'white')
            ->count();

        $cars = Car::where('is_sold', 1)
            ->where('color', 'white')
            ->max('year');

        $cars = Car::where('is_sold', 1)
            ->where('color', 'white')
            ->sum('year');

        // Существует ли проданные авто цвета white
        $cars = Car::where('is_sold', 1)
            ->where('color', 'white')
            ->exists();

        // Найти все проданные авто или авто цвета white и сортировать по году
        $cars = Car::where('is_sold', 1)
            ->orWhere('color', 'white')
            ->orderBy('year')
            ->get();

        // конкретные столбцы
        $cars = Car::select('id', 'color')->where('is_sold', 1)
            ->orWhere('color', 'white')
            ->orderBy('year')
            ->get();

        // Показать все авто которые (красные и проданные) или
        // (зеленые и непроданные)

        $color = 'red';
        $cars = Car::where(function ($query) use ($color) {
            $query->where('color', $color)
                ->where('is_sold', 1);
        })->orWhere(function ($query) {
            $query->where('color', 'green')
                ->where('is_sold', 0);
        })->get();

        $a = [1, 1, 1];
        foreach ($a as &$x) {
            $x = 5;
        }

        dd($cars);
    }
}
