<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title', 'POSBANKUM Desa Pulau Gadang')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #10b981;
            --primary-dark: #059669;
            --primary-light: #6ee7b7;
            --secondary: #34d399;
            --accent: #a7f3d0;
            --dark: #064e3b;
            --text-dark: #1f2937;
            --light: #f0fdf4;
            --white: #ffffff;
            --gray-light: #f3f4f6;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--text-dark);
            background: var(--white);
            line-height: 1.6;
        }
        
        /* Navbar Modern */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
            border-bottom: 1px solid rgba(16, 185, 129, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--primary) !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .navbar-brand:hover {
            color: var(--primary-dark) !important;
            transform: translateX(2px);
        }
        
        .navbar-brand i {
            font-size: 1.5rem;
            color: var(--primary);
        }
        
        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            color: var(--primary) !important;
            background: var(--light);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 60%;
        }
        
        .navbar-toggler {
            border: none;
            color: var(--primary);
        }
        
        .navbar-toggler:focus {
            box-shadow: 0 0 0 0.25rem rgba(16, 185, 129, 0.15);
        }
        
        /* Hero Section Modern */
        .hero-section {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 50%, #a7f3d0 100%);
            min-height: 500px;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2310b981' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.4;
        }
        
        .hero-section .container {
            position: relative;
            z-index: 1;
        }
        
        .hero-section h1 {
            color: var(--dark);
            font-weight: 800;
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        .hero-section p {
            color: var(--text-dark);
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        /* Card Modern */
        .card-hover {
            background: var(--white);
            border: 1px solid rgba(16, 185, 129, 0.1);
            border-radius: 16px;
            padding: 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
        }
        
        .card-hover:hover {
            border-color: var(--primary);
        }
        
        .card-hover i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .card-hover:hover i {
            color: var(--primary-dark);
        }
        
        /* Button Modern */
        .btn-gradient {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }
        
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.4);
            color: white;
        }
        
        .btn-gradient:active {
            transform: translateY(0);
        }
        
        .btn-outline-custom {
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            background: transparent;
        }
        
        .btn-outline-custom:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
        }
        
        /* Footer Modern */
        footer {
            background: linear-gradient(135deg, #064e3b 0%, #065f46 100%);
            color: rgba(255, 255, 255, 0.9);
            padding: 4rem 0 2rem;
            margin-top: 5rem;
        }
        
        footer h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        footer .text-muted {
            color: rgba(255, 255, 255, 0.7) !important;
            line-height: 1.8;
        }
        
        footer hr {
            background: rgba(255, 255, 255, 0.1);
            margin: 2rem 0;
        }
        
        footer a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        footer a:hover {
            color: var(--accent);
        }
        
        /* Utilities */
        .badge-custom {
            background: var(--light);
            color: var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 1rem;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 1rem;
        }
        
        .section-subtitle {
            color: var(--text-dark);
            font-size: 1.125rem;
            opacity: 0.8;
            margin-bottom: 3rem;
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .hero-section p {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .navbar-brand {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-balance-scale"></i>
                <span>POSBANKUM Pulau Gadang</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">
                            <i class="fas fa-info-circle me-1"></i>Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('consultations.create') }}">
                            <i class="fas fa-comments me-1"></i>Konsultasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('legal-products.index') }}">
                            <i class="fas fa-file-contract me-1"></i>Produk Hukum
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.index') }}">
                            <i class="fas fa-newspaper me-1"></i>Artikel
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">
                                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>
                        <i class="fas fa-balance-scale"></i>
                        POSBANKUM Pulau Gadang
                    </h5>
                    <p class="text-muted">Pos Bantuan Hukum Desa Pulau Gadang memberikan layanan konsultasi hukum gratis untuk masyarakat dengan profesional dan terpercaya.</p>
                    <div class="mt-3">
                        <a href="#" class="me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>
                        <i class="fas fa-map-marker-alt"></i>
                        Kontak Kami
                    </h5>
                    <p class="text-muted">
                        <i class="fas fa-map-marker-alt me-2"></i>Desa Pulau Gadang<br>
                        <span class="ms-4">Kec. XIII Koto Kampar</span><br>
                        <i class="fas fa-phone me-2"></i>+62 812-xxxx-xxxx<br>
                        <i class="fas fa-envelope me-2"></i>posbankum@pulaugadang.desa.id
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>
                        <i class="fas fa-clock"></i>
                        Jam Layanan
                    </h5>
                    <p class="text-muted">
                        <strong>Senin - Jumat</strong><br>
                        08.00 - 16.00 WIB<br><br>
                        <strong>Sabtu</strong><br>
                        08.00 - 12.00 WIB<br><br>
                        <strong>Minggu</strong><br>
                        Tutup
                    </p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="text-muted mb-0">
                    &copy; {{ date('Y') }} POSBANKUM Desa Pulau Gadang. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>