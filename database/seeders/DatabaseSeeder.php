<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            VoucherSeeder::class,
            BankSeeder::class,
            BankAccountSeeder::class,
            DeliverySeeder::class,
            FreeGiftSeeder::class,
            LogisticSeeder::class,
            UsersSeeder::class,
            VoucherSeeder::class,
        ]);
    }
}
