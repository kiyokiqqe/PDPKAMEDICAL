<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirectByRole()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('welcome');
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
                return redirect()->route('welcome');
        }
    }
}
