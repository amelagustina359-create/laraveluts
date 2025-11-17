@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Masyarakat</h1>
    <form action="{{ route('masyarakat.update', $masyarakat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>NIK</label>
        <input type="text" name="nik" value="{{ $masyarakat->nik }}" class="form-control" required>

        <label>Nama</label>
        <input type="text" name="nama" value="{{ $masyarakat->nama }}" class="form-control" required>

        <label>Username</label>
        <input type="text" name="username" value="{{ $masyarakat->username }}" class="form-control" required>

        <label>Telepon</label>
        <input type="text" name="telp" value="{{ $masyarakat->telp }}" class="form-control">

        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
    </form>
</div>
@endsection
