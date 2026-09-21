<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('item_penjualan', function (Blueprint $table) {
            $table->unsignedTinyInteger('diskon_persen')
                ->default(30)
                ->after('harga_satuan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_penjualan', function (Blueprint $table) {
            $table->dropColumn('diskon_persen');
        });
    }
};
