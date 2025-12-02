@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Pesan</h3>

    <form action="{{ route('admin.pesan.update', $pesan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $pesan->nama }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $pesan->email }}">
        </div>

        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $pesan->telepon }}">
        </div>

        <div class="mb-3">
            <label>Pesan</label>
            <textarea name="pesan" class="form-control" rows="5">{{ $pesan->pesan }}</textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pesan') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
