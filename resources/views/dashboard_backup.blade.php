<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard - POSINAJA System</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- AOS Animation -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">

        <!-- Custom Styles -->
        <!-- Custom Styles -->
        <style>
            :root {
                --primary-color: #3b82f6;
                --primary-dark: #2563eb;
                --secondary-color: #10b981;
                --success-color: #059669;
                --warning-color: #f59e0b;
                --danger-color: #ef4444;
                --info-color: #06b6d4;
                --dark-color: #1f2937;
                --light-bg: #f8fafc;
                --white: #ffffff;
                --gray-50: #f9fafb;
                --gray-100: #f3f4f6;
                --gray-200: #e5e7eb;
                --gray-300: #d1d5db;
                --gray-400: #9ca3af;
                --gray-500: #6b7280;
                --gray-600: #4b5563;
                --gray-700: #374151;
                --gray-800: #1f2937;
                --gray-900: #111827;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: var(--light-bg);
                color: var(--gray-800);
                line-height: 1.6;
            }

            /* Navigation Styles */
            .navbar {
                background: rgba(255, 255, 255, 0.95) !important;
                backdrop-filter: blur(20px);
                border-bottom: 1px solid var(--gray-200);
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
                padding: 1rem 0;
                z-index: 1050;
            }

            /* Reset any conflicting styles */
            .navbar * {
                margin: 0 !important;
                padding: 0 !important;
            }

            .navbar .container {
                padding: 0 15px !important;
            }

            .navbar-nav,
            .navbar-nav .nav-item,
            .navbar-nav .nav-link {
                margin: 0 !important;
            }

            .navbar-nav .nav-link {
                padding: 0.75rem 1rem !important;
            }

            .navbar-brand {
                font-weight: 700;
                font-size: 1.5rem;
                color: var(--primary-color) !important;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .navbar-brand i {
                font-size: 1.75rem;
            }

            /* Navigation Links */
            .nav-link {
                font-weight: 500 !important;
                color: var(--gray-600) !important;
                padding: 0.75rem 1rem !important;
                border-radius: 0.5rem;
                transition: all 0.2s ease;
                margin: 0 0.25rem;
                display: inline-flex !important;
                align-items: center;
                text-decoration: none !important;
                min-height: 40px;
                background: rgba(255, 255, 255, 0.1) !important; /* Debug background */
            }

            .nav-link:hover {
                color: var(--primary-color) !important;
                background-color: var(--gray-50) !important;
            }

            .nav-link.active {
                color: var(--primary-color) !important;
                background-color: rgba(59, 130, 246, 0.1) !important;
                font-weight: 600 !important;
            }

            .nav-link i {
                margin-right: 0.5rem;
            }

            /* Force navbar visibility */
            .navbar-nav {
                display: flex !important;
                flex-direction: row !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            .navbar-nav .nav-item {
                display: block !important;
                list-style: none !important;
            }

            .navbar-collapse {
                display: flex !important;
                justify-content: space-between !important;
            }

            /* Fix collapse behavior - show by default on desktop */
            @media (min-width: 992px) {
                .navbar-collapse {
                    display: flex !important;
                    flex-basis: auto !important;
                }

                .navbar-collapse.collapse {
                    display: flex !important;
                }

                .navbar-collapse.collapse:not(.show) {
                    display: flex !important;
                }

                .navbar-nav {
                    display: flex !important;
                    flex-direction: row !important;
                }
            }

            /* Mobile responsive */
            @media (max-width: 991.98px) {
                .navbar-collapse {
                    background: white;
                    border-radius: 0.75rem;
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
                    margin-top: 1rem;
                    padding: 1rem;
                }

                .navbar-collapse:not(.show) {
                    display: none !important;
                }

                .navbar-collapse.show {
                    display: block !important;
                }

                .nav-link {
                    margin: 0.25rem 0;
                    padding: 0.75rem 1rem !important;
                }

                .dropdown-menu {
                    border: 1px solid var(--gray-200);
                    margin-top: 0.25rem;
                }
            }

            /* Override Bootstrap's default collapse behavior */
            .navbar-expand-lg .navbar-collapse {
                display: flex !important;
                flex-basis: auto !important;
            }

            .navbar-expand-lg .navbar-nav {
                flex-direction: row !important;
            }

            /* Fix any remaining collapse issues */
            .collapse:not(.show) {
                display: block !important;
            }

            @media (min-width: 992px) {
                .collapse:not(.show) {
                    display: flex !important;
                }
            }

            /* Navbar Toggle for Mobile */
            .navbar-toggler {
                border: none !important;
                padding: 0.25rem 0.5rem;
                background-color: var(--gray-100);
                border-radius: 0.5rem;
            }

            .navbar-toggler:focus {
                box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
            }

            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2875, 85, 99, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }

            /* Ensure navbar items are visible */
            .navbar-nav {
                display: flex !important;
            }

            .navbar-nav .nav-item {
                display: block !important;
            }

            /* Dropdown Styles */
            .dropdown-menu {
                border: none;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                border-radius: 0.75rem;
                padding: 0.5rem;
                margin-top: 0.5rem;
            }

            .dropdown-item {
                border-radius: 0.5rem;
                padding: 0.75rem 1rem;
                transition: all 0.2s ease;
                font-weight: 500;
            }

            .dropdown-item:hover {
                background-color: var(--primary-color);
                color: white;
            }

            /* Mobile responsive */
            @media (max-width: 991.98px) {
                .navbar-collapse {
                    background: white;
                    border-radius: 0.75rem;
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
                    margin-top: 1rem;
                    padding: 1rem;
                }

                .nav-link {
                    margin: 0.25rem 0;
                    padding: 0.75rem 1rem !important;
                }

                .dropdown-menu {
                    border: 1px solid var(--gray-200);
                    margin-top: 0.25rem;
                }
            }
                color: var(--primary-color) !important;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .navbar-brand i {
                font-size: 1.75rem;
            }

            .nav-link {
                font-weight: 500;
                color: var(--gray-600) !important;
                padding: 0.75rem 1rem !important;
                border-radius: 0.5rem;
                transition: all 0.2s ease;
                margin: 0 0.25rem;
                display: inline-flex !important;
                align-items: center;
            }

            .nav-link:hover {
                color: var(--primary-color) !important;
                background-color: var(--gray-50);
            }

            .nav-link.active {
                color: var(--primary-color) !important;
                background-color: rgba(59, 130, 246, 0.1);
                font-weight: 600;
            }

            /* Navbar Toggle for Mobile */
            .navbar-toggler {
                border: none !important;
                padding: 0.25rem 0.5rem;
                background-color: var(--gray-100);
                border-radius: 0.5rem;
            }

            .navbar-toggler:focus {
                box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
            }

            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2875, 85, 99, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            }

            /* Ensure navbar items are visible */
            .navbar-nav {
                display: flex !important;
            }

            .navbar-nav .nav-item {
                display: block !important;
            }

            /* Mobile responsive */
            @media (max-width: 991.98px) {
                .navbar-collapse {
                    background: white;
                    border-radius: 0.75rem;
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
                    margin-top: 1rem;
                    padding: 1rem;
                }

                .nav-link {
                    margin: 0.25rem 0;
                    padding: 0.75rem 1rem !important;
                }

                .dropdown-menu {
                    border: 1px solid var(--gray-200);
                    margin-top: 0.25rem;
                }
            }

            .dropdown-menu {
                border: none;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                border-radius: 0.75rem;
                padding: 0.5rem;
                margin-top: 0.5rem;
            }

            .dropdown-item {
                border-radius: 0.5rem;
                padding: 0.75rem 1rem;
                transition: all 0.2s ease;
                font-weight: 500;
            }

            .dropdown-item:hover {
                background-color: var(--primary-color);
                color: white;
            }

            /* Header Styles */
            .dashboard-header {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
                color: white;
                padding: 4rem 0 3rem;
                margin-top: 76px;
                position: relative;
                overflow: hidden;
            }

            .dashboard-header::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            }

            /* Stats Cards */
            .stats-card {
                background: white;
                border-radius: 1rem;
                padding: 2rem;
                border: 1px solid var(--gray-200);
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .stats-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            }

            .stats-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            }

            .stats-icon {
                width: 4rem;
                height: 4rem;
                border-radius: 1rem;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }

            .stats-number {
                font-size: 2.5rem;
                font-weight: 700;
                line-height: 1;
                margin-bottom: 0.5rem;
            }

            /* Quick Actions */
            .quick-actions {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 1.5rem;
                margin: 3rem 0;
            }

            .action-card {
                background: white;
                border-radius: 1rem;
                padding: 2rem;
                text-decoration: none;
                color: inherit;
                transition: all 0.3s ease;
                border: 1px solid var(--gray-200);
                position: relative;
                overflow: hidden;
            }

            .action-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                text-decoration: none;
                color: inherit;
            }

            .action-card::before {
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                bottom: 0;
                width: 4px;
                transition: all 0.3s ease;
            }

            .action-card.orders::before {
                background: var(--primary-color);
            }

            .action-card.products::before {
                background: var(--secondary-color);
            }

            .action-card.outlets::before {
                background: var(--warning-color);
            }

            .action-card.reports::before {
                background: var(--info-color);
            }

            /* Chart Cards */
            .chart-card {
                background: white;
                border-radius: 1rem;
                padding: 2rem;
                border: 1px solid var(--gray-200);
                margin-bottom: 2rem;
            }

            /* Activity Feed */
            .activity-item {
                background: white;
                border-radius: 0.75rem;
                padding: 1.5rem;
                margin-bottom: 1rem;
                border: 1px solid var(--gray-200);
                transition: all 0.2s ease;
            }

            .activity-item:hover {
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            }

            /* Progress Bars */
            .progress-custom {
                height: 0.5rem;
                border-radius: 0.5rem;
                background-color: var(--gray-200);
            }

            .progress-bar-custom {
                border-radius: 0.5rem;
                background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            }

            /* Notification Badge */
            .notification-badge {
                position: absolute;
                top: -8px;
                right: -8px;
                background: var(--danger-color);
                color: white;
                border-radius: 50%;
                width: 20px;
                height: 20px;
                font-size: 0.75rem;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 600;
            }

            /* Custom Scrollbar */
            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
            }

            .custom-scrollbar::-webkit-scrollbar-track {
                background: var(--gray-100);
                border-radius: 3px;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: var(--gray-300);
                border-radius: 3px;
            }

            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: var(--gray-400);
            }

            /* Responsive */
            @media (max-width: 768px) {
                .dashboard-header {
                    padding: 3rem 0 2rem;
                }

                .stats-number {
                    font-size: 2rem;
                }

                .quick-actions {
                    grid-template-columns: 1fr;
                }
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <!-- Brand -->
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <i class="bi bi-shop-window"></i>
                    POSINAJA
                </a>

                <!-- Mobile toggle -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation items -->
                <div class="navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}">
                                <i class="bi bi-speedometer2 me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('orders.*') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-receipt me-1"></i>Orders
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('orders.create') }}">
                                        <i class="bi bi-plus-circle me-2"></i>Buat Order Baru
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('orders.index') }}">
                                        <i class="bi bi-list-ul me-2"></i>Semua Orders
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('orders.ongoing') }}">
                                        <i class="bi bi-clock me-2"></i>Orders Berlangsung
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('orders.completed') }}">
                                        <i class="bi bi-check-circle me-2"></i>Orders Selesai
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('orders.canceled') }}">
                                        <i class="bi bi-x-circle me-2"></i>Orders Dibatalkan
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('product.*') || request()->routeIs('category.*') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-box-seam me-1"></i>Produk
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('product.index') }}">
                                        <i class="bi bi-grid me-2"></i>Kelola Produk
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('product.create') }}">
                                        <i class="bi bi-plus-circle me-2"></i>Tambah Produk
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('category.index') }}">
                                        <i class="bi bi-tags me-2"></i>Kelola Kategori
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('category.create') }}">
                                        <i class="bi bi-plus-square me-2"></i>Tambah Kategori
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('outlet.*') ? 'active' : '' }}"
                                href="{{ route('outlet.index') }}">
                                <i class="bi bi-building me-1"></i>Outlet
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('users.*') || request()->routeIs('history.*') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear me-1"></i>Manajemen
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('users.index') }}">
                                        <i class="bi bi-people me-2"></i>Kelola User
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('history.index') }}">
                                        <i class="bi bi-clock-history me-2"></i>Riwayat Transaksi
                                    </a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right side items -->
                    <ul class="navbar-nav">
                        <!-- Notifications -->
                        <li class="nav-item dropdown">
                            <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-bell fs-5"></i>
                                <span class="notification-badge">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" style="width: 320px;">
                                <li class="dropdown-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">Notifikasi</h6>
                                        <span class="badge bg-primary">3 Baru</span>
                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item py-3" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="bg-info bg-opacity-10 rounded-circle p-2">
                                                    <i class="bi bi-info-circle text-info"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Order Baru Masuk</h6>
                                                <p class="mb-1 text-muted small">Order #123 dari outlet Cabang A</p>
                                                <small class="text-muted">2 menit yang lalu</small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li><a class="dropdown-item py-3" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="bg-warning bg-opacity-10 rounded-circle p-2">
                                                    <i class="bi bi-exclamation-triangle text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Stok Menipis</h6>
                                                <p class="mb-1 text-muted small">Produk ABC tinggal 5 unit</p>
                                                <small class="text-muted">1 jam yang lalu</small>
                                            </div>
                                        </div>
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-center py-2" href="#">
                                        <small>Lihat Semua Notifikasi</small>
                                    </a></li>
                            </ul>
                        </li>

                        <!-- User Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                                data-bs-toggle="dropdown">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-2">
                                    <i class="bi bi-person text-primary"></i>
                                </div>
                                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="dropdown-header text-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-flex mb-2">
                                        <i class="bi bi-person text-primary fs-4"></i>
                                    </div>
                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                    <small class="text-muted">{{ Auth::user()->email }}</small>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-person-gear me-2"></i>Profile
                                    </a></li>
                                <li><a class="dropdown-item" href="#">
                                        <i class="bi bi-gear me-2"></i>Pengaturan
                                    </a></li>
                                <li><a class="dropdown-item" href="#">
                                        <i class="bi bi-question-circle me-2"></i>Bantuan
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8" data-aos="fade-right">
                        <h1 class="display-5 fw-bold mb-3">
                            Selamat Datang, {{ Auth::user()->name }}! 👋
                        </h1>
                        <p class="lead mb-0 opacity-90">
                            Kelola bisnis POS Anda dengan mudah dan efisien melalui dashboard yang komprehensif
                        </p>
                    </div>
                    <div class="col-lg-4 text-end" data-aos="fade-left">
                        <div class="opacity-75">
                            <i class="bi bi-calendar3 me-2"></i>
                            {{ now()->format('l, d F Y') }}
                        </div>
                        <div class="mt-2 opacity-75">
                            <i class="bi bi-clock me-2"></i>
                            <span id="current-time"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Statistics Cards -->
            <div class="row g-4 mb-5" data-aos="fade-up">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-card text-center">
                        <div class="stats-icon bg-primary bg-opacity-10 text-primary mx-auto">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <div class="stats-number text-primary">{{ $totalOrders ?? 0 }}</div>
                        <h6 class="text-muted mb-2">Total Orders</h6>
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="badge bg-success bg-opacity-10 text-success">
                                <i class="bi bi-arrow-up me-1"></i>+12%
                            </span>
                            <small class="text-muted ms-2">dari bulan lalu</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stats-card text-center">
                        <div class="stats-icon bg-success bg-opacity-10 text-success mx-auto">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="stats-number text-success">{{ $totalEmployees ?? 0 }}</div>
                        <h6 class="text-muted mb-2">Total Karyawan</h6>
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="badge bg-info bg-opacity-10 text-info">
                                <i class="bi bi-building me-1"></i>{{ $totalOutlets ?? 0 }} outlet
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stats-card text-center">
                        <div class="stats-icon bg-warning bg-opacity-10 text-warning mx-auto">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="stats-number text-warning">{{ number_format($totalRevenue ?? 0) }}</div>
                        <h6 class="text-muted mb-2">Total Pendapatan</h6>
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="badge bg-success bg-opacity-10 text-success">
                                <i class="bi bi-arrow-up me-1"></i>+8%
                            </span>
                            <small class="text-muted ms-2">dari bulan lalu</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="stats-card text-center">
                        <div class="stats-icon bg-info bg-opacity-10 text-info mx-auto">
                            <i class="bi bi-building"></i>
                        </div>
                        <div class="stats-number text-info">{{ $totalOutlets ?? 0 }}</div>
                        <h6 class="text-muted mb-2">Total Outlet</h6>
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-geo-alt me-1"></i>Multi lokasi
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('orders.create') }}" class="action-card orders">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-primary bg-opacity-10 rounded-3 p-3">
                                <i class="bi bi-plus-circle text-primary fs-2"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Buat Order Baru</h5>
                            <p class="text-muted mb-0">Tambah transaksi penjualan baru</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('product.index') }}" class="action-card products">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-success bg-opacity-10 rounded-3 p-3">
                                <i class="bi bi-box-seam text-success fs-2"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Kelola Produk</h5>
                            <p class="text-muted mb-0">Manajemen inventori produk</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('outlet.index') }}" class="action-card outlets">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-warning bg-opacity-10 rounded-3 p-3">
                                <i class="bi bi-building text-warning fs-2"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Kelola Outlet</h5>
                            <p class="text-muted mb-0">Manajemen lokasi bisnis</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('history.index') }}" class="action-card reports">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-info bg-opacity-10 rounded-3 p-3">
                                <i class="bi bi-graph-up text-info fs-2"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">Lihat Laporan</h5>
                            <p class="text-muted mb-0">Analisa bisnis dan laporan</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="row g-4">
                <!-- Popular Products -->
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="300">
                    <div class="chart-card">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0">
                                <i class="bi bi-star text-warning me-2"></i>
                                Produk Terlaris
                            </h5>
                            <span class="badge bg-primary">Top 5</span>
                        </div>

                        @if(isset($popularProducts) && $popularProducts->count() > 0)
                            @foreach($popularProducts as $index => $product)
                                <div class="d-flex align-items-center mb-3 p-3 bg-light rounded-3">
                                    <div class="me-3">
                                        <span class="badge bg-primary rounded-pill fs-6">{{ $index + 1 }}</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div>
                                                <h6 class="mb-1 fw-bold">{{ $product->product_name }}</h6>
                                                <small class="text-muted">{{ $product->total_quantity }} terjual</small>
                                            </div>
                                            <div class="text-end">
                                                <div class="fw-bold text-success">Rp
                                                    {{ number_format($product->product_price) }}</div>
                                            </div>
                                        </div>
                                        <div class="progress progress-custom">
                                            <div class="progress-bar progress-bar-custom"
                                                style="width: {{ ($product->total_quantity / $popularProducts->first()->total_quantity) * 100 }}%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-5">
                                <i class="bi bi-box-seam display-1 text-muted opacity-50"></i>
                                <p class="text-muted mt-3">Belum ada data penjualan produk</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sales Chart -->
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="400">
                    <div class="chart-card">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0">
                                <i class="bi bi-graph-up text-success me-2"></i>
                                Tren Penjualan
                            </h5>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                    7 Hari Terakhir
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">7 Hari Terakhir</a></li>
                                    <li><a class="dropdown-item" href="#">30 Hari Terakhir</a></li>
                                    <li><a class="dropdown-item" href="#">3 Bulan Terakhir</a></li>
                                </ul>
                            </div>
                        </div>
                        <div style="position: relative; height: 300px;">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="row mt-4">
                <div class="col-12" data-aos="fade-up" data-aos-delay="500">
                    <div class="chart-card">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold mb-0">
                                <i class="bi bi-clock-history text-info me-2"></i>
                                Aktivitas Terbaru
                            </h5>
                            <a href="{{ route('orders.index') }}" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                        </div>

                        <div class="custom-scrollbar" style="max-height: 400px; overflow-y: auto;">
                            @if(isset($recentOrders) && $recentOrders->count() > 0)
                                @foreach($recentOrders as $order)
                                    <div class="activity-item">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <div class="bg-success bg-opacity-10 rounded-circle p-2">
                                                    <i class="bi bi-receipt text-success"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h6 class="mb-1 fw-bold">Order #{{ $order->id }} -
                                                            {{ $order->customer_name }}</h6>
                                                        <div class="d-flex align-items-center text-muted small">
                                                            <i class="bi bi-building me-1"></i>
                                                            <span class="me-3">{{ $order->outlet->outlet_name ?? 'N/A' }}</span>
                                                            <i class="bi bi-clock me-1"></i>
                                                            <span>{{ $order->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="text-end">
                                                        <div class="fw-bold text-success mb-1">Rp
                                                            {{ number_format($order->total_price) }}</div>
                                                        <span
                                                            class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'primary') }}">
                                                            {{ ucfirst($order->status) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-5">
                                    <i class="bi bi-clock-history display-1 text-muted opacity-50"></i>
                                    <p class="text-muted mt-3">Belum ada aktivitas terbaru</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-5 py-4 bg-white border-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0 text-muted">&copy; 2025 POSINAJA. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <small class="text-muted">
                            Version 1.0.0 | Made with ❤️ for your business
                        </small>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <script>
            // Initialize AOS
            AOS.init({
                duration: 600,
                easing: 'ease-out-cubic',
                once: true,
                offset: 100
            });

            // Update current time
            function updateTime() {
                const now = new Date();
                const timeString = now.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });
                document.getElementById('current-time').textContent = timeString;
            }

            updateTime();
            setInterval(updateTime, 1000);

            // Sales Chart
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($chartLabels ?? ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']) !!},
                    datasets: [{
                        label: 'Penjualan (Rp)',
                        data: {!! json_encode($chartData ?? [0, 0, 0, 0, 0, 0, 0]) !!},
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#3b82f6',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 3,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value) {
                                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                                },
                                color: '#6b7280'
                            },
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#6b7280'
                            },
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            }
                        }
                    },
                    elements: {
                        point: {
                            hoverRadius: 8
                        }
                    }
                }
            });

            // Auto refresh stats every 5 minutes
            setInterval(() => {
                console.log('Stats refreshed at:', new Date().toLocaleTimeString());
            }, 300000);

            // Ensure navbar toggle works
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Bootstrap components manually if needed
                const navbarToggler = document.querySelector('.navbar-toggler');
                const navbarCollapse = document.querySelector('.navbar-collapse');

                if (navbarToggler && navbarCollapse) {
                    navbarToggler.addEventListener('click', function() {
                        const isExpanded = navbarCollapse.classList.contains('show');

                        if (isExpanded) {
                            navbarCollapse.classList.remove('show');
                            this.setAttribute('aria-expanded', 'false');
                        } else {
                            navbarCollapse.classList.add('show');
                            this.setAttribute('aria-expanded', 'true');
                        }
                    });

                    // Close navbar when clicking outside
                    document.addEventListener('click', function(event) {
                        const isClickInsideNav = navbarToggler.contains(event.target) || navbarCollapse.contains(event.target);

                        if (!isClickInsideNav && navbarCollapse.classList.contains('show')) {
                            navbarCollapse.classList.remove('show');
                            navbarToggler.setAttribute('aria-expanded', 'false');
                        }
                    });
                }
            });

            // Smooth scroll for navbar links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add loading state to action cards
            document.querySelectorAll('.action-card').forEach(card => {
                card.addEventListener('click', function () {
                    if (!this.href.includes('#')) {
                        const icon = this.querySelector('i');
                        const originalClass = icon.className;
                        icon.className = 'bi bi-arrow-clockwise spinner-border spinner-border-sm';

                        setTimeout(() => {
                            icon.className = originalClass;
                        }, 1000);
                    }
                });
            });
        </script>
    </body>

</html>
