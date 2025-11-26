@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h3>Buat Tanggapan untuk Pengaduan #{{ $pengaduan->id }}</h3>

            <div class="mb-3">
                <strong>Nama:</strong> {{ $pengaduan->nama }}<br>
                <strong>Email:</strong> {{ $pengaduan->email }}<br>
                <strong>Isi:</strong>
                <p>{{ $pengaduan->isi_pengaduan }}</p>
            </div>

            <form action="{{ route('tanggapan.storeFor', $pengaduan->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="petugas" class="form-label">Nama Petugas</label>
                    <input id="petugas" name="petugas" class="form-control" required value="{{ old('petugas') }}">
                </div>

                <div class="mb-3">
                    <label for="isi_tanggapan" class="form-label">Isi Tanggapan</label>
                    <textarea id="isi_tanggapan" name="isi_tanggapan" class="form-control" rows="5" required>{{ old('isi_tanggapan') }}</textarea>
                </div>

                <button class="btn btn-primary" type="submit">Kirim Tanggapan</button>
                <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
