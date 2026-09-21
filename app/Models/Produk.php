<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory;

    public const DISCOUNT_PERCENTAGE = 30;

    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'jenis_produk_id',
        'harga_beli',
        'harga_jual',
        'stok',
        'foto',
    ];

    public function hargaSetelahDiskon(?int $discountPercentage = null): int
    {
        $discount = $discountPercentage ?? self::DISCOUNT_PERCENTAGE;
        $discount = max(0, min(100, $discount));

        return (int) round($this->harga_jual * (100 - $discount) / 100);
    }

    public function hargaBeliOtomatis(): int
    {
        return $this->hargaSetelahDiskon();
    }

    /**
     * Relasi Produk ke JenisProduk.
     */
    public function jenisProduk(): BelongsTo
    {
        return $this->belongsTo(
            JenisProduk::class,
            'jenis_produk_id',
            'id'
        )->withDefault();
    }
}
