@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">Daftar Tanggapan</h1>

            @if($tanggapan->isEmpty())
                <p>Tidak ada tanggapan saat ini.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pengaduan</th>
                            <th>Petugas</th>
                            <th>Isi Tanggapan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tanggapan as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ optional($t->pengaduan)->isi_pengaduan ?? '-' }}</td>
                            <td>{{ $t->petugas }}</td>
                            <td>{{ $t->isi_tanggapan }}</td>
                            <td>{{ $t->created_at ? $t->created_at->format('d-m-Y') : '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
</div>
@endsection
