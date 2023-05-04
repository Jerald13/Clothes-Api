<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('deliver')->insert([
            ['deliver' => 'FedEx'],
            ['deliver' => 'UPS'],
            ['deliver' => 'DHL'],
        ]);
    }
}
