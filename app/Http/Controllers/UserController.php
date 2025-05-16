<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Метод для перегляду всіх користувачів
    public function index()
    {
        // Завідувач бачить всіх користувачів
        if (auth()->user()->role == 1) {
            $users = User::all();
        } elseif (auth()->user()->role == 2) {
            // Адміністратор бачить лише лікарів і медсестер
            $users = User::whereIn('role', [3, 4])->get();
        } else {
            abort(403, 'Доступ заборонено');
        }

        return view('users.index', compact('users'));
    }

    // Метод для редагування користувача
    public function edit(User $user)
    {
        // Перевірка прав доступу
        if (auth()->user()->role == 1 || (auth()->user()->role == 2 && in_array($user->role, [3, 4]))) {
            return view('users.edit', compact('user'));
        }

        abort(403, 'Доступ заборонено');
    }

    // Метод для оновлення даних користувача
    public function update(Request $request, User $user)
    {
        // Перевірка прав доступу
        if (auth()->user()->role == 1 || (auth()->user()->role == 2 && in_array($user->role, [3, 4]))) {
            $user->update($request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'role' => 'required|integer',
            ]));

            return redirect()->route('users.index')->with('success', 'Користувача оновлено');
        }

        abort(403, 'Доступ заборонено');
    }
}
