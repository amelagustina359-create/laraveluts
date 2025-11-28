<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $items = [
            ['nama' => 'Perjalanan Dinas', 'keterangan' => 'Laporan terkait perjalanan dinas', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'Perjalanan Pribadi', 'keterangan' => 'Laporan terkait perjalanan pribadi', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'Transportasi Umum', 'keterangan' => 'Laporan terkait transportasi umum', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'Kenyamanan Fasilitas', 'keterangan' => 'Keluhan fasilitas', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'Kesehatan', 'keterangan' => 'Layanan kesehatan dan fasilitas', 'created_at' => $now, 'updated_at' => $now],
            ['nama' => 'Pendidikan', 'keterangan' => 'Masalah pendidikan dan sekolah', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('kategoris')->insert($items);
    }
}
