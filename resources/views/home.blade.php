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

        /* Hero Section with image + overlay */
        .hero {
            margin-top: 80px;
            text-align: center;
            color: #fff;
            border-radius: 12px;
            padding: 80px 20px;
            background-image:
                linear-gradient(rgba(100,150,190,0.55), rgba(100,150,190,0.55)),
                url('{{ asset("image/foto1.jpg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            box-shadow: 0 8px 30px rgba(13,71,161,0.12);
            position: relative;
            overflow: hidden;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
        }

        .hero h1 { 
            font-weight: 700; 
            font-size: 2.6rem; 
            text-shadow: 2px 2px 8px rgba(0,0,0,0.4);
        }
        .hero p  { 
            color: rgba(255,255,255,0.95); 
            font-size: 1.1rem;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
        }

        /* Buttons */
        .btn-custom {
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }
        .btn-custom:hover { transform: scale(1.05); }

        .btn-primary-custom {
            background: #ffdd57;
            color: #0b3b78;
            border: none;
        }
        .btn-primary-custom:hover {
            background: #ffd740;
            color: #0b3b78;
        }

        .btn-light-custom {
            background: white;
            color: #1565c0;
            border: none;
        }
        .btn-light-custom:hover {
            background: #f5f5f5;
            color: #1565c0;
        }

        /* Card Section */
        .info-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            min-height: 220px;
        }
        .info-card:hover { transform: translateY(-5px); }
        .card-img-sm { width: 72px; height: 72px; object-fit: contain; margin-bottom: 12px; }
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
                    <li class="nav-item"><a class="nav-link" href="{{ url('/pengaduan/create') }}">Form Pengaduan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/pengaduan') }}">Daftar Pengaduan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION with attractive image background -->
    <div class="hero">
        <div class="hero-content">
            <h1>Selamat Datang di Sistem Pengaduan Masyarakat</h1>
            <p class="mt-3 mb-4">
                Laporkan keluhan, sampaikan aspirasi, dan bantu pemerintah membangun layanan publik yang lebih baik.
            </p>
            
        </div>
    </div>

    <!-- INFORMASI SECTION with images -->
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card info-card p-4">
                    <img src="{{ asset('images/secure.png') }}"
                         onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1515879218367-8466d910aaa4?w=200&h=200&fit=crop'"
                         alt="Data Aman" class="card-img-sm mx-auto d-block">
                    <h5>Data Aman</h5>
                    <p>Setiap laporan dijaga kerahasiaannya sesuai dengan standar keamanan sistem pemerintah.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card info-card p-4">
                    <img src="{{ asset('images/people.png') }}"
                         onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=200&h=200&fit=crop'"
                         alt="Respon Cepat" class="card-img-sm mx-auto d-block">
                    <h5>Respon Cepat</h5>
                    <p>Petugas akan menindaklanjuti setiap laporan dengan cepat dan transparan.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card info-card p-4">
                    <img src="{{ asset('images/chat.png') }}"
                         onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=200&h=200&fit=crop'"
                         alt="Terbuka" class="card-img-sm mx-auto d-block">
                    <h5>Terbuka untuk Semua</h5>
                    <p>Setiap warga negara memiliki hak untuk menyampaikan pengaduan dan saran dengan mudah.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="mt-5 py-3 text-center" style="background:#1565c0;color:#fff;">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Sistem Pengaduan Masyarakat. All rights reserved.</p>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
