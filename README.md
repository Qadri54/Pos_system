# 🏪 POSINAJA - Point of Sale System

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-red?style=for-the-badge&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue?style=for-the-badge&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/Bootstrap-5.3-purple?style=for-the-badge&logo=bootstrap" alt="Bootstrap">
  <img src="https://img.shields.io/badge/Livewire-3.x-green?style=for-the-badge&logo=livewire" alt="Livewire">
  <img src="https://img.shields.io/badge/SQLite-003B57?style=for-the-badge&logo=sqlite" alt="SQLite">
  <img src="https://img.shields.io/badge/DataTables-1.13-orange?style=for-the-badge" alt="DataTables">
</p>

**POSINAJA** adalah sistem Point of Sale (POS) modern berbasis web yang dibangun dengan Laravel Framework. Aplikasi ini dirancang untuk mengelola penjualan, inventori, dan operasi bisnis retail dengan antarmuka yang responsif dan user-friendly menggunakan Bootstrap-only design.

## 🚀 Fitur Utama

### 📊 Dashboard Interaktif

-   🏠 **Dashboard Modern** - Statistik real-time dengan card layout responsif
-   📈 **Analytics** - Grafik penjualan dan monitoring performa bisnis
-   🔔 **Notifikasi Real-time** - Alert untuk aktivitas penting sistem
-   📱 **Fully Responsive** - Optimized untuk desktop, tablet, dan mobile

### 🛍️ Manajemen Produk Lengkap

-   ✅ **CRUD Produk** - Create, Read, Update, Delete dengan UI Bootstrap modern
-   🏷️ **Kategori Produk** - Sistem kategorisasi yang terorganisir
-   📊 **DataTables Integration** - Search, filter, dan pagination advanced
-   🏪 **Multi-Outlet** - Distribusi produk across multiple outlets
-   💰 **Price Management** - Pengaturan harga per outlet

### 🏢 Sistem Multi-Outlet

-   🏬 **Outlet Management** - CRUD outlet dengan location tracking
-   👥 **Staff Assignment** - User assignment per outlet
-   📊 **Outlet Analytics** - Performance tracking per cabang
-   🔄 **Cross-Outlet Operations** - Koordinasi antar outlet

### 👥 Manajemen User & Karyawan

-   🔐 **Role-Based Access** - Admin, Manager, Kasir, Kitchen Staff
-   👤 **User Management** - CRUD karyawan dengan outlet assignment
-   🔒 **Authentication** - Laravel Breeze integration
-   📋 **Activity Tracking** - Monitor aktivitas user system

### 📝 Sistem Orders & POS

-   🛒 **POS Interface** - Antarmuka penjualan yang intuitif
-   ⚡ **Livewire Components** - Cart dinamis, real-time updates
-   📊 **Order Tracking** - Status: Ongoing, Completed, Cancelled
-   💳 **Payment Methods** - Multiple payment options
-   🧾 **Receipt Management** - Print dan digital receipts

### 📈 Reporting & History

-   📊 **Transaction History** - Complete audit trail
-   📈 **Sales Reports** - Detail analytics dan insights
-   💾 **Export Functions** - PDF dan Excel reports
-   🕐 **Activity Logs** - System activity monitoring

## 🛠️ Teknologi yang Digunakan

### Backend Framework

-   **Laravel 11.x** - Modern PHP framework dengan Eloquent ORM
-   **PHP 8.2+** - Latest PHP version dengan performance improvements
-   **SQLite Database** - Lightweight database untuk development
-   **Laravel Breeze** - Simple authentication scaffolding

### Frontend & UI Framework

-   **Bootstrap 5.3** - CSS framework untuk responsive design
-   **Bootstrap Icons** - Comprehensive icon library
-   **Livewire 3.x** - Dynamic interfaces tanpa kompleksitas JavaScript
-   **DataTables CDN** - Advanced table features dengan Indonesian localization
-   **Vite** - Modern asset bundling dan hot reload

### Development Tools

