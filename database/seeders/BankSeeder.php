<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bank')->insert([
            'name' => 'Maybank',
            'method' => 'online',
        ]);

        DB::table('bank')->insert([
            'name' => 'Public Bank',
            'method' => 'online',
        ]);

        DB::table('bank')->insert([
            'name' => 'Hong Leong Bank',
            'method' => 'online',
        ]);
        DB::table('bank')->insert([
            'name' => 'RHB Bank',
            'method' => 'online',
        ]);

        DB::table('bank')->insert([
            'name' => 'Ambank',
            'method' => 'online',
        ]);
        DB::table('bank')->insert([
            'name' => 'CIMB Bank',
            'method' => 'online',
        ]);
    }
}
