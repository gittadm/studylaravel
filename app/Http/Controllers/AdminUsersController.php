<?php

namespace App\Http\Controllers;

class AdminUsersController extends Controller
{
    public function users()
    {
        return view('admin.users.index');
    }
}
