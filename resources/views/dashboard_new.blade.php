<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard - POSINAJA System</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">

        <style>
            body {
                font-family: 'Inter', sans-serif;
                padding-top: 76px;
            }

            .navbar-brand {
                font-weight: 700;
            }

            .stats-card {
                transition: transform 0.2s;
            }

            .stats-card:hover {
                transform: translateY(-2px);
            }

            .action-card {
                transition: all 0.2s;
                text-decoration: none;
                color: inherit;
            }

            .action-card:hover {
                transform: translateY(-2px);
                color: inherit;
                text-decoration: none;
            }
        </style>
    </head>

    <body class="bg-light">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <i class="bi bi-shop-window me-2"></i>POSINAJA
                </a>

                <!-- Mobile toggle -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation items -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2 me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('orders.*') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-receipt me-1"></i>Orders
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('orders.create') }}">
                                        <i class="bi bi-plus-circle me-2"></i>Buat Order Baru
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('orders.index') }}">
                                        <i class="bi bi-list-ul me-2"></i>Semua Orders
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('orders.ongoing') }}">
                                        <i class="bi bi-clock me-2"></i>Orders Berlangsung
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('orders.completed') }}">
                                        <i class="bi bi-check-circle me-2"></i>Orders Selesai
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('orders.canceled') }}">
                                        <i class="bi bi-x-circle me-2"></i>Orders Dibatalkan
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('product.*') || request()->routeIs('category.*') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-box-seam me-1"></i>Produk
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.index') }}">
                                        <i class="bi bi-grid me-2"></i>Kelola Produk
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('product.create') }}">
                                        <i class="bi bi-plus-circle me-2"></i>Tambah Produk
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('category.index') }}">
                                        <i class="bi bi-tags me-2"></i>Kelola Kategori
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('category.create') }}">
                                        <i class="bi bi-plus-square me-2"></i>Tambah Kategori
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('outlet.*') ? 'active' : '' }}"
                                href="{{ route('outlet.index') }}">
                                <i class="bi bi-building me-1"></i>Outlet
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('users.*') || request()->routeIs('history.*') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear me-1"></i>Manajemen
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('users.index') }}">
                                        <i class="bi bi-people me-2"></i>Kelola User
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('history.index') }}">
                                        <i class="bi bi-clock-history me-2"></i>Riwayat Transaksi
                                    </a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right side items -->
                    <ul class="navbar-nav">
                        <!-- Notifications -->
                        <li class="nav-item dropdown">
                            <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-bell fs-5"></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    3
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" style="width: 320px;">
                                <li>
                                    <h6 class="dropdown-header">Notifikasi</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i class="bi bi-cart text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Order Baru</h6>
                                                <p class="mb-1 small">Order #12345 telah dibuat</p>
                                                <small class="text-muted">2 menit yang lalu</small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-center" href="#">Lihat Semua Notifikasi</a></li>
                            </ul>
                        </li>

                        <!-- User Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name ?? 'User' }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">
                                        <i class="bi bi-person me-2"></i>Profil
                                    </a></li>
                                <li><a class="dropdown-item" href="#">
                                        <i class="bi bi-gear me-2"></i>Pengaturan
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <div class="bg-primary text-white py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h1 class="display-5 fw-bold mb-3">
                            Selamat Datang, {{ Auth::user()->name ?? 'User' }}! 👋
                        </h1>
                        <p class="lead mb-0">
                            Kelola bisnis POS Anda dengan mudah dan efisien melalui dashboard yang komprehensif
                        </p>
                    </div>
                    <div class="col-lg-4 text-end">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="me-3">
                                <i class="bi bi-calendar-event fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">{{ \Carbon\Carbon::now()->format('l, d F Y') }}</h6>
                                <small id="current-time">{{ \Carbon\Carbon::now()->format('H:i:s') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container my-5">
            <!-- Statistics Cards -->
            <div class="row g-4 mb-5">
                <div class="col-lg-3 col-md-6">
                    <div class="card stats-card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="bi bi-receipt fs-4"></i>
                            </div>
                            <h2 class="fw-bold text-primary mb-1">{{ $totalOrders ?? '35' }}</h2>
                            <h6 class="text-muted mb-0">Total Orders</h6>
                            <small class="text-success">
                                <i class="bi bi-arrow-up"></i> +12% dari bulan lalu
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card stats-card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="bi bi-people fs-4"></i>
                            </div>
                            <h2 class="fw-bold text-success mb-1">{{ $totalCustomers ?? '3' }}</h2>
                            <h6 class="text-muted mb-0">Pelanggan</h6>
                            <small class="text-success">
                                <i class="bi bi-arrow-up"></i> +5% dari bulan lalu
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card stats-card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="bi bi-currency-dollar fs-4"></i>
                            </div>
                            <h2 class="fw-bold text-warning mb-1">Rp
                                {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</h2>
                            <h6 class="text-muted mb-0">Pendapatan</h6>
                            <small class="text-success">
                                <i class="bi bi-arrow-up"></i> +8% dari bulan lalu
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card stats-card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 60px; height: 60px;">
                                <i class="bi bi-box-seam fs-4"></i>
                            </div>
                            <h2 class="fw-bold text-info mb-1">{{ $totalProducts ?? '3' }}</h2>
                            <h6 class="text-muted mb-0">Produk</h6>
                            <small class="text-success">
                                <i class="bi bi-arrow-up"></i> +3% dari bulan lalu
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row g-4 mb-5">
                <div class="col-12">
                    <h4 class="fw-bold mb-4">Aksi Cepat</h4>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('orders.create') }}" class="action-card card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 50px; height: 50px;">
                                <i class="bi bi-plus-lg fs-5"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Buat Order Baru</h5>
                            <p class="text-muted mb-0">Tambah transaksi penjualan baru dengan cepat</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('product.create') }}" class="action-card card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 50px; height: 50px;">
                                <i class="bi bi-box-seam fs-5"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Tambah Produk</h5>
                            <p class="text-muted mb-0">Daftarkan produk baru ke dalam inventory</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('history.index') }}" class="action-card card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 50px; height: 50px;">
                                <i class="bi bi-clock-history fs-5"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Riwayat Transaksi</h5>
                            <p class="text-muted mb-0">Lihat semua aktivitas dan transaksi</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Charts -->
            <div class="row g-4 mb-5">
                <!-- Sales Chart -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="fw-bold mb-0">Penjualan Mingguan</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="salesChart" style="max-height: 300px;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="fw-bold mb-0">Order Terbaru</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item border-0 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px;">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Order #12345</h6>
                                            <small class="text-muted">Rp 150.000 - 5 menit lalu</small>
                                        </div>
                                        <span class="badge bg-success">Selesai</span>
                                    </div>
                                </div>
                                <div class="list-group-item border-0 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px;">
                                            <i class="bi bi-clock"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Order #12344</h6>
                                            <small class="text-muted">Rp 75.000 - 10 menit lalu</small>
                                        </div>
                                        <span class="badge bg-warning">Proses</span>
                                    </div>
                                </div>
                                <div class="list-group-item border-0 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px;">
                                            <i class="bi bi-cart-plus"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Order #12343</h6>
                                            <small class="text-muted">Rp 200.000 - 15 menit lalu</small>
                                        </div>
                                        <span class="badge bg-success">Selesai</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 text-center">
                            <a href="{{ route('orders.index') }}" class="btn btn-outline-primary btn-sm">
                                Lihat Semua Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="fw-bold mb-0">Aktivitas Terbaru</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item border-0 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px;">
                                            <i class="bi bi-check-circle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Order #12345 telah diselesaikan</h6>
                                            <small class="text-muted">5 menit yang lalu oleh Kasir 1</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item border-0 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px;">
                                            <i class="bi bi-plus-circle"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Produk baru "Kopi Latte" telah ditambahkan</h6>
                                            <small class="text-muted">10 menit yang lalu oleh Admin</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item border-0 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 40px; height: 40px;">
                                            <i class="bi bi-person-plus"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">User baru "Kasir 2" telah didaftarkan</h6>
                                            <small class="text-muted">1 jam yang lalu oleh Manager</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-dark text-light py-4 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="fw-bold">POSINAJA</h5>
                        <p class="mb-0">Sistem Point of Sale modern untuk bisnis Anda</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <small class="text-muted">
                            © 2025 POSINAJA. Semua hak dilindungi.
                        </small>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            // Update current time
            function updateTime() {
                const now = new Date();
                const timeString = now.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });
                document.getElementById('current-time').textContent = timeString;
            }

            updateTime();
            setInterval(updateTime, 1000);

            // Sales Chart
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($chartLabels ?? ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']) !!},
                    datasets: [{
                        label: 'Penjualan (Rp)',
                        data: {!! json_encode($chartData ?? [1200000, 1900000, 800000, 2100000, 1600000, 2400000, 1800000]) !!},
                        borderColor: '#0d6efd',
                        backgroundColor: 'rgba(13, 110, 253, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#0d6efd',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 3,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value) {
                                    return 'Rp ' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    elements: {
                        point: {
                            hoverRadius: 8
                        }
                    }
                }
            });
        </script>
    </body>

</html>