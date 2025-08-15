<x-custom_component.management_layout>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="bg-warning bg-gradient text-white rounded-3 p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h1 class="h3 mb-1">
                        <i class="bi bi-person-gear me-2"></i>
                        Edit Karyawan
                    </h1>
                    <p class="mb-0 text-white-50">Perbarui informasi karyawan: {{ $user->name }}</p>
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
                <form action="{{ route('users.update', $user->id) }}" method="POST" class="row g-4">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold">
                            <i class="bi bi-person me-1"></i>
                            Nama Lengkap
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Masukkan nama lengkap karyawan"
                            value="{{ old('name', $user->name) }}" required>
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
                            name="email" placeholder="contoh@email.com" value="{{ old('email', $user->email) }}"
                            required>
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
                            Password Baru (Opsional)
                        </label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password"
                                placeholder="Kosongkan jika tidak ingin mengubah password">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="bi bi-eye" id="toggleIcon"></i>
                            </button>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text">
                            <i class="bi bi-shield-check me-1"></i>
                            Kosongkan jika tidak ingin mengubah password
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold">
                            <i class="bi bi-building me-1"></i>
                            Outlet Saat Ini
                        </label>
                        <div class="form-control bg-light">
                            @if($user->outlets->count() > 0)
                                @foreach($user->outlets as $outlet)
                                    <span class="badge bg-primary me-1">{{ $outlet->outlet_name }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">Belum ada outlet yang ditugaskan</span>
                            @endif
                        </div>
                        <div class="form-text">
                            <i class="bi bi-info-circle me-1"></i>
                            Hubungi administrator untuk mengubah penugasan outlet
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <strong>Perhatian:</strong> Mengubah email atau password akan mempengaruhi kemampuan login
                            karyawan.
                            Pastikan untuk memberitahu karyawan tentang perubahan yang dilakukan.
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('users.index') }}" class="btn btn-light">
                                <i class="bi bi-x-circle me-1"></i>
                                Batal
                            </a>
                            <button type="submit" class="btn btn-warning text-white">
                                <i class="bi bi-person-gear me-1"></i>
                                Update Karyawan
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
            submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise me-1"></i>Memperbarui...';
            submitBtn.disabled = true;
        });

        // Auto-capitalize name
        document.getElementById('name').addEventListener('input', function (e) {
            let value = e.target.value;
            if (!value) return;
            // Capitalize each word
            e.target.value = value.replace(/\b\w/g, l => l.toUpperCase());
        });
    </script>
</x-custom_component.management_layout>