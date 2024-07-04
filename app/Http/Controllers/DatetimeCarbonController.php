<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class DatetimeCarbonController extends Controller
{
    // n! = 1*2*3*...*(n-1)*n
    // 4! = 1*2*3*4
    // 0! = 1

    private function fact(int $n): int
    {
        // n! = n * (n-1)!
        if ($n === 1) {
            return 1;
        }

        return $n * $this->fact($n - 1);
    }

    private function countArrayNumbers(array $a): int
    {
        // [1, 27, [3, [4, 5]], 6, [7], [8, 9]].

        $count = 0;
        foreach ($a as $x) {
            if (is_array($x)) {
                $count += $this->countArrayNumbers($x);
            } else {
                $count++;
            }
        }
        return $count;
    }

    public function recursion()
    {
        // dd($this->fact(5));

        // Дан многомерный массив чисел.
        // Например, [1, 2, [3, [4, 5]], 6, [7], [8, 9]].
        // Найти кол-во чисел в массиве.

        $a = [1, 2, [3, [4, 5]], 6, [7], [8, 9]];
        dd($this->countArrayNumbers($a));
    }

    public function index()
    {
        $this->task10();
        return;

        $date = '23.12.2024 10:12:13';
        $carbon = Carbon::createFromFormat('d.m.Y H:i:s', $date);

        // dd($carbon->year);
        // dd($carbon->month);

        $carbon->month(11)->year(2020);
        $carbon->month = 9;

        // dd($carbon->format('m.y H'));
        // dd($carbon->toDateTimeString());

        $now = now();
        $now = Carbon::now();
        $now->addHours(5);
        $now->subDays(3);

        if ($carbon->lessThanOrEqualTo($now)) {
            dd('Yes');
        }

        $date2 = $now->copy()->addHour();

        dd($now);
    }

    public function task9()
    {
        /*
       Помогите репетитору по английскому.
       Урок длится 45 минут, перерыв между уроками 10 мин.
       Репетитор говорит время начала работы и время окончания
       работы (в рамках одного дня).
       Сгенерируйте расписание уроков.
       Например, 10:00 - начало, 18:00 - окончание.
       Расписание: 10:00 - 10:45, 10:55 - 11:40 и т.д.
       Если урок обрывается временем окончания работы,
       то не добавлять его в расписание.
       */

        $startTime = '10:00';
        $endTime = '18:00';
        $lessonDuration = 45;
        $pause = 10;

        $date = Carbon::createFromFormat('H:i', $startTime);
        $end = Carbon::createFromFormat('H:i', $endTime);

        $schedule = [];

        while ($date->lessThanOrEqualTo($end)) {
            $lessonStart = $date->format('H:i');
            $date->addMinutes($lessonDuration);
            $lessonEnd = $date->format('H:i');

            if ($date->lessThanOrEqualTo($end)) {
                $schedule[] = [$lessonStart, $lessonEnd];
            }

            $date->addMinutes($pause);
        }
    }

    private function task10()
    {
        /* Дан режим работы интернет-магазина.
         * ПН 9:00 – 21:00
         * ВТ 9:00 – 21:00
         * СР 9:00 – 21:00
         * ЧТ 9:00 – 21:00
         * ПТ 9:00 – 21:00
         * СБ 10:00 – 18:00
         * ВС 10:00 – 18:00.
         * И даны дата и время.
         * Определить, работает ли в это время магазин и
         * сколько минут до конца рабочей смены.
         * */

        $schedule = [
            '10:00 – 18:00', // вск
            '9:00 – 21:00', // пн
            '9:00 – 21:00',
            '9:00 – 21:00',
            '9:00 – 21:00',
            '9:00 – 21:00',
            '10:00 – 18:00', // сб
        ];

        $date = '24.06.2024 20:50:00';
        $carbon = Carbon::parse($date);
        $dayOfWeek = $carbon->dayOfWeek;
        $workPeriod = $schedule[$dayOfWeek];
        $workPeriodParts = explode('–', $workPeriod);

        $endDate = Carbon::createFromFormat('H:i', trim($workPeriodParts[1]));

        if ($carbon->lessThanOrEqualTo($endDate)) {
            echo 'Yes ' . $carbon->diffInMinutes($endDate);
        } else {
            echo 'No';
        }
    }
}
