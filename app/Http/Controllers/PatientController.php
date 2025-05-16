<?php

namespace App\Http\Controllers;

use App\Models\Patient; // Якщо є модель пацієнта
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        // Отримуємо всіх пацієнтів (припускаємо, що є модель Patient)
        $patients = Patient::all();

        // Повертаємо в'юшку з даними пацієнтів
        return view('patients.index', compact('patients'));
    }
}
