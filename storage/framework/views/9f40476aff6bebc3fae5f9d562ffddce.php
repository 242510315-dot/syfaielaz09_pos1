

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="dashboard-page">

    
    <div class="dashboard-header">
        <div>
            <div class="dashboard-greeting">
                <i class="bi bi-stars"></i>
                Selamat Datang di VeggieGo
            </div>

            <h1>Ringkasan Hari Ini</h1>

            <p>
                <i class="bi bi-calendar3"></i>
                <?php echo e($tanggalHariIni->translatedFormat('l, d F Y')); ?>

            </p>
        </div>

        <div class="dashboard-icon">
            <i class="bi bi-bar-chart-line-fill"></i>
        </div>
    </div>


    
    <div class="section-title">
        <div class="section-icon">
            <i class="bi bi-cash-stack"></i>
        </div>

        <div>
            <h2>Penjualan Hari Ini</h2>
            <p>Ringkasan transaksi yang terjadi hari ini</p>
        </div>
    </div>


    <div class="row g-4 mb-4">

        <div class="col-md-6">
            <div class="dashboard-card">
                <div class="card-icon blue-icon">
                    <i class="bi bi-wallet2"></i>
                </div>

                <div class="card-content">
                    <span class="card-label">
                        Total Nilai Penjualan
                    </span>

                    <h3>
                        Rp <?php echo e(number_format($ringkasan['total_penjualan'], 0, ',', '.')); ?>

                    </h3>

                    <small>
                        <i class="bi bi-graph-up-arrow"></i>
                        Penjualan hari ini
                    </small>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="dashboard-card">
                <div class="card-icon purple-icon">
                    <i class="bi bi-receipt-cutoff"></i>
                </div>

                <div class="card-content">
                    <span class="card-label">
                        Jumlah Transaksi
                    </span>

                    <h3>
                        <?php echo e($ringkasan['total_transaksi']); ?>

                    </h3>

                    <small>
                        <i class="bi bi-cart-check"></i>
                        Transaksi selesai hari ini
                    </small>
                </div>
            </div>
        </div>

    </div>


    
    <div class="section-title">
        <div class="section-icon">
            <i class="bi bi-credit-card-2-front-fill"></i>
        </div>

        <div>
            <h2>Status Pembayaran</h2>
            <p>Ringkasan metode pembayaran hari ini</p>
        </div>
    </div>


    <div class="row g-4 mb-4">

        <div class="col-md-6">
            <div class="dashboard-card">
                <div class="card-icon green-icon">
                    <i class="bi bi-cash-coin"></i>
                </div>

                <div class="card-content">
                    <span class="card-label">
                        Total Pembayaran Tunai
                    </span>

                    <h3>
                        Rp <?php echo e(number_format($ringkasan['total_cash'], 0, ',', '.')); ?>

                    </h3>

                    <small>
                        <i class="bi bi-check-circle-fill"></i>
                        Pembayaran CASH
                    </small>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="dashboard-card">
                <div class="card-icon cyan-icon">
                    <i class="bi bi-credit-card"></i>
                </div>

                <div class="card-content">
                    <span class="card-label">
                        Total Pembayaran Non-Tunai
                    </span>

                    <h3>
                        Rp <?php echo e(number_format($ringkasan['total_non_tunai'], 0, ',', '.')); ?>

                    </h3>

                    <small>
                        <i class="bi bi-credit-card-fill"></i>
                        Pembayaran non-tunai
                    </small>
                </div>
            </div>
        </div>

    </div>


    
    <div class="section-title">
        <div class="section-icon">
            <i class="bi bi-box-seam-fill"></i>
        </div>

        <div>
            <h2>Status Persediaan</h2>
            <p>Pantau kondisi stok produk</p>
        </div>
    </div>


    <div class="row g-4 mb-4">

        
        <div class="col-lg-6">

            <div class="inventory-card">

                <div class="inventory-header warning-header">

                    <div class="inventory-title">

                        <div class="inventory-icon warning-icon">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                        </div>

                        <div>
                            <h3>Stok Rendah</h3>
                            <span>Produk yang perlu segera diperhatikan</span>
                        </div>

                    </div>

                </div>


                <div class="table-responsive">

                    <table class="table dashboard-table">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $__empty_1 = true; $__currentLoopData = $produkStokRendah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                <tr>

                                    <td>
                                        <?php echo e($produkStokRendah->firstItem() + $index); ?>

                                    </td>

                                    <td>
                                        <div class="product-name">

                                            <span class="product-mini-icon">
                                                <i class="bi bi-box-seam"></i>
                                            </span>

                                            <?php echo e($produk->nama); ?>


                                        </div>
                                    </td>

                                    <td>

                                        <span class="stock-badge low-stock">
                                            <i class="bi bi-exclamation-circle"></i>
                                            <?php echo e($produk->stok); ?>

                                        </span>

                                    </td>

                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                <tr>
                                    <td colspan="3" class="empty-state">

                                        <i class="bi bi-check-circle-fill"></i>

                                        Seluruh produk memiliki stok yang aman.

                                    </td>
                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>


                <div class="pagination-wrapper">
                    <?php echo e($produkStokRendah->links()); ?>

                </div>

            </div>

        </div>


        
        <div class="col-lg-6">

            <div class="inventory-card">

                <div class="inventory-header danger-header">

                    <div class="inventory-title">

                        <div class="inventory-icon danger-icon">
                            <i class="bi bi-x-circle-fill"></i>
                        </div>

                        <div>
                            <h3>Stok Habis</h3>
                            <span>Produk yang sudah tidak tersedia</span>
                        </div>

                    </div>

                </div>


                <div class="table-responsive">

                    <table class="table dashboard-table">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $__empty_1 = true; $__currentLoopData = $produkStokHabis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                <tr>

                                    <td>
                                        <?php echo e($produkStokHabis->firstItem() + $index); ?>

                                    </td>

                                    <td>
                                        <div class="product-name">

                                            <span class="product-mini-icon">
                                                <i class="bi bi-box-seam"></i>
                                            </span>

                                            <?php echo e($produk->nama); ?>


                                        </div>
                                    </td>

                                    <td>

                                        <span class="stock-badge empty-stock">
                                            <i class="bi bi-x-circle"></i>
                                            <?php echo e($produk->stok); ?>

                                        </span>

                                    </td>

                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                <tr>
                                    <td colspan="3" class="empty-state">

                                        <i class="bi bi-check-circle-fill"></i>

                                        Tidak ada produk yang kehabisan stok.

                                    </td>
                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>


                <div class="pagination-wrapper">
                    <?php echo e($produkStokHabis->links()); ?>

                </div>

            </div>

        </div>

    </div>


    
    <div class="section-title">

        <div class="section-icon">
            <i class="bi bi-trophy-fill"></i>
        </div>

        <div>
            <h2>Produk Terlaris</h2>
            <p>Produk dengan jumlah penjualan tertinggi</p>
        </div>

    </div>


    <div class="best-seller-card">

        <div class="best-seller-header">

            <div>
                <h3>
                    <i class="bi bi-award-fill"></i>
                    Best Seller Product
                </h3>

                <p>
                    Daftar produk yang paling banyak terjual
                </p>
            </div>

            <div class="trophy-icon">
                <i class="bi bi-trophy-fill"></i>
            </div>

        </div>


        <div class="table-responsive">

            <table class="table dashboard-table">

                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Unit Terjual</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $produkTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr>

                            <td>
                                <div class="product-name">

                                    <span class="product-mini-icon">
                                        <i class="bi bi-box-seam-fill"></i>
                                    </span>

                                    <?php echo e($produk->nama); ?>


                                </div>
                            </td>

                            <td>

                                <span class="stock-badge safe-stock">
                                    <i class="bi bi-box"></i>
                                    <?php echo e($produk->stok); ?>

                                </span>

                            </td>

                            <td>

                                <span class="sold-badge">
                                    <i class="bi bi-star-fill"></i>
                                    <?php echo e($produk->total_terjual); ?>

                                </span>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>
                            <td colspan="3" class="empty-state">

                                <i class="bi bi-inbox"></i>

                                Belum ada data produk terlaris.

                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>


