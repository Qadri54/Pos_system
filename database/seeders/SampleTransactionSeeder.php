<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SampleTransactionSeeder extends Seeder {
    /**
     * Run the database seeder.
     */
    public function run(): void {
        $admin = User::where('email', 'admin@admin.com')->first();
        $kasir = User::where('email', 'kasir@kasir.com')->first();
        $outlets = Outlet::all();

        // Sample customer names
        $customerNames = [
            'Budi Santoso', 'Sari Indah', 'Ahmad Rahman', 'Maya Sari', 'Eko Prabowo',
            'Dewi Lestari', 'Joko Widodo', 'Rina Maharani', 'Agus Salim', 'Fitri Handayani',
            'Dedi Kurniawan', 'Lina Marlina', 'Rudi Hartono', 'Sinta Dewi', 'Hari Susanto'
        ];

        // Create sample orders only (no histories)
        for ($i = 1; $i <= 20; $i++) {
            $outlet = $outlets->random();
            $customerName = $customerNames[array_rand($customerNames)];

            // Create random date within last 30 days
            $orderDate = Carbon::now()->subDays(rand(1, 30));

            // Create Order
            $order = Order::create([
                'outlet_id' => $outlet->id,
                'customer_name' => $customerName,
                'total_price' => rand(50000, 300000),
                'payment_method' => ['cash', 'qris'][rand(0, 1)],
                'status' => ['done', 'on process', 'canceled'][rand(0, 2)],
                'created_at' => $orderDate,
                'updated_at' => $orderDate,
            ]);

            // Create product orders (random 1-5 products per order)
            $productsCount = rand(1, 5);
            $availableProducts = Product::whereHas('outlet', function ($query) use ($outlet) {
                $query->where('outlet_id', $outlet->id);
            })->get();

            if ($availableProducts->count() > 0) {
                for ($j = 0; $j < $productsCount; $j++) {
                    $product = $availableProducts->random();
                    $quantity = rand(1, 3);
                    $subTotal = $product->price * $quantity;

                    DB::table('product_order')->insert([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'sub_total' => $subTotal,
                        'created_at' => $orderDate,
                        'updated_at' => $orderDate,
                    ]);
                }
            }
        }

        $this->command->info('✅ Sample transactions created successfully!');
        $this->command->info('📊 Created 20 sample orders');
        $this->command->info('🛍️ Each order contains 1-5 random products');
        $this->command->info('👥 Mixed customers and payment methods');
        $this->command->info('📝 Histories table left empty as requested');
    }
}
