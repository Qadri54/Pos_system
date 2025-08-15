<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Outlet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdditionalUsersSeeder extends Seeder {
    /**
     * Run the database seeder.
     */
    public function run(): void {
        $outlets = Outlet::all();

        // Create additional staff for each outlet
        $additionalUsers = [
            [
                'name' => 'Manager Jakarta',
                'email' => 'manager.jakarta@posinaja.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Kasir 2 Jakarta',
                'email' => 'kasir2.jakarta@posinaja.com',
                'password' => Hash::make('password'),
                'role' => 'kasir',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Kitchen Staff Jakarta',
                'email' => 'kitchen.jakarta@posinaja.com',
                'password' => Hash::make('password'),
                'role' => 'kitchen',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Manager Bandung',
                'email' => 'manager.bandung@posinaja.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Kasir Bandung',
                'email' => 'kasir.bandung@posinaja.com',
                'password' => Hash::make('password'),
                'role' => 'kasir',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Manager Surabaya',
                'email' => 'manager.surabaya@posinaja.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Kasir Surabaya',
                'email' => 'kasir.surabaya@posinaja.com',
                'password' => Hash::make('password'),
                'role' => 'kasir',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Owner',
                'email' => 'owner@posinaja.com',
                'password' => Hash::make('password'),
                'role' => 'owner',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($additionalUsers as $userData) {
            $user = User::create($userData);

            // Assign to appropriate outlets
            if (str_contains($user->email, 'jakarta')) {
                $outlet = $outlets->where('outlet_name', 'Outlet Pusat Jakarta')->first();
                if ($outlet) {
                    DB::table('user_outlet')->insert([
                        'user_id' => $user->id,
                        'outlet_id' => $outlet->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            } elseif (str_contains($user->email, 'bandung')) {
                $outlet = $outlets->where('outlet_name', 'Outlet Bandung')->first();
                if ($outlet) {
                    DB::table('user_outlet')->insert([
                        'user_id' => $user->id,
                        'outlet_id' => $outlet->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            } elseif (str_contains($user->email, 'surabaya')) {
                $outlet = $outlets->where('outlet_name', 'Outlet Surabaya')->first();
                if ($outlet) {
                    DB::table('user_outlet')->insert([
                        'user_id' => $user->id,
                        'outlet_id' => $outlet->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            } elseif ($user->role === 'owner') {
                // Owner has access to all outlets
                foreach ($outlets as $outlet) {
                    DB::table('user_outlet')->insert([
                        'user_id' => $user->id,
                        'outlet_id' => $outlet->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }
        }

        $this->command->info('✅ Additional users created successfully!');
        $this->command->info('👥 Created 8 additional staff members');
        $this->command->info('🏪 Assigned to appropriate outlets');
    }
}
