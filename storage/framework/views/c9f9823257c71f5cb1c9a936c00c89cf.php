<nav class="navbar cute-navbar mb-4">

    <div class="container-fluid navbar-flex-edge">

        <div class="navbar-top-row">

            
            <a class="navbar-brand brand-cute"
               href="<?php echo e(route('dashboard')); ?>">

                <span class="logo-circle">
                    <i class="bi bi-cart3"></i>
                </span>

                <div class="brand-text">
                    <b>VeggieGo</b>
                    <small>Belanja, Beres!</small>
                </div>

            </a>


            
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="bi bi-list"></i>
            </button>


            
            <div
                class="collapse navbar-collapse navbar-collapse-edge"
                id="navbarMenu"
            >

                <ul class="navbar-nav menu-cute">

                    
                    <li class="nav-item">
                        <a
                            class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>"
                            href="<?php echo e(route('dashboard')); ?>"
                        >
                            <i class="bi bi-speedometer2"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>


                    
                    <?php if(auth()->check() && auth()->user()->role?->name === 'admin'): ?>

                        
                        <li class="nav-item">
                            <a
                                class="nav-link <?php echo e(Request::is('admin/users*') ? 'active' : ''); ?>"
                                href="<?php echo e(route('admin.users.index')); ?>"
                            >
                                <i class="bi bi-people-fill"></i>
                                <span>Users</span>
                            </a>
                        </li>

                    <?php endif; ?>


                    
                    <li class="nav-item">
                        <a
                            class="nav-link <?php echo e(Request::is('jenis-produk') || Request::is('jenis-produk/*') ? 'active' : ''); ?>"
                            href="<?php echo e(route('jenis-produk.index')); ?>"
                        >
                            <i class="bi bi-tags-fill"></i>
                            <span>Jenis</span>
                        </a>
                    </li>


                    
                    <li class="nav-item">
                        <a
                            class="nav-link <?php echo e(Request::is('produk') || Request::is('produk/*') ? 'active' : ''); ?>"
                            href="<?php echo e(route('produk.index')); ?>"
                        >
                            <i class="bi bi-box-seam-fill"></i>
                            <span>Produk</span>
                        </a>
                    </li>


                    
                    <li class="nav-item">
                        <a
                            class="nav-link <?php echo e(Request::is('penjualan') || Request::is('penjualan/*') ? 'active' : ''); ?>"
                            href="<?php echo e(route('penjualan.index')); ?>"
                        >
                            <i class="bi bi-cart-check-fill"></i>
                            <span>Penjualan</span>
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a
                            class="nav-link <?php echo e(Request::is('tentang-aplikasi') ? 'active' : ''); ?>"
                            href="<?php echo e(route('tentang-aplikasi')); ?>"
                        >
                            <i class="bi bi-info-circle-fill"></i>
                            <span>Tentang</span>
                        </a>
                    </li>

                </ul>

            </div>


            
            <div class="user-area">

                
                <a
                    href="<?php echo e(route('tentang')); ?>"
                    class="data-diri-btn"
                >
                    <i class="bi bi-person-fill"></i>
                    <span>Profile</span>
                </a>


                
                <?php if(auth()->guard()->check()): ?>
                    <form
                        action="<?php echo e(route('logout')); ?>"
                        method="POST"
                        class="logout-form"
                    >
                        <?php echo csrf_field(); ?>

                        <button
                            type="submit"
                            class="logout-btn"
                        >
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Keluar</span>
                        </button>

                    </form>
                <?php endif; ?>

            </div>

        </div>

    </div>

</nav>


<style>

/* =========================================
   NAVBAR
========================================= */

.cute-navbar {
    font-family: 'Poppins', 'Segoe UI', sans-serif;

    background:
        linear-gradient(
            135deg,
            #8FAE8B,
            #7C9885,
            #97AEA0
        );

    border-radius: 30px;

    padding: 12px 20px;

    box-shadow:
        0 15px 35px rgba(124, 152, 133, .25);

    position: relative;
    overflow: hidden;
}


