@extends('layouts.app')

@section('content')

<style>
    :root {
        --sage: #8fae9a;
        --sage-dark: #6f8f7a;
        --sage-deep: #3f5d4c;
        --sage-light: #e9f1eb;
        --cream: #f5f7f3;
        --white: #ffffff;
        --text: #34443a;
        --muted: #87928b;
    }

    body {
        background:
            radial-gradient(
                circle at top left,
                #e5eee7 0%,
                transparent 35%
            ),
            radial-gradient(
                circle at bottom right,
                #dfeae2 0%,
                transparent 30%
            ),
            var(--cream);

        color: var(--text);
    }


    /* =====================================================
       PROFILE HEADER
    ====================================================== */

    .profile-header {
        position: relative;
        overflow: hidden;

        background: linear-gradient(
            135deg,
            #91b09c,
            #668472
        );

        border-radius: 28px;

        padding: 45px 50px;

        color: white;

        box-shadow:
            0 15px 40px rgba(63, 93, 76, 0.20);

        display: flex;
        align-items: center;

        gap: 40px;

        min-height: 250px;
    }


    /* ORNAMEN */

    .profile-header::before {
        content: "";

        position: absolute;

        width: 250px;
        height: 250px;

        border-radius: 50%;

        background: rgba(255,255,255,0.08);

        top: -120px;
        right: -70px;
    }


    .profile-header::after {
        content: "";

        position: absolute;

        width: 180px;
        height: 180px;

        border-radius: 50%;

        background: rgba(255,255,255,0.06);

        bottom: -100px;
        left: 30%;
    }


    /* =====================================================
       FOTO PROFIL
    ====================================================== */

    .profile-photo-wrapper {
        position: relative;

        z-index: 2;

        flex-shrink: 0;
    }


    .profile-photo {
        width: 165px;
        height: 165px;

        object-fit: cover;

        border-radius: 20px;

        border: 5px solid rgba(255,255,255,0.95);

        box-shadow:
            0 12px 28px rgba(0,0,0,0.20),
            0 0 0 8px rgba(255,255,255,0.10);

        transition: 0.3s ease;
    }


    .profile-photo:hover {
        transform: scale(1.03);
    }


    /* STATUS FOTO */

    .photo-status {
        position: absolute;

        width: 22px;
        height: 22px;

        background: #dff2e3;

        border: 4px solid white;

        border-radius: 50%;

        right: 8px;
        bottom: 8px;
    }


    /* =====================================================
       INFORMASI PROFIL
    ====================================================== */

    .profile-info {
        position: relative;

        z-index: 2;

        flex: 1;
    }


    .profile-small {
        font-size: 13px;

        letter-spacing: 2px;

        text-transform: uppercase;

        opacity: 0.85;

        margin-bottom: 6px;
    }


    .profile-name {
        font-size: 36px;

        font-weight: 800;

        margin: 0;

        letter-spacing: -0.5px;
    }


    .profile-description {
        margin-top: 8px;

        font-size: 16px;

        opacity: 0.9;
    }


    .profile-badge {
        display: inline-flex;

        align-items: center;

        gap: 8px;

        background: rgba(255,255,255,0.16);

        border: 1px solid rgba(255,255,255,0.22);

        padding: 9px 18px;

        border-radius: 50px;

        margin-top: 16px;

        backdrop-filter: blur(8px);

        font-size: 14px;

        font-weight: 600;
    }


    /* =====================================================
       SOCIAL MEDIA
    ====================================================== */

    .profile-social {
        display: flex;

        gap: 10px;

        margin-top: 18px;
    }


    .social-btn {
        width: 40px;
        height: 40px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 12px;

        color: white;

        text-decoration: none;

        background: rgba(255,255,255,0.14);

        border: 1px solid rgba(255,255,255,0.18);

        transition: 0.3s;
    }


    .social-btn:hover {
        color: var(--sage-deep);

        background: white;

        transform: translateY(-3px);
    }


    /* =====================================================
       SECTION TITLE
    ====================================================== */

    .section-title {
        color: var(--text);

        font-weight: 800;

        font-size: 21px;

        display: flex;

        align-items: center;

        gap: 10px;
    }


    .section-title i {
        color: var(--sage-dark);
    }


    /* =====================================================
       DATA DIRI CARD
    ====================================================== */

    .info-card {
        border: none;

        border-radius: 18px;

        background: rgba(255,255,255,0.9);

        height: 100%;

        box-shadow:
            0 5px 18px rgba(63, 93, 76, 0.07);

        transition: all 0.3s ease;
    }


    .info-card:hover {
        transform: translateY(-5px);

        box-shadow:
            0 12px 25px rgba(63, 93, 76, 0.13);
    }


    .info-card .card-body {
        padding: 22px;
    }


    .info-icon {
        width: 50px;
        height: 50px;

        min-width: 50px;

        border-radius: 14px;

        background: var(--sage-light);

        color: var(--sage-dark);

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 20px;

        transition: 0.3s;
    }


    .info-card:hover .info-icon {
        background: var(--sage-dark);

        color: white;
    }


    .info-label {
        color: var(--muted);

        font-size: 12px;

        margin-bottom: 4px;
    }


    .info-value {
        color: var(--text);

        font-weight: 700;

        font-size: 15px;
    }


    /* =====================================================
       KONTAK
    ====================================================== */

    .contact-card {
        border: none;

        border-radius: 18px;

        background: white;

        box-shadow:
            0 5px 18px rgba(63, 93, 76, 0.07);

        transition: 0.3s;

        height: 100%;
    }


    .contact-card:hover {
        transform: translateY(-5px);

        box-shadow:
            0 12px 25px rgba(63, 93, 76, 0.13);
    }


    .contact-button {
        text-decoration: none;

        color: var(--text);

        font-weight: 700;

        font-size: 14px;
    }


    .contact-button:hover {
        color: var(--sage-dark);
    }


    /* =====================================================
       TENTANG SAYA
    ====================================================== */

    .about-section {
        position: relative;

        background: white;

        border-radius: 24px;

        padding: 30px;

        box-shadow:
            0 8px 25px rgba(63, 93, 76, 0.08);

        overflow: hidden;
    }


    /* GARIS HIJAU ATAS */

    .about-section::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;

        width: 100%;
        height: 5px;

        background: linear-gradient(
            90deg,
            #8fae9a,
            #6f8f7a,
            #b7cbbb
        );
    }


    /* HEADER TENTANG */

    .about-header {
        display: flex;

        align-items: center;

        gap: 15px;

        margin-bottom: 25px;
    }


    .about-icon {
        width: 52px;
        height: 52px;

        border-radius: 15px;

        background: var(--sage-light);

        color: var(--sage-dark);

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 22px;
    }


    .about-label {
        font-size: 11px;

        letter-spacing: 2px;

        color: var(--muted);

        font-weight: 700;

        margin-bottom: 2px;
    }


    .about-title {
        margin: 0;

        font-size: 23px;

        font-weight: 800;

        color: var(--text);
    }


    /* ISI TENTANG */

    .about-content {
        position: relative;

        display: flex;

        flex-direction: column;

        gap: 10px;

        padding-left: 20px;
    }


    .about-content p {
        margin: 0;

        color: #59665d;

        line-height: 1.9;

        font-size: 15px;
    }


    /* GARIS SAMPING */

    .about-line {
        position: absolute;

        left: 0;

        top: 5px;
        bottom: 5px;

        width: 3px;

        border-radius: 10px;

        background: var(--sage);
    }


    /* TAG */

    .about-tags {
        display: flex;

        flex-wrap: wrap;

        gap: 10px;

        margin-top: 25px;
    }


    .about-tags span {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 9px 14px;

        border-radius: 50px;

        background: var(--sage-light);

        color: var(--sage-dark);

        font-size: 13px;

        font-weight: 600;

        transition: 0.3s;
    }


    .about-tags span:hover {
        background: var(--sage-dark);

        color: white;

        transform: translateY(-2px);
    }


    /* =====================================================
       JARAK SECTION
    ====================================================== */

    .section-space {
        margin-top: 42px;
    }


    /* =====================================================
       RESPONSIVE TABLET
    ====================================================== */

    @media (max-width: 768px) {

        .profile-header {
            flex-direction: column;

            text-align: center;

            padding: 35px 25px;

            gap: 20px;
        }


        .profile-photo {
            width: 145px;
            height: 145px;
        }


        .profile-name {
            font-size: 29px;
        }


        .profile-social {
            justify-content: center;
        }

    }


    /* =====================================================
       RESPONSIVE HP
    ====================================================== */

    @media (max-width: 576px) {

        .container {
            padding-left: 15px;

            padding-right: 15px;
        }


        .profile-header {
            border-radius: 22px;

            padding: 30px 20px;
        }


        .profile-photo {
            width: 130px;
            height: 130px;

            border-radius: 16px;
        }


        .profile-name {
            font-size: 25px;
        }


        .profile-description {
            font-size: 14px;
        }


        .about-section {
            padding: 25px 20px;
        }


        .about-title {
            font-size: 21px;
        }

    }
