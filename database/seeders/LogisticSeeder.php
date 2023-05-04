<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LogisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('logistic')->insert([
            'name' => 'J&T',
            'price' => 7.00,
        ]);

        DB::table('logistic')->insert([
            'name' => 'Shopee Express',
            'price' => 3.00,
        ]);

        DB::table('logistic')->insert([
            'name' => 'Ninja Express',
            'price' => 3.00,
        ]);
        DB::table('logistic')->insert([
            'name' => 'Pos Laju Express',
            'price' => 7.00,
        ]);
    }
}
