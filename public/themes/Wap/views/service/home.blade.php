<div class="main">
    <div class="p-banner">
        <img src="{!! $banner !!}" alt="">
    </div>
    {!! page('service-wap','content') !!}

</div>
<script>
    $(function(){
        var mySwiper = new Swiper ('.swiper-container-case', {
            loop: true,
            autoplay:3000,

            autoplayDisableOnInteraction : false,
            // 如果需要分页器
            pagination: '.swiper-pagination-case',
        })
    })

</script>