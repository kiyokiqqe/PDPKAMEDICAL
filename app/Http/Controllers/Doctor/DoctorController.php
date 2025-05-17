<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function index()
    {
        // Повертаємо вигляд doctor.dashboard
        return view('doctor.dashboard');
    }

    public function saveNote(Request $request)
    {
        // Логіка збереження нотатки пацієнту (тут твоя)
    }
}
