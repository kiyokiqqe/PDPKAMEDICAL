<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RedirectController;

// Chief Controllers
use App\Http\Controllers\Chief\ChiefController;
use App\Http\Controllers\Chief\ChiefPatientController;
use App\Http\Controllers\Chief\ChiefUserController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPatientController;

// Doctor Controllers
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Doctor\PatientController as DoctorPatientController;

// Nurse Controllers
use App\Http\Controllers\Nurse\NurseController;
use App\Http\Controllers\Nurse\NursePatientController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('redirect.by.role');
    }
    return view('welcome');
})->name('welcome');

// Група для авторизованих користувачів
Route::middleware(['auth'])->group(function () {

    // Редірект після логіну за роллю
    Route::get('/redirect-by-role', [RedirectController::class, 'redirectByRole'])->name('redirect.by.role');

    /**
     * Завідувач (роль 1)
     */
    Route::prefix('chief')->name('chief.')
        ->middleware('role:1')
        ->group(function () {
            Route::get('/dashboard', [ChiefController::class, 'index'])->name('dashboard');
            Route::resource('patients', ChiefPatientController::class);
            Route::resource('users', ChiefUserController::class);
        });

    /**
     * Адміністратор (роль 2)
     */
    Route::prefix('admin')->name('admin.')
        ->middleware('role:2')
        ->group(function () {
            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
            Route::resource('patients', AdminPatientController::class);
            Route::resource('users', AdminUserController::class);
        });

    /**
     * Лікар (роль 3)
     */
    Route::prefix('doctor')->name('doctor.')
        ->middleware('role:3')
        ->group(function () {
            Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');
            Route::resource('patients', DoctorPatientController::class);
        });

    /**
     * Медсестра (роль 4)
     */
    Route::prefix('nurse')->name('nurse.')
        ->middleware('role:4')
        ->group(function () {
            Route::get('/dashboard', [NurseController::class, 'index'])->name('dashboard');
            Route::resource('patients', NursePatientController::class);
        });

    /**
     * Профіль користувача
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
