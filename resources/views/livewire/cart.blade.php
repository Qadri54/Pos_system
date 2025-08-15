<div class="row row-cols-1 content-area rounded shadow-sm mt-3">
    @foreach ($products as $item)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card h-100 shadow-sm rounded-4" style="cursor: pointer; transition: transform 0.2s ease;"
                wire:click="addCart({{ $item['id'] }})" onmouseover="this.style.transform='scale(1.03)'"
                onmouseout="this.style.transform='scale(1)'">
                <img src="{{ asset('storage/images/' . $item['image']) }}" class="card-img-top rounded-top"
                    alt="{{ $item['product_name'] }}" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <h6 class="card-text text-center text-truncate w-100 mb-0 fw-semibold"
                        title="{{ $item['product_name'] }}">
                        {{ $item['product_name'] }}
                    </h6>
                </div>
            </div>
        </div>
    @endforeach
</div>
