

<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container">

    <h1 class="fw-bold mb-3">
        <i class="bi bi-people-fill"></i> Halaman Users
    </h1>

    <div class="d-flex gap-2 mb-4">

        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <?php if (isset($component)) { $__componentOriginal81b1e277f207898254d2db9808bcc98e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81b1e277f207898254d2db9808bcc98e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.btn-tambah','data' => ['href' => route('admin.users.create'),'label' => 'User']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('btn-tambah'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.users.create')),'label' => 'User']); ?>
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

            <form action="<?php echo e(route('admin.users.index')); ?>" method="GET">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        value="<?php echo e(request('search')); ?>"
                        class="form-control"
                        placeholder="Search username or email"
                    >

                    <button class="btn btn-outline-primary" type="submit">
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
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>
                            <?php echo e($users->firstItem() + $loop->index); ?>

                        </td>


                        <td class="fw-semibold">
                            <?php echo e($user->name); ?>

                        </td>


                        <td>
                            <?php echo e($user->email); ?>

                        </td>


                        <td>
                            <?php echo e($user->role?->name ?? 'Belum ada role'); ?>

                        </td>


                        <td>


                            <a href="<?php echo e(route('admin.users.edit', $user)); ?>"
                               class="btn btn-sm btn-warning">

                                Edit akun

                            </a>



                            <form action="<?php echo e(route('admin.users.destroy', $user)); ?>"
                                  method="POST"
                                  class="d-inline">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>


                                <button
                                    type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin hapus user ini?')">

                                    Hapus

                                </button>


                            </form>


                        </td>


                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Belum ada data user
                        </td>
                    </tr>

                    <?php endif; ?>


                </tbody>


            </table>

            <?php echo e($users->links()); ?>


        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\syfaielaz09_pos1\resources\views/users/index.blade.php ENDPATH**/ ?>