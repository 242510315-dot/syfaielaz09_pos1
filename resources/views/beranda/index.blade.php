@extends('layouts.app')

@section('title', 'Tentang Healthy Company')

@section('content')

@include('layouts.navbar')

<style>
    .beranda-page {
        max-width: 1100px;
        margin: auto;
        padding: 25px 20px 60px;
    }

    .beranda-hero {
        background: linear-gradient(135deg, #66856d, #9bb89b);
        border-radius: 24px;
        padding: 45px;
        color: white;
        box-shadow: 0 15px 35px rgba(80,120,90,.15);
    }

    .beranda-hero h1 {
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .beranda-hero p {
        max-width: 650px;
        line-height: 1.7;
        color: rgba(255,255,255,.9);
    }

    .beranda-actions .btn {
        margin-top: 20px;
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: 600;
    }


    .section-title {
        margin-top: 35px;
        margin-bottom: 20px;
        color: #304137;
        font-weight: 700;
    }


    .beranda-card {
        height: 100%;
        padding: 25px;
        background: white;
        border-radius: 18px;
        border: 1px solid #e3ebe4;
        box-shadow: 0 8px 25px rgba(0,0,0,.05);
    }

    .icon-box {
        width: 45px;
        height:45px;
        display:flex;
        align-items:center;
        justify-content:center;
        border-radius:12px;
        background:#edf4ef;
        color:#5d7c65;
        font-size:20px;
        margin-bottom:15px;
    }

    .beranda-card h3 {
        font-size:20px;
        color:#304137;
        font-weight:700;
    }

    .beranda-card p {
        color:#718078;
        line-height:1.6;
        font-size:14px;
    }

</style>


<div class="beranda-page">

    <section class="beranda-hero">

        <small>
            <i class="bi bi-stars"></i>
            HEALTHY COMPANY
        </small>

        <h1>
            Tentang Healthy Company
        </h1>

        <p>
            Healthy Company merupakan perusahaan yang bergerak 
            dalam bidang kesehatan dan kebugaran dengan menyediakan 
            produk serta layanan yang mendukung gaya hidup sehat.
            Perusahaan berfokus pada kualitas, inovasi, dan kebutuhan
            masyarakat akan kesehatan modern.
        </p>


        <div class="beranda-actions">
            <a href="{{ route('dashboard') }}" class="btn btn-light">
                <i class="bi bi-speedometer2"></i>
                Buka Dashboard
            </a>
        </div>

    </section>



    <h2 class="section-title">
        Informasi Healthy Company
    </h2>


    <div class="row g-4">


        <div class="col-md-4">

            <div class="beranda-card">

                <div class="icon-box">
                    <i class="bi bi-box-seam"></i>
                </div>

                <h3>
                    Jenis
                </h3>

                <p>
                    Healthy Company memiliki berbagai kategori
                    produk kesehatan seperti makanan sehat,
                    minuman, suplemen, serta layanan pendukung
                    gaya hidup sehat.
                </p>

            </div>

        </div>



        <div class="col-md-4">

            <div class="beranda-card">

                <div class="icon-box">
                    <i class="bi bi-cart-check"></i>
                </div>

                <h3>
                    Penjualan
                </h3>

                <p>
                    Proses penjualan dilakukan dengan sistem
                    yang terorganisir untuk membantu pengelolaan
                    produk, transaksi, dan pelayanan pelanggan.
                </p>

            </div>

        </div>



        <div class="col-md-4">

            <div class="beranda-card">

                <div class="icon-box">
                    <i class="bi bi-clock-history"></i>
                </div>

                <h3>
                    Sejarah
                </h3>

                <p>
                    Healthy Company berkembang mengikuti
                    kebutuhan masyarakat terhadap produk
                    kesehatan dan gaya hidup yang lebih baik.
                </p>

            </div>

        </div>


    </div>


</div>


@endsection