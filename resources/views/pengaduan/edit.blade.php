@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Pengaduan</h3>

    <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $pengaduan->nama }}" required>
        </div>
        
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $pengaduan->email }}" required>
        </div>
        
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ $pengaduan->kategori }}" required>
        </div>
        
        <div class="mb-3">
            <label>Isi Pengaduan</label>
            <textarea name="isi_pengaduan" class="form-control" required>{{ $pengaduan->isi_pengaduan }}</textarea>
        </div>
        
        <div class="mb-3">
            <label>Lampiran</label>
            <input type="file" name="lampiran" class="form-control">
            @if($pengaduan->lampiran)
                <p>File saat ini: <a href="{{ asset('storage/' . $pengaduan->lampiran) }}" target="_blank">Lihat</a></p>
            @endif
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
