<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class CacheExampleController extends Controller
{
    public function index()
    {
        // $usersCount = User::count();

        $usersCount = Cache::remember('users_count', 20, function () {
            return User::count();
        });

        echo $usersCount;
    }

    public function postman()
    {
        return json_encode(['name' => 'Ivan', 'age' => 20]);
    }
}
