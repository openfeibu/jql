<?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="nav_item fb-float-left fb-position-relative <?php echo e(active_class($item->active)); ?>">
    <a href="<?php echo e($item->url); ?>" <?php if($item->url == "/#/contact"): ?> id="contact" <?php endif; ?>>
        <?php echo e($item->name); ?>

    </a>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
