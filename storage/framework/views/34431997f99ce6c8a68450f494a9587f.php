

<?php $__env->startSection('title', 'POS'); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('errors')): ?>
<div class="alert alert-danger">
    <i class="bi bi-exclamation-triangle-fill"></i> <?php echo e(session('errors')); ?>

</div>
<?php endif; ?>

<h4 class="mb-3">
    <?php echo e($mode === 'edit' ? 'Edit Penjualan' : 'Tambah Penjualan'); ?>

</h4>


<div class="row">

    
    <div class="col-md-6">

        <div class="card">

            <div class="card-body" style="max-height:70vh; overflow:auto">

                <form method="GET" action="<?php echo e(route('penjualan.create')); ?>">
                    <input type="text"
                        name="search"
                        value="<?php echo e(request('search')); ?>"
                        class="form-control mb-3"
                        placeholder="Cari produk..."
                        onkeyup="this.form.submit()">
                </form>


                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <form action="<?php echo e(route('itempenjualan.store')); ?>" method="POST" class="mb-2">

                    <?php echo csrf_field(); ?>

                    <input type="hidden"
                        name="product_id"
                        value="<?php echo e($product->id); ?>">

                    <div class="row align-items-center">

                        <div class="col-7">

                            <button type="submit"
                                class="btn btn-outline-primary w-100 text-start p-2 
                                <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>">

                                <div class="d-flex align-items-center gap-2">

                                    <img src="<?php echo e(asset('storage/'.$product->foto)); ?>"
                                        class="rounded-circle"
                                        style="width:70px;height:70px;object-fit:cover;image-rendering:auto;">


                                    <div>

                                        <div class="fw-semibold">
                                            <?php echo e($product->nama); ?>

                                        </div>


                                        <small class="text-muted">
                                            Rp <?php echo e(number_format($product->harga_jual)); ?>

                                        </small>

                                    </div>

                                </div>

                            </button>

                        </div>


                        <div class="col-3">

                            <input type="number"
                                name="quantity"
                                value="1"
                                min="1"
                                class="form-control"
                                <?php echo e($sale->status === 'COMPLETED' ? 'readonly' : ''); ?>>

                        </div>


                        <div class="col-2">

                            <button class="btn btn-primary w-100"
                                <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>>
                                <i class="bi bi-plus-lg"></i>
                            </button>

                        </div>

                    </div>

                </form>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>

    </div>




    

    <div class="col-md-6">

        <div class="card">

            <table class="table table-bordered mb-0">

                <thead>

                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $sale->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>
                            <?php echo e($item->produk->nama); ?>

                        </td>


                        <td>
                            Rp <?php echo e(number_format($item->produk->harga_jual)); ?>

                        </td>


                        <td>

                            <form method="POST"
                                action="<?php echo e(route('itempenjualan.update',$item->id)); ?>">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>


                                <input type="number"
                                    name="quantity"
                                    value="<?php echo e($item->kuantitas); ?>"
                                    class="form-control form-control-sm"
                                    onchange="this.form.submit()">

                            </form>

                        </td>


                        <td>
                            Rp <?php echo e(number_format($item->subtotal)); ?>

                        </td>


                        <td>

                            <form method="POST"
                                action="<?php echo e(route('itempenjualan.destroy',$item->id)); ?>">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>


                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </button>


                            </form>

                        </td>

                    </tr>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="5"
                            class="text-center text-muted">

                            Keranjang kosong

                        </td>

                    </tr>

                <?php endif; ?>


                </tbody>

            </table>




            <div class="card-footer">


                <h5>
                    Total:
                    Rp <?php echo e(number_format($sale->total_pembayaran)); ?>

                </h5>



                <form method="POST"
                    action="<?php echo e(route('penjualan.update',$sale->id)); ?>"
                    onsubmit="return confirm('Yakin checkout?')">


                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>


                    <select name="payment_method"
                        class="form-select mb-2">


                        <option value="">
                            Pilih Pembayaran
                        </option>


                        <option value="CASH">
                            Cash
                        </option>


                        <option value="QRIS">
                            QRIS
                        </option>


                    </select>



                    <button class="btn btn-success w-100"
                        <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>>

                        <i class="bi bi-check-circle-fill"></i> Checkout

                    </button>


                </form>



                <form action="<?php echo e(route('penjualan.destroy',$sale->id)); ?>"
                    method="POST"
                    class="mt-2"
                    onsubmit="return confirm('Batalkan transaksi?')">


                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>


                    <button class="btn btn-outline-danger w-100"
                        <?php echo e($sale->status === 'COMPLETED' ? 'disabled' : ''); ?>>

                        <i class="bi bi-x-circle-fill"></i> Batal Transaksi

                    </button>


                </form>


            </div>

        </div>

    </div>


</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\syfaielaz09_pos\resources\views/penjualan/pos.blade.php ENDPATH**/ ?>