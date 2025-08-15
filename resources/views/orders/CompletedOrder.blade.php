<x-custom_component.management_layout>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="bg-success bg-gradient text-white rounded-3 p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-1">
                        <i class="bi bi-check-circle me-2"></i>
                        Orders Selesai
                    </h1>
                    <p class="mb-0 text-white-50">Riwayat pesanan yang telah berhasil diselesaikan</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('orders.index') }}" class="btn btn-light">
                        <i class="bi bi-plus-circle me-1"></i> Buat Order Baru
                    </a>
                    <a href="{{ route('orders.ongoing') }}" class="btn btn-outline-light">
                        <i class="bi bi-clock me-1"></i> Orders Berlangsung
                    </a>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="bi bi-clipboard-check me-2"></i>
                    Daftar Orders Selesai
                </h5>
            </div>
            <div class="card-body">
                <livewire:completed-order />
            </div>
        </div>
    </div>
</x-custom_component.management_layout>