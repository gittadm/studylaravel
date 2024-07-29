<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdatePasswordRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Models\User;
use App\Services\UsersService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminUsersController extends Controller
{
    private $usersService;

    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

//    public function __construct(
//        private UsersService $usersService,
//    ) {
//    }

    public function resetFilter()
    {
        session()->forget('users_filter_search');
        return redirect()->route('admin.users.index');
    }

    public function users(Request $request)
    {
        // если есть параметры в запросе, то значит, что
        // пользователь нажал Применить фильтр -
        // сохраняем параметры в сессию

        // session(['users.filter.search' => 5]);

        if (!empty($request->all())) {
            session(['users_filter_search' => $request->search]);
        } else {
            if (session()->has('users_filter_search')) {
                return redirect()
                    ->route('admin.users.index',
                            ['search' => session('users_filter_search')/*, 'status' => 'active'*/]);
            }
        }

        $users = User::query();

        if (!empty($request->status)) {
            $users->where('status', $request->status);
        }

        if (!empty($request->search)) {
            $search = Str::lower(trim($request->search));
            $search = '%' . $search . '%';
            $users->where(function ($query) use ($search) {
                $query->where('name', 'like', $search)
                    ->orWhere('login', 'like', $search)
                    ->orWhere('email', 'like', $search);
            });
        }

        if (!empty($request->sort)) {
            if ($request->sort === 'name') {
                $users->orderBy('name');
            } else {
                $users->orderBy('id', 'desc');
            }
        } else {
            $users->orderBy('name');
        }

        $users = $users->paginate();

        $statuses = User::getStatuses();

        $filter = $request->all();

        return view('admin.users.index', compact('users', 'statuses', 'filter'));
    }

    public function create()
    {
        $statuses = User::getStatuses();

        // return view('admin.users.create', ['statuses' => $statuses]);
        return view('admin.users.create', compact('statuses'));
    }

    public function store(StoreRequest $request)
    {
        // (new UsersService())->store($request->except('_token'));
        $this->usersService->store($request->except('_token'));

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
