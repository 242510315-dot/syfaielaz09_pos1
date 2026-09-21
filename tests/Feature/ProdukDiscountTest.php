<?php

namespace Tests\Feature;

use App\Models\Produk;
use Tests\TestCase;

class ProdukDiscountTest extends TestCase
{
    public function test_custom_discount_percentage_is_applied(): void
    {
        $product = new Produk([
            'harga_jual' => 100000,
        ]);

        $this->assertSame(85000, $product->hargaSetelahDiskon(15));
        $this->assertSame(70000, $product->hargaSetelahDiskon());
    }
}
