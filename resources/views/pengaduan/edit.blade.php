@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2>Edit Pengaduan</h2>

    <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input name="nama" class="form-control" value="{{ $pengaduan->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input name="email" type="email" class="form-control" value="{{ $pengaduan->email }}" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <input name="kategori" class="form-control" value="{{ $pengaduan->kategori }}" required>
        </div>

        <div class="mb-3">
            <label>Isi Pengaduan</label>
            <textarea name="isi_pengaduan" class="form-control" rows="5" required>{{ $pengaduan->isi_pengaduan }}</textarea>
        </div>

        <div class="mb-3">
            <label>Lampiran Baru (Opsional)</label>
            <input type="file" name="lampiran" class="form-control">
        </div>

        @if($pengaduan->lampiran)
            <p>Lampiran Saat Ini:</p>
            <img src="{{ asset('storage/'.$pengaduan->lampiran) }}" width="200">
        @endif

        <button class="btn btn-primary mt-3">Update</button>
    </form>

</div>
@endsection
