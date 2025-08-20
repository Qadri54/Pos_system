<div class="card-body d-flex flex-column gap-3">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button required type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <input type="text" class="form-control mb-3" placeholder="Masukkan nama Pelanggan" wire:model.lazy="customer_name"
        required>

    <select class="form-select" wire:model.lazy="selected_outlet" required {{ !$customer_name ? 'disabled' : '' }}>
        <option value="" disabled>{{ !$customer_name ? 'Isi nama customer terlebih dahulu' : 'Pilih Outlet' }}</option>
        @foreach ($outlets as $outlet)
            <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
        @endforeach
    </select>

    <select class="form-select mt-3" wire:model.lazy="payment_method" required {{ !$customer_name ? 'disabled' : '' }}>
        <option value="" disabled>{{ !$customer_name ? 'Isi nama customer terlebih dahulu' : '-- Pilih Metode Pembayaran --' }}</option>
        <option value="cash">Cash</option>
        <option value="qris">Qris</option>
    </select>

    <div wire:loading class="mt-3">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <ul class="list-group list-group-flush mt-3" style="max-height: 200px; overflow-y: auto;">
        @foreach ($data as $item)
            <li class="list-group-item d-flex justify-content-between align-items-center"
                wire:key="cart-item-{{ $item['id'] }}">
                <div>
                    <span class="fw-semibold">{{ $item['product_name'] }}</span><br>
                    <small class="text-muted">Qty: {{ $item['quantity'] }}</small><br>
                    <button class="mt-1 btn btn-sm bg-danger text-light"
                        wire:click="remove('{{ $item['id'] }}')">Remove</button>
                </div>
                <span class="fw-semibold">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
            </li>
        @endforeach
    </ul>

    <div class="d-flex justify-content-between mt-3 px-2">
        <span class="fw-bold fs-5">Total:</span>
        <span class="fw-bold fs-5">Rp {{ number_format($total, 0, ',', '.') }}</span>
    </div>

    <button type="button" class="btn btn-primary mt-3 w-100" wire:click="checkout" {{ empty($data) || !$customer_name || !$selected_outlet || !$payment_method ? 'disabled' : '' }}>
        <i class="bi bi-cart-check me-2"></i>
        Checkout
    </button>

    <script>
        // Tangkap event dari Livewire
        window.addEventListener('redirect-to-invoice', event => {
            const order_id = event.detail[0].order_id;
            if (order_id) {
                const link = document.createElement('a');
                link.href = `orders/invoice/${order_id}`;
                link.target = '_blank';
                link.click();
                window.location.reload(true);
            }
        });
    </script>
</div>
