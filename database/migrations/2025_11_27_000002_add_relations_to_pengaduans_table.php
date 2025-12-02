<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            if (!Schema::hasColumn('pengaduans', 'lokasi')) {
                $table->string('lokasi')->nullable();
            }

            if (!Schema::hasColumn('pengaduans', 'tanggal_perjalanan')) {
                $table->date('tanggal_perjalanan')->nullable();
            }

            if (!Schema::hasColumn('pengaduans', 'lampiran')) {
                $table->string('lampiran')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            if (Schema::hasColumn('pengaduans', 'lampiran')) {
                $table->dropColumn('lampiran');
            }

            if (Schema::hasColumn('pengaduans', 'tanggal_perjalanan')) {
                $table->dropColumn('tanggal_perjalanan');
            }

            if (Schema::hasColumn('pengaduans', 'lokasi')) {
                $table->dropColumn('lokasi');
            }
        });
    }
};
