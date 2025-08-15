<x-custom_component.management_layout>
    <!-- Page Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h1 class="mb-2">
                    <i class="bi bi-plus-circle-fill me-3"></i>
                    Tambah Kategori Baru
                </h1>
                <p class="mb-0">Buat kategori baru untuk mengorganisir produk</p>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('categories.index') }}" class="btn btn-light text-primary fw-bold">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-header">
            <h5 class="mb-0">
                <i class="bi bi-tags me-2"></i>
                Informasi Kategori
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST" class="row g-4">
                @csrf

                <div class="col-md-6">
                    <label for="name" class="form-label fw-bold">
                        <i class="bi bi-tag me-1"></i>
                        Nama Kategori
                    </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="Contoh: Makanan, Minuman, Snack" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">
                        <i class="bi bi-info-circle me-1"></i>
                        Nama kategori akan membantu dalam pengelompokan produk
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="outlet_id" class="form-label fw-bold">
                        <i class="bi bi-building me-1"></i>
                        Outlet
                    </label>
                    <select class="form-select @error('outlet_id') is-invalid @enderror" id="outlet_id" name="outlet_id"
                        required>
                        <option value="">Pilih Outlet</option>
                        @foreach ($Outlets as $Outlet)
                            <option value="{{ $Outlet->id }}" {{ old('outlet_id') == $Outlet->id ? 'selected' : '' }}>
                                {{ $Outlet->outlet_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('outlet_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">
                        <i class="bi bi-info-circle me-1"></i>
                        Kategori akan diterapkan untuk outlet yang dipilih
                    </div>
                </div>

                <div class="col-12">
                    <div class="alert alert-info border-0" role="alert">
                        <i class="bi bi-lightbulb me-2"></i>
                        <strong>Tips:</strong> Buat kategori yang spesifik dan mudah dipahami untuk memudahkan
                        pengelolaan produk.
                        Contoh kategori yang baik: "Kopi & Teh", "Makanan Ringan", "Makanan Utama".
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('categories.index') }}" class="btn btn-light">
                            <i class="bi bi-x-circle me-1"></i>
                            Batal
                        </a>
                        <button type="submit" class="btn btn-success-modern">
                            <i class="bi bi-plus-circle me-1"></i>
                            Tambah Kategori
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Form validation
        document.querySelector('form').addEventListener('submit', function (e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise me-1"></i>Menyimpan...';
            submitBtn.disabled = true;
        });

        // Auto-capitalize first letter
        document.getElementById('name').addEventListener('input', function (e) {
            let value = e.target.value;
            e.target.value = value.charAt(0).toUpperCase() + value.slice(1);
        });
    </script>
</x-custom_component.management_layout>
