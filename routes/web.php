<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemPenjualanController;


// =========================
// GUEST
// =========================

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'index'])
        ->name('login');

    Route::post('/auth', [AuthController::class, 'auth'])
        ->name('auth');

});


// =========================
// AUTH
// =========================

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

   // =========================
// TENTANG
// =========================

// Tentang Diri Pengguna
Route::get('/tentang', function () {
    return view('tentang.index');
})->name('tentang');

// Tentang Aplikasi POS
Route::get('/tentang-aplikasi', function () {
    return view('tentang-aplikasi.index');
})->name('tentang-aplikasi');

    // =========================
    // LOGOUT
    // =========================

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');


    // =========================
    // ADMIN ONLY
    // =========================

    Route::middleware(['role:admin'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            Route::resource('users', UserController::class);

        });


    // =========================
    // ADMIN + KASIR
    // =========================

    Route::middleware(['role:admin,kasir'])
        ->group(function () {

            // Produk
            Route::resource('produk', ProdukController::class);

            // Jenis Produk
            Route::resource('jenis-produk', JenisProdukController::class);

            // Penjualan
            Route::resource('penjualan', PenjualanController::class);

            // Cetak Struk
            Route::get(
                '/penjualan/{penjualan}/struk',
                [PenjualanController::class, 'struk']
            )->name('penjualan.struk');

            // Item Penjualan
            Route::resource('itempenjualan', ItemPenjualanController::class)
                ->only([
                    'store',
                    'update',
                    'destroy'
                ]);
        });

});
