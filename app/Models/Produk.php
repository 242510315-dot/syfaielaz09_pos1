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

    public function hargaSetelahDiskon(): int
    {
        return (int) round($this->harga_jual * (100 - self::DISCOUNT_PERCENTAGE) / 100);
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
