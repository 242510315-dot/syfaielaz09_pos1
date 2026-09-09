@extends('layouts.app')

@section('content')

<style>
    :root {
        --green-1: #9bb8a5;
        --green-2: #789783;
        --green-3: #587663;
        --green-dark: #3f5d4c;
        --green-soft: #edf4ef;
        --green-pale: #f5f8f5;

        --text: #304137;
        --text-soft: #718078;
        --white: #ffffff;

        --shadow-sm: 0 8px 25px rgba(63, 93, 76, 0.07);
        --shadow-md: 0 15px 35px rgba(63, 93, 76, 0.12);
    }

    /* =====================================================
       BODY
    ====================================================== */

    body {
        background:
            radial-gradient(
                circle at 0% 0%,
                rgba(155, 184, 165, 0.22),
                transparent 28%
            ),
            radial-gradient(
                circle at 100% 100%,
                rgba(120, 151, 131, 0.15),
                transparent 30%
            ),
            #f6f8f5;

        color: var(--text);
        font-family: "Poppins", "Segoe UI", sans-serif;
    }


    /* =====================================================
       MAIN CONTAINER
    ====================================================== */

    .profile-page {
        max-width: 1120px;
        margin: 0 auto;
        padding: 35px 20px 70px;
    }


    /* =====================================================
       PROFILE HERO
    ====================================================== */

    .profile-header {
        position: relative;
        overflow: hidden;

        min-height: 275px;

        display: flex;
        align-items: center;

        gap: 42px;

        padding: 42px 48px;

        border-radius: 30px;

        color: white;

        background:
            radial-gradient(
                circle at 92% 15%,
                rgba(255,255,255,0.15),
                transparent 20%
            ),
            radial-gradient(
                circle at 35% 110%,
                rgba(255,255,255,0.08),
                transparent 20%
            ),
            linear-gradient(
                135deg,
                #8eae9a,
                #698a76
            );

        box-shadow:
            0 20px 50px rgba(63, 93, 76, 0.20);
    }


    /* decorative circles */

    .profile-header::before {
        content: "";

        position: absolute;

        width: 280px;
        height: 280px;

        border-radius: 50%;

        background: rgba(255,255,255,0.07);

        top: -160px;
        right: -70px;
    }


    .profile-header::after {
        content: "";

        position: absolute;

        width: 210px;
        height: 210px;

        border-radius: 50%;

        background: rgba(255,255,255,0.05);

        bottom: -145px;
        left: 28%;
    }


    /* =====================================================
       PHOTO
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

        border-radius: 24px;

        border: 5px solid rgba(255,255,255,0.95);

        box-shadow:
            0 15px 35px rgba(0,0,0,0.20),
            0 0 0 8px rgba(255,255,255,0.08);

        transition: 0.35s ease;
    }


    .profile-photo:hover {
        transform: translateY(-5px) scale(1.025);
    }


    /* status */

    .photo-status {
        position: absolute;

        width: 22px;
        height: 22px;

        right: 8px;
        bottom: 8px;

        border-radius: 50%;

        background: #dff5e5;

        border: 4px solid white;

        box-shadow: 0 3px 8px rgba(0,0,0,0.12);
    }


    /* =====================================================
       PROFILE INFO
    ====================================================== */

    .profile-info {
        position: relative;

        z-index: 2;

        flex: 1;
    }


    .profile-small {
        display: inline-flex;
        align-items: center;

        padding: 6px 13px;

        margin-bottom: 9px;

        border-radius: 50px;

        background: rgba(255,255,255,0.13);

        border: 1px solid rgba(255,255,255,0.18);

        font-size: 11px;

        font-weight: 700;

        letter-spacing: 1.7px;

        text-transform: uppercase;
    }


    .profile-name {
        margin: 0;

        font-size: 38px;

        line-height: 1.15;

        font-weight: 800;

        letter-spacing: -1px;
    }


    .profile-description {
        margin-top: 10px;

        font-size: 16px;

        font-weight: 500;

        opacity: 0.92;
    }


    /* =====================================================
       BADGE
    ====================================================== */

    .profile-badge {
        display: inline-flex;

        align-items: center;

        gap: 9px;

        margin-top: 17px;

        padding: 9px 17px;

        border-radius: 50px;

        background: rgba(255,255,255,0.14);

        border: 1px solid rgba(255,255,255,0.22);

        backdrop-filter: blur(10px);

        font-size: 13px;

        font-weight: 700;
    }


    .profile-badge i {
        font-size: 15px;
    }


    /* =====================================================
       SOCIAL
    ====================================================== */

    .profile-social {
        display: flex;

        gap: 10px;

        margin-top: 19px;
    }


    .social-btn {
        width: 42px;
        height: 42px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 13px;

        color: white;

        text-decoration: none;

        background: rgba(255,255,255,0.12);

        border: 1px solid rgba(255,255,255,0.18);

        backdrop-filter: blur(8px);

        transition: 0.3s ease;
    }


    .social-btn:hover {
        color: var(--green-dark);

        background: white;

        transform: translateY(-4px);

        box-shadow:
            0 8px 18px rgba(0,0,0,0.12);
    }


    /* =====================================================
       SECTION
    ====================================================== */

    .section-block {
        margin-top: 42px;
    }


    .section-heading {
        display: flex;

        align-items: center;

        gap: 13px;

        margin-bottom: 18px;
    }


    .section-heading-icon {
        width: 45px;
        height: 45px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 14px;

        background: var(--green-soft);

        color: var(--green-dark);

        font-size: 20px;

        box-shadow:
            inset 0 0 0 1px rgba(120,151,131,0.08);
    }


    .section-heading-content h4 {
        margin: 0;

        color: var(--text);

        font-size: 21px;

        font-weight: 800;
    }


    .section-heading-content p {
        margin: 2px 0 0;

        color: var(--text-soft);

        font-size: 12px;
    }


    /* =====================================================
       DATA DIRI
    ====================================================== */

    .info-card {
        position: relative;

        height: 100%;

        overflow: hidden;

        border: 1px solid rgba(120,151,131,0.08);

        border-radius: 20px;

        background: rgba(255,255,255,0.88);

        box-shadow: var(--shadow-sm);

        transition: 0.3s ease;
    }


    .info-card::after {
        content: "";

        position: absolute;

        width: 90px;
        height: 90px;

        border-radius: 50%;

        background: rgba(155,184,165,0.08);

        right: -35px;
        bottom: -45px;
    }


    .info-card:hover {
        transform: translateY(-5px);

        border-color: rgba(120,151,131,0.15);

        box-shadow: var(--shadow-md);
    }


    .info-card .card-body {
        position: relative;

        z-index: 2;

        min-height: 105px;

        padding: 22px;

        display: flex;

        align-items: center;

        gap: 16px;
    }


    .info-icon {
        width: 52px;
        height: 52px;

        min-width: 52px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 15px;

        background: var(--green-soft);

        color: var(--green-dark);

        font-size: 20px;

        transition: 0.3s ease;
    }


    .info-card:hover .info-icon {
        color: white;

        background: var(--green-2);

        transform: scale(1.05);
    }


    .info-text {
        min-width: 0;

        flex: 1;
    }


    .info-label {
        margin-bottom: 5px;

        color: var(--text-soft);

        font-size: 11px;

        font-weight: 500;
    }


    .info-value {
        color: var(--text);

        font-size: 14px;

        font-weight: 750;

        line-height: 1.45;
    }


    .card-arrow {
        position: relative;

        z-index: 2;

        width: 28px;
        height: 28px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: var(--green-pale);

        color: var(--green-2);

        font-size: 14px;

        transition: 0.3s ease;
    }


    .info-card:hover .card-arrow {
        color: white;

        background: var(--green-2);

        transform: translateX(3px);
    }


    /* =====================================================
       CONTACT
    ====================================================== */

    .contact-card {
        position: relative;

        overflow: hidden;

        height: 100%;

        border: 1px solid rgba(120,151,131,0.08);

        border-radius: 20px;

        background: white;

        box-shadow: var(--shadow-sm);

        transition: 0.3s ease;
    }


    .contact-card::before {
        content: "";

        position: absolute;

        width: 100px;
        height: 100px;

        border-radius: 50%;

        background: var(--green-soft);

        right: -45px;
        bottom: -55px;
    }


    .contact-card:hover {
        transform: translateY(-5px);

        box-shadow: var(--shadow-md);
    }


    .contact-card .card-body {
        position: relative;

        z-index: 2;

        min-height: 100px;

        padding: 20px;

        display: flex;

        align-items: center;

        gap: 15px;
    }


    .contact-card .info-icon {
        width: 48px;
        height: 48px;

        min-width: 48px;

        font-size: 19px;
    }


    .contact-button {
        color: var(--text);

        text-decoration: none;

        font-size: 13px;

        font-weight: 750;

        word-break: break-word;

        transition: 0.25s;
    }


    .contact-button:hover {
        color: var(--green-2);
    }


    /* =====================================================
       ABOUT
    ====================================================== */

    .about-section {
        position: relative;

        overflow: hidden;

        padding: 32px;

        border-radius: 24px;

        background: white;

        border: 1px solid rgba(120,151,131,0.08);

        box-shadow: var(--shadow-sm);
    }


    .about-section::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;

        width: 100%;
        height: 5px;

        background:
            linear-gradient(
                90deg,
                var(--green-1),
                var(--green-2),
                #c3d4c8
            );
    }


    .about-header {
        display: flex;

        align-items: center;

        gap: 14px;

        margin-bottom: 25px;
    }


    .about-icon {
        width: 52px;
        height: 52px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 15px;

        color: white;

        background:
            linear-gradient(
                135deg,
                var(--green-2),
                var(--green-dark)
            );

        font-size: 21px;

        box-shadow:
            0 8px 18px rgba(63,93,76,0.16);
    }


    .about-label {
        margin-bottom: 2px;

        color: var(--text-soft);

        font-size: 10px;

        font-weight: 800;

        letter-spacing: 2px;
    }


    .about-title {
        margin: 0;

        color: var(--text);

        font-size: 23px;

        font-weight: 800;
    }


    /* =====================================================
       ABOUT CONTENT
    ====================================================== */

    .about-content {
        position: relative;

        padding-left: 20px;
    }


    .about-line {
        position: absolute;

        top: 3px;
        bottom: 3px;
        left: 0;

        width: 3px;

        border-radius: 10px;

        background:
            linear-gradient(
                to bottom,
                var(--green-1),
                var(--green-2)
            );
    }


    .about-content p {
        margin: 0 0 13px;

        color: #59675e;

        font-size: 14px;

        line-height: 1.9;
    }


    .about-content p:last-child {
        margin-bottom: 0;
    }


    /* =====================================================
       TAGS
    ====================================================== */

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

        color: var(--green-dark);

        background: var(--green-soft);

        font-size: 12px;

        font-weight: 700;

        transition: 0.3s ease;
    }


    .about-tags span:hover {
        color: white;

        background: var(--green-2);

        transform: translateY(-3px);
    }


    /* =====================================================
       RESPONSIVE TABLET
    ====================================================== */

    @media (max-width: 768px) {

        .profile-page {
            padding: 25px 15px 50px;
        }


        .profile-header {
            flex-direction: column;

            text-align: center;

            padding: 35px 25px;

            gap: 22px;
        }


        .profile-photo {
            width: 145px;
            height: 145px;
        }


        .profile-name {
            font-size: 31px;
        }


        .profile-social {
            justify-content: center;
        }


        .profile-badge {
            justify-content: center;
        }


        .about-section {
            padding: 28px 22px;
        }
    }


    /* =====================================================
       RESPONSIVE HP
    ====================================================== */

    @media (max-width: 576px) {

        .profile-page {
            padding: 18px 12px 40px;
        }


        .profile-header {
            min-height: auto;

            padding: 30px 18px;

            border-radius: 24px;
        }


        .profile-photo {
            width: 125px;
            height: 125px;

            border-radius: 19px;
        }


        .profile-name {
            font-size: 27px;
        }


        .profile-description {
            font-size: 13px;
        }


        .profile-small {
            font-size: 9px;
        }


        .profile-badge {
            font-size: 12px;
        }


        .section-block {
            margin-top: 32px;
        }


        .section-heading-content h4 {
            font-size: 19px;
        }


        .info-card .card-body {
            min-height: 95px;

            padding: 17px;
        }


        .info-icon {
            width: 46px;
            height: 46px;

            min-width: 46px;

            font-size: 18px;
        }


        .info-value {
            font-size: 13px;
        }


        .about-section {
            padding: 25px 18px;
        }


        .about-title {
            font-size: 20px;
        }


        .about-content p {
            font-size: 13px;

            line-height: 1.8;
        }


        .about-tags span {
            font-size: 11px;
        }
    }
