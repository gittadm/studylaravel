<?php

namespace App\Http\Controllers;

use App\Events\UserFilteredEvent;
use App\Models\User;

class ObserverExampleController extends Controller
{
    public function index()
    {
        $user = new User();

        $user->name = 'Ivan';
        $user->login = 'iv33399';
        $user->status = User::STATUS_ACTIVE;
        $user->password = bcrypt('1111111');

        // $user->save();

        // $user->saveQuietly();

        // 2 способ как альтернатива saveQuietly()

        $p = 1;
        $user2 = User::withoutEvents(function () use ($p) {
            User::findOrFail($p)->delete();
            return User::find(2);
        });


        info('user saved in controller ' . $user->id);
    }

    public function eventListenerExample()
    {
        $user = User::first();

        info('start in controller ' . $user->id);
        UserFilteredEvent::dispatch($user, 123);
        info('end in controller ' . $user->id);
    }
}
