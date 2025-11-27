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

                {{-- Statistik sederhana (Aritmatika) --}}
                @php
                    $total = $pengaduan->count();
                    $totalChars = $pengaduan->sum(function($p) { return strlen($p->isi_pengaduan ?? ''); });
                    $avgChars = $total ? round($totalChars / $total) : 0;
                    $withLampiran = $pengaduan->filter(function($p){ return !empty($p->lampiran); })->count();
                    $percentWithLampiran = $total ? round($withLampiran * 100 / $total) : 0;
                    $byCategory = $pengaduan->groupBy('kategori')->map(function($g){ return $g->count(); });
                @endphp

                <div class="row mb-3">
                    <div class="col-md-3">
                        <div class="card p-2 text-center">
                            <h6>Total Pengaduan</h6>
                            <strong class="display-6 text-primary">{{ $total }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-2 text-center">
                            <h6>Rata-rata panjang isi (char)</h6>
                            <strong class="display-6 text-primary">{{ $avgChars }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-2 text-center">
                            <h6>Memiliki lampiran</h6>
                            <strong class="display-6 text-primary">{{ $withLampiran }}</strong>
                            <div class="text-muted">({{ $percentWithLampiran }}%)</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-2 text-center">
                            <h6>Kategori terbanyak</h6>
                            @php
                                $top = $byCategory->sortDesc()->first();
                                $topName = $byCategory->search($top);
                            @endphp
                            <strong class="display-6 text-primary">{{ $topName ?? '-' }}</strong>
                        </div>
                    </div>
                </div>

                {{-- Tabel daftar pengaduan --}}
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Kategori</th>
                                <th>Isi Pengaduan (char)</th>
                                <th>Lampiran</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $index => $item)
                                @php
                                    $charCount = strlen($item->isi_pengaduan ?? '');
                                @endphp
                                <tr class="{{ $loop->even ? 'table-light' : '' }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-start">
                                        {{ $item->nama }}
                                        @if($charCount > 200)
                                            <span class="badge bg-warning text-dark ms-2">Panjang</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if(strtolower($item->kategori) == 'perjalanan dinas')
                                            <span class="badge bg-primary">{{ $item->kategori }}</span>
                                        @elseif(strtolower($item->kategori) == 'transportasi umum')
                                            <span class="badge bg-success">{{ $item->kategori }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $item->kategori }}</span>
                                        @endif
                                    </td>
                                    <td class="text-start">
                                        {{ \Illuminate\Support\Str::limit($item->isi_pengaduan, 220) }}
                                        <div class="text-muted small">({{ $charCount }} char)</div>
                                    </td>
                                    <td>
                                        @if(!empty($item->lampiran))
                                            <a href="{{ asset('storage/' . $item->lampiran) }}" target="_blank" title="Lihat lampiran">
                                                <img src="{{ asset('storage/' . $item->lampiran) }}" alt="Lampiran" class="img-thumbnail" style="width:80px;height:80px;object-fit:cover;" loading="lazy">
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at ? $item->created_at->format('d-m-Y H:i') : '-' }}
                                        <div class="text-muted small">{{ $item->created_at ? $item->created_at->diffForHumans() : '' }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                
            <table class="table table-bordered table-sm">
                <thead class="table-light">
                    <tr>
                        <th style="width:60px;">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kategori</th>
                        <th>Isi Pengaduan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ani Wijaya</td>
                        <td>ani@example.com</td>
                        <td>Infrastruktur</td>
                        <td>Jalan berlubang di depan rumah.</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Budi Santoso</td>
                        <td>budi@example.com</td>
                        <td>Penerangan</td>
                        <td>Lampu jalan tidak menyala sejak seminggu lalu.</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Siti Aminah</td>
                        <td>siti@example.com</td>
                        <td>Kebersihan</td>
                        <td>Sampah menumpuk di selokan RT 05.</td>
                    </tr>
                </tbody>
            </table>
        </div>
                @endif


        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Sistem Pengaduan Masyarakat | All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

