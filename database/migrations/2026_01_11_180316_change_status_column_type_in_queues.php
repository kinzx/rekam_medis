<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Ubah kolom status jadi teks bebas (VARCHAR) agar tidak error lagi
        DB::statement("ALTER TABLE queues MODIFY COLUMN status VARCHAR(50) DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('queues', function (Blueprint $table) {
            //
        });
    }
};
