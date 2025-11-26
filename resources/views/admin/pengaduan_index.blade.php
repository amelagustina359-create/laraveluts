@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h3>Daftar Pengaduan (Halaman Petugas)</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($pengaduan->isEmpty())
                <p>Tidak ada pengaduan.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Isi Pengaduan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengaduan as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($p->isi_pengaduan, 120) }}</td>
                            <td>{{ $p->created_at ? $p->created_at->format('d-m-Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('tanggapan.createFor', $p->id) }}" class="btn btn-sm btn-primary">Tanggapi</a>
                               
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
