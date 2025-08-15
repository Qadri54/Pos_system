# 🎯 POS System Database Seeders

## 📋 Overview

Database seeders telah dibuat untuk setup akun demo dan data sample pada POS System. Tersedia beberapa seeder yang dapat dijalankan sesuai kebutuhan.

## 🚀 Quick Start

### Setup Basic Demo Data

```bash
php artisan pos:setup-demo
```

### Setup Complete Demo Data (dengan transactions)

```bash
php artisan pos:setup-demo --full
```

## 👥 Akun Demo yang Dibuat

### 🔑 Akun Utama (Selalu dibuat)

| Role  | Email           | Password | Access                    |
| ----- | --------------- | -------- | ------------------------- |
| Admin | admin@admin.com | password | Semua outlet              |
| Kasir | kasir@kasir.com | password | Outlet Pusat Jakarta saja |

### 🏢 Akun Tambahan (dengan flag --full)

| Role             | Email                         | Password | Outlet       |
| ---------------- | ----------------------------- | -------- | ------------ |
| Owner            | owner@posinaja.com            | password | Semua outlet |
| Manager Jakarta  | manager.jakarta@posinaja.com  | password | Jakarta      |
| Manager Bandung  | manager.bandung@posinaja.com  | password | Bandung      |
| Manager Surabaya | manager.surabaya@posinaja.com | password | Surabaya     |
| Kasir 2 Jakarta  | kasir2.jakarta@posinaja.com   | password | Jakarta      |
| Kasir Bandung    | kasir.bandung@posinaja.com    | password | Bandung      |
| Kasir Surabaya   | kasir.surabaya@posinaja.com   | password | Surabaya     |
| Kitchen Staff    | kitchen.jakarta@posinaja.com  | password | Jakarta      |

## 🏪 Data Outlet yang Dibuat

1. **Outlet Pusat Jakarta**

    - Alamat: Jl. Sudirman No. 123, Jakarta Pusat, DKI Jakarta
    - Kategori: Makanan Utama, Minuman, Dessert, Snack
    - Produk: 13 produk (Nasi Gudeg, Ayam Bakar, dll.)

2. **Outlet Bandung**

    - Alamat: Jl. Asia Afrika No. 45, Bandung, Jawa Barat
    - Kategori: Makanan Khas Sunda, Minuman Traditional, Oleh-oleh
    - Produk: 7 produk (Nasi Liwet, Pepes Ikan, dll.)

3. **Outlet Surabaya**
    - Alamat: Jl. Tunjungan No. 67, Surabaya, Jawa Timur
    - Kategori: Makanan Khas Jawa Timur, Seafood, Minuman Segar
    - Produk: 7 produk (Rawon Setan, Udang Bakar, dll.)

## 📦 Detail Produk Sample

### Jakarta (13 produk)

-   **Makanan Utama**: Nasi Gudeg Jogja (25k), Ayam Bakar Madu (35k), Gado-gado Jakarta (20k), Soto Betawi (30k)
-   **Minuman**: Es Teh Manis (8k), Jus Alpukat (15k), Kopi Tubruk (12k), Es Campur (18k)
-   **Dessert**: Es Krim Vanilla (15k), Puding Coklat (12k), Klepon (10k)
-   **Snack**: Keripik Singkong (8k), Kacang Goreng (10k)

### Bandung (7 produk)

-   **Makanan Khas Sunda**: Nasi Liwet Sunda (28k), Pepes Ikan (32k), Karedok (18k)
-   **Minuman Traditional**: Bandrek (12k), Bajigur (15k)
-   **Oleh-oleh**: Brownies Bandung (25k), Keripik Tempe (12k)

### Surabaya (7 produk)

-   **Makanan Khas Jawa Timur**: Rawon Setan (35k), Lontong Balap (20k), Tahu Campur (18k)
-   **Seafood**: Udang Bakar (45k), Cumi Goreng Tepung (40k)
-   **Minuman Segar**: Es Dawet Ayu (15k), Es Teler Surabaya (20k)

## 💰 Data Transaksi Sample (dengan --full)

-   20 sample orders dengan tanggal random dalam 30 hari terakhir
-   Mix status: completed, ongoing, canceled
-   Mix payment methods: cash, card, digital
-   Setiap order berisi 1-5 produk random
-   Total amount: 50k - 300k per order
-   History tracking untuk setiap transaksi

## 🛠️ Manual Seeders

Jika ingin menjalankan seeder individual:

```bash
# Seeder utama (admin, kasir, outlets, products)
php artisan db:seed --class=AdminKasirSeeder

# Seeder staff tambahan
php artisan db:seed --class=AdditionalUsersSeeder

# Seeder transaksi sample
php artisan db:seed --class=SampleTransactionSeeder

# Semua seeder sekaligus
php artisan db:seed
```

## 🔄 Reset Database

Untuk reset database dan setup ulang:

```bash
# Reset dan migrate ulang
php artisan migrate:fresh

# Setup demo data
php artisan pos:setup-demo --full
```

## 📝 Notes

-   Semua password menggunakan hash Laravel standar
-   Email verification sudah di-set untuk semua akun
-   Foreign key relationships sudah di-setup dengan benar
-   Data cross-outlet: beberapa produk populer tersedia di multiple outlet
-   Role-based access: setiap user hanya dapat akses outlet yang sesuai
-   Database seeder menggunakan transaction untuk memastikan data consistency

## 🎨 Customization

Untuk menambah data custom, edit file seeder yang sesuai:

-   `AdminKasirSeeder.php` - Akun utama dan data basic
-   `AdditionalUsersSeeder.php` - Staff tambahan
-   `SampleTransactionSeeder.php` - Data transaksi

Setelah edit, jalankan ulang seeder:

```bash
php artisan pos:setup-demo --full
```