/* =========================================
   DEKORASI
========================================= */

.cute-navbar::before {
    content: "✦  ✧  ✦";

    position: absolute;
    right: 30px;
    top: 5px;

    font-size: 25px;

    color: white;
    opacity: .45;

    animation: floatSparkle 3s ease-in-out infinite;
}


@keyframes floatSparkle {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-4px);
    }

}


/* =========================================
   CONTAINER
========================================= */

.navbar-flex-edge {
    width: 100%;
    padding: 0;
}


/* =========================================
   BARIS UTAMA
========================================= */

.navbar-top-row {
    display: flex;
    align-items: center;

    width: 100%;
    gap: 12px;
}


/* =========================================
   BRAND
========================================= */

.brand-cute {
    color: white !important;

    display: flex;
    align-items: center;

    gap: 10px;

    flex-shrink: 0;

    text-decoration: none !important;

    margin: 0;
}


.brand-text {
    line-height: 1.1;
}


.brand-cute b {
    display: block;

    font-size: 15px;

    letter-spacing: -.3px;
}


.brand-cute small {
    display: block;

    font-size: 10px;

    opacity: .9;

    margin-top: 3px;
}


/* =========================================
   LOGO
========================================= */

.logo-circle {
    width: 46px;
    height: 46px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: white;
    color: #7C9885;

    border-radius: 50%;

    font-size: 22px;

    box-shadow:
        0 5px 15px rgba(74, 90, 78, .18);

    transition:
        transform .3s ease,
        box-shadow .3s ease;
}


.brand-cute:hover .logo-circle {

    transform:
        rotate(-8deg)
        scale(1.05);

    box-shadow:
        0 8px 20px rgba(74, 90, 78, .25);
}


/* =========================================
   MENU WRAPPER
========================================= */

.navbar-collapse-edge {
    display: flex;

    align-items: center;
    justify-content: center;

    flex: 1;
}


/* =========================================
   MENU
========================================= */

.menu-cute {
    display: flex;

    flex-direction: row !important;

    align-items: center;
    justify-content: center;

    gap: 3px;

    margin: 0;
    padding: 0;

    list-style: none;
}


/* =========================================
   MENU ITEM
========================================= */

.menu-cute .nav-item {
    margin: 0;
}


/* =========================================
   MENU LINK
========================================= */

.menu-cute .nav-link {

    color: white !important;

    background: rgba(255, 255, 255, .18);

    border-radius: 30px;

    margin: 3px;

    padding: 8px 13px !important;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 6px;

    font-size: 13px;
    font-weight: 600;

    white-space: nowrap;

    border: 1px solid rgba(255, 255, 255, .12);

    transition: all .25s ease;
}


/* =========================================
   ICON
========================================= */

.menu-cute .nav-link i {

    font-size: 14px;

    transition:
        transform .25s ease;
}


/* =========================================
   HOVER
========================================= */

.menu-cute .nav-link:hover {

    background: white;

    color: #5D7C65 !important;

    transform: translateY(-3px);

    box-shadow:
        0 8px 16px rgba(74, 90, 78, .15);
}


.menu-cute .nav-link:hover i {

    transform: scale(1.15);
}


/* =========================================
   ACTIVE
========================================= */

.menu-cute .nav-link.active {

    background: white !important;

    color: #5D7C65 !important;

    box-shadow:
        0 5px 15px rgba(74, 90, 78, .15);
}


/* =========================================
   USER AREA
========================================= */

.user-area {

    display: flex;
    align-items: center;

    gap: 10px;

    flex-shrink: 0;

    margin-left: auto;
}


/* =========================================
   TENTANG DATA DIRI
========================================= */

