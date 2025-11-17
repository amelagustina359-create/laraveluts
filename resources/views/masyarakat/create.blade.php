@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Masyarakat</h1>
    <form action="{{ route('masyarakat.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telp" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('masyarakat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
