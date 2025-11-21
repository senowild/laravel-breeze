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

        <!-- Bootstrap (Sneat-like) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

        <!-- Vite assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Figtree', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; }
            .app-sidebar { min-width: 220px; max-width: 260px; background:#fff; border-right:1px solid #e6e6ef; }
            /* Make content a vertical flex container so footer can be pushed to bottom */
            .app-content { background:#f8fafc; min-height:100vh; display:flex; flex-direction:column; }
            /* Make the main content area grow to fill available space */
            main.app-main { flex: 1 1 auto; }
            .brand { font-weight:700; color:#4f46e5; }
        </style>
    </head>
    <body>
        <div class="d-flex">
            <aside class="app-sidebar d-none d-md-block">
                <div class="p-3">
                    <a href="/" class="d-flex align-items-center mb-3 text-decoration-none">
                        <x-application-logo class="me-2" />
                        <span class="brand">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    <x-layout.sidebar />
                </div>
            </aside>

            <div class="flex-fill app-content">
                <header class="border-bottom bg-white">
                    <div class="container-fluid">
                        <x-layout.navbar />
                    </div>
                </header>

                <main class="container-fluid py-4 app-main">
                    @if (isset($header))
                        <div class="mb-4">
                            {{ $header }}
                        </div>
                    @endif

                    <div class="container">
                        {{ $slot }}
                    </div>
                </main>

                <footer class="mt-auto">
                    <x-layout.footer />
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        {{-- Render pushed scripts (SweetAlert, page scripts) --}}
        @stack('scripts')
    </body>
</html>

