<?php

namespace Database\Seeders;

use App\Models\JenisProduk;
use Illuminate\Database\Seeder;

class JenisProdukSeeder extends Seeder
{
    public function run(): void
    {
        $jenis = ['Makanan', 'Minuman', 'Snack', 'Lainnya'];

        foreach ($jenis as $j) {
            JenisProduk::create(['nama' => $j]); // sesuaikan nama kolomnya
        }
    }
}