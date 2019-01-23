<div class="banner"><img src="<?php echo $banner; ?>" alt="" width="100%"></div>
<div class="about-part1">
    <div class="about-title">
        公司介绍
    </div>
    <div class="about-con fb-delay-200ms">
        <?php echo $company['content']; ?>

    </div>
</div>
<div class="about-part2 " style="background: url(<?php echo url('image/original/'.$about_image); ?>) no-repeat center /1920px auto">

</div>
<div class="about-part3">
    <div class="about-title">
        我们的优势
    </div>
    <div class="about-part3-con fb-delay-200ms">
        <div class="about-part3-item about-part3-item1">
            <p>自由配送体系有着强有力的运营团队</p>
            <div class="about-part3-border">1</div>
        </div>
        <div class="about-part3-item about-part3-item2">
            <p>与深圳知名设计公司有着长期的战略合作</p>
            <div class="about-part3-border">2</div>

        </div>
        <div class="about-part3-item about-part3-item3">
            <p>上千平米无尘加工车间<br>
                自有冷库<br>
                安全规范化加工</p>
            <div class="about-part3-border">3</div>
        </div>
        <div class="about-part3-item about-part3-item4">
            <p>作为各大一线品牌生产厂家直接直接特通经销商，保质保量</p>
            <div class="about-part3-border">6</div>
        </div>
        <div class="about-part3-item about-part3-item5">
            <p>强供应链，企业行政综合服务全供应链支持，能同时供应面上绝大多数的零食、饮料、办公用品</p>
            <div class="about-part3-border">5</div>
        </div>
        <div class="about-part3-item about-part3-item6">
            <p>众多大型企业长期，系统服务的案例和经验</p>
            <div class="about-part3-border">4</div>
        </div>




    </div>
</div>
<div class="about-part4">
    <div class="about-title">公司历程</div>
    <div class="about-lc w1200 fb-delay-200ms">
        <?php $i=1;?>
        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="about-lc-item <?php if($courses->count() == $i): ?> last <?php endif; ?>">
            <div class="date"><?php echo e($course_item->year); ?></div>
            <div class="con"> <?php echo $course_item->description; ?> </div>
        </div>
        <?php $i++;?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<script>
    $(window).scroll(function(){
        scrollAnimate()
    })
    scrollAnimate()
    function scrollAnimate(){
        var h = parseFloat($(window).height());
        var st = parseFloat($(window).scrollTop());
        var t1 = parseFloat($(".about-part1").offset().top)+200;
        var t2 = parseFloat($(".about-part2").offset().top)+200;
        var t3 = parseFloat($(".about-part3").offset().top)+200;
        var t4 = parseFloat($(".about-part4").offset().top)+200;

        if(h+st > t1){
            $(".about-part1 .about-title").addClass("gdownIn")
            $(".about-part1 .about-con").addClass("gdownIn")
        }
        if(h+st > t2){
            $(".about-part2").css("opacity",1).addClass("gfadeIn")
        }

        if(h+st > t3){
            $(".about-part3 .about-title").css("opacity",1).addClass("gdownIn")
            $(".about-part3 .about-part3-con").addClass("gdownIn")
        }
        if(h+st > t4){
            $(".about-part4 .about-title").css("opacity",1).addClass("gdownIn")
            $(".about-part4 .about-lc").addClass("gdownIn")
        }
    }


    function isEmpty(obj){
        if(typeof obj == "undefined" || obj == null || obj == ""){
            return true;
        }else{
            return false;
        }
    }
</script>
