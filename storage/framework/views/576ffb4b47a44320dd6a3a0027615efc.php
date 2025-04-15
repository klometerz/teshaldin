

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="text-center mb-4">🎉 Checkout Berhasil</h2>
    <p class="text-center text-muted">Terima kasih telah berbelanja. Berikut ringkasan pesanan Anda:</p>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item['name']); ?></td>
                    <td><?php echo e($item['quantity']); ?></td>
                    <td>Rp <?php echo e(number_format($item['price'], 0, ',', '.')); ?></td>
                    <td>Rp <?php echo e(number_format($item['price'] * $item['quantity'], 0, ',', '.')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr class="fw-bold">
                <td colspan="3">Total</td>
                <td>Rp <?php echo e(number_format($total, 0, ',', '.')); ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\teshaldin\resources\views/cart/checkout.blade.php ENDPATH**/ ?>