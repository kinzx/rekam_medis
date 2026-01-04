<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    $role = Auth::user()->role;

    if ($role === 'superadmin') {
        return view('admin.dashboard'); // Membuka file admin/dashboard.blade.php
    } elseif ($role === 'dokter') {
        return view('dokter.dashboard'); // Membuka file dokter/dashboard.blade.php
    } elseif ($role === 'apoteker') {
        return view('apoteker.dashboard'); // Membuka file apoteker/dashboard.blade.php
    } else {
        return view('dashboard'); // Membuka file dashboard.blade.php (Untuk Pasien/User Biasa)
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
