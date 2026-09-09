

<?php $__env->startSection('title', 'Jenis Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container">

    <h1 class="fw-bold mb-3">
        <i class="bi bi-tags-fill"></i> Jenis Produk
    </h1>

    <div class="d-flex gap-2 mb-4">

        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <?php if (isset($component)) { $__componentOriginal81b1e277f207898254d2db9808bcc98e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81b1e277f207898254d2db9808bcc98e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.btn-tambah','data' => ['href' => route('jenis-produk.create'),'label' => 'Jenis']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('btn-tambah'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('jenis-produk.create')),'label' => 'Jenis']); ?>
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


    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form action="<?php echo e(route('jenis-produk.index')); ?>" method="GET">

                <div class="input-group">

                    <input type="text"
                           name="search"
                           value="<?php echo e(request('search')); ?>"
                           class="form-control"
                           placeholder="Cari jenis produk...">

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
                        <th>Nama Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $jenisProduks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>
                            <?php echo e($jenisProduks->firstItem() + $loop->index); ?>

                        </td>

                        <td class="fw-semibold">
                            <?php echo e($jenis->nama); ?>

                        </td>

                        <td>

                            <a href="<?php echo e(route('jenis-produk.edit', $jenis)); ?>"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="<?php echo e(route('jenis-produk.destroy', $jenis)); ?>"
                                  method="POST"
                                  class="d-inline">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus jenis produk ini?')">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            Belum ada jenis produk
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

            <?php echo e($jenisProduks->links()); ?>


        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\syfaielaz09_pos1\resources\views/jenis-produk/index.blade.php ENDPATH**/ ?>