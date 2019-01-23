<div class="main">
    <div class="banner">
        <div class="swiper-container swiper-container-banner">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <img src="<?php echo e(url('image/original/'.$banner_item['image'])); ?>" alt="">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="swiper-pagination swiper-pagination-banner"></div>
        </div>
    </div>

    <div class="part1">
        <div class="con-t">
            <h2 class="fb-delay-200ms">WHO WE ARE</h2>
            <p class="fb-delay-400ms">我们是谁</p>
        </div>
        <div class="con-p fb-delay-800ms">
            家企乐有着完善的产品及服务 <br>
            有着为多加国际著名企业提供全面配套服务经验

        </div>
        <a href="<?php echo e(route('wap.about')); ?>" class="btn fb-delay-1000ms">了解更多</a>
    </div>
    <div class="part2">
        <div class="part2-con">
            <div class="part2-title fb-delay-200ms">
                <p>我们的服务</p>
                <span>企业行政需求综合方案解决商</span>
            </div>
            <div class="part2-con-item part2-con-item1 fb-delay-400ms">
                <a href="<?php echo e(route('wap.service')); ?>"><img src="<?php echo theme_asset('images/item1.png'); ?>" alt=""></a>
                <div class="test">
                    <p>定制化服务</p>
                    <span>INTELLIGENT SELLING</span>
                </div>
            </div>
            <div class="part2-con-item part2-con-item2 fb-delay-600ms">
                <a href="<?php echo e(route('wap.service')); ?>"><img src="<?php echo theme_asset('images/item2.png'); ?>" alt=""></a>
                <div class="test">
                    <p>员工福利</p>
                    <span>EMPLOYEE WELFARE</span>
                </div>
            </div>
            <div class="part2-con-item part2-con-item3 fb-delay-800ms">
                <a href="<?php echo e(route('wap.service')); ?>"><img src="<?php echo theme_asset('images/item3.png'); ?>" alt=""></a>
                <div class="test">
                    <p>办公服务</p>
                    <span>ofdic seevice</span>
                </div>
            </div>
            <div class="part2-con-item part2-con-item4 fb-delay-1000ms">
                <a href="<?php echo e(route('wap.service')); ?>"> <img src="<?php echo theme_asset('images/item4.png'); ?>" alt=""></a>
                <div class="test">
                    <p>智能售卖</p>
                    <span>INTELLIGENT  SELLING</span>
                </div>
            </div>
        </div>
    </div>
    <div class="part3">
        <div class="part3-title fb-delay-200ms">合作伙伴</div>
        <div class="partner-con fb-clearfix fb-delay-600ms">
            <?php $__currentLoopData = app('link_repository')->getLinksByCategory('partners'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $link_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="partner-item fb-float-left"><img src="<?php echo e(url('image/original/'.$link_item['image'])); ?>" alt=""></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="part4 contact" id="contact">
        <form action="" onSubmit="return postForm()">
            <div class="contact-title fb-delay-200ms">联系我们</div>
            <div class="input-b fb-delay-400ms">
                <label for="">公司</label>
                <input type="text" name="company" />
            </div>
            <div class="input-b fb-delay-400ms">
                <label for="">姓名</label>
                <input type="text" name="name" />
            </div>
            <div class="input-b fb-delay-400ms">
                <label for="">电话</label>
                <input type="text" name="tell"/>
            </div>
            <div class="input-b fb-delay-400ms">
                <label for="">内容</label>
                <textarea  id="" cols="30" rows="10"  name="content"></textarea>
            </div>
            <div class="input-s fb-delay-600ms">
                <input type="submit" value="提交"/>
            </div>
        </form>
    </div>
    <div class="message">
        <div class="message-con">请完善信息后提交</div>
    </div>



</div>
<script>
    $(function(){
        var mySwiper = new Swiper ('.swiper-container-banner', {
            loop: true,
            autoplay:3000,
            autoHeight:true,
            autoplayDisableOnInteraction : false,
            // 如果需要分页器
            pagination: '.swiper-pagination-banner',
        })
        $(window).scroll(function(){
            scrollAnimate()
        })
        scrollAnimate()
        function scrollAnimate(){
            var h = parseFloat($(window).height());
            var st = parseFloat($(window).scrollTop());
            var t1 = parseFloat($(".part1").offset().top)+200;
            var t2 = parseFloat($(".part2").offset().top)+200;
            var t3 = parseFloat($(".part3").offset().top)+200;
            var t4 = parseFloat($(".part4").offset().top)+200;

            if(h+st > t1){
                $(".con-t h2").css("opacity",1).addClass("gdownIn")
                $(".con-t p").css("opacity",1).addClass("gdownIn")
                $(".con-p").css("opacity",1).addClass("gdownIn")
                $(".part1 .btn").css("opacity",1).addClass("gdownIn")
            }
            if(h+st > t2){
                $(".part2-title").css("opacity",1).css("opacity",1).addClass("gdownIn")
                $(".part2-con-item").css("opacity",1).addClass("gdownIn")
            }

            if(h+st > t3){
                $(".part3-title").css("opacity",1).addClass("gdownIn")
                $(".partner-con ").css("opacity",1).addClass("gdownIn")
            }
            if(h+st > t4){
                $(".contact-title,.input-b,.input-s").css("opacity",1).addClass("gdownIn")

            }
        }
    })
</script>