-   **Composer** - PHP dependency management
-   **NPM** - Node.js package management
-   **Artisan Commands** - Custom CLI tools untuk setup
-   **Laravel Debugbar** - Development debugging tools
-   **Laravel Pint** - PHP code style fixer

### Design Philosophy

-   **Bootstrap-Only Design** - No custom CSS dependencies
-   **Mobile-First** - Responsive design approach
-   **Component-Based** - Reusable Blade components
-   **Card Layout** - Modern UI dengan card-based design

## 📋 Persyaratan Sistem

-   **PHP** >= 8.2 dengan extensions: PDO, Mbstring, OpenSSL, Tokenizer, XML, Ctype, JSON
-   **Composer** - PHP dependency manager
-   **Node.js & NPM** - Untuk asset compilation
-   **SQLite** - Default database (MySQL/PostgreSQL optional)
-   **Web Server** - Apache/Nginx untuk production

## ⚡ Quick Start

### 1. Clone Repository

```bash
git clone <repository-url>
cd POS_SYSTEM
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup & Demo Data

```bash
# Run migrations to create database structure
php artisan migrate

# Setup demo data dengan akun admin & kasir + sample products
php artisan pos:setup-demo

# ATAU setup lengkap dengan sample transactions dan additional users
php artisan pos:setup-demo --full
```

#### 🎯 Demo Accounts (Always Created)

| Role  | Email           | Password | Access Level              |
| ----- | --------------- | -------- | ------------------------- |
| Admin | admin@admin.com | password | Full access - all outlets |
| Kasir | kasir@kasir.com | password | Limited - Jakarta outlet  |

#### 👥 Additional Accounts (dengan flag `--full`)

| Role             | Email                         | Password | Outlet Assignment |
| ---------------- | ----------------------------- | -------- | ----------------- |
| Owner            | owner@posinaja.com            | password | All outlets       |
| Manager Jakarta  | manager.jakarta@posinaja.com  | password | Jakarta only      |
| Manager Bandung  | manager.bandung@posinaja.com  | password | Bandung only      |
| Manager Surabaya | manager.surabaya@posinaja.com | password | Surabaya only     |
| Kasir 2 Jakarta  | kasir2.jakarta@posinaja.com   | password | Jakarta only      |
| Kasir Bandung    | kasir.bandung@posinaja.com    | password | Bandung only      |
| Kasir Surabaya   | kasir.surabaya@posinaja.com   | password | Surabaya only     |
| Kitchen Staff    | kitchen.jakarta@posinaja.com  | password | Jakarta only      |

#### 🏪 Sample Outlets & Products

**Demo data includes:**

-   **3 Outlets**: Jakarta (13 products), Bandung (7 products), Surabaya (7 products)
-   **4 Categories**: Makanan Utama, Minuman, Dessert, Snack + regional variations
-   **27 Total Products**: Real Indonesian food items dengan pricing realistic
-   **20 Sample Transactions**: (only with `--full` flag) - randomized orders dengan mix status

> 💡 **Tip**: Use `--full` flag untuk complete demo experience termasuk sample transactions dan additional staff accounts.

### 5. Build Assets & Start Server

```bash
# Development mode dengan hot reload
npm run dev

# Production build (untuk deployment)
npm run build

# Start Laravel development server
php artisan serve
```

🌟 **Aplikasi akan dapat diakses di:** `http://localhost:8000`

## 🎨 UI Features & Design

### Modern Bootstrap Design

-   **Responsive Navbar** - Collapsible navigation dengan dropdown menus
-   **Card-based Layout** - Clean, modern card design throughout
-   **DataTables Integration** - Advanced search, sort, pagination
-   **Color-coded Status** - Visual indicators untuk order status
-   **Mobile-first** - Optimized untuk all device sizes

### Navigation Structure

```
Dashboard
├── Orders Management
│   ├── Semua Orders
│   ├── Orders Berlangsung
│   ├── Orders Selesai
│   └── Orders Dibatalkan
├── Product Management
│   ├── Semua Produk
│   └── Tambah Produk
├── Category Management
│   ├── Semua Kategori
│   └── Tambah Kategori
└── Management
    ├── Orders Management
    ├── Outlet & Users
    ├── Manajemen Outlet
    ├── Manajemen User
    └── Riwayat Aktivitas
```

