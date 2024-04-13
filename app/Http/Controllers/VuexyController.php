<?php

namespace App\Http\Controllers;

class VuexyController extends Controller
{
    public function profile()
    {
        return view('vuexy.profile');
    }

    public function books()
    {
        return view('vuexy.books');
    }
}
