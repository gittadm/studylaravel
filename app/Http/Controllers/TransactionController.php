<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $data = ['name' => 'Ivan'];

        DB::transaction(function () use ($data) {
            $user = User::create(
                [
                    'name' => $data['name'],
                    'login' => 'ivan',
                    'email' => 'ivan@ibva.ru',
                    'status' => User::STATUS_ACTIVE,
                    'password' => bcrypt('1111111'),
                ]
            );

            throw new Exception('error!!!');

            Car::create(
                [
                    'vin' => '123bbbbb',
                    'model' => 'www',
                    'user_id' => $user->id,
                ]
            );
        });

        echo 'Done';
    }
}