## 🗂️ Struktur Project

```
POS_SYSTEM/
├── app/
│   ├── Console/Commands/        # Custom Artisan Commands
│   │   └── SetupDemoData.php   # pos:setup-demo command
│   ├── Http/Controllers/       # Application Controllers
│   ├── Livewire/              # Dynamic UI Components
│   │   ├── Cart.php           # Shopping cart functionality
│   │   ├── CartSummary.php    # Order summary
│   │   ├── OnGoingOrder.php   # Live order tracking
│   │   ├── CompletedOrder.php # Completed orders
│   │   └── CancelledOrder.php # Cancelled orders
│   ├── Models/                # Eloquent Models
│   │   ├── Category.php       # Product categories
│   │   ├── Product.php        # Products
│   │   ├── Order.php          # Orders
│   │   ├── Outlet.php         # Store outlets
│   │   ├── History.php        # Transaction history
│   │   └── User.php           # User accounts
│   └── Services/              # Business Logic
│       └── Outlet_service.php # Outlet-related operations
├── database/
│   ├── migrations/            # Database structure
│   ├── seeders/              # Sample data generators
│   │   ├── AdminKasirSeeder.php
│   │   ├── AdditionalUsersSeeder.php
│   │   └── SampleTransactionSeeder.php
│   └── database.sqlite       # SQLite database file
├── resources/
│   └── views/                # Blade Templates
│       ├── components/custom_component/
│       │   └── management_layout.blade.php  # Main layout
│       ├── categories/       # Category management views
│       ├── products/         # Product management views
│       ├── orders/          # Order management views
│       ├── karyawan/        # Employee management views
│       ├── outlet/          # Outlet management views
│       └── auth/            # Authentication views
├── routes/
│   ├── web.php              # Web routes
│   └── auth.php             # Authentication routes
└── public/                  # Static assets
```

## 🎯 Panduan Penggunaan

### 🔐 Login & Authentication

1. **Akses aplikasi** di `http://localhost:8000`
2. **Login** menggunakan salah satu demo account:
    - **Admin**: `admin@admin.com` / `password` (Full access)
    - **Kasir**: `kasir@kasir.com` / `password` (Limited access)
3. **Dashboard** akan menampilkan overview dan quick actions

### 🛍️ Manajemen Produk

1. **Navigate** ke **Product** > **Semua Produk**
2. **Tambah Produk Baru**:
    - Klik **Tambah Produk**
    - Isi form: Nama, Harga, Kategori, Outlet
    - **Submit** untuk menyimpan
3. **Edit/Delete**: Gunakan action buttons di table
4. **Search & Filter**: Gunakan DataTables search box

### 🏷️ Manajemen Kategori

1. **Navigate** ke **Category** > **Semua Kategori**
2. **Tambah Kategori**: Form sederhana dengan nama dan deskripsi
3. **Manage**: Edit atau delete kategori existing
4. **View**: DataTables untuk easy management

### 🏢 Manajemen Outlet

1. **Navigate** ke **Management** > **Manajemen Outlet**
2. **CRUD Operations**: Create, view, edit, delete outlets
3. **Location Tracking**: Address dan contact information
4. **User Assignment**: Assign staff ke specific outlets

### 👥 Manajemen User/Karyawan

1. **Navigate** ke **Management** > **Manajemen User**
2. **Add Staff**: Create new user accounts
3. **Role Assignment**: Assign roles (Admin, Kasir, Manager, etc.)
4. **Outlet Assignment**: Link users to specific outlets
5. **Password Management**: Reset passwords for users

### 📊 Order Processing & POS

1. **Navigate** ke **Orders** untuk melihat semua orders
2. **Order Status Tracking**:
    - **Ongoing**: Orders yang sedang diproses
    - **Completed**: Orders yang sudah selesai
    - **Cancelled**: Orders yang dibatalkan
3. **Livewire Integration**: Real-time updates pada cart dan summary
4. **Order Management**: Update status, view details

