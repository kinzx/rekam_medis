<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queue;
use Illuminate\Support\Facades\Auth;

class QueueController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi Input (Hapus 'no_rm' dari sini karena bukan inputan user)
        $request->validate([
            'poli_id' => 'required',
            'doctor_id' => 'required',
            'visit_date' => 'required|date',
            'complaint' => 'required|string',
        ]);

        // 2. GENERATE NO RM OTOMATIS DISINI
        // Format: RM-TAHUN-ANGKA_ACAK (Contoh: RM-2026-4821)
        // Kita pakai loop do-while untuk memastikan tidak ada nomor kembar (duplikat)
        do {
            $no_rm = 'RM-' . date('Y') . '-' . rand(1000, 9999);
        } while (Queue::where('no_rm', $no_rm)->exists());

        // 3. GENERATE NOMOR ANTREAN (Opsional, biar rapi A-001, A-002)
        // Hitung antrean hari ini untuk poli tersebut
        $count = Queue::where('poli_id', $request->poli_id)
            ->whereDate('created_at', now())
            ->count();
        $queue_number = 'A-' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);


        // 4. SIMPAN KE DATABASE
        Queue::create([
            'user_id' => Auth::id(),
            'poli_id' => $request->poli_id,
            'doctor_id' => $request->doctor_id,
            'visit_date' => $request->visit_date,
            'complaint' => $request->complaint,
            'status' => 'pending',

            // Masukkan data otomatis tadi di sini:
            'no_rm' => $no_rm,
            'queue_number' => $queue_number
        ]);

        // 5. KEMBALIKAN KE DASHBOARD
        return redirect()->route('dashboard')->with('success', 'Berhasil mendaftar! No RM Anda: ' . $no_rm);
    }
}
