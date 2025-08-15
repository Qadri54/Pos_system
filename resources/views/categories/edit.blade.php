<x-custom_component.management_layout>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="bg-primary bg-gradient text-white rounded-3 p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h1 class="h3 mb-1">
                        <i class="bi bi-pencil-square-fill me-2"></i>
                        Edit Kategori
                    </h1>
                    <p class="mb-0 text-white-50">Perbarui informasi kategori: {{ $Category->name }}</p>
                </div>
                <a href="{{ route('categories.index') }}" class="btn btn-light">
                    <i class="bi bi-arrow-left me-2"></i>
                    Kembali ke Daftar
                </a>
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
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="bi bi-tags me-2"></i>
                    Informasi Kategori
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $Category->id) }}" method="POST" class="row g-4">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold">
                            <i class="bi bi-tag me-1"></i>
                            Nama Kategori
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Contoh: Makanan, Minuman, Snack"
                            value="{{ old('name', $Category->name) }}" required>
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
                        <select class="form-select @error('outlet_id') is-invalid @enderror" id="outlet_id"
                            name="outlet_id" required>
                            <option value="{{ $Category->outlet_id }}">{{ $Category->outlet->outlet_name }} (Current)
                            </option>
                            @foreach ($Outlets as $Outlet)
                                @if($Outlet->id != $Category->outlet_id)
                                    <option value="{{ $Outlet->id }}" {{ old('outlet_id') == $Outlet->id ? 'selected' : '' }}>
                                        {{ $Outlet->outlet_name }}
                                    </option>
                                @endif
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
                        <div class="alert alert-warning" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <strong>Perhatian:</strong> Mengubah kategori akan mempengaruhi semua produk yang
                            menggunakan
                            kategori ini. Pastikan perubahan sesuai dengan kebutuhan bisnis Anda.
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('categories.index') }}" class="btn btn-light">
                                <i class="bi bi-x-circle me-1"></i>
                                Batal
                            </a>
                            <button type="submit" class="btn btn-warning text-white">
                                <i class="bi bi-pencil-square me-1"></i>
                                Update Kategori
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Form UX: disable button on submit
        document.querySelector('form').addEventListener('submit', function (e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise me-1"></i>Memperbarui...';
            submitBtn.disabled = true;
        });

        // Auto-capitalize first letter
        document.getElementById('name').addEventListener('input', function (e) {
            let value = e.target.value;
            if (!value) return;
            e.target.value = value.charAt(0).toUpperCase() + value.slice(1);
        });
    </script>
</x-custom_component.management_layout>