<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorActionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\SuperAdminController;
// use App\Http\Controllers\ServiceController; // Uncomment jika sudah punya controllernya

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. ROUTE UTAMA (Redirect Otomatis)
// Jika buka web utama, langsung lempar ke login (atau dashboard jika sudah login)
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// 2. DASHBOARD (Wajib Login & Verifikasi Email jika perlu)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 3. GROUP ROUTE UNTUK USER YANG SUDAH LOGIN
Route::middleware(['auth'])->group(function () {

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Fitur Pasien & Antrean
    Route::post('/queue/store', [QueueController::class, 'store'])->name('queue.store');

    // Fitur Dokter
    Route::post('/doctor/queue/{id}/call', [DoctorActionController::class, 'callPatient'])->name('doctor.call');
    Route::post('/doctor/queue/{id}/finish', [DoctorActionController::class, 'finishPatient'])->name('doctor.finish');
    Route::post('/doctor/queue/{id}/skip', [DoctorActionController::class, 'skipPatient'])->name('doctor.skip');

    // Fitur Superadmin
    Route::get('/admin/dashboard', [SuperAdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/user/store', [SuperAdminController::class, 'store'])->name('admin.user.store');
    Route::delete('/admin/user/{id}', [SuperAdminController::class, 'destroy'])->name('admin.user.destroy');


    // Fitur Pasien (User)
    Route::get('/riwayat', [DashboardController::class, 'riwayat'])->name('riwayat.index');
    // Route::get('/resep', [DashboardController::class, 'resep'])->name('resep.index');

    // Fitur Layanan (Hanya aktifkan jika Controller sudah ada)
    /* Route::resource('layanan', ServiceController::class)
        ->names([
            'index' => 'layanan.index',
            'create' => 'layanan.create',
            'store' => 'layanan.store',
            'edit' => 'layanan.edit',
            'update' => 'layanan.update',
            'destroy' => 'layanan.destroy',
        ]);
    */
});

require __DIR__ . '/auth.php';
