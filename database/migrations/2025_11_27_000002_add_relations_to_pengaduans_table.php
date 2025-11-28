<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // Add user_id foreign key
            $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            
            // Add kategori_id foreign key
            $table->unsignedBigInteger('kategori_id')->nullable()->after('email');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('set null');
            
            // Add additional fields
            $table->string('lokasi')->nullable();
            $table->date('tanggal_perjalanan')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('status')->default('baru');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
            $table->dropColumn(['lokasi', 'tanggal_perjalanan', 'lampiran', 'status']);
        });
    }
};
