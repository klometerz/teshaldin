

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Riwayat Transaksi</h2>

    <?php if($transactions->count()): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Waktu</th>
                    <th>Total</th>
                    <th>Detail Item</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($trx->id); ?></td>
                        <td><?php echo e($trx->created_at->format('d M Y - H:i')); ?></td>
                        <td>Rp <?php echo e(number_format($trx->total, 0, ',', '.')); ?></td>
                        <td>
                            <ul>
                                <?php $__currentLoopData = json_decode($trx->items, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($item['name']); ?> x <?php echo e($item['quantity']); ?> (@ Rp<?php echo e(number_format($item['price'], 0, ',', '.')); ?>)</li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Belum ada transaksi.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\teshaldin\resources\views/transactions/index.blade.php ENDPATH**/ ?>