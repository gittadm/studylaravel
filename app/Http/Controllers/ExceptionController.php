<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Throwable;

class ExceptionController extends Controller
{
    public function index()
    {

        Artisan::call('fix:logins');

        try {
            // $this->f1();
            throw new Exception('Not valid phone number');

        } catch (Exception $e) {
            // input valid phone
            dd($e->getMessage());
        }

//        try {
//            // $this->f1();
//            $user = User::find(1000);
//            echo $user->id;
//        } catch (Throwable $e) {
////            echo $e->getMessage();
////            echo $e->getCode();
////            echo $e->getTraceAsString();
////            echo 'Сервер временно недоступен';
//
//        }
    }

    public function f3(): int
    {
        $a = 1;
        if ($a == 1) {
            // 0
        } else {
            throw new Exception('Not valid phone number');
        }
    }

    public function f2(): int
    {
        //
        //
        //
        if ($this->f3()) {
            return 1;
        }
        //
        //
        //
    }

    public function f1()
    {
        //
        //
        $this->f2();
        //
        //

        //
    }
}
