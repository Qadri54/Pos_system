<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Manajemen Outlets - POSINAJA System</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet">

        <!-- Custom Styles -->
        <style>
            :root {
                --primary-color: #007bff;
                --secondary-color: #28a745;
                --success-color: #20c997;
                --warning-color: #ffc107;
                --danger-color: #dc3545;
                --light-bg: #f8f9fa;
                --sidebar-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }

            body {
                background: var(--light-bg);
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .page-header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 2rem 0;
                margin-bottom: 2rem;
                border-radius: 0 0 20px 20px;
            }

            .card {
                border: none;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
                border-radius: 15px;
                overflow: hidden;
            }

            .card-header {
                background: linear-gradient(45deg, var(--primary-color), #0056b3);
                color: white;
                border: none;
                padding: 1.5rem;
            }

            .btn-primary-custom {
                background: linear-gradient(45deg, var(--primary-color), #0056b3);
                border: none;
                transition: all 0.3s ease;
                border-radius: 10px;
            }

            .btn-primary-custom:hover {
                background: linear-gradient(45deg, #0056b3, var(--primary-color));
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
            }

            .btn-success-custom {
                background: linear-gradient(45deg, var(--secondary-color), #20c997);
                border: none;
                color: white;
                transition: all 0.3s ease;
                border-radius: 10px;
            }

            .btn-success-custom:hover {
                background: linear-gradient(45deg, #20c997, var(--secondary-color));
                transformzz: translateY(-2px);
                box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
                color: white;
            }

            .btn-warning-custom {
                background: linear-gradient(45deg, var(--warning-color), #ff8c00);
                border: none;
                color: white;
                transition: all 0.3s ease;
                border-radius: 10px;
            }

            .btn-warning-custom:hover {
                background: linear-gradient(45deg, #ff8c00, var(--warning-color));
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
                color: white;
            }

            .btn-danger-custom {
                background: linear-gradient(45deg, var(--danger-color), #c82333);
                border: none;
                color: white;
                transition: all 0.3s ease;
                border-radius: 10px;
            }

            .btn-danger-custom:hover {
                background: linear-gradient(45deg, #c82333, var(--danger-color));
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
                color: white;
            }

            .stats-card {
                background: white;
                border-radius: 15px;
                padding: 1.5rem;
                margin-bottom: 1.5rem;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
                transition: all 0.3s ease;
            }

            .stats-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            }

            .table th {
                background-color: var(--light-bg);
                border: none;
                font-weight: 600;
                text-transform: uppercase;
                font-size: 0.85rem;
                letter-spacing: 0.5px;
            }

            .navbar-brand {
                font-weight: bold;
                color: white !important;
            }

            .status-active {
                background: rgba(40, 167, 69, 0.2);
                color: #155724;
                border: 1px solid rgba(40, 167, 69, 0.3);
                padding: 4px 12px;
                border-radius: 15px;
                font-size: 0.85rem;
                font-weight: 600;
            }

            .status-inactive {
                background: rgba(220, 53, 69, 0.2);
                color: #721c24;
                border: 1px solid rgba(220, 53, 69, 0.3);
                padding: 4px 12px;
                border-radius: 15px;
                font-size: 0.85rem;
                font-weight: 600;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/">
                    <i class="bi bi-shop me-2"></i>
                    POSINAJA
                </a>
                <div class="navbar-nav ms-auto">
                    <a class="nav-link text-white" href="/dashboard">
                        <i class="bi bi-speedometer2 me-1"></i>
                        Dashboard
                    </a>
                    <a class="nav-link text-white" href="/orders">
                        <i class="bi bi-receipt me-1"></i>
                        Orders
                    </a>
                    <a class="nav-link text-white active" href="/outlets">
                        <i class="bi bi-building me-1"></i>
                        Outlets
                    </a>
                </div>
            </div>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="h2 fw-bold mb-2">
                            <i class="bi bi-building me-3"></i>
                            Manajemen Outlets
                        </h1>
                        <p class="mb-0 opacity-75">Kelola semua outlets bisnis Anda dalam satu tempat</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('outlets.create') }}" class="btn btn-light btn-lg">
                            <i class="bi bi-plus-circle me-2"></i>
                            Tambah Outlets Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Success Alert -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="stats-card text-center">
                        <i class="bi bi-building text-primary fs-1 mb-3"></i>
                        <h3 class="fw-bold text-primary mb-1">{{ $outlets->count() }}</h3>
                        <p class="text-muted mb-0">Total Outlets</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card text-center">
                        <i class="bi bi-geo-alt text-success fs-1 mb-3"></i>
                        <h3 class="fw-bold text-success mb-1">{{ $outlets->pluck('address')->unique()->count() }}</h3>
                        <p class="text-muted mb-0">Kota/Area</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card text-center">
                        <i class="bi bi-people text-warning fs-1 mb-3"></i>
                        <h3 class="fw-bold text-warning mb-1">
                            {{ $outlets->sum(function ($outlet) {
    return $outlet->users->count(); }) }}
                        </h3>
                        <p class="text-muted mb-0">Total Staff</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card text-center">
                        <i class="bi bi-graph-up text-info fs-1 mb-3"></i>
                        <h3 class="fw-bold text-info mb-1">95%</h3>
                        <p class="text-muted mb-0">Efisiensi</p>
                    </div>
                </div>
            </div>

            <!-- Main Table Card -->
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-table me-2"></i>
                                Daftar Outlets
                            </h5>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex gap-2">
                                <button class="btn btn-light btn-sm" onclick="refreshTable()">
                                    <i class="bi bi-arrow-clockwise me-1"></i>
                                    Refresh
                                </button>
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown">
                                        <i class="bi bi-download me-1"></i>
                                        Export
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" onclick="exportTable('excel')">
                                                <i class="bi bi-file-earmark-excel me-2"></i>Excel
                                            </a></li>
                                        <li><a class="dropdown-item" href="#" onclick="exportTable('pdf')">
                                                <i class="bi bi-file-earmark-pdf me-2"></i>PDF
                                            </a></li>
                                        <li><a class="dropdown-item" href="#" onclick="exportTable('print')">
                                                <i class="bi bi-printer me-2"></i>Print
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="outletsTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Outlets</th>
                                    <th>Alamat</th>
                                    <th>Staff</th>
                                    <th>Status</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($outlets as $outlet)
                                    <tr>
                                        <td>
                                            <span class="badge bg-primary">{{ $outlet->id }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                    <i class="bi bi-building text-primary"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-semibold">{{ $outlet->outlet_name }}</div>
                                                    <small class="text-muted">Outlets #{{ $outlet->id }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-geo-alt text-muted me-2"></i>
                                                <span>{{ $outlet->address }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-people text-muted me-2"></i>
                                                <span class="badge bg-info">{{ $outlet->users->count() }} Staff</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status-active">
                                                <i class="bi bi-check-circle me-1"></i>
                                                Aktif
                                            </span>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                <i class="bi bi-calendar me-1"></i>
                                                {{ $outlet->created_at->format('d M Y') }}
                                            </small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-primary"
                                                    onclick="viewOutlet({{ $outlet->id }})" title="Lihat Detail">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <a href="{{ route('outlets.edit', $outlet->id) }}"
                                                    class="btn btn-sm btn-warning-custom" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('outlets.destroy', $outlet->id) }}" method="POST"
                                                    style="display: inline;"
                                                    onsubmit="return confirmDelete('{{ $outlet->outlet_name }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger-custom"
                                                        title="Hapus">
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
                </div>
            </div>
        </div>

        <!-- View Detail Modal -->
        <div class="modal fade" id="viewModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            <i class="bi bi-building me-2"></i>
                            Detail Outlets
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="modalContent">
                        <!-- Content will be loaded dynamically -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

        <script>
            $(document).ready(function () {
                // Initialize DataTable
                var table = $('#outletsTable').DataTable({
                    responsive: true,
                    pageLength: 10,
                    order: [[0, 'desc']],
                    language: {
                        search: "Cari:",
                        lengthMenu: "Tampilkan _MENU_ data per halaman",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                        infoFiltered: "(difilter dari _MAX_ total data)",
                        paginate: {
                            first: "Pertama",
                            last: "Terakhir",
                            next: "Selanjutnya",
                            previous: "Sebelumnya"
                        },
                        emptyTable: "Tidak ada data yang tersedia",
                        zeroRecords: "Tidak ditemukan data yang sesuai"
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excel',
                            text: '<i class="bi bi-file-earmark-excel me-1"></i> Excel',
                            className: 'btn btn-success btn-sm'
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="bi bi-file-earmark-pdf me-1"></i> PDF',
                            className: 'btn btn-danger btn-sm'
                        },
                        {
                            extend: 'print',
                            text: '<i class="bi bi-printer me-1"></i> Print',
                            className: 'btn btn-info btn-sm'
                        }
                    ]
                });

                // Hide default buttons
                $('.dt-buttons').hide();
            });

            function refreshTable() {
                location.reload();
            }

            function exportTable(type) {
                var table = $('#outletsTable').DataTable();
                if (type === 'excel') {
                    table.button('.buttons-excel').trigger();
                } else if (type === 'pdf') {
                    table.button('.buttons-pdf').trigger();
                } else if (type === 'print') {
                    table.button('.buttons-print').trigger();
                }
            }

            function viewOutlet(id) {
                // Show modal with outlets details
                var modal = new bootstrap.Modal(document.getElementById('viewModal'));

                // You can make an AJAX call here to get detailed info
                document.getElementById('modalContent').innerHTML = `
                <div class="text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Memuat detail outlets...</p>
                </div>
            `;

                modal.show();

                // Simulate loading (replace with actual AJAX call)
                setTimeout(() => {
                    document.getElementById('modalContent').innerHTML = `
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold">Informasi Outlets</h6>
                            <p><strong>ID:</strong> ${id}</p>
                            <p><strong>Status:</strong> <span class="status-active">Aktif</span></p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold">Statistik</h6>
                            <p><strong>Total Transaksi:</strong> 150</p>
                            <p><strong>Pendapatan:</strong> Rp 25,000,000</p>
                        </div>
                    </div>
                `;
                }, 1000);
            }

            function confirmDelete(outletName) {
                return confirm(`Apakah Anda yakin ingin menghapus outlets "${outletName}"?\n\nPeringatan: Aksi ini tidak dapat dibatalkan!`);
            }
        </script>
    </body>

</html>
