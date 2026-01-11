<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();

            // 1. Relasi ke Pasien (User yang login)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // 2. Relasi ke Dokter (User yang role-nya dokter)
            // Kita arahkan ke tabel 'users' juga
            $table->foreignId('doctor_id')->constrained('users')->onDelete('cascade');

            // 3. Nama Poli (Disimpan sebagai String/Text dulu agar aman)
            $table->string('poli_id')->nullable();

            // 4. Data Antrean
            $table->string('queue_number'); // Contoh: A-001
            $table->date('visit_date');     // Tanggal Rencana Kunjungan
            $table->text('complaint');      // Keluhan Utama
            $table->string('no_rm')->nullable(); // Tambahkan ini jika belum ada
            // 5. Status
            // pending   = Menunggu
            // serving   = Sedang Diperiksa
            // completed = Selesai
            // cancelled = Batal
            $table->enum('status', ['pending', 'serving', 'completed', 'cancelled'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};
