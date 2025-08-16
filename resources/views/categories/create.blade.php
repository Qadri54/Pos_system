<x-custom_component.management_layout>
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm bg-gradient-primary text-white">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="d-flex align-items-center">
                                    <div class="bg-white bg-opacity-20 rounded-circle p-3 me-4">
                                        <i class="bi bi-plus-circle-fill fs-2 text-white"></i>
                                    </div>
                                    <div>
                                        <h1 class="h2 fw-bold mb-2">Tambah Kategori Baru</h1>
                                        <p class="mb-0 opacity-90">Buat kategori baru untuk mengorganisir produk Anda
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                                <a href="{{ route('categories.index') }}" class="btn btn-light">
                                    <i class="bi bi-arrow-left me-2"></i>
                                    Kembali ke Daftar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="bi bi-check-circle text-success"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-bold">Berhasil!</h6>
                                <small>{{ session('success') }}</small>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form Card -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="bi bi-tags text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Informasi Kategori</h5>
                                <small class="text-muted">Isi form berikut untuk membuat kategori baru</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <!-- Nama Kategori -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-semibold">
                                        <i class="bi bi-tag me-2 text-primary"></i>
                                        Nama Kategori
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary bg-opacity-10">
                                            <i class="bi bi-tags text-primary"></i>
                                        </span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Contoh: Makanan, Minuman, Snack"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-text">
                                        <i class="bi bi-info-circle me-1 text-primary"></i>
                                        Nama kategori akan membantu dalam pengelompokan produk
                                    </div>
                                </div>

                                <!-- Outlet -->
                                <div class="col-md-6">
                                    <label for="outlet_id" class="form-label fw-semibold">
                                        <i class="bi bi-building me-2 text-success"></i>
                                        Outlet
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-success bg-opacity-10">
                                            <i class="bi bi-building text-success"></i>
                                        </span>
                                        <select class="form-select @error('outlet_id') is-invalid @enderror"
                                            id="outlet_id" name="outlet_id" required>
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
                                    </div>
                                    <div class="form-text">
                                        <i class="bi bi-info-circle me-1 text-primary"></i>
                                        Kategori akan diterapkan untuk outlet yang dipilih
                                    </div>
                                </div>

                                <!-- Tips -->
                                <div class="col-12">
                                    <div class="alert alert-primary border-0" role="alert">
                                        <div class="d-flex align-items-start">
                                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                <i class="bi bi-lightbulb text-primary"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold text-primary">Tips Kategori yang Baik</h6>
                                                <p class="mb-0">Buat kategori yang spesifik dan mudah dipahami untuk
                                                    memudahkan pengelolaan produk.
                                                    Contoh kategori yang baik: "Kopi & Teh", "Makanan Ringan", "Makanan
                                                    Utama".</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="col-12">
                                    <div class="d-flex gap-3 justify-content-end pt-3 border-top">
                                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                                            <i class="bi bi-x-circle me-2"></i>
                                            Batal
                                        </a>
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="bi bi-plus-circle me-2"></i>
                                            Tambah Kategori
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced form behavior -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const nameInput = document.getElementById('name');
            const submitBtn = form.querySelector('button[type="submit"]');

            // Form submission handling
            form.addEventListener('submit', function (e) {
                submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise me-2"></i>Menyimpan...';
                submitBtn.disabled = true;
                submitBtn.classList.add('btn-secondary');
                submitBtn.classList.remove('btn-primary');
            });

            // Auto-capitalize first letter
            nameInput.addEventListener('input', function (e) {
                let value = e.target.value;
                e.target.value = value.charAt(0).toUpperCase() + value.slice(1);
            });

            // Form validation
            nameInput.addEventListener('blur', function () {
                if (this.value.length < 2) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                }
            });

            const outletSelect = document.getElementById('outlet_id');
            outletSelect.addEventListener('change', function () {
                if (this.value) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.add('is-invalid');
                    this.classList.remove('is-valid');
                }
            });
        });
    </script>
</x-custom_component.management_layout>