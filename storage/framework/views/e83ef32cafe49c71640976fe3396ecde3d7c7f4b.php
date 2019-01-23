<?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="nav-item <?php echo e(active_class($item->active)); ?>">
        <a href="<?php echo e($item->url); ?>" <?php if($item->url == "/#contact"): ?>  onclick="$('.nav').slideUp(200)" <?php endif; ?> ><?php echo e($item->name); ?></a>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
