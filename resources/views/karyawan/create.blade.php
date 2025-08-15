<x-custom_component.management_layout>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="bg-primary bg-gradient text-white rounded-3 p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h1 class="h3 mb-1">
                        <i class="bi bi-person-plus-fill me-2"></i>
                        Tambah Karyawan Baru
                    </h1>
                    <p class="mb-0 text-white-50">Daftarkan karyawan baru ke dalam sistem POS</p>
                </div>
                <a href="{{ route('users.index') }}" class="btn btn-light">
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
                    <i class="bi bi-person-gear me-2"></i>
                    Informasi Karyawan
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST" class="row g-4">
                    @csrf

                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold">
                            <i class="bi bi-person me-1"></i>
                            Nama Lengkap
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Masukkan nama lengkap karyawan" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold">
                            <i class="bi bi-envelope me-1"></i>
                            Email
                        </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="contoh@email.com" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <i class="bi bi-info-circle me-1"></i>
                            Email akan digunakan untuk login ke sistem
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label fw-bold">
                            <i class="bi bi-lock me-1"></i>
                            Password
                        </label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Minimal 8 karakter" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="bi bi-eye" id="toggleIcon"></i>
                            </button>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text">
                            <i class="bi bi-shield-check me-1"></i>
                            Gunakan kombinasi huruf, angka, dan simbol untuk keamanan yang lebih baik
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="outlet_id" class="form-label fw-bold">
                            <i class="bi bi-building me-1"></i>
                            Outlet Penugasan
                        </label>
                        <select class="form-select @error('outlet_id') is-invalid @enderror" id="outlet_id"
                            name="outlet_id" required>
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
                        <div class="form-text">
                            <i class="bi bi-info-circle me-1"></i>
                            Karyawan akan ditempatkan di outlet yang dipilih
                        </div>
                    </div>

                    <!-- Hidden field for owner -->
                    <input type="hidden" name="owner" value="{{ auth()->user()->id }}">

                    <div class="col-12">
                        <div class="alert alert-info" role="alert">
                            <i class="bi bi-lightbulb me-2"></i>
                            <strong>Informasi:</strong> Karyawan baru akan mendapatkan akses role "Staff" secara
                            default.
                            Mereka dapat login menggunakan email dan password yang telah ditetapkan.
                            Pastikan data yang dimasukkan sudah benar sebelum menyimpan.
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('users.index') }}" class="btn btn-light">
                                <i class="bi bi-x-circle me-1"></i>
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-person-plus me-1"></i>
                                Tambah Karyawan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.className = 'bi bi-eye-slash';
            } else {
                passwordField.type = 'password';
                toggleIcon.className = 'bi bi-eye';
            }
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function (e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise me-1"></i>Menyimpan...';
            submitBtn.disabled = true;
        });

        // Auto-capitalize name
        document.getElementById('name').addEventListener('input', function (e) {
            let value = e.target.value;
            if (!value) return;
            // Capitalize each word
            e.target.value = value.replace(/\b\w/g, l => l.toUpperCase());
        });

        // Password strength indicator
        document.getElementById('password').addEventListener('input', function (e) {
            const password = e.target.value;
            let strengthIndicator = document.getElementById('passwordStrength');

            if (!strengthIndicator) {
                const indicator = document.createElement('div');
                indicator.id = 'passwordStrength';
                indicator.className = 'form-text mt-1';
                e.target.parentNode.appendChild(indicator);
                strengthIndicator = indicator;
            }

            let strength = 'Lemah';
            let color = 'text-danger';

            if (password.length >= 8) {
                strength = 'Sedang';
                color = 'text-warning';

                if (/[A-Z]/.test(password) && /[0-9]/.test(password)) {
                    strength = 'Kuat';
                    color = 'text-success';
                }
            }

            strengthIndicator.innerHTML =
                `<i class="bi bi-shield-check me-1"></i>Kekuatan password: <span class="${color}">${strength}</span>`;
        });
    </script>
</x-custom_component.management_layout>