<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Edit Profil - POSINAJA System</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- AOS Animation -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Custom Styles -->
        <style>
            :root {
                --primary-color: #007bff;
                --secondary-color: #28a745;
                --success-color: #20c997;
                --warning-color: #ffc107;
                --danger-color: #dc3545;
                --light-bg: #f8f9fa;
                --sidebar-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }

            body {
                background: var(--light-bg);
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .page-header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 2rem 0;
                margin-bottom: 2rem;
                border-radius: 0 0 20px 20px;
                position: relative;
                overflow: hidden;
            }

            .page-header::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="rgba(255,255,255,0.1)"><polygon points="1000,100 1000,0 0,100"/></svg>');
                background-size: cover;
            }

            .card {
                border: none;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
                border-radius: 15px;
                overflow: hidden;
                margin-bottom: 2rem;
            }

            .card-header {
                background: linear-gradient(45deg, var(--primary-color), #0056b3);
                color: white;
                border: none;
                padding: 1.5rem;
            }

            .form-control,
            .form-select {
                border: 2px solid #e9ecef;
                border-radius: 10px;
                padding: 0.75rem 1rem;
                transition: all 0.3s ease;
            }

            .form-control:focus,
            .form-select:focus {
                border-color: var(--primary-color);
                box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            }

            .btn-primary-custom {
                background: linear-gradient(45deg, var(--primary-color), #0056b3);
                border: none;
                transition: all 0.3s ease;
                border-radius: 10px;
                padding: 0.75rem 2rem;
            }

            .btn-primary-custom:hover {
                background: linear-gradient(45deg, #0056b3, var(--primary-color));
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
            }

            .btn-danger-custom {
                background: linear-gradient(45deg, var(--danger-color), #c82333);
                border: none;
                color: white;
                transition: all 0.3s ease;
                border-radius: 10px;
                padding: 0.75rem 2rem;
            }

            .btn-danger-custom:hover {
                background: linear-gradient(45deg, #c82333, var(--danger-color));
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
                color: white;
            }

            .btn-secondary-custom {
                background: linear-gradient(45deg, #6c757d, #495057);
                border: none;
                color: white;
                transition: all 0.3s ease;
                border-radius: 10px;
                padding: 0.75rem 2rem;
            }

            .btn-secondary-custom:hover {
                background: linear-gradient(45deg, #495057, #6c757d);
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
                color: white;
            }

            .navbar-brand {
                font-weight: bold;
                color: white !important;
            }

            .form-floating label {
                color: #6c757d;
            }

            .form-floating>.form-control:focus~label,
            .form-floating>.form-control:not(:placeholder-shown)~label {
                color: var(--primary-color);
            }

            .required-field::after {
                content: " *";
                color: var(--danger-color);
            }

            .info-card {
                background: linear-gradient(45deg, rgba(0, 123, 255, 0.1), rgba(32, 201, 151, 0.1));
                border: none;
                border-radius: 15px;
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .profile-image-container {
                position: relative;
                display: inline-block;
                margin-bottom: 1.5rem;
            }

            .profile-image {
                width: 150px;
                height: 150px;
                border-radius: 50%;
                object-fit: cover;
                border: 5px solid white;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            }

            .upload-btn {
                position: absolute;
                bottom: 10px;
                right: 10px;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: var(--primary-color);
                border: 3px solid white;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .upload-btn:hover {
                background: #0056b3;
                transform: scale(1.1);
            }

            .breadcrumb {
                background: rgba(255, 255, 255, 0.1);
                border-radius: 10px;
                padding: 0.75rem 1rem;
            }

            .breadcrumb-item a {
                color: rgba(255, 255, 255, 0.8);
                text-decoration: none;
            }

            .breadcrumb-item a:hover {
                color: white;
            }

            .breadcrumb-item.active {
                color: white;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/">
                    <i class="bi bi-shop me-2"></i>
                    POSINAJA
                </a>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link text-white" href="/dashboard">
                        <i class="bi bi-speedometer2 me-1"></i>
                        Dashboard
                    </a>
                    <a class="nav-link text-white" href="/orders">
                        <i class="bi bi-receipt me-1"></i>
                        Orders
                    </a>
                    <a class="nav-link text-white" href="/outlet">
                        <i class="bi bi-building me-1"></i>
                        Outlets
                    </a>
                </div>
            </div>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <div class="container position-relative">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <nav aria-label="breadcrumb" class="mb-3">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard">
                                        <i class="bi bi-house-door me-1"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Edit Profil</li>
                            </ol>
                        </nav>
                        <h1 class="h2 fw-bold mb-2">
                            <i class="bi bi-person-gear me-3"></i>
                            Edit Profil
                        </h1>
                        <p class="mb-0 opacity-75">Kelola informasi profil dan pengaturan akun Anda</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="/dashboard" class="btn btn-light btn-lg">
                            <i class="bi bi-arrow-left me-2"></i>
                            Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Success/Error Messages -->
            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Info Card -->
            <div class="info-card" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="text-primary mb-2">
                            <i class="bi bi-info-circle me-2"></i>
                            Informasi Profil
                        </h5>
                        <p class="mb-0 text-muted">
                            Perbarui informasi profil dan password akun Anda. Pastikan menggunakan email yang aktif.
                        </p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="text-primary">
                            <i class="bi bi-person-circle fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Update Profile Information -->
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-person-lines-fill me-2"></i>
                                Informasi Profil
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <!-- Profile Image -->
                                <div class="row mb-4">
                                    <div class="col-12 text-center">
                                        <div class="profile-image-container">
                                            <img src="https://via.placeholder.com/150/007bff/ffffff?text={{ substr(Auth::user()->name, 0, 1) }}"
                                                alt="Profile" class="profile-image" id="profilePreview">
                                            <div class="upload-btn"
                                                onclick="document.getElementById('profileImage').click()">
                                                <i class="bi bi-camera"></i>
                                            </div>
                                        </div>
                                        <input type="file" id="profileImage" name="profile_image" class="d-none"
                                            accept="image/*" onchange="previewImage(this)">
                                        <div class="form-text">
                                            <i class="bi bi-info-circle me-1"></i>
                                            Klik pada ikon kamera untuk mengganti foto profil (Max: 2MB)
                                        </div>
                                    </div>
                                </div>

                                <!-- Name -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" value="{{ old('name', Auth::user()->name) }}"
                                                placeholder="Masukkan nama lengkap" required>
                                            <label for="name" class="required-field">Nama Lengkap</label>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" value="{{ old('email', Auth::user()->email) }}"
                                                placeholder="Masukkan alamat email" required>
                                            <label for="email" class="required-field">Alamat Email</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !Auth::user()->hasVerifiedEmail())
                                            <div class="alert alert-warning mt-2">
                                                <i class="bi bi-exclamation-triangle me-2"></i>
                                                Email Anda belum diverifikasi.
                                                <form method="post" action="{{ route('verification.send') }}"
                                                    class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                                        Klik di sini untuk mengirim ulang verifikasi email.
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex gap-3">
                                            <button type="submit" class="btn btn-primary-custom">
                                                <i class="bi bi-check-circle me-2"></i>
                                                Simpan Perubahan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Update Password -->
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-shield-lock me-2"></i>
                                Ubah Password
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')

                                <!-- Current Password -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password"
                                                class="form-control @error('current_password') is-invalid @enderror"
                                                id="current_password" name="current_password"
                                                placeholder="Masukkan password saat ini" required>
                                            <label for="current_password" class="required-field">Password Saat
                                                Ini</label>
                                            @error('current_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- New Password -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" placeholder="Masukkan password baru"
                                                required>
                                            <label for="password" class="required-field">Password Baru</label>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation" name="password_confirmation"
                                                placeholder="Konfirmasi password baru" required>
                                            <label for="password_confirmation" class="required-field">Konfirmasi
                                                Password Baru</label>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary-custom">
                                            <i class="bi bi-shield-check me-2"></i>
                                            Update Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Delete Account -->
                    <div class="card border-danger">
                        <div class="card-header bg-danger text-white">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                Hapus Akun
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="alert alert-danger">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                <strong>Peringatan!</strong> Tindakan ini akan menghapus akun Anda secara permanen.
                                Semua data yang terkait dengan akun ini akan dihapus dan tidak dapat dikembalikan.
                            </div>

                            <button type="button" class="btn btn-danger-custom" data-bs-toggle="modal"
                                data-bs-target="#deleteAccountModal">
                                <i class="bi bi-trash me-2"></i>
                                Hapus Akun
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Info -->
                <div class="col-lg-4" data-aos="fade-left">
                    <!-- Account Info -->
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h6 class="card-title mb-0">
                                <i class="bi bi-info-circle me-2"></i>
                                Informasi Akun
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <small class="text-muted d-block">Status Akun</small>
                                <span class="badge bg-success">Aktif</span>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted d-block">Tanggal Bergabung</small>
                                <div class="fw-semibold">{{ Auth::user()->created_at->format('d M Y') }}</div>
                            </div>
                            <div class="mb-3">
                                <small class="text-muted d-block">Terakhir Update</small>
                                <div class="fw-semibold">{{ Auth::user()->updated_at->format('d M Y, H:i') }}</div>
                            </div>
                            @if(Auth::user()->email_verified_at)
                                <div class="mb-3">
                                    <small class="text-muted d-block">Email Terverifikasi</small>
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Terverifikasi
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Security Tips -->
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h6 class="card-title mb-0">
                                <i class="bi bi-shield-check me-2"></i>
                                Tips Keamanan
                            </h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <i class="bi bi-check text-success me-2"></i>
                                    Gunakan password yang kuat
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success me-2"></i>
                                    Jangan berbagi password dengan orang lain
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check text-success me-2"></i>
                                    Verifikasi email Anda
                                </li>
                                <li class="mb-0">
                                    <i class="bi bi-check text-success me-2"></i>
                                    Logout setelah selesai menggunakan
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Account Modal -->
        <div class="modal fade" id="deleteAccountModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Konfirmasi Hapus Akun
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="POST" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <div class="alert alert-danger">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                <strong>Perhatian!</strong> Tindakan ini tidak dapat dibatalkan.
                                Semua data Anda akan dihapus secara permanen.
                            </div>

                            <div class="form-floating">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="delete_password" name="password"
                                    placeholder="Masukkan password untuk konfirmasi" required>
                                <label for="delete_password">Password untuk Konfirmasi</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash me-2"></i>
                                Hapus Akun Saya
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
            // Initialize AOS
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });

            // Profile image preview
            function previewImage(input) {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('profilePreview').src = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Password strength indicator
            document.getElementById('password')?.addEventListener('input', function () {
                const password = this.value;
                let strength = 0;

                if (password.length >= 8) strength++;
                if (/[a-z]/.test(password)) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/\d/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;

                // You can add visual strength indicator here
                console.log('Password strength:', strength);
            });

            // Form validation
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    const requiredFields = form.querySelectorAll('[required]');
                    let isValid = true;

                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            field.classList.add('is-invalid');
                            isValid = false;
                        } else {
                            field.classList.remove('is-invalid');
                        }
                    });

                    if (!isValid) {
                        e.preventDefault();
                        alert('Mohon lengkapi semua field yang wajib diisi.');
                    }
                });
            });
        </script>
    </body>

</html>