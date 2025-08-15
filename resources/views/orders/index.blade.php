<x-custom_component.management_layout>
    <div class="container-fluid py-4">
        <!-- Page Header -->
        <div class="bg-primary bg-gradient text-white rounded-3 p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-1">
                        <i class="bi bi-cart-plus me-2"></i>
                        Buat Order Baru
                    </h1>
                    <p class="mb-0 text-white-50">Kelola pesanan dan transaksi penjualan</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('orders.ongoing') }}" class="btn btn-light">
                        <i class="bi bi-clock me-1"></i> Orders Berlangsung
                    </a>
                    <a href="{{ route('orders.completed') }}" class="btn btn-outline-light">
                        <i class="bi bi-check-circle me-1"></i> Riwayat
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="row g-4">
            <!-- Cart Section -->
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">
                            <i class="bi bi-basket me-2"></i>
                            Pilih Produk
                        </h5>
                    </div>
                    <div class="card-body">
                        <livewire:cart />
                    </div>
                </div>
            </div>

            <!-- Cart Summary Section -->
            <div class="col-lg-4">
                <div class="card shadow-sm position-sticky" style="top: 100px;">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-receipt me-2"></i>
                            Ringkasan Order
                        </h5>
                    </div>
                    <div class="card-body">
                        <livewire:cart-summary />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-custom_component.management_layout>