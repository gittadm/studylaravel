<?php

namespace App\Http\Controllers;


use App\Models\Car;

class CarController extends Controller
{
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

        dd($cars);

    }
}
