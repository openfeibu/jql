<div class="banner"><img src="<?php echo $banner; ?>" alt="" width="100%"></div>

    <!-- 这是PC端的轮播图 -->
    <div class="join w1200">
        <div class="join-title">
            <p>人才招聘</p>
            <span>JOBS AND CAREERS AT JIAQILE</span>
        </div>
        <div class="join-btn">
            <a href="#">招聘简历范本下载</a>
            <p>下载表格后，请按范本填写简历，电邮至 <span>hr@jiaqile.cn </span>  我们将尽快回复。</p>
        </div>
        <div class="jion-con">

            <?php $__currentLoopData = $recruit_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $recruit_list_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($recruit_list_item['recruits'])): ?>
                <div class="jion-list">
                    <div class="jion-list-t"><?php echo e($recruit_list_item['category']['name']); ?></div>
                    <?php $__currentLoopData = $recruit_list_item['recruits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recruit_key => $recruit_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="join-item">
                        <div class="join-item-t"><?php echo e($recruit_item['title']); ?></div>
                        <div class="join-item-n">
                            <span>招聘岗位：<?php echo e($recruit_item['post']); ?></span>
                            <span>汇报对象：<?php echo e($recruit_item['reports_to']); ?></span>
                        </div>
                        <dl>
                            <dt>岗位职责：</dt>
                            <?php echo $recruit_item['duty']; ?>

                        </dl>
                        <dl>
                            <dt>任职要求：</dt>
                            <?php echo $recruit_item['requirement']; ?>

                        </dl>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <div class="jion-list2">
                    <div class="jion-list-t"><?php echo e($recruit_list_item['category']['name']); ?></div>
                    <div class="jion-list-con"><?php echo e(date('Y')); ?>，拭目以待......</div>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