.data-diri-btn {

    color: white;

    background: rgba(255, 255, 255, .18);

    padding: 8px 15px;

    border-radius: 30px;

    font-size: 12px;
    font-weight: 600;

    white-space: nowrap;

    border:
        1px solid
        rgba(255, 255, 255, .12);

    display: flex;
    align-items: center;

    gap: 6px;

    text-decoration: none;

    transition: all .25s ease;
}


.data-diri-btn i {

    font-size: 15px;
}


.data-diri-btn:hover {

    background: white;

    color: #5D7C65;

    transform: translateY(-3px);

    box-shadow:
        0 8px 16px rgba(74, 90, 78, .15);
}


/* =========================================
   LOGOUT
========================================= */

.logout-form {
    margin: 0;
}


.logout-btn {

    background: white;

    color: #5D7C65;

    border: none;

    border-radius: 30px;

    padding: 9px 16px;

    font-size: 13px;
    font-weight: 700;

    white-space: nowrap;

    display: flex;
    align-items: center;

    gap: 6px;

    box-shadow:
        0 4px 10px rgba(74, 90, 78, .10);

    transition: all .25s ease;
}


.logout-btn:hover {

    background: #eef2ea;

    color: #4A5A4E;

    transform: scale(1.05);

    box-shadow:
        0 8px 16px rgba(74, 90, 78, .15);
}


/* =========================================
   MOBILE TOGGLE
========================================= */

.navbar-toggler {

    display: none;

    border: none !important;

    background: white;

    color: #5D7C65;

    border-radius: 12px;

    padding: 8px 12px;

    font-size: 20px;

    box-shadow:
        0 4px 10px rgba(74, 90, 78, .10);
}


.navbar-toggler:focus {

    box-shadow:
        0 0 0 3px rgba(255, 255, 255, .3);
}


/* =========================================
   DESKTOP
========================================= */

@media (min-width: 992px) {

    .navbar-collapse-edge {
        display: flex !important;
    }

}


/* =========================================
   TABLET
========================================= */

@media (max-width: 1199px) {

    .menu-cute .nav-link {

        padding: 8px 10px !important;

        font-size: 12px;
    }


    .data-diri-btn {

        padding: 8px 10px;

        font-size: 11px;
    }


    .logout-btn {

        padding: 8px 12px;

        font-size: 12px;
    }

}


/* =========================================
   MOBILE & TABLET
========================================= */

@media (max-width: 991px) {

    .cute-navbar {

        border-radius: 22px;

        padding: 14px 18px;
    }


    .cute-navbar::before {

        display: none;
    }


    .navbar-top-row {

        flex-wrap: wrap;

        row-gap: 10px;
    }


    /* Toggle */

    .navbar-toggler {

        display: block;

        margin-left: auto;
    }


    /* Menu */

    .navbar-collapse-edge {

        order: 4;

        flex-basis: 100%;

        width: 100%;

        margin-top: 8px;

        display: block;
    }


    .menu-cute {

        width: 100%;

        flex-direction: column !important;

        align-items: stretch;

        gap: 2px;
    }


    .menu-cute .nav-item {

        width: 100%;
    }


    .menu-cute .nav-link {

        width: 100%;

        margin: 3px 0;

        justify-content: center;

        padding: 10px !important;
    }


    /* User area */

    .user-area {

        order: 3;

        width: 100%;

        margin-left: 0;

        justify-content: space-between;
    }


    .data-diri-btn {

        flex: 1;

        justify-content: center;
    }

}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 576px) {

    .cute-navbar {

        padding: 12px;

        border-radius: 20px;
    }


    .brand-cute b {

        font-size: 15px;
    }


    .brand-cute small {

        font-size: 9px;
    }


    .logo-circle {

        width: 44px;
        height: 44px;

        font-size: 21px;
    }


    .data-diri-btn {

        font-size: 11px;

        padding: 9px 11px;
    }


    .logout-btn {

        padding: 9px 13px;

        font-size: 11px;
    }

}

</style>
<?php /**PATH C:\laragon\www\syfaielaz09_pos1\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>