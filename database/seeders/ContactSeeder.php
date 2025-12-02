<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'telepon' => '081234567890',
                'pesan' => 'Saya ingin menanyakan tentang layanan pengaduan masyarakat.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aminah',
                'email' => 'siti.aminah@example.com',
                'telepon' => '082345678901',
                'pesan' => 'Apakah saya bisa mendapatkan informasi lebih lanjut tentang proses pengaduan?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Andi Wijaya',
                'email' => 'andi.wijaya@example.com',
                'telepon' => '083456789012',
                'pesan' => 'Kami mengalami masalah dengan infrastruktur jalan di area kami. Bagaimana caranya melaporkan?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rina Putri',
                'email' => 'rina.putri@example.com',
                'telepon' => '084567890123',
                'pesan' => 'Pertanyaan seputar keluhan layanan kesehatan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Joko Prabowo',
                'email' => 'joko.prabowo@example.com',
                'telepon' => '085678901234',
                'pesan' => 'Saya ingin memberikan masukan dan saran untuk peningkatan layanan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Maya Lestari',
                'email' => 'maya.lestari@example.com',
                'telepon' => '086789012345',
                'pesan' => 'Berapa lama waktu respons untuk setiap pengaduan yang masuk?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
