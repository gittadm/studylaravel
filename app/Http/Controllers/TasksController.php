<?php

namespace App\Http\Controllers;

class TasksController extends Controller
{
    public function tasks()
    {
        return view('tasks');
    }
}
