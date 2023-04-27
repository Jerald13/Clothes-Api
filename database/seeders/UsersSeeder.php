<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Create some sample users
       User::create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => Hash::make('password'),
    ]);

    User::create([
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'password' => Hash::make('password'),
    ]);

    User::create([
        'name' => 'Bob Smith',
        'email' => 'bob@example.com',
        'password' => Hash::make('password'),
    ]);
    }
}
