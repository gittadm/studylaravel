<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Carbon\Carbon;

class CarbonController extends Controller
{
    public function task3()
    {
        //$car = Car::forceCreate(['vin' => mt_rand(1, 1000), 'model' => 'm' . mt_rand(1, 1000)]);

//        $car = Car::find(2);
//
//        if ($car) {
//            $car->delete();
//        }

//        $car = Car::find(2);
//
//        if ($car) {
//            $car->forceDelete();
//        }

        $car = Car::first();

        $car->test();

        // 'VIN - Model (color)'

        // dd($car->getFullInfo());

//        $car->model;
//        $cat->is_solid;

        dd($car->short_model_name);

        dd($car->full_info);

        dd(Car::withTrashed()->where('id', '<', 100)->restore());
    }

    public function task2()
    {
        $car = Car::find(1);

//        $a = (object)['name' => 'Petr', 'year' => 2005];
//        echo $a->name;

        $a = collect([1, 2, 3]);
        $strJson = $a->toJson();

        $strJson = json_encode(['name' => 'Petr', 'year' => 2005]);

        $b = json_decode($strJson);

        dd($b);

        dd($car->is_sold);
    }

    public function task1()
    {
        // Дан режим работы интернет-магазина. ПН 9:00 – 21:00 ВТ 9:00 – 21:00
        // СР 9:00 – 21:00 ЧТ 9:00 – 21:00 ПТ 9:00 – 21:00 СБ 10:00 – 18:00
        // ВС 10:00 – 18:00. И даны дата и время.
        // Определить, работает ли в это время магазин и
        // сколько минут до конца рабочей смены.

        // https://www.php.net/manual/ru/datetime.format.php
        // https://www.php.net/manual/en/timezones.europe.php
        // http://www.itmathrepetitor.ru/php-primery-raboty-s-carbon/

        $date = Carbon::createFromFormat("d.m.Y H:i", "01.04.2024 10:30");
        $date2 = Carbon::now();

//        $date->addDays(4)->addHour()->addMinutes(34);
//        $year = $date->year;
//        $strDate = $date->toDateTimeLocalString();

//        dump($date->toDateTimeLocalString());
//        dump($date2->toDateTimeLocalString());
//        dump($date->diffInHours($date2, false));
//        dump($date2->diffInHours($date, false));

        $copyDate = $date->copy()->addMinute();

        $schedule = [
            ['09:20', '10:45'], // пн
            ['09:30', '21:00'],
            ['09:40', '21:00'],
            ['09:50', '21:00'],
            ['09:55', '21:00'],
            ['10:10', '18:00'],
            ['10:20', '18:00'],
        ];

        $input = "01.04.2024 10:30";
        $inputDate = explode(" ", $input)[0]; // 01.04.2024
        $date = Carbon::createFromFormat("d.m.Y H:i", $input);

        // вскр = 0, пн = 1, ..., сб = 6
        $index = $date->dayOfWeek === 0 ? 6 : $date->dayOfWeek - 1;
        $period = $schedule[$index]; // ['09:00', '21:00']

        $inputDate = $date->format("d.m.Y");
        $startDate = Carbon::createFromFormat("d.m.Y H:i", $inputDate . ' ' . $period[0]);
        $endDate = Carbon::createFromFormat("d.m.Y H:i", $inputDate . ' ' . $period[1]);

        dump($date->toDateTimeLocalString());
        dump($startDate->toDateTimeLocalString());
        dump($endDate->toDateTimeLocalString());

        dump($date->format("m/Y H:i:s"));

        if ($date->greaterThanOrEqualTo($startDate) && $date->lessThanOrEqualTo($endDate)) {
            //dd('open: ' . $date->diffInMinutes($endDate) . ' min');
        } else {
            //dd('close');
        }

        // Показать все оставшиеся вторники в этом году
        $date = Carbon::now();
        $year = $date->year;

        while ($date->year === $year) {
            if ($date->dayOfWeek === Carbon::TUESDAY) {
                dump($date->format('d.m - l'));
            }
            $date->addDay();
        }

        dd(1);
    }
}
