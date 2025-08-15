<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>POSINAJA Management - Sistem POS Modern</title>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand fw-bold fs-4" href="{{ route('dashboard') }}">
                <i class="bi bi-shop me-2"></i>
                POSINAJA
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-1"></i>
                            Dashboard
                        </a>
                    </li>

                    <!-- Products Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('products.*') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-box-seam me-1"></i>
                            Product
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('products.index') }}">
                                    <i class="bi bi-list-ul me-2"></i>
                                    Semua Produk
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('products.create') }}">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    Tambah Produk
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Categories Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-tags me-1"></i>
                            Category
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('categories.index') }}">
                                    <i class="bi bi-list-ul me-2"></i>
                                    Semua Kategori
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('categories.create') }}">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    Tambah Kategori
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Management Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs(['orders.*', 'outlets.*', 'users.*', 'histories.*']) ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear me-1"></i>
                            Management
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg">
                            <li>
                                <h6 class="dropdown-header text-primary">
                                    <i class="bi bi-receipt me-2"></i>
                                    Orders Management
                                </h6>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('orders.index') }}">
                                    <i class="bi bi-list-ul me-2"></i>
                                    Semua Orders
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('orders.ongoing') }}">
                                    <i class="bi bi-clock me-2"></i>
                                    Orders Berlangsung
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('orders.completed') }}">
                                    <i class="bi bi-check-circle me-2"></i>
                                    Orders Selesai
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('orders.canceled') }}">
                                    <i class="bi bi-x-circle me-2"></i>
                                    Orders Dibatalkan
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <h6 class="dropdown-header text-success">
                                    <i class="bi bi-building me-2"></i>
                                    Outlet & Users
                                </h6>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('outlets.index') }}">
                                    <i class="bi bi-building me-2"></i>
                                    Manajemen Outlet
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('users.index') }}">
                                    <i class="bi bi-people me-2"></i>
                                    Manajemen User
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('histories.index') }}">
                                    <i class="bi bi-clock-history me-2"></i>
                                    Riwayat Aktivitas
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Right Side Menu -->
                <ul class="navbar-nav">
                    <!-- User Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ Auth::user()->name ?? 'User' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="bi bi-person-gear me-2"></i>
                                    Edit Profile
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
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

    <div class="container-fluid mt-5 pt-3">
        {{ $slot }}
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
