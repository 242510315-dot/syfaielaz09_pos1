<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'jenis_produk_id',
        // Tambahkan field lainnya di sini...
    ];

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
