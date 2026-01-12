<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Queue;
use App\Models\Appointment;
use App\Models\Medicine; // <--- Pastikan ini ada

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = strtolower($user->role); // Pakai huruf kecil biar aman

        // 1. SIAPKAN DATA DEFAULT
        $data = [
            'user' => $user,
            'currentPatient' => null,
            'nextPatients' => [],
            'myQueue' => null,
            'currentServing' => null,
            'upcomingSchedule' => null,
            'doctors' => [],

            // PERBAIKAN UTAMA: Masukkan medicines di sini agar semua role (termasuk dokter) dapat datanya
            'medicines' => Medicine::all(),

            // Data Poli Manual
            'polis' => [
                (object) ['id' => 'Poli Umum', 'name' => 'Poli Umum'],
                (object) ['id' => 'Poli Gigi', 'name' => 'Poli Gigi'],
                (object) ['id' => 'Poli Anak', 'name' => 'Poli Anak'],
                (object) ['id' => 'Poli Kandungan', 'name' => 'Poli Kandungan (Obgyn)'],
                (object) ['id' => 'Poli Mata', 'name' => 'Poli Mata'],
                (object) ['id' => 'Poli THT', 'name' => 'Poli THT'],
                (object) ['id' => 'Poli Penyakit Dalam', 'name' => 'Poli Penyakit Dalam'],
                (object) ['id' => 'Poli Kulit', 'name' => 'Poli Kulit & Kelamin'],
                (object) ['id' => 'Poli Jantung', 'name' => 'Poli Jantung'],
                (object) ['id' => 'Poli Syaraf', 'name' => 'Poli Syaraf'],
            ]
        ];

        // ==========================================================
        // 2. JIKA YANG LOGIN ADALAH DOKTER
        // ==========================================================
        if ($role === 'dokter') {

            // Ambil data antrean khusus dokter
            $data['currentPatient'] = Queue::with('user')
                ->where('doctor_id', $user->id)
                ->where('status', 'processing')
                ->first();

            $data['nextPatients'] = Queue::with('user')
                ->where('doctor_id', $user->id)
                ->where('status', 'pending')
                ->orderBy('created_at', 'asc')
                ->get();

            // Kirim $data (yang sudah berisi medicines dari atas) ke view
            return view('dokter.dashboard', $data);
        }

        // ==========================================================
        // 3. JIKA SUPERADMIN
        // ==========================================================
        elseif ($role === 'superadmin') {
            // 1. Ambil Data User
            $users = User::where('id', '!=', $user->id)->latest()->get();

            // 2. TAMBAHAN: Hitung Total agar tidak error "Undefined variable"
            $totalPasien = Queue::count();
            $totalObat = Medicine::count();

            // 3. Kirim ke View (Jangan lupa masukkan variabel baru ke compact)
            return view('admin.dashboard', compact('users', 'totalPasien', 'totalObat'));
        }

        // ==========================================================
        // 4. JIKA ADMIN KLINIK (USER) - DEFAULT
        // ==========================================================
        // Catatan: Jika role 'user' (Admin Klinik) masuk sini, dia akan dapat data default
        else {

            // A. Ambil Antrean Saya (Jika User ini iseng daftar antrean sendiri)
            if (class_exists(Queue::class)) {
                $data['myQueue'] = Queue::with('doctor')
                    ->where('user_id', $user->id)
                    ->whereDate('created_at', now())
                    ->whereIn('status', ['pending', 'called', 'processing'])
                    ->latest()
                    ->first();
            }

            // B. Cek Live Queue
            if ($data['myQueue']) {
                $data['currentServing'] = Queue::where('poli_id', $data['myQueue']->poli_id)
                    ->where('status', 'processing')
                    ->first();
            }

            // C. List Dokter (Untuk Form Pendaftaran)
            $data['doctors'] = User::where('role', 'dokter')->get();

            return view('dashboard', $data);
        }
    }

    // HALAMAN RIWAYAT BEROBAT
    public function riwayat()
    {
        $user = Auth::user();

        $history = Queue::with(['doctor', 'medicines'])
            ->where('user_id', $user->id)
            ->where('status', 'completed')
            ->latest()
            ->get();

        return view('pasien.riwayat', compact('history'));
    }

    // HALAMAN RESEP DIGITAL
    public function resep()
    {
        $user = Auth::user();

        $prescriptions = Queue::with(['doctor', 'medicines'])
            ->where('user_id', $user->id)
            ->where('status', 'completed')
            ->whereHas('medicines')
            ->latest()
            ->get();

        return view('pasien.resep', compact('prescriptions'));
    }
}
