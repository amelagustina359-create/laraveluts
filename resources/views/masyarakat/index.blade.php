@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Masyarakat</h1>
    <a href="{{ route('masyarakat.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masyarakat as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->telp }}</td>
                <td>
                    <a href="{{ route('masyarakat.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('masyarakat.destroy', $item->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
