<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobsssController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('welcome'); // Ganti dengan halaman utama yang sesuai jika berbeda
})->name('home');

// Dashboard (diperlukan autentikasi)
Route::get('/dashboard', function () {
    return view('dashboard'); // Pastikan file `dashboard.blade.php` ada
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk profil pengguna (diperlukan autentikasi)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk pengelolaan lowongan pekerjaan (diperlukan autentikasi)
Route::middleware('auth')->group(function () {
    Route::get('/jobs', [JobsssController::class, 'index'])->name('jobs.index'); // Daftar lowongan
    Route::get('/jobs/create', [JobsssController::class, 'create'])->name('jobs.create'); // Form tambah lowongan
    Route::post('/jobs', [JobsssController::class, 'store'])->name('jobs.store'); // Simpan lowongan baru
    Route::get('/jobs/{id}', [JobsssController::class, 'show'])->name('jobs.show'); // Detail lowongan
    Route::get('/jobs/{id}/edit', [JobsssController::class, 'edit'])->name('jobs.edit'); // Form edit lowongan
    Route::patch('/jobs/{id}', [JobsssController::class, 'update'])->name('jobs.update'); // Update lowongan
    Route::delete('/jobs/{id}', [JobsssController::class, 'destroy'])->name('jobs.destroy'); // Hapus lowongan
});

// Rute untuk pengelolaan lamaran pekerjaan (diperlukan autentikasi)
Route::middleware('auth')->group(function () {
    Route::get('/applications', [ApplicationsController::class, 'index'])->name('applications.index'); // Daftar lamaran
    Route::get('/applications/create', [ApplicationsController::class, 'create'])->name('applications.create'); // Form tambah lamaran
    Route::post('/applications', [ApplicationsController::class, 'store'])->name('applications.store'); // Simpan lamaran baru
    Route::get('/applications/{id}', [ApplicationsController::class, 'show'])->name('applications.show'); // Detail lamaran
    Route::get('/applications/{id}/edit', [ApplicationsController::class, 'edit'])->name('applications.edit'); // Form edit lamaran
    Route::patch('/applications/{id}', [ApplicationsController::class, 'update'])->name('applications.update'); // Update lamaran
    Route::delete('/applications/{id}', [ApplicationsController::class, 'destroy'])->name('applications.destroy'); // Hapus lamaran
});

// Rute autentikasi (login dan register) - Laravel Breeze
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Rute autentikasi lainnya (Laravel Breeze)
// Ini sudah mencakup fitur logout, forgot password, dan lainnya
require __DIR__ . '/auth.php';  // Laravel Breeze otomatis menyediakan rute ini

//rute untuk edit profil
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
