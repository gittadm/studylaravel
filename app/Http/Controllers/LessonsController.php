<?php

namespace App\Http\Controllers;

class LessonsController extends Controller
{
    private string $email;

    private function calculate(): void
    {

    }

    public function lessons()
    {
        $this->email = '';
        $this->calculate();
        $this->email = 'qwert@mail.ru<br>';

        $lessons = [1, 2, 4, 5, 6, 7];

        return view('lessons',
                    ['email' => $this->email, 'one' => 123, 'lessons' => $lessons]);
    }
}
