<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function index()
    {
        return view('nurse.dashboard');  // саме так, без 'roles.'
    }
}