</style>


<div class="container py-4">


    {{-- =====================================================
         PROFILE
    ====================================================== --}}

    <div class="profile-header mb-5">


        {{-- FOTO PROFIL --}}

        <div class="profile-photo-wrapper">

            <img src="{{ asset('images/sss.jpg') }}"
                 alt="Foto Syifa"
                 class="profile-photo">

            <div class="photo-status"></div>

        </div>


        {{-- INFORMASI PROFIL --}}

        <div class="profile-info">

            <div class="profile-small">
                Personal Profile
            </div>


            <h1 class="profile-name">
                Syifa Nurul Ielaz
            </h1>


            <div class="profile-description">
                Siswi • Web Developer • RPL
            </div>


            <div class="profile-badge">

                <i class="bi bi-code-slash"></i>

                XII PPLG 4 • RPL

            </div>


            {{-- SOCIAL MEDIA --}}

            <div class="profile-social">


                {{-- EMAIL --}}

                <a href="mailto:syfanrl@gmail.com"
                   class="social-btn"
                   title="Email">

                    <i class="bi bi-envelope"></i>

                </a>


                {{-- TELEPON --}}

                <a href="tel:085939082991"
                   class="social-btn"
                   title="Telepon">

                    <i class="bi bi-telephone"></i>

                </a>


                {{-- INSTAGRAM --}}

                <a href="https://www.instagram.com/ssyfauu_/"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="social-btn"
                   title="Instagram">

                    <i class="bi bi-instagram"></i>

                </a>


            </div>

        </div>

    </div>



    {{-- =====================================================
         DATA DIRI
    ====================================================== --}}

    <h4 class="section-title mb-3">

        <i class="bi bi-person-vcard"></i>

        Data Diri

    </h4>


    <div class="row g-3 mb-5">


        {{-- NAMA --}}

        <div class="col-md-6">

            <div class="card info-card">

                <div class="card-body d-flex align-items-center gap-3">

                    <div class="info-icon">

                        <i class="bi bi-person"></i>

                    </div>


                    <div>

                        <div class="info-label">
                            Nama Lengkap
                        </div>

                        <div class="info-value">
                            Syifa Nurul Ielaz
                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- NIS --}}

        <div class="col-md-6">

            <div class="card info-card">

                <div class="card-body d-flex align-items-center gap-3">

                    <div class="info-icon">

                        <i class="bi bi-credit-card"></i>

                    </div>


                    <div>

                        <div class="info-label">
                            NIS
                        </div>

                        <div class="info-value">
                            242510315
                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- TEMPAT TANGGAL LAHIR --}}

        <div class="col-md-6">

            <div class="card info-card">

                <div class="card-body d-flex align-items-center gap-3">

                    <div class="info-icon">

                        <i class="bi bi-calendar-heart"></i>

                    </div>


                    <div>

                        <div class="info-label">
                            Tempat, Tanggal Lahir
                        </div>

                        <div class="info-value">
                            Tasikmalaya, 09 Juni 2009
                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- JENIS KELAMIN --}}

        <div class="col-md-6">

            <div class="card info-card">

                <div class="card-body d-flex align-items-center gap-3">

                    <div class="info-icon">

                        <i class="bi bi-gender-female"></i>

                    </div>


                    <div>

                        <div class="info-label">
                            Jenis Kelamin
                        </div>

                        <div class="info-value">
                            Perempuan
                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- ALAMAT --}}

        <div class="col-md-6">

            <div class="card info-card">

                <div class="card-body d-flex align-items-center gap-3">

                    <div class="info-icon">

                        <i class="bi bi-geo-alt"></i>

                    </div>


                    <div>

                        <div class="info-label">
                            Alamat
                        </div>

                        <div class="info-value">
                            Tasikmalaya
                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- SEKOLAH --}}

        <div class="col-md-6">

            <div class="card info-card">

                <div class="card-body d-flex align-items-center gap-3">

                    <div class="info-icon">

                        <i class="bi bi-mortarboard"></i>

                    </div>


                    <div>

                        <div class="info-label">
                            Sekolah
                        </div>

                        <div class="info-value">
                            SMKN 4 Tasikmalaya
                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- KELAS --}}

        <div class="col-md-6">

            <div class="card info-card">

                <div class="card-body d-flex align-items-center gap-3">

                    <div class="info-icon">

                        <i class="bi bi-book"></i>

                    </div>


                    <div>

                        <div class="info-label">
                            Kelas & Jurusan
                        </div>

                        <div class="info-value">
                            XII PPLG 4 — RPL
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- =====================================================
         KONTAK
    ====================================================== --}}

    <div class="section-space">


        <h4 class="section-title mb-3">

            <i class="bi bi-chat-dots"></i>

            Kontak

        </h4>


        <div class="row g-3 mb-5">


            {{-- EMAIL --}}

            <div class="col-md-4">

                <div class="card contact-card">

                    <div class="card-body d-flex align-items-center gap-3">

                        <div class="info-icon">

                            <i class="bi bi-envelope"></i>

                        </div>


                        <div>

                            <div class="info-label">
                                Email
                            </div>


                            <a href="mailto:syfanrl@gmail.com"
                               class="contact-button">

                                syfanrl@gmail.com

                            </a>

                        </div>

                    </div>

                </div>

            </div>



            {{-- NO HP --}}

            <div class="col-md-4">

                <div class="card contact-card">

                    <div class="card-body d-flex align-items-center gap-3">

                        <div class="info-icon">

                            <i class="bi bi-telephone"></i>

                        </div>


                        <div>

                            <div class="info-label">
                                No. HP
                            </div>


                            <a href="tel:085939082991"
                               class="contact-button">

                                0859-3908-2991

                            </a>

                        </div>

                    </div>

                </div>

            </div>



            {{-- INSTAGRAM --}}

            <div class="col-md-4">

                <div class="card contact-card">

                    <div class="card-body d-flex align-items-center gap-3">

                        <div class="info-icon">

                            <i class="bi bi-instagram"></i>

                        </div>


                        <div>

                            <div class="info-label">
                                Instagram
                            </div>


                            <a href="https://www.instagram.com/ssyfauu_/"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="contact-button">

                                @ssyfauu_

                            </a>

                        </div>

                    </div>

                </div>

            </div>


        </div>

    </div>



    {{-- =====================================================
         TENTANG SAYA
    ====================================================== --}}

    <div class="section-space">


        <div class="about-section">


            {{-- HEADER TENTANG --}}

            <div class="about-header">


                <div class="about-icon">

                    <i class="bi bi-stars"></i>

                </div>


                <div>

                    <div class="about-label">
                        PROFILE
                    </div>


                    <h4 class="about-title">
                        Tentang Saya
                    </h4>

                </div>


            </div>



            {{-- ISI --}}

            <div class="about-content">


                <div class="about-line"></div>


                <p>

                    Saya adalah siswi SMKN 4 Tasikmalaya jurusan RPL
                    yang memiliki ketertarikan dalam bidang teknologi
                    dan pengembangan perangkat lunak.

                </p>


                <p>

                    Saya senang mempelajari hal-hal baru dan terus
                    berusaha mengembangkan kemampuan di bidang
                    pemrograman. Bagi saya, belajar teknologi bukan
                    hanya tentang membuat program, tetapi juga
                    bagaimana menciptakan sesuatu yang bermanfaat.

                </p>


            </div>



            {{-- TAG --}}

            <div class="about-tags">


                <span>

                    <i class="bi bi-code-slash"></i>

                    Programming

                </span>


                <span>

                    <i class="bi bi-laptop"></i>

                    Web Development

                </span>


                <span>

                    <i class="bi bi-lightbulb"></i>

                    Learning

                </span>


            </div>


        </div>

    </div>


</div>

@endsection