<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreRequest;
use App\Models\User;

class AdminUsersController extends Controller
{
    public function users()
    {
        $users = User::orderBy('id', 'desc')->paginate(2);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $statuses = User::getStatuses();

        // return view('admin.users.create', ['statuses' => $statuses]);
        return view('admin.users.create', compact('statuses'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('admin.users.index')
            ->with('message', 'Пользователь успешно создан');
    }
}