### 💡 Tips & Best Practices

-   **Mobile Access**: UI fully responsive, gunakan di tablet/smartphone
-   **DataTables**: Gunakan search untuk quick find items
-   **Batch Operations**: Select multiple items untuk bulk actions
-   **Real-time Updates**: Livewire components update otomatis
-   **Role-based Access**: Setiap user hanya melihat data yang relevan

## 🔧 Konfigurasi

### Database Configuration

Edit file `.env` untuk konfigurasi database:

```env
# SQLite (Default - Recommended untuk development)
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite

# MySQL (Optional untuk production)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=posinaja_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Environment Variables

Key environment variables dalam `.env`:

```env
APP_NAME=POSINAJA
APP_ENV=local
APP_KEY=base64:generated-key
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database
DB_CONNECTION=sqlite

# Breeze Configuration
BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

### Asset Compilation

```bash
# Development dengan hot reload
npm run dev

# Production build
npm run build

# Watch mode untuk auto-compilation
npm run dev -- --watch
```

## 🎨 Customization & Development

### UI Customization

**Bootstrap-Only Approach:**

-   **Tidak ada custom CSS** - Semua styling menggunakan Bootstrap classes
-   **Easy theming** - Modify Bootstrap variables untuk brand colors
-   **Component consistency** - Reusable Blade components
-   **Responsive design** - Mobile-first approach

### Layout Customization

Main layout file: `resources/views/components/custom_component/management_layout.blade.php`

```blade
{{-- Modify navbar, colors, atau layout structure --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    {{-- Customize brand, colors, layout --}}
</nav>
```

### Adding New Features

1. **Models**: Create new Eloquent models
2. **Controllers**: Add business logic
3. **Routes**: Define new endpoints di `routes/web.php`
4. **Views**: Create Blade templates dengan Bootstrap styling
5. **Livewire**: Add dynamic components untuk interactivity

### Database Extensions

```bash
# Create new migration
php artisan make:migration create_new_table

# Create new model with migration
php artisan make:model NewModel -m

# Run migrations
php artisan migrate
```

## 🔐 Security Features

-   ✅ Authentication & Authorization
-   ✅ CSRF Protection
-   ✅ SQL Injection Prevention
-   ✅ XSS Protection
-   ✅ Secure Password Hashing
-   ✅ Role-based Access Control

## 📱 Responsive Design

Aplikasi fully responsive dan dapat diakses melalui:

-   🖥️ Desktop computers
-   💻 Laptops
-   📱 Tablets
-   📱 Mobile phones

## 🚀 Production Deployment

### Server Requirements

-   **PHP 8.2+** dengan extensions: PDO, Mbstring, OpenSSL, Tokenizer, XML, Ctype, JSON, BCMath
-   **Composer** installed globally
-   **Web server** (Apache/Nginx) dengan rewrite rules
-   **Database** (MySQL/PostgreSQL untuk production, SQLite untuk demo)
-   **Node.js & NPM** untuk asset compilation

### Deployment Steps

```bash
# 1. Upload files ke server
git clone <repository-url> /path/to/application

# 2. Install PHP dependencies
cd /path/to/application
composer install --optimize-autoloader --no-dev

# 3. Environment setup
cp .env.example .env
nano .env  # Edit configuration

# 4. Generate application key
php artisan key:generate

# 5. Database setup
php artisan migrate --force
php artisan pos:setup-demo --full  # Optional: demo data

# 6. Build production assets
npm ci
npm run build

# 7. Set proper permissions
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# 8. Configure web server virtual host
```

### Web Server Configuration

**Apache (.htaccess)**:

```apache
<VirtualHost *:80>
    ServerName your-domain.com
    DocumentRoot /path/to/application/public

    <Directory /path/to/application/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

**Nginx**:

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/application/public;

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### Performance Optimization

```bash
# Cache optimization
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Clear caches when needed
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```


## 🔗 Links & Resources

-   **Live Demo**: [Demo Link (if available)]
-   **Documentation**: [Additional docs (if any)]

---
