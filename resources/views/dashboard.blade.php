<x-custom_component.management_layout>
    <div class="container-fluid">
        <!-- Welcome Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card bg-gradient-primary text-white border-0 shadow-modern">
                    <div class="card-body p-5">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="d-flex align-items-center">
                                    <div class="bg-white bg-opacity-20 rounded-circle p-3 me-4">
                                        <i class="bi bi-house-heart-fill fs-2 text-white"></i>
                                    </div>
                                    <div>
                                        <h1 class="display-6 fw-bold mb-2">
                                            Selamat Datang, {{ Auth::user()->name ?? 'User' }}! 👋
                                        </h1>
                                        <p class="lead mb-0 opacity-90">
                                            Kelola bisnis POS Anda dengan mudah melalui dashboard yang komprehensif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                                <div class="bg-white bg-opacity-15 rounded-3 p-3">
                                    <div
                                        class="d-flex align-items-center justify-content-center justify-content-lg-end">
                                        <i class="bi bi-calendar-event fs-4 me-3 opacity-75"></i>
                                        <div class="text-center text-lg-end">
                                            <h6 class="mb-1 fw-semibold">{{ \Carbon\Carbon::now()->format('l') }}</h6>
                                            <p class="mb-0 opacity-90">{{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-4 mb-5">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-info bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-calendar-day fs-2 text-info"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="fw-bold mb-1 text-info">{{ $todayOrders ?? 0 }}</h2>
                                <h6 class="text-muted mb-2">Orders Hari Ini</h6>
                                <span class="badge bg-info-subtle text-info rounded-pill px-3 py-2">
                                    <i class="bi bi-calendar-check me-1"></i>
                                    Today
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-receipt-cutoff fs-2 text-primary"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="fw-bold mb-1 text-primary">{{ $totalOrders ?? 0 }}</h2>
                                <h6 class="text-muted mb-2">Total Orders</h6>
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                                    <i class="bi bi-graph-up me-1"></i>
                                    All Time
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-shop fs-2 text-warning"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="fw-bold mb-1 text-warning">{{ $totalOutlets ?? 0 }}</h2>
                                <h6 class="text-muted mb-2">Total Outlets</h6>
                                <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2">
                                    <i class="bi bi-buildings me-1"></i>
                                    Cabang
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-secondary bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-people-fill fs-2 text-secondary"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="fw-bold mb-1 text-secondary">{{ $totalEmployees ?? 0 }}</h2>
                                <h6 class="text-muted mb-2">Total Karyawan</h6>
                                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-2">
                                    <i class="bi bi-person-badge me-1"></i>
                                    Staff
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-currency-dollar fs-2 text-success"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="fw-bold mb-1 text-success">
                                    Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}
                                </h2>
                                <h6 class="text-muted mb-2">Total Revenue</h6>
                                <span class="badge bg-info-subtle text-info rounded-pill px-3 py-2">
                                    <i class="bi bi-graph-up me-1"></i>
                                    Bulan ini
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-box-seam fs-2 text-warning"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="fw-bold mb-1 text-warning">{{ $totalProducts ?? 0 }}</h2>
                                <h6 class="text-muted mb-2">Total Produk</h6>
                                <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2">
                                    <i class="bi bi-box me-1"></i>
                                    Aktif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row g-4 mb-5">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="fw-bold mb-1">
                            <i class="bi bi-lightning-charge-fill me-2 text-primary"></i>
                            Aksi Cepat
                        </h4>
                        <p class="text-muted mb-0">Akses fitur utama dengan sekali klik</p>
                    </div>
                    <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fs-6">
                        <i class="bi bi-magic me-1"></i>
                        Quick Access
                    </span>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('orders.index') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 70px; height: 70px;">
                                <i class="bi bi-receipt fs-3 text-primary"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Kelola Orders</h5>
                            <p class="text-muted small mb-3">Lihat dan kelola semua pesanan</p>
                            <div class="btn btn-primary btn-sm w-100">
                                <i class="bi bi-arrow-right me-1"></i>
                                Lihat Orders
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('products.create') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 70px; height: 70px;">
                                <i class="bi bi-box-seam fs-3 text-success"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Tambah Produk</h5>
                            <p class="text-muted small mb-3">Daftarkan produk baru</p>
                            <div class="btn btn-success btn-sm w-100">
                                <i class="bi bi-plus-circle me-1"></i>
                                Tambah Produk
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('categories.create') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 70px; height: 70px;">
                                <i class="bi bi-tags fs-3 text-warning"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Tambah Kategori</h5>
                            <p class="text-muted small mb-3">Buat kategori produk baru</p>
                            <div class="btn btn-warning btn-sm w-100">
                                <i class="bi bi-tag me-1"></i>
                                Tambah Kategori
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6">
                <a href="{{ route('users.create') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 70px; height: 70px;">
                                <i class="bi bi-person-plus fs-3 text-info"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Tambah User</h5>
                            <p class="text-muted small mb-3">Daftarkan karyawan baru</p>
                            <div class="btn btn-info btn-sm w-100">
                                <i class="bi bi-person-plus me-1"></i>
                                Tambah User
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Status Orders Section -->
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 p-4">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-graph-up me-2 text-primary"></i>
                            Status Orders
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 bg-warning bg-opacity-10 rounded-3">
                                    <div class="bg-warning rounded-circle p-2 me-3">
                                        <i class="bi bi-clock text-white"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-semibold">Ongoing Orders</h6>
                                        <small class="text-muted">Orders yang sedang diproses</small>
                                    </div>
                                    <span class="badge bg-warning fs-6">{{ $ongoingOrders }} Orders</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 bg-success bg-opacity-10 rounded-3">
                                    <div class="bg-success rounded-circle p-2 me-3">
                                        <i class="bi bi-check-circle text-white"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-semibold">Completed Orders</h6>
                                        <small class="text-muted">Orders yang telah selesai</small>
                                    </div>
                                    <span class="badge bg-success fs-6">{{ $completedOrders }} Orders</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 bg-danger bg-opacity-10 rounded-3">
                                    <div class="bg-danger rounded-circle p-2 me-3">
                                        <i class="bi bi-x-circle text-white"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-semibold">Canceled Orders</h6>
                                        <small class="text-muted">Orders yang dibatalkan</small>
                                    </div>
                                    <span class="badge bg-danger fs-6">{{ $canceledOrders }} Orders</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 p-4">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-pie-chart me-2 text-primary"></i>
                            Ringkasan Hari Ini
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="bi bi-check-circle fs-1 text-primary"></i>
                            </div>
                            <h2 class="fw-bold text-primary">{{ $totalOrders ?? 0 }}</h2>
                            <p class="text-muted mb-3">Orders Selesai Hari Ini</p>
                            <div class="progress mb-3" style="height: 10px;">
                                <div class="progress-bar bg-primary" style="width: 75%;"></div>
                            </div>
                            <small class="text-success">
                                <i class="bi bi-arrow-up me-1"></i>
                                +15% dari kemarin
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-custom_component.management_layout>