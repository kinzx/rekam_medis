<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Queue;
use App\Models\Appointment;
use App\Models\Medicine;
class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = strtolower($user->role); // Pakai huruf kecil biar aman
        $data['medicines'] = Medicine::all();

        // 1. SIAPKAN DATA DEFAULT
        $data = [
            'user' => $user,
            'currentPatient' => null,
            'nextPatients' => [],
            'myQueue' => null,
            'currentServing' => null,
            'upcomingSchedule' => null,
            'polis' => [],
            'doctors' => []
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

            // PENTING: Arahkan ke folder 'dokter/dashboard.blade.php'
            return view('dokter.dashboard', $data);
        }

        // ==========================================================
        // 3. JIKA ADMIN / APOTEKER
        // ==========================================================
        elseif ($role === 'superadmin') {
            // PERBAIKAN: Ambil data users agar tidak error "Undefined variable $users"
            $users = User::where('id', '!=', $user->id)->latest()->get();

            // Kirim data users ke view
            return view('admin.dashboard', compact('users'));
        } elseif ($role === 'apoteker') {
            return view('apoteker.dashboard'); // Pastikan file ini ada
        }

        // ==========================================================
        // 4. JIKA PASIEN (USER BIASA) - DEFAULT
        // ==========================================================
        else {

            // A. Ambil Antrean Saya
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

            // C. Jadwal
            if (class_exists(Appointment::class)) {
                $data['upcomingSchedule'] = Appointment::where('user_id', $user->id)
                    ->where('visit_date', '>', now())
                    ->orderBy('visit_date', 'asc')
                    ->first();
            }

            // D. DATA UNTUK FORM (MANUAL ARRAY)
            // Tambahkan sebanyak apapun poli yang Anda mau di sini
            $data['polis'] = [
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
            ];

            // E. List Dokter
            $data['doctors'] = User::where('role', 'dokter')->get();

            // PENTING: Arahkan ke file 'dashboard.blade.php' (milik User)
            return view('dashboard', $data);
        }
    }
    // HALAMAN RIWAYAT BEROBAT
    public function riwayat()
    {
        $user = Auth::user();

        // Ambil antrean yang statusnya sudah 'completed' (selesai)
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

        // Ambil antrean selesai yang punya data obat
        $prescriptions = Queue::with(['doctor', 'medicines'])
            ->where('user_id', $user->id)
            ->where('status', 'completed')
            ->whereHas('medicines') // Hanya yang ada obatnya
            ->latest()
            ->get();

        return view('pasien.resep', compact('prescriptions'));
    }
}
