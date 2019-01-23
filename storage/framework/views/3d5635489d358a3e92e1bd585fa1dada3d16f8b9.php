<div class="banner"><img src="<?php echo $banner; ?>" alt="" width="100%"></div>
<!-- 这是PC端的轮播图 -->
<div class="case">
    <div class="case-part case-part1">
        <div class="case-title">
            员工福利
        </div>
        <div class="case-con">
            <div class="case-top">
                <img src="<?php echo theme_asset('images/c1.png'); ?>" alt="">
                <div class="case-top-test">
                    <?php $i=1;?>
                    <?php $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $benefit_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="case-top-test<?php echo e($i); ?>">
                        <?php echo e($benefit_item['title']); ?>

                    </div>
                    <?php $i++;?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="case-bottom">
                <div class="w1200">
                    <div class="case-bottom-t">
                        <div class="case-logo">
                            <img src="<?php echo url('image/original/'.$service_case_data[1]['categories']['image']); ?>" alt="">
                        </div>
                        <div class="case-test">
                            <p>服务案例</p>
                            <span>
                                <?php $__currentLoopData = $service_case_data[1]['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $item['title']; ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </div>

                    </div>
                    <div class="case-img fb-clearfix">
                        <?php $__currentLoopData = $service_case_data[1]['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="case-img-item"><img src="<?php echo url('image/original/'.$item['image']); ?>" alt=""></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="case-part case-part2">
        <div class="case-title">
            智能售卖
        </div>
        <div class="case-con">
            <div class="case-top case-top2">
                <img src="<?php echo theme_asset('images/c2.png'); ?>" alt="">
                <div class="case-top-test">
                    <?php $i=1;?>
                    <?php $__currentLoopData = $intellects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $intellect_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="case-top-test<?php echo e($i); ?>">
                            <?php echo e($intellect_item['title']); ?>

                        </div>
                        <?php $i++;?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
            <div class="case-bottom">
                <div class="w1200">
                    <div class="case-bottom-t">
                        <div class="case-logo">
                            <img src="<?php echo url('image/original/'.$service_case_data[2]['categories']['image']); ?>" alt="">
                        </div>
                        <div class="case-test">
                            <p>服务案例</p>
                            <span>
                                <?php $__currentLoopData = $service_case_data[2]['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $item['title']; ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </div>
                    </div>
                    <div class="case-img fb-clearfix">
                        <?php $__currentLoopData = $service_case_data[2]['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="case-img-item"><img src="<?php echo url('image/original/'.$item['image']); ?>" alt=""></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="case-part case-part3">
        <div class="case-title">
            办公服务
        </div>
        <div class="case-con">
            <div class="case-top case-top3">
                <img src="<?php echo theme_asset('images/c3.png'); ?>" alt="">
                <div class="case-top-test">
                    <?php $i=1;?>
                    <?php $__currentLoopData = $office_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $office_service_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="case-top-test<?php echo e($i); ?>">
                            <?php echo e($office_service_item['title']); ?>

                        </div>
                        <?php $i++;?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="case-bottom">
                <div class="w1200">
                    <div class="case-bottom-t">
                        <div class="case-logo">
                            <img src="<?php echo url('image/original/'.$service_case_data[3]['categories']['image']); ?>" alt="">
                        </div>
                        <div class="case-test">
                            <p>服务案例</p>
                            <span>
                                <?php $__currentLoopData = $service_case_data[3]['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $item['title']; ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </div>

                    </div>
                    <div class="case-img fb-clearfix">
                        <?php $__currentLoopData = $service_case_data[3]['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="case-img-item"><img src="<?php echo url('image/original/'.$item['image']); ?>" alt=""></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="case-part case-part4">
        <div class="case-title">
            其他定制化服务
        </div>
        <div class="case-con">
            <div class="case-top case-top4">
                <img src="<?php echo theme_asset('images/c4.png'); ?>" alt="">
                <div class="case-top-test">
                    <?php $i=1;?>
                    <?php $__currentLoopData = $customized_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customized_service_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="case-top-test<?php echo e($i); ?>">
                            <?php echo e($customized_service_item['title']); ?>

                        </div>
                        <?php $i++;?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="case-bottom">
                <div class="w1200">
                    <div class="case-bottom-t">
                        <div class="case-logo">
                            <img src="<?php echo url('image/original/'.$service_case_data[4]['categories']['image']); ?>" alt="">
                        </div>
                        <div class="case-test">
                            <p>服务案例</p>
                            <span>
                                <?php $__currentLoopData = $service_case_data[4]['pages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $item['title']; ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </span>
                        </div>

                    </div>
                    <div class="case-img fb-clearfix">
                        <?php $__currentLoopData = $service_case_data[4]['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="case-img-item"><img src="<?php echo url('image/original/'.$item['image']); ?>" alt=""></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
