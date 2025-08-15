<x-custom_component.management_layout>
    <!-- Dashboard Header -->
    <div class="page-header p-4"
        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 3rem 0;">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-3">
                    <i class="bi bi-speedometer2 me-3"></i>
                    Selamat Datang, {{ Auth::user()->name ?? 'User' }}! 👋
                </h1>
                <p class="lead mb-0 opacity-90">
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

    <!-- Statistics Cards -->
    <div class="row g-4 mb-5 p-4">
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm stats-card h-100" style="transition: transform 0.2s;">
                <div class="card-body text-center p-4">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 70px; height: 70px; background: linear-gradient(135deg, #4f46e5, #7c3aed);">
                        <i class="bi bi-receipt fs-3 text-white"></i>
                    </div>
                    <h2 class="fw-bold mb-1" style="color: #4f46e5;">{{ $totalOrders ?? 0 }}</h2>
                    <h6 class="text-muted mb-0">Total Orders</h6>
                    <div class="mt-2">
                        <small class="text-success">
                            <i class="bi bi-arrow-up me-1"></i>
                            Hari ini
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm stats-card h-100" style="transition: transform 0.2s;">
                <div class="card-body text-center p-4">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 70px; height: 70px; background: linear-gradient(135deg, #f59e0b, #fbbf24);">
                        <i class="bi bi-currency-dollar fs-3 text-white"></i>
                    </div>
                    <h2 class="fw-bold mb-1" style="color: #f59e0b;">Rp
                        {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}
                    </h2>
                    <h6 class="text-muted mb-0">Total Pendapatan</h6>
                    <div class="mt-2">
                        <small class="text-success">
                            <i class="bi bi-arrow-up me-1"></i>
                            +15% bulan ini
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm stats-card h-100" style="transition: transform 0.2s;">
                <div class="card-body text-center p-4">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                        style="width: 70px; height: 70px; background: linear-gradient(135deg, #10b981, #059669);">
                        <i class="bi bi-box-seam fs-3 text-white"></i>
                    </div>
                    <h2 class="fw-bold mb-1" style="color: #10b981;">{{ $totalProducts ?? 0 }}</h2>
                    <h6 class="text-muted mb-0">Total Produk</h6>
                    <div class="mt-2">
                        <small class="text-primary">
                            <i class="bi bi-box me-1"></i>
                            Dalam stok
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-4 mb-5">
        <div class="col-12">
            <h4 class="fw-bold mb-4">
                <i class="bi bi-lightning-charge me-2"></i>
                Aksi Cepat
            </h4>
        </div>
        <div class="col-lg-4 col-md-6">
            <a href="{{ route('orders.index') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm action-card h-100" style="transition: all 0.2s;">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px; background: linear-gradient(135deg, #4f46e5, #7c3aed);">
                            <i class="bi bi-plus-lg fs-4 text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-2 text-dark">Buat Order Baru</h5>
                        <p class="text-muted mb-0">Tambah transaksi penjualan baru dengan cepat</p>
                        <div class="mt-3">
                            <span class="btn btn-primary-modern btn-sm">
                                <i class="bi bi-arrow-right me-1"></i>
                                Mulai Sekarang
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <a href="{{ route('products.create') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm action-card h-100" style="transition: all 0.2s;">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px; background: linear-gradient(135deg, #10b981, #059669);">
                            <i class="bi bi-box-seam fs-4 text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-2 text-dark">Tambah Produk</h5>
                        <p class="text-muted mb-0">Daftarkan produk baru ke dalam inventory</p>
                        <div class="mt-3">
                            <span class="btn btn-success-modern btn-sm">
                                <i class="bi bi-arrow-right me-1"></i>
                                Tambah Produk
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <a href="{{ route('orders.completed') }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm action-card h-100" style="transition: all 0.2s;">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px; background: linear-gradient(135deg, #06b6d4, #3b82f6);">
                            <i class="bi bi-clock-history fs-4 text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-2 text-dark">Riwayat Transaksi</h5>
                        <p class="text-muted mb-0">Lihat semua aktivitas dan transaksi</p>
                        <div class="mt-3">
                            <span class="btn btn-info-modern btn-sm">
                                <i class="bi bi-arrow-right me-1"></i>
                                Lihat Riwayat
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Activity & Chart Section -->
    <div class="row g-4 mb-5">
        <div class="col-lg-8 p-3">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 p-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-graph-up me-2"></i>
                        Status Orders
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3 p-3 bg-light rounded">
                        <div class="rounded-circle p-2 me-3"
                            style="background: linear-gradient(135deg, #f59e0b, #fbbf24);">
                            <i class="bi bi-clock text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Ongoing Orders</h6>
                            <small class="text-muted">Orders yang sedang diproses</small>
                        </div>
                        <span class="badge bg-warning">{{ $ongoingOrders ?? 0 }} Orders</span>
                    </div>
                    <div class="d-flex align-items-center mb-3 p-3 bg-light rounded">
                        <div class="rounded-circle p-2 me-3"
                            style="background: linear-gradient(135deg, #10b981, #059669);">
                            <i class="bi bi-check-circle text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Completed Orders</h6>
                            <small class="text-muted">Orders yang telah selesai</small>
                        </div>
                        <span class="badge bg-success">{{ $completedOrders ?? 0 }} Orders</span>
                    </div>
                    <div class="d-flex align-items-center p-3 bg-light rounded">
                        <div class="rounded-circle p-2 me-3"
                            style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                            <i class="bi bi-x-circle text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Canceled Orders</h6>
                            <small class="text-muted">Orders yang dibatalkan</small>
                        </div>
                        <span class="badge bg-danger">{{ $canceledOrders ?? 0 }} Orders</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 p-3">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-pie-chart me-2"></i>
                        Ringkasan Hari Ini
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Orders Selesai</span>
                            <span class="fw-bold">{{ $totalOrders ?? 0 }}</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 75%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update current time
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            const timeElement = document.getElementById('current-time');
            if (timeElement) {
                timeElement.textContent = timeString;
            }
        }

        updateTime();
        setInterval(updateTime, 1000);

        // Add hover effects
        document.addEventListener('DOMContentLoaded', function () {
            const statsCards = document.querySelectorAll('.stats-card');
            const actionCards = document.querySelectorAll('.action-card');

            statsCards.forEach(card => {
                card.addEventListener('mouseenter', function () {
                    this.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', function () {
                    this.style.transform = 'translateY(0)';
                });
            });

            actionCards.forEach(card => {
                card.addEventListener('mouseenter', function () {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
                });
                card.addEventListener('mouseleave', function () {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 0.125rem 0.25rem rgba(0,0,0,0.075)';
                });
            });
        });
    </script>
</x-custom_component.management_layout>
