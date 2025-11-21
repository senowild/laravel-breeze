<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap (Sneat uses Bootstrap) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-" crossorigin="anonymous">

        <!-- App Scripts (Vite) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Small tweaks to give a Sneat-like centered auth page feel */
            body { font-family: 'Figtree', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; background-color: #f8fafc; }
            .auth-card { max-width: 900px; border-radius: .75rem; overflow: hidden; }
            .auth-left { background: linear-gradient(180deg, #4f46e5, #06b6d4); color: #fff; padding: 3rem; }
            .auth-left h1 { font-weight:700; }
            .brand-logo { width:72px; height:72px; }
        </style>
    </head>
    <body>
        <div class="container d-flex align-items-center justify-content-center min-vh-100">
            <div class="row w-100 auth-card shadow">
                <div class="col-12 col-md-6 auth-left d-flex flex-column justify-content-center">
                    <div class="mb-4">
                        <a href="/" class="d-flex align-items-center text-decoration-none text-white">
                            <x-application-logo class="brand-logo me-2" />
                            <span class="fs-4">{{ config('app.name', 'Laravel') }}</span>
                        </a>
                    </div>
                    <div>
                        <h1 class="h3">Welcome back 👋</h1>
                        <p class="mb-0">Silakan masuk ke akun Anda untuk melanjutkan ke dashboard.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 bg-white d-flex align-items-center">
                    <div class="w-100 p-4 p-md-5">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
    </body>
</html>