</style>


<div class="profile-page">


    {{-- =====================================================
         PROFILE HEADER
    ====================================================== --}}

    <div class="profile-header mb-4">


        {{-- FOTO --}}

        <div class="profile-photo-wrapper">

            <img
                src="{{ asset('images/sss.jpg') }}"
                alt="Foto Syifa"
                class="profile-photo"
            >

            <div class="photo-status"></div>

        </div>


        {{-- INFORMASI --}}

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

                <a
                    href="mailto:syfanrl@gmail.com"
                    class="social-btn"
                    title="Email"
                >
                    <i class="bi bi-envelope"></i>
                </a>


                <a
                    href="tel:085939082991"
                    class="social-btn"
                    title="Telepon"
                >
                    <i class="bi bi-telephone"></i>
                </a>


                <a
                    href="https://www.instagram.com/ssyfauu_/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="social-btn"
                    title="Instagram"
                >
                    <i class="bi bi-instagram"></i>
                </a>

            </div>

        </div>

    </div>



    {{-- =====================================================
         DATA DIRI
    ====================================================== --}}

    <div class="section-block">

        <div class="section-heading">

            <div class="section-heading-icon">
                <i class="bi bi-person-vcard"></i>
            </div>

            <div class="section-heading-content">

                <h4>
                    Data Diri
                </h4>

                <p>
                    Informasi pribadi dan akademik
                </p>

            </div>

        </div>


        <div class="row g-3">


            {{-- NAMA --}}

            <div class="col-md-6">

                <div class="card info-card">

                    <div class="card-body">

                        <div class="info-icon">
                            <i class="bi bi-person"></i>
                        </div>

                        <div class="info-text">

                            <div class="info-label">
                                Nama Lengkap
                            </div>

                            <div class="info-value">
                                Syifa Nurul Ielaz
                            </div>

                        </div>

                        <div class="card-arrow">
                            <i class="bi bi-chevron-right"></i>
                        </div>

                    </div>

                </div>

            </div>



            {{-- NIS --}}

            <div class="col-md-6">

                <div class="card info-card">

                    <div class="card-body">

                        <div class="info-icon">
                            <i class="bi bi-credit-card"></i>
                        </div>

                        <div class="info-text">

                            <div class="info-label">
                                NIS
                            </div>

                            <div class="info-value">
                                242510315
                            </div>

                        </div>

                        <div class="card-arrow">
                            <i class="bi bi-chevron-right"></i>
                        </div>

                    </div>

                </div>

            </div>



            {{-- TEMPAT TANGGAL LAHIR --}}

            <div class="col-md-6">

                <div class="card info-card">

                    <div class="card-body">

                        <div class="info-icon">
                            <i class="bi bi-calendar-heart"></i>
                        </div>

                        <div class="info-text">

                            <div class="info-label">
                                Tempat, Tanggal Lahir
                            </div>

                            <div class="info-value">
                                Tasikmalaya, 09 Juni 2009
                            </div>

                        </div>

                        <div class="card-arrow">
                            <i class="bi bi-chevron-right"></i>
                        </div>

                    </div>

                </div>

            </div>



            {{-- JENIS KELAMIN --}}

            <div class="col-md-6">

                <div class="card info-card">

                    <div class="card-body">

                        <div class="info-icon">
                            <i class="bi bi-gender-female"></i>
                        </div>

                        <div class="info-text">

                            <div class="info-label">
                                Jenis Kelamin
                            </div>

                            <div class="info-value">
                                Perempuan
                            </div>

                        </div>

                        <div class="card-arrow">
                            <i class="bi bi-chevron-right"></i>
                        </div>

                    </div>

                </div>

            </div>



            {{-- ALAMAT --}}

            <div class="col-md-6">

                <div class="card info-card">

                    <div class="card-body">

                        <div class="info-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>

                        <div class="info-text">

                            <div class="info-label">
                                Alamat
                            </div>

                            <div class="info-value">
                                Tasikmalaya
                            </div>

                        </div>

                        <div class="card-arrow">
                            <i class="bi bi-chevron-right"></i>
                        </div>

                    </div>

                </div>

            </div>



            {{-- SEKOLAH --}}

            <div class="col-md-6">

                <div class="card info-card">

                    <div class="card-body">

                        <div class="info-icon">
                            <i class="bi bi-mortarboard"></i>
                        </div>

                        <div class="info-text">

                            <div class="info-label">
                                Sekolah
                            </div>

                            <div class="info-value">
                                SMKN 4 Tasikmalaya
                            </div>

                        </div>

                        <div class="card-arrow">
                            <i class="bi bi-chevron-right"></i>
                        </div>

                    </div>

                </div>

            </div>



            {{-- KELAS --}}

            <div class="col-md-6">

                <div class="card info-card">

                    <div class="card-body">

                        <div class="info-icon">
                            <i class="bi bi-book"></i>
                        </div>

                        <div class="info-text">

                            <div class="info-label">
                                Kelas & Jurusan
                            </div>

                            <div class="info-value">
                                XII PPLG 4 — RPL
                            </div>

                        </div>

                        <div class="card-arrow">
                            <i class="bi bi-chevron-right"></i>
                        </div>

                    </div>

                </div>

            </div>


        </div>

    </div>



    {{-- =====================================================
         KONTAK
    ====================================================== --}}

    <div class="section-block">

        <div class="section-heading">

            <div class="section-heading-icon">
                <i class="bi bi-chat-dots"></i>
            </div>

            <div class="section-heading-content">

                <h4>
                    Kontak
                </h4>

                <p>
                    Hubungi saya melalui media berikut
                </p>

            </div>

        </div>


        <div class="row g-3">


            {{-- EMAIL --}}

            <div class="col-md-4">

                <div class="card contact-card">

                    <div class="card-body">

                        <div class="info-icon">
                            <i class="bi bi-envelope"></i>
                        </div>

                        <div>

                            <div class="info-label">
                                Email
                            </div>

                            <a
                                href="mailto:syfanrl@gmail.com"
                                class="contact-button"
                            >
                                syfanrl@gmail.com
                            </a>

                        </div>

                    </div>

                </div>

            </div>



            {{-- NO HP --}}

            <div class="col-md-4">

                <div class="card contact-card">

                    <div class="card-body">

                        <div class="info-icon">
                            <i class="bi bi-telephone"></i>
                        </div>

                        <div>

                            <div class="info-label">
                                No. HP
                            </div>

                            <a
                                href="tel:085939082991"
                                class="contact-button"
                            >
                                0859-3908-2991
                            </a>

                        </div>

                    </div>

                </div>

            </div>



            {{-- INSTAGRAM --}}

            <div class="col-md-4">

                <div class="card contact-card">

                    <div class="card-body">

                        <div class="info-icon">
                            <i class="bi bi-instagram"></i>
                        </div>

                        <div>

                            <div class="info-label">
                                Instagram
                            </div>

                            <a
                                href="https://www.instagram.com/ssyfauu_/"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="contact-button"
                            >
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

    <div class="section-block">


        <div class="about-section">


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