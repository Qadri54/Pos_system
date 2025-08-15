<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Outlet;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminKasirSeeder extends Seeder {
    /**
     * Run the database seeder.
     */
    public function run(): void {
        // Clear existing data
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_outlets')->truncate();
        DB::table('user_outlet')->truncate();
        DB::table('products')->truncate();
        DB::table('categories')->truncate();
        DB::table('outlets')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Create Users
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $kasir = User::create([
            'name' => 'Kasir',
            'email' => 'kasir@kasir.com',
            'password' => Hash::make('password'),
            'role' => 'kasir',
            'email_verified_at' => now(),
        ]);

        // 2. Create Outlets
        $outlet1 = Outlet::create([
            'outlet_name' => 'Outlet Pusat Jakarta',
            'address' => 'Jl. Sudirman No. 123, Jakarta Pusat, DKI Jakarta'
        ]);

        $outlet2 = Outlet::create([
            'outlet_name' => 'Outlet Bandung',
            'address' => 'Jl. Asia Afrika No. 45, Bandung, Jawa Barat'
        ]);

        $outlet3 = Outlet::create([
            'outlet_name' => 'Outlet Surabaya',
            'address' => 'Jl. Tunjungan No. 67, Surabaya, Jawa Timur'
        ]);

        // 3. Assign Users to Outlets
        // Admin dapat akses semua outlet
        DB::table('user_outlet')->insert([
            ['user_id' => $admin->id, 'outlet_id' => $outlet1->id, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $admin->id, 'outlet_id' => $outlet2->id, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => $admin->id, 'outlet_id' => $outlet3->id, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Kasir hanya di outlet Jakarta
        DB::table('user_outlet')->insert([
            ['user_id' => $kasir->id, 'outlet_id' => $outlet1->id, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 4. Create Categories per Outlet
        $categories = [
            // Outlet Jakarta
            ['name' => 'Makanan Utama', 'outlet_id' => $outlet1->id],
            ['name' => 'Minuman', 'outlet_id' => $outlet1->id],
            ['name' => 'Dessert', 'outlet_id' => $outlet1->id],
            ['name' => 'Snack', 'outlet_id' => $outlet1->id],

            // Outlet Bandung
            ['name' => 'Makanan Khas Sunda', 'outlet_id' => $outlet2->id],
            ['name' => 'Minuman Traditional', 'outlet_id' => $outlet2->id],
            ['name' => 'Oleh-oleh', 'outlet_id' => $outlet2->id],

            // Outlet Surabaya
            ['name' => 'Makanan Khas Jawa Timur', 'outlet_id' => $outlet3->id],
            ['name' => 'Seafood', 'outlet_id' => $outlet3->id],
            ['name' => 'Minuman Segar', 'outlet_id' => $outlet3->id],
        ];

        foreach ($categories as $category) {
            Category::create($category + ['created_at' => now(), 'updated_at' => now()]);
        }

        // 5. Create Products
        $products = [
            // Products for Jakarta (Outlet 1)
            ['product_name' => 'Nasi Gudeg Jogja', 'price' => 25000, 'image' => 1, 'category_id' => 1],
            ['product_name' => 'Ayam Bakar Madu', 'price' => 35000, 'image' => 2, 'category_id' => 1],
            ['product_name' => 'Gado-gado Jakarta', 'price' => 20000, 'image' => 3, 'category_id' => 1],
            ['product_name' => 'Soto Betawi', 'price' => 30000, 'image' => 4, 'category_id' => 1],

            ['product_name' => 'Es Teh Manis', 'price' => 8000, 'image' => 5, 'category_id' => 2],
            ['product_name' => 'Jus Alpukat', 'price' => 15000, 'image' => 6, 'category_id' => 2],
            ['product_name' => 'Kopi Tubruk', 'price' => 12000, 'image' => 7, 'category_id' => 2],
            ['product_name' => 'Es Campur', 'price' => 18000, 'image' => 8, 'category_id' => 2],

            ['product_name' => 'Es Krim Vanilla', 'price' => 15000, 'image' => 9, 'category_id' => 3],
            ['product_name' => 'Puding Coklat', 'price' => 12000, 'image' => 10, 'category_id' => 3],
            ['product_name' => 'Klepon', 'price' => 10000, 'image' => 11, 'category_id' => 3],

            ['product_name' => 'Keripik Singkong', 'price' => 8000, 'image' => 12, 'category_id' => 4],
            ['product_name' => 'Kacang Goreng', 'price' => 10000, 'image' => 13, 'category_id' => 4],

            // Products for Bandung (Outlet 2)
            ['product_name' => 'Nasi Liwet Sunda', 'price' => 28000, 'image' => 14, 'category_id' => 5],
            ['product_name' => 'Pepes Ikan', 'price' => 32000, 'image' => 15, 'category_id' => 5],
            ['product_name' => 'Karedok', 'price' => 18000, 'image' => 16, 'category_id' => 5],

            ['product_name' => 'Bandrek', 'price' => 12000, 'image' => 17, 'category_id' => 6],
            ['product_name' => 'Bajigur', 'price' => 15000, 'image' => 18, 'category_id' => 6],

            ['product_name' => 'Brownies Bandung', 'price' => 25000, 'image' => 19, 'category_id' => 7],
            ['product_name' => 'Keripik Tempe', 'price' => 12000, 'image' => 20, 'category_id' => 7],

            // Products for Surabaya (Outlet 3)
            ['product_name' => 'Rawon Setan', 'price' => 35000, 'image' => 21, 'category_id' => 8],
            ['product_name' => 'Lontong Balap', 'price' => 20000, 'image' => 22, 'category_id' => 8],
            ['product_name' => 'Tahu Campur', 'price' => 18000, 'image' => 23, 'category_id' => 8],

            ['product_name' => 'Udang Bakar', 'price' => 45000, 'image' => 24, 'category_id' => 9],
            ['product_name' => 'Cumi Goreng Tepung', 'price' => 40000, 'image' => 25, 'category_id' => 9],

            ['product_name' => 'Es Dawet Ayu', 'price' => 15000, 'image' => 26, 'category_id' => 10],
            ['product_name' => 'Es Teler Surabaya', 'price' => 20000, 'image' => 27, 'category_id' => 10],
        ];

        foreach ($products as $product) {
            Product::create($product + ['created_at' => now(), 'updated_at' => now()]);
        }

        // 6. Create Product-Outlet relationships
        $productOutlets = [];

        // Jakarta products (1-13) available at Jakarta outlet
        for ($i = 1; $i <= 13; $i++) {
            $productOutlets[] = [
                'product_id' => $i,
                'outlet_id' => $outlet1->id,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        // Bandung products (14-20) available at Bandung outlet
        for ($i = 14; $i <= 20; $i++) {
            $productOutlets[] = [
                'product_id' => $i,
                'outlet_id' => $outlet2->id,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        // Surabaya products (21-27) available at Surabaya outlet
        for ($i = 21; $i <= 27; $i++) {
            $productOutlets[] = [
                'product_id' => $i,
                'outlet_id' => $outlet3->id,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        // Some popular products available in multiple outlets
        $crossOutletProducts = [
            // Nasi Gudeg available in all outlets
            ['product_id' => 1, 'outlet_id' => $outlet2->id, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 1, 'outlet_id' => $outlet3->id, 'created_at' => now(), 'updated_at' => now()],

            // Es Teh Manis available in all outlets
            ['product_id' => 5, 'outlet_id' => $outlet2->id, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 5, 'outlet_id' => $outlet3->id, 'created_at' => now(), 'updated_at' => now()],

            // Kopi Tubruk available in all outlets
            ['product_id' => 7, 'outlet_id' => $outlet2->id, 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 7, 'outlet_id' => $outlet3->id, 'created_at' => now(), 'updated_at' => now()],
        ];

        $productOutlets = array_merge($productOutlets, $crossOutletProducts);

        DB::table('product_outlets')->insert($productOutlets);

        $this->command->info('✅ Admin and Kasir accounts created successfully!');
        $this->command->info('📧 Admin: admin@admin.com / password');
        $this->command->info('📧 Kasir: kasir@kasir.com / password');
        $this->command->info('🏪 Created 3 outlets with categories and products');
        $this->command->info('📦 Created 27 products across different categories');
    }
}
