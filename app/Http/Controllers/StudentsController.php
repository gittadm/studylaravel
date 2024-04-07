<?php

namespace App\Http\Controllers;

class StudentsController extends Controller
{
    public function students()
    {
        $students = ['Дима', 'Петя', 'Вася'];

        return view(
            'students', ['students' => $students]
        );
    }
}
