<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap for Sneat-like layout -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Figtree', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; padding-bottom: 90px; }
            .hero { background: linear-gradient(90deg, #4f46e5 0%, #06b6d4 100%); color: #fff; }
            .feature-card { transition: transform .2s ease, box-shadow .2s ease; }
            .feature-card:hover { transform: translateY(-6px); box-shadow: 0 8px 30px rgba(15, 23, 42, .08); }
            footer.fixed-footer { position: fixed; left: 0; right: 0; bottom: 0; z-index: 1030; }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary" href="#">{{ config('app.name', 'Laravel') }}</a>
                <div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary btn-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm me-2">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <header class="hero py-5">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-white">
                        <h1 class="display-5 fw-bold">Aplikasi UTS PPWL — Modern, Cepat, dan Mudah</h1>
                        <p class="lead mt-3">Kelola produk dan kategori dengan antarmuka sederhana dan performa yang handal. Dibangun menggunakan Laravel + Breeze, dengan tampilan terinspirasi Sneat.</p>
                        <div class="mt-4">
                            <a href="{{ route('register') }}" class="btn btn-light btn-lg me-2">Mulai Sekarang</a>
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">Masuk</a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="card bg-white shadow-sm">
                            <img src="{{ asset('assets/img/dashboard.png') }}" class="card-img-top" alt="Dashboard Preview">
                            <div class="card-body">
                                <h5 class="card-title">Dashboard Preview</h5>
                                <p class="card-text text-muted">Contoh tampilan dashboard dan laporan singkat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="py-5">
            <div class="container">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">Fitur Utama</h2>
                    <p class="text-muted">Beberapa fitur yang tersedia di aplikasi ini</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded feature-card h-100 shadow-sm">
                            <h5>Autentikasi</h5>
                            <p class="text-muted mb-0">Login, register, dan proteksi halaman menggunakan middleware auth.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded feature-card h-100 shadow-sm">
                            <h5>CRUD Kategori & Produk</h5>
                            <p class="text-muted mb-0">Kelola kategori dan produk dengan relasi Eloquent serta pencarian dan pagination.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded feature-card h-100 shadow-sm">
                            <h5>Konfirmasi Hapus</h5>
                            <p class="text-muted mb-0">Konfirmasi hapus dengan SweetAlert untuk mencegah kesalahan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="py-3 bg-white border-top fixed-footer">
            <div class="container text-center text-muted small">
                &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }} — Dibuat untuk UTS PPWL
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>
