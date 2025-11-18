<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengaduan - Pengaduan Masyarakat</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #e3f2fd, #bbdefb);
            min-height: 100vh;
        }

        .navbar {
            background-color: #1565c0;
        }

        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: 600;
        }

        .container {
            margin-top: 90px;
        }

        .table thead {
            background-color: #1565c0;
            color: white;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .btn-custom {
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: scale(1.05);
        }

        footer {
            margin-top: 50px;
            padding: 20px 0;
            background-color: #1565c0;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">Pengaduan Masyarakat</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                  
            </div>
        </div>
    </nav>

    <!-- ISI HALAMAN -->
    <div class="container">
        <div class="card p-4">
            <h3 class="text-center mb-4 text-primary"><i class="bi bi-list-ul"></i> Daftar Pengaduan Masyarakat</h3>

            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            @if (isset($pengaduan) && $pengaduan->count())
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Kategori</th>
                                <th>Isi Pengaduan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td class="text-start">{{ $item->isi_pengaduan }}</td>
                                    <td>{{ $item->created_at ? $item->created_at->format('d-m-Y H:i') : '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-muted mt-4">Belum ada data pengaduan yang masuk.</p>
            @endif


        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Sistem Pengaduan Masyarakat | All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

