# 🏪 POSINAJA - Point of Sale System

Sistem Point of Sale (POS) modern berbasis web yang dibangun dengan Laravel dan Bootstrap.

## 🚀 Fitur Utama

-   **Dashboard** - Statistik dan overview penjualan
-   **Manajemen Produk** - CRUD produk dengan kategori
-   **Manajemen Orders** - Tracking orders dengan status (ongoing, completed, cancelled)
-   **Multi Outlet** - Support untuk multiple cabang
-   **Manajemen User** - Role-based access (Admin, Kasir, Manager)
-   **Responsive Design** - UI Bootstrap yang mobile-friendly

## 🛠️ Teknologi

-   **Laravel 11** - PHP Framework
-   **Bootstrap 5.3** - CSS Framework
-   **Livewire 3** - Dynamic components
-   **DataTables** - Table management
-   **SQLite** - Database (MySQL optional)

## ⚡ Quick Start

### 1. Clone & Install

```bash
git clone <repository-url>
cd POS_SYSTEM
composer install
npm install
```

### 2. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 3. Database & Demo Data

```bash
php artisan migrate
php artisan pos:setup-demo
```

### 4. Run Application

```bash
npm run dev
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

## 🔐 Demo Accounts

| Role  | Email           | Password | Access      |
| ----- | --------------- | -------- | ----------- |
| Admin | admin@admin.com | password | Full access |
| Kasir | kasir@kasir.com | password | Limited     |

## 📱 Screenshots & Features

### Dashboard

-   Cards showing sales statistics
-   Quick action buttons
-   Recent activity feed

### Product Management

-   Add/edit/delete products
-   Category assignment
-   Price management per outlet
-   DataTables with search and filter

### Order Management

-   Real-time order tracking
-   Status updates (ongoing → completed/cancelled)
-   Livewire powered cart system

### User Management

-   Role-based permissions
-   Multi-outlet assignment
-   Employee management

## 🗂️ Project Structure

```
app/
├── Livewire/              # Dynamic components
├── Models/                # Database models
└── Http/Controllers/      # Application logic

resources/views/
├── dashboard.blade.php    # Main dashboard
├── categories/            # Category management
├── products/             # Product management
├── orders/               # Order management
└── components/           # Reusable components

database/
├── migrations/           # Database structure
└── seeders/             # Demo data
```

## 🎯 Usage Guide

### Adding Products

1. Go to **Produk** → **Tambah Produk**
2. Fill form: name, price, category, outlet
3. Submit to save

### Managing Orders

1. Navigate to **Orders** section
2. View by status: Ongoing, Completed, Cancelled
3. Update order status as needed

### User Management

1. Go to **Management** → **Manajemen User**
2. Add new users with appropriate roles
3. Assign to specific outlets

## 🔧 Configuration

### Database (optional MySQL)

Edit `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=posinaja_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Asset Building

```bash
# Development
npm run dev

# Production
npm run build
```

## 🚀 Deployment

### Requirements

-   PHP 8.2+
-   Composer
-   Node.js & NPM
-   Web server (Apache/Nginx)

### Production Steps

```bash
composer install --no-dev
npm run build
php artisan config:cache
php artisan route:cache
```

## 📋 Commands

```bash
# Setup demo data
php artisan pos:setup-demo

# Setup with sample transactions
php artisan pos:setup-demo --full

# Clear caches
php artisan cache:clear
```

---

**POSINAJA** - Modern POS solution for Indonesian businesses.
