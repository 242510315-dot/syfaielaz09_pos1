<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
{
    $this->call([
        RoleSeeder::class,
        UserSeeder::class,
        JenisProdukSeeder::class,
        ProdukSeeder::class,
        PenjualanSeeder::class,
    ]);

    User::updateOrCreate(
        ['email' => 'admin@gmail.com'],
        [
        'name' => 'Admin',
        'password' => Hash::make('12345678'),
        ]
    );
}
}