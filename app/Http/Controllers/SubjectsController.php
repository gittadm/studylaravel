<?php

namespace App\Http\Controllers;

class SubjectsController extends Controller
{
    public function subjects()
    {
        $subject = 'Математика';
        $name = 'Ivan';
        $subjects = ['Математика', 'Физика', 'Русский'];

        return view(
            'subjects',
            [
                'subject' => $subject,
                'name' => $name,
                'count' => 6,
                'subjects' => $subjects,
            ]
        );
    }

    public function subjects2()
    {
        echo '222222222222222';
    }
}
