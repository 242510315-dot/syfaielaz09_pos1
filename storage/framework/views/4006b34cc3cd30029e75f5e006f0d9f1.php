<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $__env->yieldContent('title', 'POS Syifaa'); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    </script>


    <style>

    /* =========================================================
       COLOR PALETTE — CALM (Sage / Dusty Neutral)
    ========================================================= */

    :root {

        /* Sage utama */
        --primary: #7C9885;
        --primary-dark: #5D7C65;
        --primary-light: #eef2ea;
        --primary-soft: #f7f9f5;

        /* Deep sage (pengganti navy) */
        --navy: #5D7C65;
        --navy-soft: #6C8E75;

        /* Sage abu (pengganti blue-grey) */
        --blue-grey: #8A9A88;
        --blue-light: #A3B3A0;

        /* Status */
        --success: #6C9A6E;
        --warning: #C6944F;
        --danger: #C97B7B;
        --info: #7C93A8;

        /* Text */
        --text: #4A5A4E;
        --text-soft: #7A8A78;

        /* Border */
        --border: #e2e8de;

        /* White */
        --white: #ffffff;

        /* Shadow */
        --shadow: rgba(93, 124, 101, .10);
        --shadow-soft: rgba(93, 124, 101, .06);
    }


    /* =========================================================
       GLOBAL
    ========================================================= */

    * {
        font-family: 'Poppins', 'Segoe UI', sans-serif;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        min-height: 100vh;

        color: var(--text);

        background:
            radial-gradient(
                circle at 5% 5%,
                rgba(124, 152, 133, .10),
                transparent 28%
            ),
            radial-gradient(
                circle at 95% 10%,
                rgba(138, 154, 136, .08),
                transparent 25%
            ),
            radial-gradient(
                circle at 50% 100%,
                rgba(93, 124, 101, .07),
                transparent 30%
            ),
            linear-gradient(
                135deg,
                #f8faf7 0%,
                #f0f4ee 50%,
                #f7f9f5 100%
            );

        background-attachment: fixed;
    }


    /* =========================================================
       MAIN CONTAINER
    ========================================================= */

    .main-container {
        padding-top: 30px;
        padding-bottom: 60px;
    }


    /* =========================================================
       CONTENT CARD
    ========================================================= */

    .content-card {
        position: relative;

        background: rgba(255, 255, 255, .92);

        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);

        border-radius: 30px;

        padding: 35px;

        border: 1px solid rgba(255, 255, 255, .85);

        box-shadow:
            0 25px 60px rgba(93, 124, 101, .09),
            0 5px 20px rgba(93, 124, 101, .05);

        animation: pageEnter .45s ease;
    }


    /* =========================================================
       PAGE ANIMATION
    ========================================================= */

    @keyframes pageEnter {

        from {
            opacity: 0;
            transform: translateY(15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }


    /* =========================================================
       TYPOGRAPHY
    ========================================================= */

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: var(--navy) !important;

        font-weight: 700;

        letter-spacing: -.4px;
    }

    h1 {
        font-weight: 800;
    }

    p {
        color: var(--text-soft);
    }

    .text-muted {
        color: var(--text-soft) !important;
    }


    /* =========================================================
       WELCOME TITLE
       Contoh:
       "Selamat Datang, Admin"
    ========================================================= */

    .welcome-title,
    .dashboard-title,
    .page-title {
        color: #5D7C65 !important;

        font-weight: 700 !important;

        letter-spacing: -.5px;
    }


    /* =========================================================
       LINK
    ========================================================= */

    a {
        color: var(--primary);

        text-decoration: none;

        transition: .2s ease;
    }

    a:hover {
        color: var(--primary-dark);
    }


    /* =========================================================
       BUTTON GLOBAL
    ========================================================= */

    .btn {
        border: none;

        border-radius: 14px;

        padding: 9px 18px;

        font-weight: 600;

        transition:
            transform .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .btn:hover {
        transform: translateY(-2px);

        box-shadow:
            0 10px 22px rgba(93, 124, 101, .14);
    }


    /* =========================================================
       BUTTON PRIMARY - SAGE
    ========================================================= */

    .btn-primary {
        color: white !important;

        background:
            linear-gradient(
                135deg,
                #6C8E75,
                #7C9885
            ) !important;

        box-shadow:
            0 7px 18px rgba(93, 124, 101, .20);
    }

    .btn-primary:hover {
        color: white !important;

        background:
            linear-gradient(
                135deg,
                #5D7C65,
                #6E8B76
            ) !important;
    }


    /* =========================================================
       BUTTON SUCCESS
    ========================================================= */

    .btn-success {
        color: white !important;

        background:
            linear-gradient(
                135deg,
                #6C9A6E,
                #86AD88
            ) !important;

        box-shadow:
            0 7px 18px rgba(108, 154, 110, .16);
    }


    /* =========================================================
       BUTTON INFO
    ========================================================= */

    .btn-info {
        color: white !important;

        background:
            linear-gradient(
                135deg,
                #7C93A8,
                #97ABBC
            ) !important;
    }


    /* =========================================================
       BUTTON WARNING
    ========================================================= */

    .btn-warning {
        color: #5d4925 !important;

        background:
            linear-gradient(
                135deg,
                #E0B989,
                #C6944F
            ) !important;
    }


    /* =========================================================
       BUTTON DANGER
    ========================================================= */

    .btn-danger {
        color: white !important;

        background:
            linear-gradient(
                135deg,
                #C97B7B,
                #B96A6A
            ) !important;
    }


    /* =========================================================
       BUTTON SECONDARY
    ========================================================= */

    .btn-secondary {
        color: #4A5A4E !important;

        background: #eef2ea !important;
    }


    /* =========================================================
       BUTTON BACK
    ========================================================= */

    .btn-back {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        padding: 9px 16px;

        color: #4A5A4E !important;

        background: #eef2ea;

        border: 1px solid #e2e8de;

        border-radius: 12px;

        font-size: 13px;

        font-weight: 600;

        text-decoration: none !important;

        transition: all .2s ease;
    }

    .btn-back i {
        font-size: 15px;
    }

    .btn-back:hover {
        color: white !important;

        background:
            linear-gradient(
                135deg,
                #6C8E75,
                #7C9885
            );

        border-color: transparent;

        transform: translateX(-3px);

        box-shadow:
            0 7px 16px rgba(93, 124, 101, .18);
    }


    /* =========================================================
       FORM
    ========================================================= */

    .form-label {
        color: var(--navy);

        font-weight: 600;

        font-size: 14px;
    }

    .form-control,
    .form-select {
        border: 1.5px solid #e2e8de;

        border-radius: 14px;

        padding: 11px 16px;

        color: var(--text);

        background: rgba(255, 255, 255, .96);

        transition: .2s ease;
    }

    .form-control::placeholder {
        color: #a8b3a5;
    }

    .form-control:hover,
    .form-select:hover {
        border-color: #c3d3c0;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #7C9885;

        box-shadow:
            0 0 0 4px rgba(124, 152, 133, .12);

        background: white;
    }

    .input-group .form-control {
        border-radius: 14px 0 0 14px;
    }

    .input-group .btn {
        border-radius: 0 14px 14px 0;
    }


    /* =========================================================
       CARD
    ========================================================= */

    .card {
        border: 1px solid var(--border);

        border-radius: 22px;

        background: rgba(255, 255, 255, .94);

        box-shadow:
            0 10px 30px rgba(93, 124, 101, .065);

        transition: .25s ease;
    }

    .card:hover {
        transform: translateY(-2px);

        box-shadow:
            0 16px 35px rgba(93, 124, 101, .10);
    }

    .card-header {
        color: var(--navy);

        font-weight: 600;

        background:
            linear-gradient(
                135deg,
                #eef2ea,
                #f8faf7
            );

        border-bottom: 1px solid #e2e8de;

        padding: 15px 20px;
    }

    .card-body {
        color: var(--text);
    }

    .card-title {
        color: var(--navy) !important;

        font-weight: 700;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .table-responsive {
        border-radius: 18px;

        overflow-x: auto;
    }

    .table {
        margin-bottom: 0;

        color: var(--text);
    }

    .table thead,
    .table-dark {
        background:
            linear-gradient(
                135deg,
                #6C8E75,
                #7C9885
            ) !important;

        color: white !important;
    }

    .table thead th {
        border: none !important;

        color: white !important;

        font-size: 13px;

        font-weight: 600;

        padding: 15px 16px;

        white-space: nowrap;
    }

    .table tbody td {
        color: #6E8A72;

        font-size: 13px;

        padding: 14px 16px;

        vertical-align: middle;

        border-color: #e6ece2;
    }

    .table tbody tr {
        transition: .15s ease;
    }

    .table tbody tr:hover {
        background: #f2f6f0 !important;
    }


    /* =========================================================
       BADGE
    ========================================================= */

    .badge {
        border-radius: 10px;

        padding: 6px 10px;

        font-weight: 600;
    }

    .badge.bg-primary {
        background: #7C9885 !important;
    }

    .badge.bg-success {
        background: #6C9A6E !important;
    }

    .badge.bg-warning {
        color: #5d4925 !important;

        background: #E0B989 !important;
    }

    .badge.bg-danger {
        background: #C97B7B !important;
    }

    .badge.bg-info {
        background: #7C93A8 !important;
    }

    .badge.bg-secondary {
        background: #A3B3A0 !important;
    }


    /* =========================================================
       ALERT
    ========================================================= */

    .alert {
        border: none;

        border-radius: 18px;

        font-weight: 500;
    }

    .alert-success {
        color: #3E6B48;

        background:
            linear-gradient(
                135deg,
                #edf7ee,
                #e3f2e5
            );

        box-shadow:
            0 8px 20px rgba(108, 154, 110, .08);
    }

    .alert-danger {
        color: #9d4f4f;

        background:
            linear-gradient(
                135deg,
                #faf0f0,
                #f7e6e6
            );
    }

    .alert-warning {
        color: #82672d;

        background:
            linear-gradient(
                135deg,
                #faf6eb,
                #f6edd8
            );
    }

    .alert-info {
        color: #4d6172;

        background:
            linear-gradient(
                135deg,
                #eef2f5,
                #e5eaee
            );
    }


    /* =========================================================
       MODAL
    ========================================================= */

    .modal-content {
        border: none;

        border-radius: 24px;

        overflow: hidden;

        box-shadow:
            0 25px 70px rgba(93, 124, 101, .20);
    }

    .modal-header {
        color: white;

        border: none;

        background:
            linear-gradient(
                135deg,
                #6C8E75,
                #7C9885
            );
    }

    .modal-header .modal-title {
        color: white !important;
    }

    .modal-header .btn-close {
        filter: brightness(0) invert(1);
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .pagination {
        gap: 3px;
    }

    .pagination .page-link {
        border: none;

        border-radius: 10px;

        color: var(--primary);

        background: white;

        margin: 0 2px;

        box-shadow:
            0 3px 10px rgba(93, 124, 101, .06);
    }

    .pagination .page-link:hover {
        color: var(--primary-dark);

        background: #eef2ea;
    }

    .pagination .active .page-link {
        color: white;

        background:
            linear-gradient(
                135deg,
                #6C8E75,
                #7C9885
            );

        box-shadow:
            0 5px 12px rgba(93, 124, 101, .18);
    }


    /* =========================================================
       DROPDOWN
    ========================================================= */

    .dropdown-menu {
        border: 1px solid #e2e8de;

        border-radius: 16px;

        padding: 7px;

        box-shadow:
            0 15px 35px rgba(93, 124, 101, .13);
    }

    .dropdown-item {
        border-radius: 10px;

        color: var(--text);

        padding: 9px 12px;
    }

    .dropdown-item:hover {
        color: var(--primary-dark);

        background: #eef2ea;
    }


    /* =========================================================
       NAV TABS
    ========================================================= */

    .nav-tabs {
        border-bottom: 1px solid #e2e8de;
    }

    .nav-tabs .nav-link {
        color: #A3B3A0;

        border: none;

        border-radius: 12px 12px 0 0;
    }

    .nav-tabs .nav-link:hover {
        color: var(--primary);

        background: #f0f4ee;
    }

    .nav-tabs .nav-link.active {
        color: var(--primary-dark);

        background: white;

        border-bottom: 3px solid #7C9885;
    }


    /* =========================================================
       TEXT COLORS
    ========================================================= */

    .text-primary {
        color: #7C9885 !important;
    }

    .text-success {
        color: #6C9A6E !important;
    }

    .text-danger {
        color: #C97B7B !important;
    }

    .text-warning {
        color: #C6944F !important;
    }

    .text-info {
        color: #7C93A8 !important;
    }


    /* =========================================================
       BACKGROUND COLORS
    ========================================================= */

    .bg-primary {
        background-color: #7C9885 !important;
    }

    .bg-success {
        background-color: #6C9A6E !important;
    }

    .bg-danger {
        background-color: #C97B7B !important;
    }

    .bg-warning {
        background-color: #E0B989 !important;
    }

    .bg-info {
        background-color: #7C93A8 !important;
    }


    /* =========================================================
       SELECTION
    ========================================================= */

    ::selection {
        background: #A3B3A0;

        color: #3A4A3E;
    }


    /* =========================================================
       SCROLLBAR
    ========================================================= */

    ::-webkit-scrollbar {
        width: 9px;

        height: 9px;
    }

    ::-webkit-scrollbar-track {
        background: #eef2ea;
    }

    ::-webkit-scrollbar-thumb {
        background:
            linear-gradient(
                180deg,
                #A3B3A0,
                #7C9885
            );

        border-radius: 20px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background:
            linear-gradient(
                180deg,
                #8A9A88,
                #6C8E75
            );
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .content-card {
            padding: 24px;

            border-radius: 24px;
        }

        .main-container {
            padding-top: 20px;
        }

        .btn-back {
            margin-bottom: 0;
        }
    }


    @media (max-width: 576px) {

        .content-card {
            padding: 18px;

            border-radius: 20px;
        }

        .main-container {
            padding-top: 15px;
        }

        .table thead th,
        .table tbody td {
            padding: 11px 12px;
        }

        .btn-back {
            padding: 8px 13px;

            font-size: 12px;
        }
    }

    /* =========================================================
   WELCOME ALERT - CALM SAGE
========================================================= */

.welcome-alert {
    color: #4A5A4E !important;

    background:
        linear-gradient(
            135deg,
            #eef2ea,
            #e3ebe1
        ) !important;

    border: 1px solid #dbe6d8 !important;

    border-radius: 18px;

    font-weight: 500;

    box-shadow:
        0 8px 20px rgba(93, 124, 101, .08);
}

.welcome-alert i {
    color: #6C8E75 !important;
}


    </style>

</head>


<body>

<div class="container main-container">

    

    <?php if(session('success')): ?>

        <div class="alert alert-success mb-4">

            <i class="bi bi-check-circle-fill me-2"></i>

            <?php echo e(session('success')); ?>


        </div>

    <?php endif; ?>


    <?php if(session('error')): ?>

        <div class="alert alert-danger mb-4">

            <i class="bi bi-exclamation-triangle-fill me-2"></i>

            <?php echo e(session('error')); ?>


        </div>

    <?php endif; ?>


    

    <div class="content-card">

        <?php echo $__env->yieldContent('content'); ?>

    </div>

</div>


</body>

</html><?php /**PATH C:\laragon\www\syfaielaz09_pos\resources\views/layouts/app.blade.php ENDPATH**/ ?>