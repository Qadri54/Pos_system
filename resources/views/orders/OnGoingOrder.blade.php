<x-custom_component.management_layout>
    <div class="container py-4">
        <!-- Page Header -->
        <div class="bg-warning bg-gradient text-white rounded-3 p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-1">
                        <i class="bi bi-clock me-2"></i>
                        Orders Berlangsung
                    </h1>
                    <p class="mb-0 text-white-50">Pantau dan kelola pesanan yang sedang diproses</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('orders.index') }}" class="btn btn-light">
                        <i class="bi bi-plus-circle me-1"></i> Buat Order Baru
                    </a>
                    <a href="{{ route('orders.completed') }}" class="btn btn-outline-light">
                        <i class="bi bi-check-circle me-1"></i> Orders Selesai
                    </a>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="bi bi-list-task me-2"></i>
                    Daftar Orders Berlangsung
                </h5>
            </div>
            <div class="card-body">
                <livewire:on-going-order />
            </div>
        </div>
    </div>
</x-custom_component.management_layout>