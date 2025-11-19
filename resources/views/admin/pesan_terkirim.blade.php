
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Pesan Terkirim</h3>

    @if(empty($pesan) || count($pesan) === 0)
        <div class="alert alert-info">Belum ada pesan masuk.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Pesan</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pesan as $i => $p)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $p['nama'] ?? '-' }}</td>
                        <td>{{ $p['email'] ?? '-' }}</td>
                        <td>{{ $p['telepon'] ?? '-' }}</td>
                        <td style="white-space:pre-wrap; max-width:400px;">{{ $p['pesan'] ?? '-' }}</td>
                        <td>{{ $p['created_at'] ?? '-' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection