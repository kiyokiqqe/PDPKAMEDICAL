<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        // Вивести лише пацієнтів лікаря
        $doctorId = auth()->user()->id;

        $patients = Patient::where('doctor_id', $doctorId)->get();

        return view('doctor.patients.index', compact('patients'));
    }

    // інші CRUD методи
}
