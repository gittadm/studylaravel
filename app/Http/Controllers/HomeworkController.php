<?php

namespace App\Http\Controllers;

class HomeworkController extends Controller
{
    public function task2()
    {
        // Дана строка со словами. Сделать все слова в нижнем регистре
        // и удалить все слова, которые содержатся в массиве $stopWords

        $stopWords = ['one', 'two', 'bad'];
        $text = 'hello HoW    one You Bad Two MorNing';
        $words = explode(' ', $text);

        $resultWords = [];
        foreach ($words as $word) {
            $word = strtolower($word);
            if (!empty($word) && !in_array($word, $stopWords)) {
                $resultWords[] = $word;
            }
        }

        $resultText = implode(" ", $resultWords);

        $word = ' word  ';
        $word = trim($word);

        $a = [1, 3, 4, 5, 1, 2, 1, 4];
        $a = array_values(array_unique($a));

        $s = 'word 2 wordf gg';

        $index = strpos($s, 'word');

        if ($index === false) { // !!!
            echo 'Not Found';
        }

        dd($a);

    }

    public function task1()
    {
        $count = 100;
        $prices = [1, 4, 5, 7, 3, 4];

        return view(
            'tasks',
            compact('count', 'prices'),
        );

//        return view(
//            'tasks',
//            [
//                'count' => $count,
//                'prices' => $prices,
//            ]
//        );
    }
}
