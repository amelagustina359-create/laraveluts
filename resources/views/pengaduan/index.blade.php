@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Daftar Pengaduan Masyarakat</h2>

    <a href="{{ route('pengaduan.create') }}" class="btn btn-success mb-3">+ Tambah Data</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- STATISTIK & LOGIKA -->
    <div class="card mb-4 p-3 bg-light">
        <h5 class="card-title">📊 Statistik & Analisis</h5>
        
        {{-- Aritmatika: Total pengaduan, rata-rata per kategori --}}
        <div class="row">
            <div class="col-md-4">
                <p><strong>Total Pengaduan:</strong> 
                    {{ $pengaduan->count() }} 
                    (Hitung: 
                    @php
                        $total = 0;
                        foreach($pengaduan as $item) {
                            $total += 1;  // Penambahan aritmatika
                        }
                    @endphp
                    {{ $total }})
                </p>
            </div>
            
            <div class="col-md-4">
                <p><strong>ID Terbesar:</strong>
                    @php
                        $maxId = 0;
                        foreach($pengaduan as $item) {
                            if($item->id > $maxId) {  // Logika perbandingan
                                $maxId = $item->id;
                            }
                        }
                    @endphp
                    {{ $maxId ?? 'N/A' }}
                </p>
            </div>
            
            <div class="col-md-4">
                <p><strong>Jumlah Kategori Unik:</strong> 
                    @php
                        $categories = [];
                        foreach($pengaduan as $item) {  // Perulangan
                            if(!in_array($item->kategori, $categories)) {
                                $categories[] = $item->kategori;
                            }
                        }
                    @endphp
                    {{ count($categories) }}
                </p>
            </div>
        </div>
    </div>

    <!-- TABEL PENGADUAN -->
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Kategori</th>
                <th>Isi Pengaduan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($pengaduan as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->email }}</td>
                    <td>
                        <span class="badge 
                            @if($p->kategori === 'Infrastruktur') bg-danger
                            @elseif($p->kategori === 'Lingkungan') bg-warning text-dark
                            @elseif($p->kategori === 'Layanan') bg-info
                            @elseif($p->kategori === 'Kesehatan') bg-success
                            @elseif($p->kategori === 'Keamanan') bg-dark
                            @else bg-secondary
                            @endif
                        ">
                            {{ $p->kategori }}
                        </span>
                    </td>
                    <td>{{ Str::limit($p->isi_pengaduan ?? '', 50) }}</td>
                    <td>
                        @php
                            $panjangIsi = strlen($p->isi_pengaduan ?? '');
                            $statusTeks = '';
                            $badgeClass = '';
                            
                            // Logika: klasifikasi berdasarkan panjang isi
                            if($panjangIsi < 20) {
                                $statusTeks = 'Singkat';
                                $badgeClass = 'bg-warning text-dark';
                            } elseif($panjangIsi < 100) {
                                $statusTeks = 'Normal';
                                $badgeClass = 'bg-info';
                            } else {
                                $statusTeks = 'Detail';
                                $badgeClass = 'bg-success';
                            }
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ $statusTeks }}</span>
                    </td>
                    <td>
                        <a href="{{ route('pengaduan.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('pengaduan.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada pengaduan. <a href="{{ route('pengaduan.create') }}">Tambah sekarang</a>.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- RINGKASAN KATEGORI (PERULANGAN & ARITMATIKA) -->
    <div class="card mt-4 p-3">
        <h5 class="card-title">📈 Ringkasan per Kategori</h5>
        <ul class="list-group">
            @php
                $categoryCount = [];
                // Perulangan: hitung per kategori
                foreach($pengaduan as $item) {
                    $cat = $item->kategori ?? 'Lainnya';
                    if(!isset($categoryCount[$cat])) {
                        $categoryCount[$cat] = 0;
                    }
                    $categoryCount[$cat] += 1;  // Aritmatika: penambahan
                }
            @endphp

            @forelse($categoryCount as $cat => $count)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong>{{ $cat }}</strong></span>
                    <span class="badge bg-primary rounded-pill">{{ $count }} pengaduan</span>
                </li>
            @empty
                <li class="list-group-item text-muted">Tidak ada kategori.</li>
            @endforelse
        </ul>
    </div>

</div>
@endsection
