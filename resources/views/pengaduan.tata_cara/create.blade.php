
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tata Cara Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body class="p-4">
<div class="container">
    <h1 class="mb-3">Tata Cara Pengaduan</h1>
    <p class="lead">Ikuti langkah berikut sebelum mengisi formulir pengaduan:</p>

    <ol>
        <li>Siapkan identitas (nama, email) yang valid.</li>
        <li>Pilih kategori pengaduan dengan tepat.</li>
        <li>Jelaskan kronologi, lokasi, dan bukti (jika ada).</li>
        <li>Periksa kembali data lalu kirimkan formulir.</li>
    </ol>

    <div class="mt-4">
        <a href="{{ route('pengaduan.create') }}" class="btn btn-primary">Lanjut ke Form Pengaduan</a>
        <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>