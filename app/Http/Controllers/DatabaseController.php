<?php

namespace App\Http\Controllers;

use App\Models\Car;

class DatabaseController extends Controller
{
    public function crud()
    {
        // Добавить один авто в бд

//        $car = new Car(); // ORM Eloquent
//
//        $car->color = 'white';
//        $car->vin = mt_rand(1, 10000);
//        $car->model = 'Audi';
//        $car->year = mt_rand(1990, 2024);
//        $car->is_sold = mt_rand(0, 1);
//
//        $car->save();
//
//        echo $car->id;

        // Получить список всех авто

        $cars = Car::all();

        // Получить список всех авто 2020 года, которые не проданы

        // where('year', '=', 2020)
        // where('year', '<=', 2020) // <=, >=, <>, !=, >, <
        $cars = Car::where('year', 2020)->where('is_sold', 0)->get();

        dd($cars);
    }
}
