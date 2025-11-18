<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Pengaduan Masyarakat</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font & Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #e3f2fd, #bbdefb);
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background-color: #1565c0;
        }
        .navbar-brand {
            font-weight: 700;
            color: white !important;
            font-size: 1.4rem;
        }
        .nav-link {
            color: white !important;
            font-weight: 500;
            margin-right: 15px;
        }
        .nav-link:hover {
            text-decoration: underline;
        }

        /* Hero Section */
        .hero {
            margin-top: 80px;
            text-align: center;
            color: #0d47a1;
        }
        .hero h1 {
            font-weight: 700;
            font-size: 2.5rem;
        }
        .hero p {
            color: #37474f;
            font-size: 1.1rem;
        }

        /* Buttons */
        .btn-custom {
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            margin-top: 80px;
            padding: 20px 0;
            background-color: #1565c0;
            color: white;
            text-align: center;
        }

        /* Card Section */
        .info-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .info-card:hover {
            transform: translateY(-5px);
        }
        .info-icon {
            font-size: 40px;
            color: #1565c0;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Pengaduan Masyarakat</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/pengaduan') }}">Daftar Pengaduan</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="{{ url('/pengaduan/tata-cara') }}">Tata Cara</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <div class="container hero">
        <h1 class="mt-5 pt-5">Selamat Datang di Sistem Pengaduan Masyarakat </h1>
        <p class="mt-3 mb-4">
            Laporkan keluhan, sampaikan aspirasi, dan bantu pemerintah membangun layanan publik yang lebih baik.
        </p>
        <a href="{{ url('/buat-pengaduan') }}" class="btn btn-primary btn-custom me-2">
            <i class="bi bi-pencil-square"></i> Buat Pengaduan
        </a>
        <a href="{{ url('/pengaduan') }}" class="btn btn-outline-primary btn-custom">
            <i class="bi bi-list-ul"></i> Daftar Pengaduan
        </a>
    </div>

    <!-- INFORMASI SECTION -->
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card info-card p-4">
                    <i class="bi bi-shield-lock info-icon"></i>
                    <h5>Data Aman</h5>
                    <p>Setiap laporan dijaga kerahasiaannya sesuai dengan standar keamanan sistem pemerintah.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card info-card p-4">
                    <i class="bi bi-people info-icon"></i>
                    <h5>Respon Cepat</h5>
                    <p>Petugas akan menindaklanjuti setiap laporan dengan cepat dan transparan.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card info-card p-4">
                    <i class="bi bi-chat-dots info-icon"></i>
                    <h5>Terbuka untuk Semua</h5>
                    <p>Setiap warga negara memiliki hak untuk menyampaikan pengaduan dan saran dengan mudah.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <p>&copy; {{ date('Y') }} Sistem Pengaduan Masyarakat. All rights reserved.</p>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
