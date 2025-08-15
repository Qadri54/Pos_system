<x-custom_component.management_layout>

    @if(session('success'))
        <x-custom_component.alert>{{ session('success') }}</x-custom_component.alert>
    @endif

    <div class="container">
        <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST"
            class="d-flex flex-column gap-3">
            @csrf
            @method('PUT')
            <x-custom_component.text-input class="" placeholder="Product Name" name="name"
                value="{{ $product->product_name }}"></x-custom_component.text-input>

            <x-custom_component.text-input class="" type="number" name="price" placeholder="harga"
                value="{{ $product->price }}"></x-custom_component.text-input>

            <x-custom_component.text-input class="" type="file" name="image"
                placeholder="Upload Image"></x-custom_component.text-input>

            <x-custom_component.select-input class="form-select" name="category_id">
                <option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
                @foreach ($categories as $category)
                    @if($category->id != $product->category_id)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </x-custom_component.select-input>

            <x-custom_component.select-input class="form-select" name="outlet_id">
                <option>pilih outlet</option>
                @foreach ($outlets as $outlet)
                    <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                @endforeach
            </x-custom_component.select-input>

            <x-custom_component.button type="submit" class="mt-5">Update produk</x-custom_component.button>
        </form>
    </div>
</x-custom_component.management_layout>
