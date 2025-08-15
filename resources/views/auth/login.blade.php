<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="form-label fw-semibold">
                <i class="bi bi-envelope me-2 text-primary"></i>
                Email
            </label>
            <div class="input-group">
                <span class="input-group-text bg-light">
                    <i class="bi bi-at text-muted"></i>
                </span>
                <input id="email" type="email" name="email"
                    class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}"
                    required autofocus autocomplete="username" placeholder="Masukkan email Anda">
            </div>
            @error('email')
                <div class="invalid-feedback d-block">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="form-label fw-semibold">
                <i class="bi bi-lock me-2 text-primary"></i>
                Password
            </label>
            <div class="input-group">
                <span class="input-group-text bg-light">
                    <i class="bi bi-key text-muted"></i>
                </span>
                <input id="password" type="password" name="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror" required
                    autocomplete="current-password" placeholder="Masukkan password Anda">
                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                    <i class="bi bi-eye" id="toggleIcon"></i>
                </button>
            </div>
            @error('password')
                <div class="invalid-feedback d-block">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Remember Me & Register -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="form-check">
                    <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                    <label class="form-check-label text-sm" for="remember_me">
                        <i class="bi bi-bookmark me-1"></i>
                        Ingat saya
                    </label>
                </div>
            </div>
            <div class="col-md-6 text-end">
                <small class="text-muted">
                    Belum punya akun?
                    <a href="/register" class="text-primary text-decoration-none fw-semibold">
                        <i class="bi bi-person-plus me-1"></i>
                        Daftar Sekarang
                    </a>
                </small>
            </div>
        </div>

        <!-- Login Button & Forgot Password -->
        <div class="d-grid gap-3">
            <button type="submit" class="btn btn-primary-custom btn-lg py-3">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                Masuk ke Dashboard
            </button>

            @if (Route::has('password.request'))
                <div class="text-center">
                    <a class="text-decoration-none text-muted small" href="{{ route('password.request') }}">
                        <i class="bi bi-question-circle me-1"></i>
                        Lupa password Anda?
                    </a>
                </div>
            @endif
        </div>

        <!-- Demo Accounts Info -->
        <div class="mt-4 p-3 bg-light rounded">
            <h6 class="mb-2 text-primary">
                <i class="bi bi-info-circle me-2"></i>
                Demo Akun
            </h6>
            <small class="text-muted">
                <strong>Admin:</strong> admin@admin.com / password<br>
                <strong>Kasir:</strong> kasir@kasir.com / password
            </small>
        </div>
    </form>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.className = 'bi bi-eye-slash';
            } else {
                passwordInput.type = 'password';
                toggleIcon.className = 'bi bi-eye';
            }
        }
    </script>
</x-guest-layout>