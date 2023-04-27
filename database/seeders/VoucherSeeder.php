<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VoucherSeeder extends Seeder
{
    public function run()
    {
        DB::table('vouchers')->insert([
            'code' => 'VOUCHER001',
            'description' => '10% off for any purchase',
            'discount' => 10,
            'used' => false,
            'token_auth' => bcrypt(Str::random(60)),
        ]);

        DB::table('vouchers')->insert([
            'code' => 'VOUCHER002',
            'description' => '20% off for orders over $50',
            'discount' => 20,
            'used' => false,
            'token_auth' => bcrypt(Str::random(60)),
        ]);

        DB::table('vouchers')->insert([
            'code' => 'VOUCHER003',
            'description' => 'Free shipping for orders over $100',
            'discount' => 0,
            'used' => false,
            'token_auth' => bcrypt(Str::random(60)),
        ]);
    }
}