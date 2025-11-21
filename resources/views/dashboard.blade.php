<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <!-- Hero -->
            <div class="p-4 rounded-3 mb-4 text-white" style="background: linear-gradient(90deg,#4f46e5 0%, #06b6d4 100%);">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="mb-1">Selamat datang, {{ Auth::user()? Auth::user()->name : 'Pengunjung' }} 👋</h2>
                        <p class="mb-0 opacity-85">Selamat datang di halaman Dashboard UTS PPWL. Di sini Anda dapat melihat ringkasan singkat aktivitas dan informasi akun.</p>
                    </div>
                    <div class="mt-3 mt-sm-0">
                        <a href="{{ route('profile.edit') }}" class="btn btn-light btn-sm">Edit Profile</a>
                        <a href="/" class="btn btn-outline-light btn-sm ms-2">Kembali ke Home</a>
                    </div>
                </div>
            </div>

            <!-- Statistik -->
            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="mb-1">Pengguna</h6>
                                    <h3 class="mb-0">{{ \App\Models\User::count() }}</h3>
                                </div>
                                <div class="text-muted">👥</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="mb-1">Halaman</h6>
                                    <h3 class="mb-0">5</h3>
                                </div>
                                <div class="text-muted">📄</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="mb-1">Aktivitas</h6>
                                    <h3 class="mb-0">12</h3>
                                </div>
                                <div class="text-muted">⚡</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="mb-1">Notifikasi</h6>
                                    <h3 class="mb-0">3</h3>
                                </div>
                                <div class="text-muted">🔔</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent activity -->
            <div class="card">
                <div class="card-header">
                    Aktivitas Terbaru
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fw-bold">Login</div>
                                Login berhasil oleh {{ Auth::user()? Auth::user()->email : '—' }}
                            </div>
                            <small class="text-muted">Baru saja</small>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fw-bold">Perubahan Profil</div>
                                Anda belum melakukan perubahan profil baru-baru ini.
                            </div>
                            <small class="text-muted">—</small>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fw-bold">Notifikasi Sistem</div>
                                Tidak ada notifikasi penting.
                            </div>
                            <small class="text-muted">Hari ini</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
