<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function index()
    {
        if (!session()->has('counter')) {
            session(['counter' => 0]);
        }

        $counter = session('counter');
        $counter++;
        session(['counter' => $counter]);

        if ($counter > 5) {
            session()->forget('counter');
        }

        if (!session()->has('name')) {
            session(['name' => 'Petr']);
        }

        $name = session('name');

        return view('session',
                    compact('name', 'counter'));
    }
}
