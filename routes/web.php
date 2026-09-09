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

    // Tentang
    Route::get('/tentang', function () {
        return view('tentang.index');
    })->name('tentang');

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

            Route::resource('produk', ProdukController::class);

            Route::resource('jenis-produk', JenisProdukController::class);

            Route::resource('penjualan', PenjualanController::class);

            Route::get('/penjualan/{penjualan}/struk',
                [PenjualanController::class, 'struk'])
                ->name('penjualan.struk');

            Route::resource('itempenjualan', ItemPenjualanController::class)
                ->only([
                    'store',
                    'update',
                    'destroy'
                ]);
        });
});