<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    $role = Auth::user()->role;

    if ($role === 'superadmin') {
        return view('admin.dashboard');
    } elseif ($role === 'dokter') {
        return view('dokter.dashboard');
    } elseif ($role === 'apoteker') {
        return view('apoteker.dashboard');
    } else {
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 👇 ROUTE CRUD LAYANAN
    Route::resource('layanan', \App\Http\Controllers\ServiceController::class)
        ->names([
            'index' => 'layanan.index',
            'create' => 'layanan.create',
            'store' => 'layanan.store',
            'edit' => 'layanan.edit',
            'update' => 'layanan.update',
            'destroy' => 'layanan.destroy',
        ]);
});

require __DIR__.'/auth.php';