<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>POSINAJA Management - Sistem POS Modern</title>

        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- DataTables CSS (if needed) -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

        <!-- Custom styles using Bootstrap utilities only -->
        <style>
            /* Bootstrap Variable Overrides */
            :root {
                --bs-primary: #6366f1;
                --bs-primary-rgb: 99, 102, 241;
                --bs-secondary: #64748b;
                --bs-success: #10b981;
                --bs-warning: #f59e0b;
                --bs-info: #06b6d4;
                --bs-danger: #ef4444;
            }

            /* Modern Navbar */
            .navbar-modern {
                background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a855f7 100%) !important;
                backdrop-filter: blur(10px);
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            }

            /* Card Enhancements */
            .card {
                border: none !important;
                border-radius: 1rem !important;
                box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
                transition: all 0.3s ease !important;
            }

            .card:hover {
                transform: translateY(-2px);
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            }

            /* Button Enhancements */
            .btn {
                border-radius: 0.75rem !important;
                font-weight: 500 !important;
                padding: 0.625rem 1.25rem !important;
                transition: all 0.2s ease !important;
            }

            .btn:hover {
                transform: translateY(-1px);
            }

            /* Content Card */
            .content-card {
                background: white;
                border-radius: 1.5rem;
                box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
                padding: 2rem;
                margin-bottom: 2rem;
            }

            /* Page Breadcrumb */
            .page-breadcrumb {
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
                border-radius: 1rem;
                border: 1px solid #e2e8f0;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }

            /* Dropdown Menu */
            .dropdown-menu {
                border: none !important;
                border-radius: 1rem !important;
                box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.15) !important;
                overflow: hidden;
            }

            /* Table Modern */
            .table {
                border-radius: 1rem;
                overflow: hidden;
            }

            .table thead th {
                background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
                border: none;
                font-weight: 600;
                color: #374151;
                padding: 1rem;
            }

            /* Navbar Link Styles */
            .navbar-nav .nav-link {
                border-radius: 0.5rem;
                margin: 0 0.125rem;
                transition: all 0.2s ease;
                font-weight: 500;
            }

            .navbar-nav .nav-link:hover {
                background: rgba(255, 255, 255, 0.1);
                transform: translateY(-1px);
            }

            .navbar-nav .nav-link.active {
                background: rgba(255, 255, 255, 0.15);
                font-weight: 600;
            }

            /* Navbar Toggle */
            .navbar-toggler {
                border: 2px solid rgba(255, 255, 255, 0.3);
                padding: 0.5rem 0.75rem;
            }

            .navbar-toggler:focus {
                box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
            }

            /* Mobile Responsive */
            @media (max-width: 991.98px) {
                .navbar-collapse {
                    background: linear-gradient(135deg, rgba(99, 102, 241, 0.95) 0%, rgba(139, 92, 246, 0.95) 100%);
                    border-radius: 1rem;
                    margin-top: 1rem;
                    padding: 1.5rem;
                    border: 1px solid rgba(255, 255, 255, 0.2);
                    backdrop-filter: blur(10px);
                }

                .navbar-nav .nav-link {
                    padding: 0.875rem 1rem;
                    margin: 0.25rem 0;
                    color: rgba(255, 255, 255, 0.9);
                }

                .navbar-nav .nav-link:hover,
                .navbar-nav .nav-link.active {
                    background: rgba(255, 255, 255, 0.15);
                    color: white;
                }

                .dropdown-menu {
                    background: rgba(255, 255, 255, 0.98);
                    border: none;
                    border-radius: 0.75rem;
                    margin-top: 0.5rem;
                    margin-left: 1rem;
                    position: static;
                    float: none;
                    box-shadow: 0 0.25rem 1rem rgba(0, 0, 0, 0.1);
                }
            }

            /* Utilities */
            .text-gradient {
                background: linear-gradient(135deg, #6366f1, #8b5cf6);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .bg-gradient-primary {
                background: linear-gradient(135deg, #6366f1, #8b5cf6) !important;
            }

            .shadow-modern {
                box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.15) !important;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/style.css', 'resources/js/app.js'])
    </head>

    <body class="bg-light">
        <!-- Modern Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-modern fixed-top shadow">
            <div class="container-fluid px-4">
                <!-- Brand -->
                <a class="navbar-brand fw-bold fs-3 d-flex align-items-center" href="{{ route('dashboard') }}">
                    <div class="bg-white rounded-circle p-2 me-3 d-flex align-items-center justify-content-center"
                        style="width: 45px; height: 45px;">
                        <i class="bi bi-shop text-primary fs-5"></i>
                    </div>
                    <span class="text-white">POSINAJA</span>
                </a>

                <!-- Mobile Toggle -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link px-3 py-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i>
                                Dashboard
                            </a>
                        </li>

                        <!-- Products Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle px-3 py-2 {{ request()->routeIs('products.*') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-box-seam me-2"></i>
                                Produk
                            </a>
                            <ul class="dropdown-menu mt-2">
                                <li class="px-3 py-2">
                                    <h6 class="dropdown-header text-primary mb-2">
                                        <i class="bi bi-box-seam me-2"></i>
                                        Manajemen Produk
                                    </h6>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2 mb-1" href="{{ route('products.index') }}">
                                        <i class="bi bi-list-ul me-2 text-primary"></i>
                                        Semua Produk
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2" href="{{ route('products.create') }}">
                                        <i class="bi bi-plus-circle me-2 text-success"></i>
                                        Tambah Produk
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Categories Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle px-3 py-2 {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-tags me-2"></i>
                                Kategori
                            </a>
                            <ul class="dropdown-menu mt-2">
                                <li class="px-3 py-2">
                                    <h6 class="dropdown-header text-primary mb-2">
                                        <i class="bi bi-tags me-2"></i>
                                        Manajemen Kategori
                                    </h6>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2 mb-1" href="{{ route('categories.index') }}">
                                        <i class="bi bi-list-ul me-2 text-primary"></i>
                                        Semua Kategori
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2" href="{{ route('categories.create') }}">
                                        <i class="bi bi-plus-circle me-2 text-success"></i>
                                        Tambah Kategori
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Management Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle px-3 py-2 {{ request()->routeIs(['orders.*', 'outlets.*', 'users.*', 'histories.*']) ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear me-2"></i>
                                Manajemen
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg mt-2" style="min-width: 300px;">
                                <!-- Orders Section -->
                                <li class="px-3 py-2">
                                    <h6 class="dropdown-header text-primary mb-2">
                                        <i class="bi bi-receipt me-2"></i>
                                        Manajemen Orders
                                    </h6>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2 mb-1" href="{{ route('orders.index') }}">
                                        <i class="bi bi-list-ul me-2 text-info"></i>
                                        Semua Orders
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2 mb-1" href="{{ route('orders.ongoing') }}">
                                        <i class="bi bi-clock me-2 text-warning"></i>
                                        Orders Berlangsung
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2 mb-1" href="{{ route('orders.completed') }}">
                                        <i class="bi bi-check-circle me-2 text-success"></i>
                                        Orders Selesai
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2 mb-3" href="{{ route('orders.canceled') }}">
                                        <i class="bi bi-x-circle me-2 text-danger"></i>
                                        Orders Dibatalkan
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider mx-2">
                                </li>

                                <!-- System Section -->
                                <li class="px-3 py-2">
                                    <h6 class="dropdown-header text-success mb-2">
                                        <i class="bi bi-building me-2"></i>
                                        Manajemen Sistem
                                    </h6>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2 mb-1" href="{{ route('outlets.index') }}">
                                        <i class="bi bi-building me-2 text-primary"></i>
                                        Manajemen Outlet
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2 mb-1" href="{{ route('users.index') }}">
                                        <i class="bi bi-people me-2 text-secondary"></i>
                                        Manajemen User
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2" href="{{ route('histories.index') }}">
                                        <i class="bi bi-clock-history me-2 text-dark"></i>
                                        Riwayat Aktivitas
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right Side Menu -->
                    <ul class="navbar-nav">
                        <!-- Quick Actions -->
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link px-3 py-2" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-plus-circle-fill fs-5"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end mt-2">
                                <li class="px-3 py-2">
                                    <h6 class="dropdown-header text-primary mb-2">
                                        <i class="bi bi-lightning me-2"></i>
                                        Quick Actions
                                    </h6>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2 mb-1" href="{{ route('products.create') }}">
                                        <i class="bi bi-box-seam me-2 text-primary"></i>
                                        Tambah Produk
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2 mb-1"
                                        href="{{ route('categories.create') }}">
                                        <i class="bi bi-tags me-2 text-success"></i>
                                        Tambah Kategori
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2" href="{{ route('users.create') }}">
                                        <i class="bi bi-person-plus me-2 text-info"></i>
                                        Tambah User
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- User Profile Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center px-3 py-2" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="bg-white rounded-circle me-2 d-flex align-items-center justify-content-center"
                                    style="width: 32px; height: 32px;">
                                    <i class="bi bi-person-fill text-primary"></i>
                                </div>
                                <span class="fw-medium">{{ Auth::user()->name ?? 'User' }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end mt-2">
                                <li class="px-3 py-2">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle me-3 d-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 40px;">
                                            <i class="bi bi-person-fill text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ Auth::user()->name ?? 'User' }}</h6>
                                            <small
                                                class="text-muted">{{ Auth::user()->email ?? 'user@example.com' }}</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider mx-2">
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-3 mx-2 mb-1" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-person-gear me-2 text-primary"></i>
                                        Edit Profile
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider mx-2">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="dropdown-item rounded-3 mx-2 text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i>
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content Area with Improved Layout -->
        <main class="main-content" style="margin-top: 80px;">
            <!-- Breadcrumb Navigation -->
            <div class="container-fluid px-4 py-3">
                <div class="page-breadcrumb p-3 mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}" class="text-decoration-none">
                                            <i class="bi bi-house me-1"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                    @if(request()->routeIs('products.*'))
                                        <li class="breadcrumb-item active">Produk</li>
                                    @elseif(request()->routeIs('categories.*'))
                                        <li class="breadcrumb-item active">Kategori</li>
                                    @elseif(request()->routeIs('orders.*'))
                                        <li class="breadcrumb-item active">Orders</li>
                                    @elseif(request()->routeIs('users.*'))
                                        <li class="breadcrumb-item active">Manajemen User</li>
                                    @elseif(request()->routeIs('outlets.*'))
                                        <li class="breadcrumb-item active">Outlet</li>
                                    @endif
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="me-3">
                                    <i class="bi bi-calendar-week text-primary me-2"></i>
                                    <span class="fw-medium">{{ \Carbon\Carbon::now()->format('d M Y') }}</span>
                                </div>
                                <div class="vr me-3"></div>
                                <div>
                                    <i class="bi bi-clock text-success me-2"></i>
                                    <span class="fw-medium"
                                        id="current-time">{{ \Carbon\Carbon::now()->format('H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Container -->
            <div class="container-fluid px-4 pb-4">
                <div class="content-card">
                    {{ $slot }}
                </div>
            </div>
        </main>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <!-- Bootstrap JavaScript only -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- jQuery (required for DataTables) -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

        <!-- Minimal JavaScript - only essential functions -->
        <script>
            // Update time every minute
            setInterval(function () {
                const timeElement = document.getElementById('current-time');
                if (timeElement) {
                    const now = new Date();
                    timeElement.textContent = now.toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                }
            }, 60000);

            // Initialize Bootstrap tooltips if any exist
            document.addEventListener('DOMContentLoaded', function () {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
        </script>
    </body>

</html>
