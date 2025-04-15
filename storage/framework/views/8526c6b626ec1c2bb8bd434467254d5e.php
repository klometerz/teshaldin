

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">🛍️ Keranjang Belanja</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if($cart && count($cart)): ?>
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Produk</th>
                    <th width="150">Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subtotal = $item['quantity'] * $item['price'];
                        $total += $subtotal;
                    ?>
                    <tr>
                        <td>
                            <?php echo e($item['name']); ?>

                            <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST" class="d-inline ms-2" onsubmit="return confirm('Yakin hapus item ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                        <td>
                            <form action="<?php echo e(route('cart.update', $id)); ?>" method="POST" class="d-flex">
                                <?php echo csrf_field(); ?>
                                <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1" max="<?php echo e($item['stock']); ?>" class="form-control me-2">
                                <button type="submit" class="btn btn-sm btn-warning">Ubah</button>
                            </form>
                        </td>
                        <td>Rp <?php echo e(number_format($item['price'], 0, ',', '.')); ?></td>
                        <td>Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr class="fw-bold">
                    <td colspan="3" class="text-end">Total</td>
                    <td>Rp <?php echo e(number_format($total, 0, ',', '.')); ?></td>
                </tr>
            </tbody>
        </table>
        <a href="<?php echo e(route('cart.checkout')); ?>" class="btn btn-success btn-lg">✔️ Checkout Sekarang</a>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            Keranjang masih kosong. Yuk pilih produk dulu!
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\teshaldin\resources\views/cart/index.blade.php ENDPATH**/ ?>