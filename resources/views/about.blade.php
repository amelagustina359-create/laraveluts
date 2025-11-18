@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title display-8">Tentang Kami</h1>

            <p class="lead">Kami hadir untuk mendengar setiap suara dan membantu mewujudkan perbaikan nyata. Dengan pendekatan yang ramah pengguna dan proses tindak lanjut yang jelas, kami berkomitmen menjadikan layanan publik lebih responsif bagi seluruh warga.</p>

            <h3>Visi</h3>
            <p>Menjadi mitra terpercaya dalam meningkatkan kualitas layanan publik—dengan pelayanan yang cepat, transparan, dan berdampak.</p>

            <h3>Misi</h3>
            <ul>
                <li>Menyediakan sarana pelaporan yang mudah diakses oleh semua lapisan masyarakat.</li>
                <li>Bekerja sama dengan pihak terkait untuk menindaklanjuti laporan secara profesional dan tepat waktu.</li>
                <li>Meningkatkan keterbukaan informasi dan akuntabilitas dalam penanganan pengaduan.</li>
            </ul>

           
            <h3>Hubungi Kami</h3>
            <p>Untuk pertanyaan atau kerja sama, kirimkan email ke <a href="mailto:admin@example.com">admin@example.com</a> atau gunakan fitur <a href="{{ route('pengaduan.index') }}">Pengaduan</a> pada menu.</p>

            <p class="text-muted small">Versi: 1.3 — Terakhir diperbarui: {{ date('d F Y') }}</p>
        </div>
    </div>
</div>
@endsection
