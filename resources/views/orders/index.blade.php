<x-custom_component.management_layout>
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm bg-gradient-primary text-white">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="d-flex align-items-center">
                                    <div class="bg-white bg-opacity-20 rounded-circle p-3 me-4">
                                        <i class="bi bi-cart-plus fs-2 text-white"></i>
                                    </div>
                                    <div>
                                        <h1 class="h2 fw-bold mb-2">Buat Order Baru</h1>
                                        <p class="mb-0 opacity-90">Kelola pesanan dan transaksi penjualan dengan mudah
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                                <div class="d-flex flex-column flex-lg-row gap-2 justify-content-lg-end">
                                    <a href="{{ route('orders.ongoing') }}" class="btn btn-light btn-sm">
                                        <i class="bi bi-clock me-1"></i>
                                        Orders Berlangsung
                                    </a>
                                    <a href="{{ route('orders.completed') }}" class="btn btn-outline-light btn-sm">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Riwayat Orders
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="row g-4">
            <!-- Product Selection Section -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                <i class="bi bi-basket text-primary"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold">Pilih Produk</h5>
                                <small class="text-muted">Pilih produk yang ingin ditambahkan ke order</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <livewire:cart />
                    </div>
                </div>
            </div>

            <!-- Cart Summary Section -->
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 100px;">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-gradient-primary text-white border-0 py-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-white bg-opacity-20 rounded-circle p-2 me-3">
                                    <i class="bi bi-receipt text-white"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0 fw-bold">Ringkasan Order</h5>
                                    <small class="opacity-75">Detail pembayaran dan total</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <livewire:cart-summary />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-custom_component.management_layout>