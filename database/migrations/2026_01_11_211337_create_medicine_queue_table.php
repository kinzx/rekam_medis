<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('medicine_queue', function (Blueprint $table) {
            $table->id();
            $table->foreignId('queue_id')->constrained()->onDelete('cascade'); // ID Pasien/Antrean
            $table->foreignId('medicine_id')->constrained()->onDelete('cascade'); // ID Obat
            $table->string('instruction')->nullable(); // Aturan pakai (ex: 3x1 sesudah makan)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_queue');
    }
};
