@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Pesan Masuk</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Waktu</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pesan as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->pesan }}</td>
                <td>{{ $p->created_at->format('d M Y - H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection