<?php echo csrf_field(); ?>

<?php if(!empty($produk->foto)): ?>
    <div class="mb-2">
        <label>Foto Saat Ini</label><br>

        <img src="<?php echo e(asset('storage/' . $produk->foto)); ?>"
             width="150"
             class="img-thumbnail">
    </div>
<?php endif; ?>


<div class="row mb-3">

    <div class="col">
        <label>Gambar</label>

        <input type="file"
               name="foto"
               onchange="previewImage(this)"
               class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

        <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>


    <div class="col">

        <label>Preview Foto</label><br>

        <img id="preview"
             class="img-thumbnail mt-2"
             style="display:none"
             width="150">

    </div>

</div>



<div class="mb-3">

    <label>Nama Produk</label>

    <input type="text"
           name="name"
           class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
           value="<?php echo e(old('name', $produk->nama ?? '')); ?>">


    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>



<div class="mb-3">

    <label>Jenis Produk</label>


    <select name="jenis_produk_id"
            class="form-control <?php $__errorArgs = ['jenis_produk_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">


        <option value="">
            -- Pilih Jenis Produk --
        </option>


        <?php $__currentLoopData = $jenisProduks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <option value="<?php echo e($jenis->id); ?>"

                <?php echo e(old(
                    'jenis_produk_id',
                    $produk->jenis_produk_id ?? ''
                ) == $jenis->id ? 'selected' : ''); ?>>

                <?php echo e($jenis->nama); ?>


            </option>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </select>


    <?php $__errorArgs = ['jenis_produk_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

        <div class="invalid-feedback">

            <?php echo e($message); ?>


        </div>

    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


</div>




<div class="mb-3">

    <label>Harga Beli</label>

    <input type="number"
           name="purchase_price"
           class="form-control <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
           value="<?php echo e(old('purchase_price', $produk->harga_beli ?? '')); ?>">


    <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

        <div class="invalid-feedback">

            <?php echo e($message); ?>


        </div>

    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>




<div class="mb-3">

    <label>Harga Jual</label>

    <input type="number"
           name="selling_price"
           class="form-control <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
           value="<?php echo e(old('selling_price', $produk->harga_jual ?? '')); ?>">


    <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

        <div class="invalid-feedback">

            <?php echo e($message); ?>


        </div>

    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>




<div class="mb-3">

    <label>Stok</label>


    <input type="number"
           name="stock"
           class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
           value="<?php echo e(old('stock', $produk->stok ?? '')); ?>">


    <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

        <div class="invalid-feedback">

            <?php echo e($message); ?>


        </div>

    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


</div>




<button class="btn btn-success mt-3" type="submit">
    Simpan
</button>


<a href="<?php echo e(route('produk.index')); ?>"
   class="btn btn-secondary mt-3">

    Kembali

</a>



<script>

function previewImage(input) {

    const preview = document.getElementById('preview');

    const file = input.files[0];


    if(file){

        preview.src = URL.createObjectURL(file);

        preview.style.display = 'block';

    }

}

</script><?php /**PATH C:\laragon\www\syfaielaz09_pos1\resources\views/Produk/_form.blade.php ENDPATH**/ ?>