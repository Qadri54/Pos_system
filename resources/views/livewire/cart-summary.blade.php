<div class="card-body d-flex flex-column gap-3">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <input type="text" class="form-control mb-3" placeholder="Masukkan nama Pelanggan" wire:model="customer_name"
        required>

    <select class="form-select" wire:model.lazy="selected_outlet" required>
        <option value="" disabled selected>Pilih Outlet</option>
        @foreach ($outlets as $outlet)
            <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
        @endforeach
    </select>

    <select class="form-select mt-3" wire:model.lazy="payment_method" required>
        <option value="" disabled selected>-- Pilih Metode Pembayaran --</option>
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

    <form action="{{ route('orders.invoice') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary mt-3" wire:click="checkout">Checkout</button>
        <input type="hidden" name="customer_name" value="{{ $customer_name }}">
        <input type="hidden" name="selected_outlet" value="{{ $selected_outlet }}">
        <input type="hidden" name="payment_method" value="{{ $payment_method }}">
        <input type="hidden" name="total_price" value="{{ $total }}">
        <input type="hidden" name="data" value="{{ json_encode($data) }}">
    </form>
</div>
</div>
