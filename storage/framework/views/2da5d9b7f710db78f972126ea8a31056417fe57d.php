<div class="header">
    <div class="header_b fb-position-relative">
        <div class="logo fb-float-left">
            <a href="<?php echo e(route('pc.home')); ?>">
                <img alt="" src="<?php echo logo(); ?>">
            </a>
        </div>
        <div class="nav fb-float-right">
            <?php echo Theme::widget('nav',['slug' => 'pc'])->render(); ?>

        </div>
    </div>
</div>