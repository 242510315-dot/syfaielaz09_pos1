

<?php $__env->startSection('title', 'Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container">

    <h1 class="fw-bold mb-3">
        <i class="bi bi-cash-stack"></i> Halaman Penjualan
    </h1>

    <div class="d-flex gap-2 mb-4">

        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <?php if (isset($component)) { $__componentOriginal81b1e277f207898254d2db9808bcc98e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81b1e277f207898254d2db9808bcc98e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.btn-tambah','data' => ['href' => route('penjualan.create'),'label' => 'Penjualan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('btn-tambah'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('penjualan.create')),'label' => 'Penjualan']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81b1e277f207898254d2db9808bcc98e)): ?>
<?php $attributes = $__attributesOriginal81b1e277f207898254d2db9808bcc98e; ?>
<?php unset($__attributesOriginal81b1e277f207898254d2db9808bcc98e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81b1e277f207898254d2db9808bcc98e)): ?>
<?php $component = $__componentOriginal81b1e277f207898254d2db9808bcc98e; ?>
<?php unset($__componentOriginal81b1e277f207898254d2db9808bcc98e); ?>
<?php endif; ?>

    </div>

    <div class="card mb-4">
        <div class="card-body">

            <form action="<?php echo e(route('penjualan.index')); ?>" method="GET">

                <div class="input-group">

                    <input type="text"
                        name="search"
                        value="<?php echo e(request()->search); ?>"
                        class="form-control"
                        placeholder="Search penjualan...">

                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i> Search
                    </button>

                </div>

            </form>

        </div>
    </div>

    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Tanggal Transaksi</th>
                        <th>Kasir</th>
                        <th>Produk</th>
                        <th>Total Pembayaran</th>
                        <th>Metode Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr>

                    <td>
                        <?php echo e($sales->firstItem() + $loop->index); ?>

                    </td>

                    <td class="text-nowrap">
                        <?php echo e($sale->created_at?->translatedFormat('d-m-Y H:i:s') ?? '-'); ?>

                    </td>

                    <td>
                        <?php echo e(optional($sale->user)->name ?? '-'); ?>

                    </td>

                    <td>

                        <div class="d-flex flex-column gap-1">

                            <?php $__empty_2 = true; $__currentLoopData = $sale->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>

                                <div class="d-flex align-items-center gap-2">

                                    <?php if($item->produk && $item->produk->foto): ?>

                                        <img
                                            src="<?php echo e(asset('storage/' . $item->produk->foto)); ?>"
                                            alt="<?php echo e($item->produk->nama); ?>"
                                            style="
                                                width:32px;
                                                height:32px;
                                                object-fit:cover;
                                                border-radius:6px;
                                            "
                                        >

                                    <?php else: ?>

                                        <div
                                            class="bg-light d-flex align-items-center justify-content-center"
                                            style="
                                                width:32px;
                                                height:32px;
                                                border-radius:6px;
                                            "
                                        >
                                            <i
                                                class="bi bi-box-seam text-muted"
                                                style="font-size:14px;"
                                            ></i>
                                        </div>

                                    <?php endif; ?>

                                    <span class="small">

                                        <?php echo e($item->produk->nama ?? 'Produk dihapus'); ?>


                                        <span class="text-muted">
                                            ×<?php echo e($item->kuantitas); ?>

                                        </span>

                                    </span>

                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

                                <span class="text-muted small">
                                    -
                                </span>

                            <?php endif; ?>

                        </div>

                    </td>

                    <td class="fw-semibold">
                        Rp <?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?>

                    </td>

                    <td>

                        <span class="badge bg-secondary">
                            <?php echo e(strtoupper($sale->metode_pembayaran)); ?>

                        </span>

                    </td>

                    <td>

                        <?php

                            $statusColor = match(strtoupper($sale->status)) {

                                'COMPLETED' => 'bg-success',

                                'PENDING' => 'bg-warning text-dark',

                                'CANCELLED',
                                'FAILED' => 'bg-danger',

                                default => 'bg-secondary',

                            };

                        ?>

                        <span class="badge <?php echo e($statusColor); ?>">
                            <?php echo e(strtoupper($sale->status)); ?>

                        </span>

                    </td>

                    <td>

                        <div class="d-flex gap-1">

                            

                            <?php if($sale->status == 'COMPLETED'): ?>

                                <a
                                    href="<?php echo e(route('penjualan.struk', $sale)); ?>"
                                    class="btn btn-success btn-sm"
                                >
                                    <i class="bi bi-eye"></i>
                                    Detail
                                </a>

                            

                            <?php else: ?>

                                <a
                                    href="<?php echo e(route('penjualan.edit', $sale)); ?>"
                                    class="btn btn-info btn-sm"
                                >
                                    <i class="bi bi-arrow-right-circle"></i>
                                    Lanjutkan
                                </a>

                            <?php endif; ?>

                        </div>

                    </td>

                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td
                        colspan="8"
                        class="text-center py-4 text-muted"
                    >
                        <i class="bi bi-inbox"></i>
                        Data Tidak Ditemukan
                    </td>

                </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>
    </div>

    <div class="mt-3">

        <?php echo e($sales->links()); ?>


    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\syfaielaz09_pos\resources\views/penjualan/index.blade.php ENDPATH**/ ?>