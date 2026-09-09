<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // WAJIB

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(5)->create();
    }
}