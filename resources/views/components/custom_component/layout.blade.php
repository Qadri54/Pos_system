<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @livewireStyles

        <title>POSINAJA Dashboard - Sistem POS Modern</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

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
                background-color: var(--light-bg);
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .sidebar {
                background: var(--sidebar-bg) !important;
                color: white;
                box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            }

            .sidebar h2 {
                color: white;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            }

            .sidebar .btn {
                background: rgba(255,255,255,0.2);
                border: 1px solid rgba(255,255,255,0.3);
                color: white;
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
            }

            .sidebar .btn:hover {
                background: rgba(255,255,255,0.3);
                transform: translateX(5px);
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                color: white;
            }

            .sidebar .btn.active {
                background: rgba(255,255,255,0.4);
                color: white;
                font-weight: bold;
            }

            .main-content {
                background: white;
                border-radius: 15px;
                box-shadow: 0 8px 32px rgba(0,0,0,0.1);
                margin: 10px;
                padding: 20px;
                min-height: calc(100vh - 20px);
            }

            .navbar-brand {
                font-weight: bold;
                color: var(--primary-color) !important;
            }

            .offcanvas {
                background: var(--sidebar-bg);
                color: white;
            }

            .offcanvas-title {
                color: white;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            }

            .card {
                border: none;
                box-shadow: 0 4px 15px rgba(0,0,0,0.08);
                transition: all 0.3s ease;
            }

            .card:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            }

            .btn-primary-custom {
                background: linear-gradient(45deg, var(--primary-color), #0056b3);
                border: none;
                transition: all 0.3s ease;
            }

            .btn-primary-custom:hover {
                background: linear-gradient(45deg, #0056b3, var(--primary-color));
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
            }

            .status-badge {
                padding: 8px 16px;
                border-radius: 20px;
                font-size: 0.85rem;
                font-weight: 600;
            }

            .status-ongoing {
                background: rgba(255, 193, 7, 0.2);
                color: #856404;
                border: 1px solid rgba(255, 193, 7, 0.3);
            }

            .status-completed {
                background: rgba(40, 167, 69, 0.2);
                color: #155724;
                border: 1px solid rgba(40, 167, 69, 0.3);
            }

            .status-cancelled {
                background: rgba(220, 53, 69, 0.2);
                color: #721c24;
                border: 1px solid rgba(220, 53, 69, 0.3);
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/style.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    </head>

    <body>
        <!-- Mobile Navigation -->
        <nav class="navbar navbar-expand-lg bg-white shadow-sm d-md-none">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="{{ route('orders.index') }}">
                    <i class="bi bi-shop text-primary me-2"></i>
                    POSINAJA
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="bi bi-list fs-4 text-primary"></i>
                </button>
            </div>
        </nav>

        <!-- Layout Container -->
        <div class="container-fluid p-0">
            <div class="row g-0">
                <!-- Mobile Sidebar: Offcanvas -->
                <div class="offcanvas offcanvas-start d-sm-block d-md-none" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel" style="width: 280px;">
                    <div class="offcanvas-header border-bottom border-light">
                        <h2 class="offcanvas-title fw-bold mx-auto" id="offcanvasExampleLabel">
                            <i class="bi bi-shop me-2"></i>
                            POSINAJA
                        </h2>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-3">
                        <nav class="nav flex-column gap-3">
                            <a href="{{ route('orders.index') }}"
                                class="btn btn-lg text-start {{ request()->routeIs('orders.index') ? 'active' : '' }}">
                                <i class="bi bi-plus-circle me-3"></i>
                                Buat Pesanan Baru
                            </a>
                            <a href="{{ route('orders.ongoing') }}"
                                class="btn btn-lg text-start {{ request()->routeIs('orders.ongoing') ? 'active' : '' }}">
                                <i class="bi bi-clock me-3"></i>
                                Pesanan Berlangsung
                            </a>
                            <a href="{{ route('orders.completed') }}"
                                class="btn btn-lg text-start {{ request()->routeIs('orders.completed') ? 'active' : '' }}">
                                <i class="bi bi-check-circle me-3"></i>
                                Pesanan Selesai
                            </a>
                            <a href="{{ route('orders.canceled') }}"
                                class="btn btn-lg text-start {{ request()->routeIs('orders.canceled') ? 'active' : '' }}">
                                <i class="bi bi-x-circle me-3"></i>
                                Pesanan Dibatalkan
                            </a>
                        </nav>

                        <!-- User Info -->
                        <div class="mt-4 pt-4 border-top border-light">
                            <div class="d-flex align-items-center text-white">
                                <div class="bg-white bg-opacity-20 rounded-circle p-2 me-3">
                                    <i class="bi bi-person text-white"></i>
                                </div>
                                <div>
                                    <small class="opacity-75">Logged in as:</small><br>
                                    <strong>{{ Auth::user()->name ?? 'User' }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Desktop Sidebar -->
                <div class="d-none d-md-block col-md-2 col-lg-2 sidebar p-4" style="min-height: 100vh;">
                    <div class="text-center mb-5">
                        <h2 class="fw-bold mb-1">
                            <i class="bi bi-shop me-2"></i>
                            POSINAJA
                        </h2>
                        <small class="opacity-75">Sistem POS Modern</small>
                    </div>

                    <nav class="nav flex-column gap-3">
                        <a href="{{ route('orders.index') }}"
                            class="btn btn-lg text-start {{ request()->routeIs('orders.index') ? 'active' : '' }}">
                            <i class="bi bi-plus-circle me-3"></i>
                            Buat Pesanan Baru
                        </a>
                        <a href="{{ route('orders.ongoing') }}"
                            class="btn btn-lg text-start {{ request()->routeIs('orders.ongoing') ? 'active' : '' }}">
                            <i class="bi bi-clock me-3"></i>
                            Pesanan Berlangsung
                        </a>
                        <a href="{{ route('orders.completed') }}"
                            class="btn btn-lg text-start {{ request()->routeIs('orders.completed') ? 'active' : '' }}">
                            <i class="bi bi-check-circle me-3"></i>
                            Pesanan Selesai
                        </a>
                        <a href="{{ route('orders.canceled') }}"
                            class="btn btn-lg text-start {{ request()->routeIs('orders.canceled') ? 'active' : '' }}">
                            <i class="bi bi-x-circle me-3"></i>
                            Pesanan Dibatalkan
                        </a>
                    </nav>

                    <!-- User Info -->
                    <div class="mt-5 pt-4 border-top border-light">
                        <div class="d-flex align-items-center text-white">
                            <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                                <i class="bi bi-person text-white fs-5"></i>
                            </div>
                            <div>
                                <small class="opacity-75">Logged in as:</small><br>
                                <strong>{{ Auth::user()->name ?? 'User' }}</strong><br>
                                <small class="opacity-75">{{ Auth::user()->role ?? 'Staff' }}</small>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mt-4">
                        <small class="text-white-50 text-uppercase fw-bold">Quick Actions</small>
                        <div class="mt-2">
                            <a href="/" class="btn btn-sm btn-outline-light w-100 mb-2">
                                <i class="bi bi-house me-2"></i>
                                Beranda
                            </a>
                            <a href="/dashboard" class="btn btn-sm btn-outline-light w-100">
                                <i class="bi bi-speedometer2 me-2"></i>
                                Dashboard
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                {{ $slot }}
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @livewireScripts
    </body>

</html>
