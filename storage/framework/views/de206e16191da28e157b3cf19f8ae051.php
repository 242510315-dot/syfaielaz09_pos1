

<?php $__env->startSection('title', 'Struk Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<div class="container py-4">

    <div class="card shadow-sm p-4">

        
        <div class="text-center mb-3">
            <h3 class="fw-bold mb-1">
                VeggieGo
            </h3>

            <small class="text-muted">
                Struk Pembayaran
            </small>
        </div>

        <hr>

        
        <div class="mb-3">

            <div class="d-flex justify-content-between mb-2">
                <span>No Transaksi</span>
                <strong>#<?php echo e($penjualan->id); ?></strong>
            </div>

            <div class="d-flex justify-content-between mb-2">
                <span>Kasir</span>
                <strong>
                    <?php echo e(optional($penjualan->user)->name ?? '-'); ?>

                </strong>
            </div>

            <div class="d-flex justify-content-between">
                <span>Tanggal</span>
                <strong>
                    <?php echo e($penjualan->created_at?->format('d-m-Y H:i') ?? '-'); ?>

                </strong>
            </div>

        </div>

        <hr>

        
        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>Produk</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Harga</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $penjualan->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>
                            <?php echo e(optional($item->produk)->nama ?? 'Produk dihapus'); ?>

                        </td>

                        <td class="text-center">
                            <?php echo e($item->kuantitas); ?>

                        </td>

                        <td class="text-end">
                            Rp <?php echo e(number_format($item->harga_satuan, 0, ',', '.')); ?>

                        </td>

                        <td class="text-end fw-semibold">
                            Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Tidak ada produk
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

        <hr>

        
        <?php
            $total = (int) $penjualan->total_pembayaran;

            $uangDibayar = (int) ($penjualan->uang_dibayar ?? 0);

            $kembalian = max(0, $uangDibayar - $total);
        ?>

        <div class="mt-3">

            
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="fs-5 fw-semibold">
                    Total
                </span>

                <strong class="fs-5">
                    Rp <?php echo e(number_format($total, 0, ',', '.')); ?>

                </strong>
            </div>

            
            <div class="d-flex justify-content-between mb-2">

                <span>
                    Metode Pembayaran
                </span>

                <strong>
                    <?php echo e(strtoupper($penjualan->metode_pembayaran ?? '-')); ?>

                </strong>

            </div>


            
            <?php if(strtoupper($penjualan->metode_pembayaran ?? '') === 'TUNAI'): ?>

                <div class="d-flex justify-content-between mb-2">

                    <span>
                        Uang Dibayar
                    </span>

                    <strong>
                        Rp <?php echo e(number_format($uangDibayar, 0, ',', '.')); ?>

                    </strong>

                </div>

                <div class="d-flex justify-content-between mb-2">

                    <span>
                        Kembalian
                    </span>

                    <strong>
                        Rp <?php echo e(number_format($kembalian, 0, ',', '.')); ?>

                    </strong>

                </div>

            <?php endif; ?>

        </div>

        <hr>

        
        <h5 class="text-center fw-bold mb-3">
            Terima kasih telah berbelanja di VeggieGo 💚
        </h5>

        
        <button
            onclick="window.print()"
            class="btn btn-success w-100"
        >
            <i class="bi bi-printer-fill"></i>
            Cetak Struk
        </button>

    </div>

</div>



<style>

@media print {

    body {
        background: white !important;
    }

    .navbar,
    nav,
    header,
    footer {
        display: none !important;
    }

    .container {
        width: 100% !important;
        max-width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .card {
        border: none !important;
        box-shadow: none !important;
    }

    button {
        display: none !important;
    }

}

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\syfaielaz09_pos1\resources\views/penjualan/struk.blade.php ENDPATH**/ ?>