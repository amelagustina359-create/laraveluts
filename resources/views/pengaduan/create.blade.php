<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengaduan Perjalanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Form Pengaduan Masyarakat</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input id="nama" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select id="kategori" name="kategori" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="Perjalanan Dinas" {{ old('kategori')=='Perjalanan Dinas' ? 'selected' : '' }}>Perjalanan Dinas</option>
                        <option value="Perjalanan Pribadi" {{ old('kategori')=='Perjalanan Pribadi' ? 'selected' : '' }}>Perjalanan Pribadi</option>
                        <option value="Transportasi Umum" {{ old('kategori')=='Transportasi Umum' ? 'selected' : '' }}>Transportasi Umum</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi / Rute</label>
                    <input id="lokasi" name="lokasi" class="form-control" value="{{ old('lokasi') }}">
                </div>

                <div class="mb-3">
                    <label for="tanggal_perjalanan" class="form-label">Tanggal Perjalanan</label>
                    <input id="tanggal_perjalanan" name="tanggal_perjalanan" type="date" class="form-control" value="{{ old('tanggal_perjalanan') }}">
                </div>

                <div class="mb-3">
                    <label for="isi_pengaduan" class="form-label">Isi Pengaduan</label>
                    <textarea id="isi_pengaduan" name="isi_pengaduan" class="form-control" rows="5" required>{{ old('isi_pengaduan') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="lampiran" class="form-label">Lampiran (gambar, opsional)</label>
                    <input id="lampiran" name="lampiran" type="file" accept="image/*" class="form-control">
                </div>

                <button class="btn btn-primary" type="submit">Kirim Pengaduan</button>
                <a class="btn btn-secondary" href="{{ route('pengaduan.index') }}">Kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>