<?php

namespace Database\Factories;

use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenjualanFactory extends Factory
{
    protected $model = Penjualan::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'metode_pembayaran' => $this->faker->randomElement(['Tunai', 'QRIS', 'Debit']),
            'total_pembayaran' => 0,
        ];
    }
}