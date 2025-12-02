@extends('layouts.navbar')

@section('content')
<div class="container mt-4">
    <h2>Kontak Kami</h2>
    <p>Silakan hubungi kami melalui form di bawah ini:</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('kontak.send') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input id="nama" name="nama" class="form-control" required value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input id="telepon" name="telepon" class="form-control" value="{{ old('telepon') }}">
        </div>

        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea id="pesan" name="pesan" rows="5" class="form-control" required>{{ old('pesan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
</div>