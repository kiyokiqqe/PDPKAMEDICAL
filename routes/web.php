<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RedirectController;

// Controllers for Chief
use App\Http\Controllers\Chief\ChiefController;
use App\Http\Controllers\Chief\ChiefPatientController;
use App\Http\Controllers\Chief\ChiefUserController;

// Controllers for Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPatientController;

// Controllers for Doctor
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Doctor\PatientController as DoctorPatientController;

// Controller for Nurse
use App\Http\Controllers\Nurse\NurseController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('redirect.by.role');
    }
    return view('welcome');  // Проста welcome-сторінка
})->name('welcome');

Route::middleware(['auth'])->group(function () {

    // Перенаправлення після логіну за роллю
    Route::get('/redirect-by-role', [RedirectController::class, 'redirectByRole'])->name('redirect.by.role');

    // Роль 1 — Завідувач
    Route::prefix('chief')->name('chief.')
        ->middleware('role:1')  // Переконайтесь, що middleware role приймає роль як число
        ->group(function () {
            Route::get('/dashboard', [ChiefController::class, 'index'])->name('dashboard');
            Route::resource('patients', ChiefPatientController::class);
            Route::resource('users', ChiefUserController::class);
        });

    // Роль 2 — Адміністратор
    Route::prefix('admin')->name('admin.')
        ->middleware('role:2')
        ->group(function () {
            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
            Route::resource('patients', AdminPatientController::class);
            Route::resource('users', AdminUserController::class);
        });

    // Роль 3 — Лікар
    Route::prefix('doctor')->name('doctor.')
        ->middleware('role:3')
        ->group(function () {
            Route::get('/dashboard', [DoctorController::class, 'index'])->name('dashboard');
            Route::resource('patients', DoctorPatientController::class);
            Route::post('/note', [DoctorController::class, 'saveNote'])->name('note.save');
        });

    // Роль 4 — Медсестра
    Route::prefix('nurse')->name('nurse.')
        ->middleware('role:4')
        ->group(function () {
            Route::get('/dashboard', [NurseController::class, 'index'])->name('dashboard');
            Route::resource('patients', AdminPatientController::class);  // Якщо медсестра працює з пацієнтами через AdminPatientController
        });

    // Профіль користувача (спільний)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
