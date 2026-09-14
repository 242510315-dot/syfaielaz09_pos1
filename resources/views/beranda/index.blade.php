@extends('layouts.app')

@section('title', 'Beranda VeggieGo')

@section('content')

@include('layouts.navbar')

<style>
    .beranda-page {
        max-width: 1120px;
        margin: 0 auto;
        padding: 20px 20px 70px;
    }

    .beranda-hero {
        position: relative;
        overflow: hidden;
        padding: 52px 48px;
        border-radius: 28px;
        color: #ffffff;
        background: linear-gradient(135deg, #5d7c65, #91ad92);
        box-shadow: 0 20px 45px rgba(63, 93, 76, 0.18);
    }

    .beranda-hero::after {
        content: '';
        position: absolute;
        width: 260px;
        height: 260px;
        right: -80px;
        bottom: -150px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.12);
    }

    .beranda-hero-content {
        position: relative;
        z-index: 1;
        max-width: 650px;
    }

    .beranda-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 14px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .beranda-hero h1 {
        margin-bottom: 12px;
        font-size: clamp(2rem, 4vw, 3.4rem);
        font-weight: 800;
    }

    .beranda-hero p {
        max-width: 560px;
        margin-bottom: 26px;
        color: rgba(255, 255, 255, 0.88);
        font-size: 1.05rem;
    }

    .beranda-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .beranda-actions .btn {
        padding: 10px 18px;
        border-radius: 12px;
        font-weight: 600;
    }

    .beranda-section {
        margin-top: 36px;
    }

    .beranda-section-title {
        margin-bottom: 18px;
        color: #304137;
        font-size: 1.45rem;
        font-weight: 700;
    }

    .beranda-card {
        height: 100%;
        padding: 24px;
        border: 1px solid #e2ebe3;
        border-radius: 18px;
        background: #ffffff;
        box-shadow: 0 10px 28px rgba(63, 93, 76, 0.07);
    }

    .beranda-card-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        margin-bottom: 18px;
        border-radius: 14px;
        color: #5d7c65;
        background: #edf4ef;
        font-size: 1.4rem;
    }

    .beranda-card h3 {
        margin-bottom: 8px;
        color: #304137;
        font-size: 1.1rem;
        font-weight: 700;
    }

    .beranda-card p {
        margin-bottom: 18px;
        color: #718078;
        font-size: 0.92rem;
    }

    @media (max-width: 576px) {
        .beranda-page {
            padding-inline: 12px;
        }

        .beranda-hero {
            padding: 36px 26px;
        }
    }
</style>

<div class="beranda-page">
    <section class="beranda-hero">
        <div class="beranda-hero-content">
            <div class="beranda-kicker">
                <i class="bi bi-stars"></i>
                Selamat datang di VeggieGo
            </div>

            <h1>Belanja, beres!</h1>

            <p>
                Kelola produk, persediaan, dan transaksi penjualan dengan lebih mudah dari satu tempat.
            </p>

            <div class="beranda-actions">
                <a href="{{ route('dashboard') }}" class="btn btn-light">
                    <i class="bi bi-speedometer2"></i> Buka Dashboard
                </a>
                <a href="{{ route('penjualan.index') }}" class="btn btn-outline-light">
                    <i class="bi bi-cart-check"></i> Lihat Penjualan
                </a>
            </div>
        </div>
    </section>

    <section class="beranda-section">
        <h2 class="beranda-section-title">Akses cepat</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="beranda-card">
                    <div class="beranda-card-icon"><i class="bi bi-box-seam-fill"></i></div>
                    <h3>Produk</h3>
                    <p>Kelola daftar produk dan stok yang tersedia.</p>
                    <a href="{{ route('produk.index') }}" class="btn btn-outline-success btn-sm">
                        Kelola Produk <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="beranda-card">
                    <div class="beranda-card-icon"><i class="bi bi-cart-check-fill"></i></div>
                    <h3>Penjualan</h3>
                    <p>Catat dan pantau transaksi penjualan harian.</p>
                    <a href="{{ route('penjualan.index') }}" class="btn btn-outline-success btn-sm">
                        Buka Penjualan <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="beranda-card">
                    <div class="beranda-card-icon"><i class="bi bi-info-circle-fill"></i></div>
                    <h3>Tentang VeggieGo</h3>
                    <p>Kenali fitur dan tujuan aplikasi POS ini.</p>
                    <a href="{{ route('tentang-aplikasi') }}" class="btn btn-outline-success btn-sm">
                        Selengkapnya <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
