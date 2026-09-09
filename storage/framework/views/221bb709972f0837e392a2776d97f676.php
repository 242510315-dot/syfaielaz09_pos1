

<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .modal-content {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 16px 48px rgba(214, 51, 108, 0.22);
    }

    .modal-header {
        background: #fff;
        border-bottom: 1px solid #ffe0ec;
        padding: 18px 22px;
    }

    .modal-header .modal-title {
        color: #d6336c;
        font-weight: 800;
        font-size: 1.1rem;
    }

    .modal-header .btn-close {
        opacity: 0.6;
    }

    .modal-body {
        padding: 0;
    }

    .detail-layout {
        display: flex;
        flex-wrap: wrap;
    }

    .detail-photo-col {
        flex: 0 0 42%;
        background: linear-gradient(165deg, #ffe0ec, #ff9ec2);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 20px;
        min-height: 260px;
    }

    .detail-photo-col img {
        max-width: 100%;
        max-height: 200px;
        object-fit: contain;
        filter: drop-shadow(0 10px 18px rgba(107, 33, 64, 0.25));
    }

    .detail-info-col {
        flex: 1 1 55%;
        padding: 26px 24px;
    }

    .detail-jenis-tag {
        display: inline-block;
        background: #ffe0ec;
        color: #d6336c;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        padding: 4px 12px;
        border-radius: 20px;
        letter-spacing: 0.04em;
        margin-bottom: 8px;
    }

    .detail-name {
        font-weight: 800;
        font-size: 1.5rem;
        color: #4a1830;
        text-transform: capitalize;
        margin-bottom: 18px;
        line-height: 1.2;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 11px 0;
        border-bottom: 1px dashed #ffd6e7;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-row .row-label {
        color: #b06388;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .detail-row .row-value {
        font-weight: 700;
        color: #4a1830;
    }

    .detail-row.highlight .row-value {
        color: #d6336c;
        font-size: 1.15rem;
    }

    .detail-stock-ok {
        color: #1e7e34 !important;
    }

    .detail-stock-empty {
        color: #d6336c !important;
    }

    .modal-footer {
        border-top: 1px solid #ffe0ec;
        padding: 14px 22px;
    }

    .modal-footer .btn-secondary {
        background-color: #fff;
        border: 1.5px solid #ffb3cf;
        color: #d6336c;
        font-weight: 700;
        border-radius: 8px;
        padding: 6px 18px;
    }

    .modal-footer .btn-secondary:hover {
        background-color: #ffe0ec;
        border-color: #ffb3cf;
        color: #b0245c;
    }

    @media (max-width: 576px) {
        .detail-photo-col {
            flex: 1 1 100%;
        }
        .detail-info-col {
            flex: 1 1 100%;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container">

    <h1 class="fw-bold mb-3">
        <i class="bi bi-box-seam-fill"></i> Halaman Produk
    </h1>

    <div class="d-flex gap-2 mb-4">

        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Produk::class)): ?>
            <a href="<?php echo e(route('produk.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Produk
            </a>
        <?php endif; ?>

    </div>


    
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form action="<?php echo e(route('produk.index')); ?>"
                  method="GET">

                <div class="input-group">

                    <input type="text"
                           name="search"
                           value="<?php echo e(request('search')); ?>"
                           class="form-control"
                           placeholder="Cari nama produk...">

                    <button class="btn btn-outline-primary">
                        <i class="bi bi-search"></i> Search
                    </button>

                </div>

            </form>

        </div>
    </div>



    
    <div class="card shadow-sm">

        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>


                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>
                            <?php echo e($products->firstItem() + $loop->index); ?>

                        </td>


                        <td>
                            <?php echo e($product->user?->name ?? '-'); ?>

                        </td>


                        <td>

                            <?php if($product->foto): ?>

                                <img src="<?php echo e(asset('storage/'.$product->foto)); ?>"
                                     width="70"
                                     class="rounded">

                            <?php else: ?>

                                <span class="text-muted">
                                    Tidak ada foto
                                </span>

                            <?php endif; ?>

                        </td>


                        <td class="fw-semibold">
                            <?php echo e($product->nama); ?>

                        </td>


                        <td>
                            Rp <?php echo e(number_format($product->harga_beli,0,',','.')); ?>

                        </td>


                        <td>
                            Rp <?php echo e(number_format($product->harga_jual,0,',','.')); ?>

                        </td>


                        <td>

                            <?php if($product->stok > 0): ?>

                                <span class="badge bg-success">
                                    <?php echo e($product->stok); ?>

                                </span>

                            <?php else: ?>

                                <span class="badge bg-danger">
                                    Habis
                                </span>

                            <?php endif; ?>

                        </td>



                        <td>



                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$product)): ?>

                                <a href="<?php echo e(route('produk.edit',$product)); ?>"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                            <?php endif; ?>



                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete',$product)): ?>

                                <form action="<?php echo e(route('produk.destroy',$product)); ?>"
                                      method="POST"
                                      class="d-inline">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>


                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus produk?')">

                                        Hapus

                                    </button>


                                </form>


                            <?php endif; ?>


                        </td>


                    </tr>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>


                    <tr>

                        <td colspan="8"
                            class="text-center">

                            Data produk belum tersedia

                        </td>

                    </tr>


                <?php endif; ?>


                </tbody>


            </table>


            <?php echo e($products->links()); ?>



        </div>

    </div>


</div>







<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="modal fade"
         id="detail<?php echo e($product->id); ?>">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">


                <div class="modal-header">

                    <h5 class="modal-title">
                        Detail Produk
                    </h5>


                    <button class="btn-close"
                            data-bs-dismiss="modal">
                    </button>

                </div>



                <div class="modal-body">

                    <div class="detail-layout">

                        <div class="detail-photo-col">

                            <?php if($product->foto): ?>

                                <img src="<?php echo e(asset('storage/'.$product->foto)); ?>"
                                     alt="<?php echo e($product->nama); ?>">

                            <?php else: ?>

                                <span class="text-white">
                                    Tidak ada foto
                                </span>

                            <?php endif; ?>

                        </div>


                        <div class="detail-info-col">

                            <span class="detail-jenis-tag">
                                <?php echo e($product->jenisProduk?->nama ?? 'Tanpa Kategori'); ?>

                            </span>

                            <div class="detail-name">
                                <?php echo e($product->nama); ?>

                            </div>


                            <div class="detail-row highlight">
                                <span class="row-label">Harga Jual</span>
                                <span class="row-value">
                                    Rp <?php echo e(number_format($product->harga_jual,0,',','.')); ?>

                                </span>
                            </div>

                            <div class="detail-row">
                                <span class="row-label">Harga Beli</span>
                                <span class="row-value">
                                    Rp <?php echo e(number_format($product->harga_beli,0,',','.')); ?>

                                </span>
                            </div>

                            <div class="detail-row">
                                <span class="row-label">Stok</span>
                                <span class="row-value <?php echo e($product->stok > 0 ? 'detail-stock-ok' : 'detail-stock-empty'); ?>">
                                    <?php echo e($product->stok > 0 ? $product->stok.' unit' : 'Habis'); ?>

                                </span>
                            </div>

                        </div>

                    </div>

                </div>



                <div class="modal-footer">


                    <button class="btn btn-secondary"
                            data-bs-dismiss="modal">

                        Tutup

                    </button>


                </div>


            </div>

        </div>


    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\syfaielaz09_pos\resources\views/produk/index.blade.php ENDPATH**/ ?>