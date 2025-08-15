<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\AdminKasirSeeder;
use Database\Seeders\AdditionalUsersSeeder;
use Database\Seeders\SampleTransactionSeeder;

class SetupDemoData extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pos:setup-demo {--full : Setup complete demo data including transactions}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup demo data for POS System with admin and kasir accounts';

    /**
     * Execute the console command.
     */
    public function handle() {
        $this->info('🚀 Setting up POS Demo Data...');
        $this->newLine();

        // Always run basic setup
        $this->info('📋 Creating basic accounts and data...');
        $this->call('db:seed', ['--class' => AdminKasirSeeder::class]);
        $this->newLine();

        if ($this->option('full')) {
            $this->info('👥 Creating additional staff accounts...');
            $this->call('db:seed', ['--class' => AdditionalUsersSeeder::class]);
            $this->newLine();

            $this->info('💰 Creating sample transactions...');
            $this->call('db:seed', ['--class' => SampleTransactionSeeder::class]);
            $this->newLine();

            $this->info('✨ Full demo data setup completed!');
        } else {
            $this->info('✨ Basic demo data setup completed!');
            $this->newLine();
            $this->line('💡 Use --full flag to include additional users and sample transactions:');
            $this->line('   php artisan pos:setup-demo --full');
        }

        $this->newLine();
        $this->info('🎯 Demo Accounts Created:');
        $this->table(
            ['Role', 'Email', 'Password'],
            [
                ['Admin', 'admin@admin.com', 'password'],
                ['Kasir', 'kasir@kasir.com', 'password'],
            ]
        );

        if ($this->option('full')) {
            $this->newLine();
            $this->info('🏢 Additional Accounts (with --full):');
            $this->table(
                ['Role', 'Email', 'Password'],
                [
                    ['Owner', 'owner@posinaja.com', 'password'],
                    ['Manager Jakarta', 'manager.jakarta@posinaja.com', 'password'],
                    ['Manager Bandung', 'manager.bandung@posinaja.com', 'password'],
                    ['Manager Surabaya', 'manager.surabaya@posinaja.com', 'password'],
                    ['Kasir 2 Jakarta', 'kasir2.jakarta@posinaja.com', 'password'],
                    ['Kasir Bandung', 'kasir.bandung@posinaja.com', 'password'],
                    ['Kasir Surabaya', 'kasir.surabaya@posinaja.com', 'password'],
                    ['Kitchen Staff', 'kitchen.jakarta@posinaja.com', 'password'],
                ]
            );
        }

        $this->newLine();
        $this->info('🌟 Ready to login at: http://localhost:8000/login');

        return Command::SUCCESS;
    }
}
