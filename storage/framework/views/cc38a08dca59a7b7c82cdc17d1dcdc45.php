

<?php $__env->startSection('title','Struk Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="card p-4">

        <h3 class="text-center">
            TOKO SYIFA
        </h3>

        <hr>

        <p>
            No Transaksi :
            <?php echo e($penjualan->id); ?>

        </p>

        <p>
            Kasir :
            <?php echo e($penjualan->user->name ?? '-'); ?>

        </p>

        <p>
            Tanggal :
            <?php echo e($penjualan->created_at->format('d-m-Y H:i')); ?>

        </p>

        <hr>


        <table class="table">

            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>


            <tbody>

            <?php $__currentLoopData = $penjualan->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>

                    <td>
                        <?php echo e($item->produk->nama); ?>

                    </td>

                    <td>
                        <?php echo e($item->kuantitas); ?>

                    </td>

                    <td>
                        Rp <?php echo e(number_format($item->harga_satuan,0,',','.')); ?>

                    </td>

                    <td>
                        Rp <?php echo e(number_format($item->subtotal,0,',','.')); ?>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>


        <hr>


        <h5>
            Total :
            Rp <?php echo e(number_format($penjualan->total_pembayaran,0,',','.')); ?>

        </h5>


        <p>
            Pembayaran :
            <?php echo e($penjualan->metode_pembayaran); ?>

        </p>


        <hr>


        <h5 class="text-center">
            Terima kasih
        </h5>


        <button onclick="window.print()"
                class="btn btn-primary">
            Cetak Struk
        </button>


    </div>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\syfaielaz09_pos\resources\views/penjualan/struk.blade.php ENDPATH**/ ?>