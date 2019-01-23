<div class="footer">
    <div class="w1200 fb-clearfix">
        <div class="f-left">
            <div class="flogo"><img src="<?php echo theme_asset('images/flogo.jpg'); ?>" alt=""></div>
            <p><?php echo e(setting('company_name')); ?></p>
            <span> <?php echo e(setting('company_name_en')); ?></span>
        </div>
        <div class="f-right">
            <div class="f-nav">
                <?php $top_navs = app('nav_repository')->navs('pc');?>
                <?php $__currentLoopData = $top_navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $nav_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($nav_item['url']); ?>"><?php echo e($nav_item['name']); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="copy"><?php echo e(setting('copyright')); ?></div>
        </div>
    </div>
</div>