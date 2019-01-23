<div class="main">
    <div class="p-banner">
        <img src="<?php echo $banner; ?>" alt="">
    </div>
    <div class="aboutPart1">
        <div class="title fb-delay-200ms">公司介绍</div>
        <div class="aboutPart1-con fb-delay-400ms">
            <?php echo $company['content']; ?>

        </div>
    </div>
    <div class="aboutPart2 fb-delay-200ms">
        <img src="<?php echo theme_asset('images/aboutImg.png'); ?>" alt="">
    </div>
    <div class="aboutPart3">
        <div class="title fb-delay-200ms">我们的优势</div>
        <div class="about-part3-con fb-delay-400ms fb-clearfix">
            <div class="about-part3-item about-part3-item1">
                <p>自由配送体系有着强有力的运营团队</p>
                <div class="about-part3-border">1</div>
            </div>
            <div class="about-part3-item about-part3-item2">
                <p>与深圳知名设计公司有着长期的战略合作</p>
                <div class="about-part3-border">2</div>

            </div>
            <div class="about-part3-item about-part3-item3">
                <p>众多大型企业期，系统服务的案例和经验</p>
                <div class="about-part3-border">4</div>
            </div>
            <div class="about-part3-item about-part3-item4">
                <p>上千平米无尘<br>加工车间<br>
                    自有冷库<br>
                    安全规范化加工</p>
                <div class="about-part3-border">3</div>
            </div>
            <div class="about-part3-item about-part3-item5">
                <p>强供应链，企业行政综合服务全供应链支持，能同时供应面上绝大多数的零食、饮料、办公用品</p>
                <div class="about-part3-border">5</div>
            </div>
            <div class="about-part3-item about-part3-item6">
                <p>作为各大一线品牌生产厂家直接直接特通经销商，保质保量</p>
                <div class="about-part3-border">6</div>
            </div>
        </div>
    </div>
    <div class="aboutPart4">
        <div class="title fb-delay-200ms">公司历程</div>
        <div class="about-lc  fb-delay-400ms">
            <?php $i=1;?>
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="about-lc-item  <?php if($courses->count() == $i): ?> last <?php endif; ?>">
                    <div class="date"><?php echo e($course_item->year); ?></div>
                    <div class="con"> <?php echo $course_item->description; ?></div>
                </div>
                <?php $i++;?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
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
            var t1 = parseFloat($(".aboutPart1").offset().top)+200;
            var t2 = parseFloat($(".aboutPart2").offset().top)+200;
            var t3 = parseFloat($(".aboutPart3").offset().top)+200;
            var t4 = parseFloat($(".aboutPart4").offset().top)+200;

            $(".p-banner").addClass("gfadeIn")
            if(h+st > t1){
                $(".aboutPart1 .title").css("opacity",1).addClass("gdownIn")
                $(".aboutPart1-con").css("opacity",1).addClass("gdownIn")
            }
            if(h+st > t2){
                $(".aboutPart2").css("opacity",1).addClass("gfadeIn")
            }

            if(h+st > t3){
                $(".aboutPart3 .title").css("opacity",1).addClass("gdownIn")
                $(".about-part3-con").css("opacity",1).addClass("gdownIn")
            }
            if(h+st > t4){
                $(".aboutPart4 .title").css("opacity",1).addClass("gdownIn")
                $(".about-lc").css("opacity",1).addClass("gdownIn")

            }
        }
    })
</script>