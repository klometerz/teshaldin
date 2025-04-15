

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4 text-center">🛒 Daftar Produk</h2>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <?php if($product->image): ?>
                        <img src="<?php echo e(asset($product->image)); ?>" class="card-img-top img-fluid" alt="<?php echo e($product->name); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($product->name); ?></h5>
                        <p class="text-success fw-bold">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></p>
                        <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-outline-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\teshaldin\resources\views/products/index.blade.php ENDPATH**/ ?>