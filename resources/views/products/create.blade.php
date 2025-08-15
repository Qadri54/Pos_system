<x-custom_component.management_layout>
    <!-- Page Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h1 class="mb-2">
                    <i class="bi bi-plus-circle-fill me-3"></i>
                    Tambah Produk Baru
                </h1>
                <p class="mb-0">Tambahkan produk baru ke inventori sistem POS</p>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('products.index') }}" class="btn btn-light text-primary fw-bold">
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
                <i class="bi bi-box-seam me-2"></i>
                Informasi Produk
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST" class="row g-4">
                @csrf

                <div class="col-md-6">
                    <label for="name" class="form-label fw-bold">
                        <i class="bi bi-tag me-1"></i>
                        Nama Produk
                    </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="Masukkan nama produk" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="price" class="form-label fw-bold">
                        <i class="bi bi-currency-dollar me-1"></i>
                        Harga
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" placeholder="0" value="{{ old('price') }}" min="0" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="category_id" class="form-label fw-bold">
                        <i class="bi bi-tags me-1"></i>
                        Kategori
                    </label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id"
                        name="category_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }} | {{ $category->outlet->outlet_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="outlet_id" class="form-label fw-bold">
                        <i class="bi bi-building me-1"></i>
                        Outlet
                    </label>
                    <select class="form-select @error('outlet_id') is-invalid @enderror" id="outlet_id" name="outlet_id"
                        required>
                        <option value="">Pilih Outlet</option>
                        @foreach ($outlets as $outlet)
                            <option value="{{ $outlet->id }}" {{ old('outlet_id') == $outlet->id ? 'selected' : '' }}>
                                {{ $outlet->outlet_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('outlet_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="image" class="form-label fw-bold">
                        <i class="bi bi-image me-1"></i>
                        Gambar Produk
                    </label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                        accept="image/*">
                    <div class="form-text">
                        <i class="bi bi-info-circle me-1"></i>
                        Format yang didukung: JPG, PNG, GIF. Maksimal 2MB.
                    </div>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('products.index') }}" class="btn btn-light">
                            <i class="bi bi-x-circle me-1"></i>
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary-modern">
                            <i class="bi bi-plus-circle me-1"></i>
                            Tambah Produk
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Preview image when selected
        document.getElementById('image').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Create preview if doesn't exist
                    let preview = document.getElementById('imagePreview');
                    if (!preview) {
                        preview = document.createElement('div');
                        preview.id = 'imagePreview';
                        preview.className = 'mt-2';
                        e.target.parentNode.appendChild(preview);
                    }
                    preview.innerHTML = `
                        <img src="${e.target.result}"
                             class="img-thumbnail"
                             style="max-width: 200px; max-height: 200px;"
                             alt="Preview">
                    `;
                };
                reader.readAsDataURL(file);
            }
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function (e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise me-1"></i>Menyimpan...';
            submitBtn.disabled = true;
        });
    </script>
</x-custom_component.management_layout>
