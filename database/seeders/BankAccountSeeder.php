<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bankaccount')->insert([
            'bank_id'  => '1',
            'username' => 'hooiseng1234',
            'password' => 'hooi123', 
            'balance'  => '1000.50'
        ]);

        DB::table('bankaccount')->insert([
            'bank_id'  => '2',
            'username' => 'szeyen1234',
            'password' => 'yen123', 
            'balance'  => '50.00'
        ]);

        DB::table('bankaccount')->insert([
            'bank_id'  => '3',
            'username' => 'zl1234',
            'password' => 'liang123', 
            'balance'  => '1999.90'
        ]);
        DB::table('bankaccount')->insert([
            'bank_id'  => '4',
            'username' => 'wennhan1234',
            'password' => 'han123', 
            'balance'  => '888.00'
        ]);

        DB::table('bankaccount')->insert([
            'bank_id'  => '5',
            'username' => 'foyo1234',
            'password' => 'foyo123', 
            'balance'  => '10000.00'
        ]);
        DB::table('bankaccount')->insert([
            'bank_id'  => '1',
            'username' => 'kurt1234',
            'password' => 'kurt123', 
            'balance'  => '50000.00'
        ]);
    }
}

