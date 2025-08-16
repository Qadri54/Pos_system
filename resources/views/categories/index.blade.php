<x-custom_component.management_layout>
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                        <i class="bi bi-tags fs-3 text-primary"></i>
                                    </div>
                                    <div>
                                        <h4 class="fw-bold mb-1">Manajemen Kategori</h4>
                                        <p class="text-muted mb-0">Kelola kategori produk untuk organisasi yang lebih
                                            baik</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                                <a class="btn btn-primary d-inline-flex align-items-center shadow-sm"
                                    href="{{ route('categories.create') }}">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    Tambah Kategori Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Table Card -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="fw-bold mb-0">
                                <i class="bi bi-list-ul me-2 text-primary"></i>
                                Daftar Kategori
                            </h5>
                            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill fs-6">
                                {{ count($categories) }} Kategori
                            </span>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0" id="categoriesTable">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="text-center py-3" style="width: 60px;">
                                            <span class="fw-semibold text-dark">No</span>
                                        </th>
                                        <th class="py-3">
                                            <span class="fw-semibold text-dark">Nama Kategori</span>
                                        </th>
                                        <th class="py-3">
                                            <span class="fw-semibold text-dark">Outlet</span>
                                        </th>
                                        <th class="text-center py-3" style="width: 150px;">
                                            <span class="fw-semibold text-dark">Aksi</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($categories as $category)
                                        <?php    $i++; ?>
                                        <tr class="border-bottom">
                                            <td class="text-center py-3">
                                                <span class="badge bg-primary-subtle text-primary fw-bold">{{ $i }}</span>
                                            </td>
                                            <td class="py-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                        <i class="bi bi-tag text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 fw-semibold">{{ $category->name }}</h6>
                                                        <small class="text-muted">Kategori Produk</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                                    <i class="bi bi-building me-1"></i>
                                                    {{ $category->outlet->outlet_name ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td class="text-center py-3">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('categories.edit', $category->id) }}"
                                                        class="btn btn-outline-primary btn-sm" data-bs-toggle="tooltip"
                                                        title="Edit Kategori">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Yakin ingin menghapus kategori {{ addslashes($category->name) }}?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                                            data-bs-toggle="tooltip" title="Hapus Kategori">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if(count($categories) == 0)
                            <div class="text-center py-5">
                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                    style="width: 80px; height: 80px;">
                                    <i class="bi bi-inbox fs-2 text-muted"></i>
                                </div>
                                <h5 class="text-muted">Belum ada kategori</h5>
                                <p class="text-muted mb-3">Mulai dengan menambahkan kategori pertama</p>
                                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    Tambah Kategori
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables Initialization -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Initialize DataTable if jQuery and DataTables are available
            if (typeof $ !== 'undefined' && $.fn.DataTable) {
                $('#categoriesTable').DataTable({
                    responsive: true,
                    pageLength: 10,
                    lengthChange: true,
                    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
                    order: [],
                    columnDefs: [
                        { targets: -1, orderable: false, searchable: false }, // Action column
                    ],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',
                        search: "Cari Kategori:",
                        searchPlaceholder: "Ketik nama kategori...",
                        zeroRecords: "Tidak ada kategori yang ditemukan",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ kategori",
                        infoEmpty: "Tidak ada kategori tersedia",
                        infoFiltered: "(difilter dari _MAX_ total kategori)",
                        paginate: {
                            first: "Pertama",
                            last: "Terakhir",
                            next: "Selanjutnya",
                            previous: "Sebelumnya"
                        }
                    },
                    dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                        '<"row"<"col-sm-12"tr>>' +
                        '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>'
                });
            }
        });
    </script>
</x-custom_component.management_layout>