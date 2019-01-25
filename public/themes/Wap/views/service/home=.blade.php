<div class="main">
    <div class="p-banner">
        <img src="{!! $banner !!}" alt="">
    </div>
    <div class="case">
        <div class="case-part case-part1">
            <div class="case-title">
                员工福利
            </div>
            <div class="case-con">
                <div class="case-top">
                    <img src="{!!theme_asset('images/c1.png')!!}" alt="">
                    <div class="case-top-test">
                        <?php $i=1;?>
                        @foreach($benefits as $key => $benefit_item)
                            <div class="case-top-test{{ $i }}">
                                {{ $benefit_item['title'] }}
                            </div>
                            <?php $i++;?>
                        @endforeach
                    </div>
                </div>
                <div class="case-bottom">
                    <div class="w1200">
                        <div class="case-bottom-t">
                            <div class="case-logo">
                                <img src="{!! url('image/original/'.$service_case_data[1]['categories']['image']) !!}" alt="">
                            </div>
                            <div class="case-test">
                                <p>服务案例</p>
                                <span>
                                    @foreach($service_case_data[1]['pages'] as $key => $item)
                                        {!! $item['title'] !!}<br>
                                    @endforeach
                                </span>
                            </div>

                        </div>
                        <div class="case-img fb-clearfix">
                            <div class="swiper-container swiper-container-case">
                                <div class="swiper-wrapper">
                                    @foreach($service_case_data[1]['images'] as $key => $item)
                                        <div class="swiper-slide" style="background: url({!! url('image/original/'.$item['image']) !!}) no-repeat center/100% auto"></div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination swiper-pagination-case"></div>
                            </div>

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
                    <img src="{!!theme_asset('images/c2.png')!!}" alt="">
                    <div class="case-top-test">
                        <?php $i=1;?>
                        @foreach($intellects as $key => $intellect_item)
                            <div class="case-top-test{{ $i }}">
                                {{ $intellect_item['title'] }}
                            </div>
                            <?php $i++;?>
                        @endforeach
                    </div>
                </div>
                <div class="case-bottom">
                    <div class="w1200">
                        <div class="case-bottom-t">
                            <div class="case-logo">
                                <img src="{!! url('image/original/'.$service_case_data[2]['categories']['image']) !!}" alt="">
                            </div>
                            <div class="case-test">
                                <p>服务案例</p>
                                <span>
                                    @foreach($service_case_data[2]['pages'] as $key => $item)
                                        {!! $item['title'] !!}<br>
                                    @endforeach
                                </span>
                            </div>

                        </div>
                        <div class="case-img fb-clearfix">
                            <div class="swiper-container swiper-container-case">
                                <div class="swiper-wrapper">
                                    @foreach($service_case_data[2]['images'] as $key => $item)
                                        <div class="swiper-slide" style="background: url({!! url('image/original/'.$item['image']) !!}) no-repeat center/100% auto"></div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination swiper-pagination-case"></div>
                            </div>
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
                    <img src="{!!theme_asset('images/c3.png')!!}" alt="">
                    <div class="case-top-test">
                        <?php $i=1;?>
                        @foreach($office_services as $key => $office_service_item)
                            <div class="case-top-test{{ $i }}">
                                {{ $office_service_item['title'] }}
                            </div>
                            <?php $i++;?>
                        @endforeach
                    </div>
                </div>
                <div class="case-bottom">
                    <div class="w1200">
                        <div class="case-bottom-t">
                            <div class="case-logo">
                                <img src="{!! url('image/original/'.$service_case_data[3]['categories']['image']) !!}" alt="">
                            </div>
                            <div class="case-test">
                                <p>服务案例</p>
                                <span>
                                    @foreach($service_case_data[3]['pages'] as $key => $item)
                                        {!! $item['title'] !!}<br>
                                    @endforeach
                                </span>
                            </div>

                        </div>
                        <div class="case-img fb-clearfix">
                            <div class="swiper-container swiper-container-case">
                                <div class="swiper-wrapper">
                                    @foreach($service_case_data[3]['images'] as $key => $item)
                                        <div class="swiper-slide" style="background: url({!! url('image/original/'.$item['image']) !!}) no-repeat center/100% auto"></div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination swiper-pagination-case"></div>
                            </div>
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
                    <img src="{!!theme_asset('images/c4.png')!!}" alt="">
                    <div class="case-top-test">
                        <?php $i=1;?>
                        @foreach($customized_services as $key => $customized_service_item)
                            <div class="case-top-test{{ $i }}">
                                {{ $customized_service_item['title'] }}
                            </div>
                            <?php $i++;?>
                        @endforeach
                    </div>
                </div>
                <div class="case-bottom">
                    <div class="w1200">
                        <div class="case-bottom-t">
                            <div class="case-logo">
                                <img src="{!! url('image/original/'.$service_case_data[4]['categories']['image']) !!}" alt="">
                            </div>
                            <div class="case-test">
                                <p>服务案例</p>
                                <span>
                                    @foreach($service_case_data[4]['pages'] as $key => $item)
                                        {!! $item['title'] !!}<br>
                                    @endforeach
                                </span>
                            </div>

                        </div>
                        <div class="case-img fb-clearfix">
                            <div class="swiper-container swiper-container-case">
                                <div class="swiper-wrapper">
                                    @foreach($service_case_data[4]['images'] as $key => $item)
                                        <div class="swiper-slide" style="background: url({!! url('image/original/'.$item['image']) !!}) no-repeat center/100% auto"></div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination swiper-pagination-case"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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