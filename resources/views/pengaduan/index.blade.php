<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        .nowrap { white-space: nowrap; }
        .empty { color: gray; font-style: italic; }
    </style>
</head>
<body class="p-4">

    <div class="container">
        <h1 class="text-center mb-4">Daftar Pengaduan</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('pengaduan.create') }}" class="btn btn-success mb-3">+ Tambah Pengaduan</a>

        @if ($pengaduan->count())
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kategori</th>
                        <th>Isi Pengaduan</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->isi_pengaduan }}</td>
                            <td class="nowrap">
                                {{ $item->created_at ? date('d-m-Y H:i', strtotime($item->created_at)) : '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="empty text-center">Belum ada data pengaduan.</p>
        @endif
    </div>

</body>
</html>
