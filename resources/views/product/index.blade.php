<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Produk</h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="d-flex justify-content-between mb-3">
                <form class="d-flex" method="GET" action="{{ route('products.index') }}">
                    <input name="search" class="form-control form-control-sm me-2" placeholder="Cari produk..." value="{{ request('search') }}">
                    <select name="category" class="form-select form-select-sm me-2">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ (string)$cat->id === (string)request('category') ? 'selected' : '' }}>{{ $cat->nama }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-sm btn-outline-primary" type="submit">Cari</button>
                </form>

                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Buat Produk</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th style="width:80px">No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th style="width:180px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ ($products->firstItem() ?? 0) + $loop->index }}</td>
                                <td>{{ $product->nama }}</td>
                                <td>{{ $product->category?->nama }}</td>
                                <td>{{ $product->harga ? number_format($product->harga,2,',','.') : '-' }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline-block ms-1 delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger btn-delete">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center">Tidak ada produk.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between mt-3">
                <div class="text-muted">Menampilkan {{ $products->count() }} dari {{ $products->total() }} data</div>
                <div>
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.btn-delete').forEach(function(btn){
                btn.addEventListener('click', function(e){
                    const form = this.closest('.delete-form');
                    Swal.fire({
                        title: 'Yakin ingin menghapus? ',
                        text: 'Data produk akan dihapus permanen.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Hapus',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    @endpush
</x-app-layout>
