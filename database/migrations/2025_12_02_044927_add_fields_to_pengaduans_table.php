<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {

            // Tambahkan kolom yang belum ada
            $table->string('lokasi')->nullable();
            $table->date('tanggal_perjalanan')->nullable();
            $table->string('lampiran')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {

            // Hapus kolom jika rollback
            $table->dropColumn(['lokasi', 'tanggal_perjalanan', 'lampiran']);
        });
    }
};
