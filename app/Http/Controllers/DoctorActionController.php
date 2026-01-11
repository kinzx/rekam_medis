<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queue;
use App\Models\Medicine; // Jangan lupa import Model Medicine

class DoctorActionController extends Controller
{
    // 1. FUNGSI MEMANGGIL PASIEN
    public function callPatient($id)
    {
        $queue = Queue::findOrFail($id);

        $queue->update([
            'status' => 'processing'
        ]);

        return redirect()->back()->with('success', 'Pasien dipanggil!');
    }

    // 2. FUNGSI MENYELESAIKAN PEMERIKSAAN (Diagnosa & Resep)
    public function finishPatient(Request $request, $id)
    {
        $queue = Queue::findOrFail($id);

        // Validasi input
        $request->validate([
            'diagnosis' => 'required|string',
            'medicines' => 'nullable|array', // Validasi array obat
            'instruction' => 'nullable|string', // Validasi catatan dosis
        ]);

        // A. Update Data Utama (Diagnosa & Catatan Dosis)
        $queue->update([
            'status' => 'completed',
            'diagnosis' => $request->diagnosis,
            // Kita simpan catatan dosis ke kolom prescription agar tidak mubazir
            'prescription' => $request->instruction
        ]);

        // B. Simpan Relasi Obat & Kurangi Stok (Syarat One to Many)
        if ($request->has('medicines')) {

            // 1. Simpan ke Tabel Pivot (Many-to-Many / One-to-Many Logic)
            // Pastikan Anda sudah membuat relasi medicines() di Model Queue
            $queue->medicines()->attach($request->medicines);

            // 2. Kurangi Stok Obat
            foreach ($request->medicines as $medId) {
                $med = Medicine::find($medId);
                if ($med && $med->stock > 0) {
                    $med->decrement('stock');
                }
            }
        }

        return redirect()->back()->with('success', 'Pemeriksaan selesai, Stok obat terupdate!');
    }

    // 3. FUNGSI LEWATI PASIEN
    public function skipPatient($id)
    {
        $queue = Queue::findOrFail($id);

        $queue->update([
            'status' => 'pending',
        ]);

        return redirect()->back()->with('warning', 'Pasien dilewati dan kembali ke antrean.');
    }
}
