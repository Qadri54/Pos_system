<x-custom_component.management_layout>
    <div class="d-flex flex-column gap-3 container">
        <div class="align-self-end">
            <a class="btn btn-primary" href="{{ route('products.create') }}" style="width: fit-content;">tambah data</a>
        </div>
        <table class="table table-striped table-bordered" id="categoriesTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product name</th>
                    <th>Category</th>
                    <th>Outlet</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($products as $product)
                    <?php    $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>
                            {{ $product->category->name }}
                        </td>
                        <td>
                            @foreach ($product->outlet as $outlet)
                                {{ $outlet->outlet_name }}
                            @endforeach
                        </td>
                        <td>
                            {{ $product->price }}
                        </td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->product_name }}"
                                    style="width: 50px; height: 50px;">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td class="d-flex justify-content-center gap-3 container">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning text-light">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#categoriesTable').DataTable();
        })
    </script>
</x-custom_component.management_layout>
