

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-3"><?php echo e($product->name); ?></h2>

    <?php if($product->image): ?>
        <img src="<?php echo e(asset($product->image)); ?>" width="400" class="img-fluid mb-3 rounded shadow-sm">
    <?php endif; ?>

    <p class="lead"><?php echo e($product->description); ?></p>
    <p><strong class="text-success">Harga:</strong> Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
    <p><strong>Stok:</strong> <?php echo e($product->stock); ?></p>

    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST" class="mt-3">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-success btn-lg" <?php echo e($product->stock < 1 ? 'disabled' : ''); ?>>
            ➕ Tambah ke Keranjang
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\teshaldin\resources\views/products/show.blade.php ENDPATH**/ ?>