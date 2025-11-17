<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaduanSeeder extends Seeder
{
    /*
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengaduans')->insert([
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'kategori' => 'Lingkungan',
                'isi_pengaduan' => 'Sampah menumpuk di jalan RT 03 sejak 2 minggu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aminah',
                'email' => 'siti@example.com',
                'kategori' => 'Layanan',
                'isi_pengaduan' => 'Pelayanan kantor kecamatan lambat dan tidak ramah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Andi Wijaya',
                'email' => 'andi@example.com',
                'kategori' => 'Infrastruktur',
                'isi_pengaduan' => 'Jalan berlubang di depan SD membuat kendaraan sering mogok.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rina Putri',
                'email' => 'rina@example.com',
                'kategori' => 'Kesehatan',
                'isi_pengaduan' => 'Puskesmas sering kehabisan obat dasar dan antre panjang.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Joko Prabowo',
                'email' => 'joko@example.com',
                'kategori' => 'Keamanan',
                'isi_pengaduan' => 'Lampu jalan mati di kompleks perumahan, rawan kriminalitas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Maya Lestari',
                'email' => 'maya@example.com',
                'kategori' => 'Layanan',
                'isi_pengaduan' => 'Informasi publik tidak tersedia di situs resmi kota.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}