<style>

.dashboard-page {
    font-family: 'Poppins', 'Segoe UI', sans-serif;
    padding: 10px 0 40px;
    color: #4A5A4E;
}

.dashboard-header {
    background: linear-gradient(135deg, #eef2ea, #e3ebe1, #f4f6f2);
    border-radius: 28px;
    padding: 30px 35px;
    margin-bottom: 35px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border: 1px solid #dbe6d8;
    box-shadow: 0 12px 30px rgba(124, 152, 133, 0.12);
}

.dashboard-greeting {
    color: #3A4A3E;
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 8px;
}

.dashboard-greeting i {
    color: #4A5A4E;
    margin-right: 5px;
}

.dashboard-header h1 {
    color: #5D7C65;
    font-size: 30px;
    font-weight: 700;
    margin: 0;
}

.dashboard-header p {
    color: #7A8A78;
    margin: 8px 0 0;
    font-size: 14px;
}

.dashboard-header p i {
    margin-right: 5px;
}

.dashboard-icon {
    width: 75px;
    height: 75px;
    border-radius: 24px;
    background: linear-gradient(135deg, #7C9885, #97AEA0);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    box-shadow: 0 10px 25px rgba(124, 152, 133, 0.25);
}

.section-title {
    display: flex;
    align-items: center;
    gap: 14px;
    margin: 30px 0 18px;
}

.section-icon {
    width: 46px;
    height: 46px;
    border-radius: 15px;
    background: #eef2ea;
    color: #7C9885;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.section-title h2 {
    margin: 0;
    color: #5D7C65;
    font-size: 21px;
    font-weight: 700;
}

.section-title p {
    margin: 3px 0 0;
    color: #93A290;
    font-size: 13px;
}

.dashboard-card {
    height: 100%;
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 25px;
    background: #ffffff;
    border-radius: 22px;
    border: 1px solid #e2e8de;
    box-shadow: 0 8px 25px rgba(124, 152, 133, 0.08);
    transition: all 0.25s ease;
}

.dashboard-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 30px rgba(124, 152, 133, 0.15);
    border-color: #c3d3c0;
}

.card-icon {
    width: 62px;
    height: 62px;
    min-width: 62px;
    border-radius: 19px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 27px;
}

.blue-icon {
    background: #eef2ea;
    color: #7C9885;
}

.purple-icon {
    background: #eef0f4;
    color: #8892A8;
}

.green-icon {
    background: #eef2ea;
    color: #6C8E75;
}

.cyan-icon {
    background: #eaeff4;
    color: #7C93A8;
}

.card-label {
    color: #7A8A78;
    font-size: 13px;
    display: block;
    margin-bottom: 4px;
}

.card-content h3 {
    color: #5D7C65;
    font-size: 25px;
    font-weight: 700;
    margin: 0 0 5px;
}

.card-content small {
    color: #93A290;
    font-size: 12px;
}

.card-content small i {
    margin-right: 3px;
    color: #7C9885;
}

.inventory-card {
    background: #ffffff;
    border-radius: 22px;
    border: 1px solid #e2e8de;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(124, 152, 133, 0.07);
}

.inventory-header {
    padding: 20px 22px;
    border-bottom: 1px solid #edf2ea;
}

.warning-header {
    background: #f2f6f0;
}

.danger-header {
    background: #f1f4ef;
}

.inventory-title {
    display: flex;
    align-items: center;
    gap: 13px;
}

.inventory-icon {
    width: 45px;
    height: 45px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
}

.warning-icon {
    background: #e2ece0;
    color: #E0B989;
}

.danger-icon {
    background: #f1e4e3;
    color: #C97B7B;
}

.inventory-title h3 {
    color: #4A5A4E;
    font-size: 17px;
    margin: 0 0 3px;
    font-weight: 700;
}

.inventory-title span {
    color: #93A290;
    font-size: 12px;
}

.dashboard-table {
    margin: 0;
}

.dashboard-table thead th {
    background: #f7f9f5;
    color: #7A8A78;
    border-bottom: 1px solid #e6ece2;
    font-size: 12px;
    font-weight: 600;
    padding: 14px 18px;
}

.dashboard-table tbody td {
    color: #5A6B5C;
    font-size: 13px;
    vertical-align: middle;
    padding: 14px 18px;
    border-color: #edf2ea;
}

.dashboard-table tbody tr {
    transition: background 0.2s ease;
}

.dashboard-table tbody tr:hover {
    background: #f2f6f0;
}

.product-name {
    display: flex;
    align-items: center;
    gap: 9px;
    color: #556B58;
    font-weight: 500;
}

.product-mini-icon {
    width: 32px;
    height: 32px;
    border-radius: 10px;
    background: #eef2ea;
    color: #7C9885;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}

.stock-badge,
.sold-badge {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 6px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
}

.low-stock {
    background: #f7ecdc;
    color: #C6944F;
}

.empty-stock {
    background: #f1e4e3;
    color: #C97B7B;
}

.safe-stock {
    background: #eaf1e8;
    color: #6C8E75;
}

.sold-badge {
    background: #eef2ea;
    color: #7C9885;
}

.empty-state {
    text-align: center;
    padding: 30px !important;
    color: #9CAA98 !important;
}

.empty-state i {
    display: block;
    font-size: 27px;
    margin-bottom: 7px;
    color: #97AEA0;
}

.pagination-wrapper {
    padding: 15px 18px;
}

.pagination-wrapper .pagination {
    margin: 0;
}

.pagination-wrapper .page-link {
    color: #7C9885;
    background: #ffffff;
    border-color: #dbe6d8;
    border-radius: 10px;
    margin: 0 3px;
    transition: all 0.2s ease;
}

.pagination-wrapper .page-link:hover {
    color: #ffffff;
    background: #7C9885;
    border-color: #7C9885;
}

.pagination-wrapper .page-item.active .page-link {
    color: #ffffff;
    background: #7C9885;
    border-color: #7C9885;
}

.pagination-wrapper .page-item.disabled .page-link {
    color: #A8B3A5;
    background: #f4f6f2;
    border-color: #e6ece2;
}

.best-seller-card {
    background: #ffffff;
    border-radius: 22px;
    border: 1px solid #e2e8de;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(124, 152, 133, 0.07);
    margin-bottom: 30px;
}

.best-seller-header {
    padding: 22px 25px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: linear-gradient(135deg, #eef4ec, #f7f9f5);
    border-bottom: 1px solid #e2e8de;
}

.best-seller-header h3 {
    color: #4A5A4E;
    font-size: 18px;
    font-weight: 700;
    margin: 0;
}

.best-seller-header h3 i {
    color: #7C9885;
    margin-right: 6px;
}

.best-seller-header p {
    color: #93A290;
    font-size: 12px;
    margin: 4px 0 0;
}

.trophy-icon {
    width: 52px;
    height: 52px;
    border-radius: 16px;
    background: #eef2ea;
    color: #7C9885;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 23px;
}

@media (max-width: 768px) {

    .dashboard-header {
        padding: 24px;
        border-radius: 22px;
    }

    .dashboard-header h1 {
        font-size: 24px;
    }

    .dashboard-icon {
        width: 60px;
        height: 60px;
        font-size: 25px;
    }

    .section-title h2 {
        font-size: 18px;
    }

    .dashboard-card {
        padding: 20px;
    }

}

@media (max-width: 576px) {

    .dashboard-header {
        padding: 20px;
    }

    .dashboard-icon {
        display: none;
    }

    .dashboard-header h1 {
        font-size: 21px;
    }

    .section-title {
        margin-top: 25px;
    }

    .card-content h3 {
        font-size: 21px;
    }

    .best-seller-header {
        padding: 18px;
    }

}

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\syfaielaz09_pos1\resources\views/dashboard.blade.php ENDPATH**/ ?>