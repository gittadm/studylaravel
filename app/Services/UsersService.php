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
}
