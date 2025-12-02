@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Pengaduan Masyarakat</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        // Perhitungan statistik
        $totalPengaduan = count($pengaduans);
        $totalChar = 0;
        $totalLampiran = 0;
        $kategoriCount = [];

        foreach($pengaduans as $pengaduan){
            $totalChar += strlen($pengaduan->isi_pengaduan);
            if($pengaduan->lampiran) $totalLampiran++;
            if(isset($kategoriCount[$pengaduan->kategori])){
                $kategoriCount[$pengaduan->kategori]++;
            } else {
                $kategoriCount[$pengaduan->kategori] = 1;
            }
        }

        $rataRataChar = $totalPengaduan > 0 ? round($totalChar / $totalPengaduan, 2) : 0;

        // kategori terbanyak
        $kategoriTerbanyak = '-';
        if(!empty($kategoriCount)){
            arsort($kategoriCount); // urut descending
            $kategoriTerbanyak = array_key_first($kategoriCount);
        }
    @endphp

    <!-- Statistik Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pengaduan</h5>
                    <p class="card-text display-6">{{ $totalPengaduan }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Rata-rata Karakter</h5>
                    <p class="card-text display-6">{{ $rataRataChar }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Memiliki Lampiran</h5>
                    <p class="card-text display-6">{{ $totalLampiran }} <span class="fs-6">({{ $totalPengaduan>0 ? round($totalLampiran/$totalPengaduan*100,2) : 0 }}%)</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Kategori Terbanyak</h5>
                    <p class="card-text display-6">{{ $kategoriTerbanyak }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pengaduan -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Daftar Pengaduan</span>
            <a href="{{ route('pengaduan.create') }}" class="btn btn-success btn-sm">Tambah Pengaduan</a>
        </div>
        <div class="card-body p-0">
            @if($pengaduans->isEmpty())
                <div class="alert alert-info m-3">Belum ada pengaduan.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Kategori</th>
                                <th>Isi Pengaduan</th>
                                <th>Lampiran</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengaduans as $index => $pengaduan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pengaduan->nama }}</td>
                                    <td>{{ $pengaduan->email }}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">{{ $pengaduan->kategori }}</span>
                                    </td>
                                    <td>{{ $pengaduan->isi_pengaduan }} <br><small class="text-muted">({{ strlen($pengaduan->isi_pengaduan) }} char)</small></td>
                                    <td>
                                        @if($pengaduan->lampiran)
                                            <a href="{{ asset('storage/' . $pengaduan->lampiran) }}" class="badge bg-primary" target="_blank">Lihat</a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $pengaduan->created_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('pengaduan.edit', $pengaduan->id) }}" class="btn btn-sm btn-outline-primary mb-1">Edit</a>
                                        <form action="{{ route('pengaduan.destroy', $pengaduan->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
