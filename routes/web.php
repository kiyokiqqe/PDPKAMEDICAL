<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------------| 
| Web Routes 
|----------------------------------------------------------------------|
| Тут реєструються маршрути для веб-інтерфейсу. Всі маршрути обробляються
| через RouteServiceProvider та мають групу middleware "web". 
*/

// Головна сторінка (Welcome) — доступна для всіх, але при авторизації відбувається перенаправлення
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('redirect.by.role');
    }
    return view('welcome');
})->name('welcome');

// Група маршрутів з обов'язковою авторизацією та підтвердженням email
Route::middleware(['auth', 'verified'])->group(function () {

    // Розумне перенаправлення користувача після входу по ролі
    Route::get('/redirect-by-role', [RedirectController::class, 'redirectByRole'])->name('redirect.by.role');

    // Dashboard для завідувача
    Route::get('/chief-dashboard', function () {
        return view('roles.chief');
    })->name('chief.dashboard');

    // Dashboard для адміністратора
    Route::get('/admin-dashboard', function () {
        return view('roles.admin');
    })->name('admin.dashboard');

    // Dashboard для лікаря/фармацевта
    Route::get('/doctor-dashboard', function () {
        return view('roles.doctor');
    })->name('doctor.dashboard');

    // Dashboard для медсестри/медбрата
    Route::get('/nurse-dashboard', function () {
        return view('roles.nurse');
    })->name('nurse.dashboard');

    // Профіль користувача
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Додано маршрут для перегляду користувачів
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');

    // Додано маршрут для головного дашборду, якщо ви хочете перенаправляти до загального дашборду після логіну
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Всі маршрути аутентифікації (login, register, reset)
require __DIR__.'/auth.php';
