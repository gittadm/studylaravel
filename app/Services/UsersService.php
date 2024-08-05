<?php

namespace App\Services;

use App\Models\User;

class UsersService
{
    public function store(array $data): User
    {
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }

    public function getNewUsersCount()
    {
        return User::where('id', '<', 10)->count();
    }

    public function getUsers()
    {
        return array_to_string([1, 2, 3]);

        return User::father(50)->get();

        return User::admin()->active()->get();

        return User::whereIn('status', [User::STATUS_ACTIVE, User::STATUS_WAIT])
            ->get();
    }
}
