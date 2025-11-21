<div class="d-flex align-items-center justify-content-between py-2">
    <div class="d-flex align-items-center">
        <button class="btn btn-sm btn-light d-md-none me-2" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">☰</button>
        <h4 class="mb-0">Dashboard</h4>
    </div>

    <div class="d-flex align-items-center">
        <div class="me-3">
            <span class="text-muted">{{ Auth::user()? Auth::user()->name : '' }}</span>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-secondary btn-sm">Logout</button>
        </form>
    </div>
</div>
