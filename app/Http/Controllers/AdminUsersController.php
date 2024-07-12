<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdatePasswordRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Models\User;

class AdminUsersController extends Controller
{
    public function users()
    {
        $users = User::orderBy('id', 'desc')->paginate(2);
        $statuses = User::getStatuses();

        return view('admin.users.index', compact('users', 'statuses'));
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

    public function delete(int $id)
    {
        $count = User::where('id', $id)->delete();

        if ($count) {
            return redirect()->route('admin.users.index')
                ->with('message', 'Пользователь успешно удален');
        }

        return redirect()->route('admin.users.index')
            ->with('error', 'Пользователь не найден');
    }

    public function edit(int $id)
    {
        $user = User::find($id);

        if ($user) {
            $statuses = User::getStatuses();

            return view('admin.users.edit', compact('statuses', 'user'));
        }

        return redirect()->route('admin.users.index')
            ->with('error', 'Пользователь не найден');
    }

    public function update(UpdateRequest $request, int $id)
    {
//        User::where('id', $id)->update(
//            [
//                'email' => $request->email,
//                'login' => $request->login,
//                'status' => $request->status,
//                'name' => $request->name,
//            ]
//        );

        if (!User::where('id', $id)->exists()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Пользователь не найден');
        }

        User::where('id', $id)
            ->update($request->validated());

        return redirect()->route('admin.users.edit', [$id])
            ->with('message', 'Пользователь успешно изменен');
    }

    public function updatePassword(UpdatePasswordRequest $request, int $id)
    {
        if (!User::where('id', $id)->exists()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Пользователь не найден');
        }

        User::where('id', $id)
            ->update(
                [
                    'password' => bcrypt($request->validated('password'))
                ]
            );

        return redirect()->route('admin.users.edit', [$id])
            ->with('message', 'Пароль успешно изменен');
    }
}
