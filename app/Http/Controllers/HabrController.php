<?php

namespace App\Http\Controllers;

class HabrController extends Controller
{
    public function article($id)
    {
        $articles = [
            3567 => 'Article description 3567',
            3569 => 'Article description 3569',
            1 => 'Article description 1',
            45 => 'Article description 45',
            5 => null,
        ];

        if (isset($articles[$id])) {
            dd($articles[$id]);
        } else {
            dd('Not found');
        }
    }

    public function article2($id, $name)
    {
        dump($id);
        dd($name);
    }
}
