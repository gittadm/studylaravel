<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        return view('admin.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('admin.profile');
    }

    public function updatePassword(Request $request)
    {
        $currentPassword = $request->current_password;

        $user = Auth::user();

        if (!Hash::check($currentPassword, $user->password)) {
            return redirect()->route('admin.profile')
                ->with('error', 'Текущий пароль неверный');
        }

        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('admin.profile')
            ->with('message', 'Пароль успешно изменен');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
