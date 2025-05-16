<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function redirectByRole()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        switch ($user->role) {
            case 1:
                return redirect()->route('chief.dashboard');
            case 2:
                return redirect()->route('admin.dashboard');
            case 3:
                return redirect()->route('doctor.dashboard');
            case 4:
                return redirect()->route('nurse.dashboard');
            default:
                return redirect('/dashboard');
        }
    }
}
