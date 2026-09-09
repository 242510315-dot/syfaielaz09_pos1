<?php

namespace Database\Factories;

use App\Models\Produk;
use App\Models\User;
use App\Models\JenisProduk;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    protected $model = Produk::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'jenis_produk_id' => JenisProduk::inRandomOrder()->first()?->id ?? JenisProduk::factory(),
            'foto' => 'produk-default.jpg',
            'nama' => $this->faker->words(3, true),
            'harga_beli' => $this->faker->numberBetween(1000, 50000),
            'harga_jual' => $this->faker->numberBetween(50000, 100000),
            'stok' => $this->faker->numberBetween(1, 100),
        ];
    }
}