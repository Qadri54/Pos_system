<div class="d-flex flex-column gap-5 mt-3">
    <div wire:loading class="align-self-center spinner-border text-primary" role="status">
        <span class="visually-hidden"></span>
    </div>
    <div class="d-flex flex-wrap gap-3 justify-content-center mt-3">
        @foreach ($orders as $item)
            <div class="card shadow rounded-4 border-0" style="width: 22rem;">
                <div class="card-body d-flex flex-column gap-3">
                    <h5 class="card-title fw-bold text-primary">
                        <i class="bi bi-person-fill"></i> {{ $item['customer_name'] }}
                    </h5>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-credit-card"></i> Metode Bayar</span>
                            <span class="fw-semibold">{{ $item['payment_method'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-cash-coin"></i> Total</span>
                            <span class="fw-semibold">Rp {{ number_format($item['total_price'], 0, ',', '.') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-info-circle"></i> Status</span>
                            <span class="badge bg-danger text-capitalize">{{ $item['status'] }}</span>
                        </li>
                        <li class="list-group-item text-muted small text-end">
                            {{ $item->created_at->diffForHumans() }}
                        </li>
                    </ul>
                </div>
            </div>

        @endforeach
    </div>
</div>
