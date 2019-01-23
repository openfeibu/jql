<div class="swiper-container swiper-container-home">
    <div class="swiper-wrapper swiper-no-swiping">
        <div class="swiper-slide">
            <!-- 这是PC端的轮播图 -->
            <div class="swiper-container swiper-container-v swiper-container-pc">
                <div class="swiper-wrapper">
                    @foreach($banners as $key => $banner_item)
                        <div class="swiper-slide"><div class="imgItem" style="background: url({{ url('image/original/'.$banner_item['image']) }}) no-repeat center/cover"></div></div>
                    @endforeach
                </div>
                <!-- <div class="swiper-pagination swiper-pagination-v"></div> -->
                <div class="swiper-button-prev swiper-button-prev-v"></div>
                <div class="swiper-button-next swiper-button-next-v"></div>
            </div>
            <!-- 这是PC端的轮播图 -->
        </div>
        <div class="swiper-slide swiper-slide2" >
            <div class="w1200">
                <div class="part1-con">
                    <div class="con-t">
                        <h2 class="fb-delay-200ms">WHO WE ARE</h2>
                        <p class="fb-delay-400ms">我们是谁？</p>
                    </div>
                    <div class="line fb-delay-600ms"></div>
                    <div class="con-p fb-delay-800ms">
                        <span>家企乐</span>有着完善的产品及服务供应链 <br>
                        有着为多加国际著名企业提供全面配套服务经验
                    </div>
                    <a href="{{ route('wap.about') }}" class="btn fb-delay-1000ms">了解更多</a>
                </div>
            </div>
        </div>
        <div class="swiper-slide swiper-slide3">
            <div class="part3">
                <div class="part3-title fb-delay-200ms">
                    <p>我们的服务</p>
                    <span>企业行政需求综合方案解决商</span>
                </div>
                <div class="part3-con fb-position-relative">
                    <div class="part3-item part3-item1 fb-position-absolute">
                        <div class="part3-item-img  fb-delay-200ms"><a href="{{ route('wap.service') }}"></a></div>
                        <div class="part3-item-test  fb-delay-400ms">
                            <div class="t">员工福利</div>
                            <div class="span">EMPLOYEE WELFARE</div>
                            <dl>
                                <dd>下午茶及加班茶点</dd>
                                <dd>企业服务站</dd>
                                <dd>节日定制化福利</dd>
                                <dd>生日会及团建活动策划</dd>
                                <dd>员工团购，微商及点餐平台</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="part3-item part3-item2 fb-position-absolute">
                        <div class="part3-item-img  fb-delay-400ms"><a href="{{ route('wap.service') }}"></a></div>
                        <div class="part3-item-test  fb-delay-600ms">
                            <div class="t">办公服务</div>
                            <div class="span">OFFICE SERVICE</div>
                            <dl>
                                <dd>办公用品</dd>
                                <dd>企业用水</dd>
                                <dd>商务礼品定制</dd>
                                <dd>会议策划及商务茶歇</dd>
                                <dd>绿植租凭服务</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="part3-item part3-item3 fb-position-absolute">
                        <div class="part3-item-img  fb-delay-600ms"><a href="{{ route('wap.service') }}"></a></div>
                        <div class="part3-item-test  fb-delay-800ms">
                            <div class="t">智能售卖业务</div>
                            <div class="span">INTELLIGENT SELLING</div>
                            <dl>
                                <dd>智能售货机</dd>
                                <dd>企业内无人超市及无人货架</dd>
                                <dd>自助鲜榨果汁机</dd>
                                <dd>全自动咖啡机</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="part3-item part3-item4 fb-position-absolute">
                        <div class="part3-item-img fb-delay-800ms"><a href="{{ route('wap.service') }}"></a></div>
                        <div class="part3-item-test fb-delay-1000ms">
                            <div class="t">其他定制化服务</div>
                            <div class="span">OFFICE SERVICE</div>
                            <dl>
                                <dd>可根据需求定制在我们现有的业务链条
                                    和您的需求之间
                                    寻求最佳值</dd>

                            </dl>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="swiper-slide swiper-slide4" >
            <div class="partner w1200">
                <div class="partner-title fb-delay-400ms">合作伙伴</div>
                <div class="partner-con fb-clearfix fb-delay-600ms">
                    @foreach(app('link_repository')->getLinksByCategory('partners') as $key => $link_item)
                        <div class="partner-item fb-float-left"><img src="{{ url('image/original/'.$link_item['image']) }}" alt="{{ $link_item['name'] }}"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="swiper-slide swiper-slide5" >
            <div class="contact " id="contact ">
                <div class="contact-con w1200">
                    <div class="contact-left">
                        <div class="contact-logo"><img src="{!!theme_asset('images/logo2.png')!!}" alt=""></div>
                        <dl>
                            <dd>地址：{{ setting('address') }}</dd>
                            <dd>电话：{{ setting('tel') }}</dd>
                            <dd>QQ：{{ setting('qq') }}</dd>
                            <dd>Http: {{ setting('http') }}</dd>
                        </dl>
                        <div class="copy">
                            {{ setting('company_name') }} <br>
                            {{ setting('copyright') }}
                        </div>
                    </div>
                    <div class="contact-right">
                        <form action="" onSubmit="return postForm()">
                            <div class="contact-title">联系我们</div>
                            <div class="input-b">
                                <label for="">公司</label>
                                <input type="text" name="company" />
                            </div>
                            <div class="input-b">
                                <label for="">姓名</label>
                                <input type="text" name="name" />
                            </div>
                            <div class="input-b">
                                <label for="">电话</label>
                                <input type="text" name="tell"/>
                            </div>
                            <div class="input-b">
                                <label for="">内容</label>
                                <textarea  id="" cols="30" rows="10"  name="content"></textarea>
                            </div>
                            <div class="input-s">
                                <input type="submit" value="提交"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="allmap"></div>
            </div>

        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination-home"></div>
</div>
<div class="message">
    <div class="message-con">请完善信息后提交</div>
</div>
<script>
    if(window.location.hash.replace("#/",'') == 'contact'){
        setTimeout(function(){
            swiper.slideTo(swiper.slides.length);
            window.location.hash = ''
        },100)

    }
    $("#contact").on("click",function(){
        //跳转
        swiper.slideTo(swiper.slides.length)
        window.location.hash = ''
    })


    $(".contact ").css("padding-bottom",$(window).height()*0.3);
    $(window).resize(function(){
        $(".contact ").css("padding-bottom",$(window).height()*0.3);

    })
    var swiper = new Swiper('.swiper-container-home', {
        pagination: '.swiper-pagination-home',
        paginationClickable: true,
        direction: 'vertical',
        slidesPerView :'auto',
        mousewheelControl : true,
        speed:800,
        onSlideChangeStart: function(swiper){
            var count = swiper.slides.length;
            var nIndex = swiper.activeIndex;
            if(nIndex == 0){
                $(".header").fadeIn(200)
            }else if(nIndex == 1){
                $(".part1-con .con-t h2,.part1-con .con-t p,.part1-con .line,.part1-con .con-p,.part1-con .btn").addClass("grightIn")
                $(".header").fadeIn(200)
            }else if(nIndex == 2){
                $(".part3-title").addClass("gdownIn")
                $(".part3-item .part3-item-img,.part3-item .part3-item-test").addClass("grightIn")
                $(".header").fadeIn(200)
            }else if(nIndex == 3){
                $(".partner-title,.partner-con").addClass("gdownIn")
                $(".header").fadeIn(200)
            }else if(nIndex == 4){
                $(".contact-left").addClass("grightIn")
                $(".contact-right").addClass("grightIn")
                $(".header").fadeOut(200)
            }
            // console.log(swiper.activeIndex,swiper.slides.length,swiper.currentSlidesPerView()) //切换结束时，告诉我现在是第几个slide
        }
    });
    var swiper2 = new Swiper('.swiper-container-pc', {
        pagination: '.swiper-pagination-v',
        paginationClickable: true,
        nextButton: '.swiper-button-next-v',
        prevButton: '.swiper-button-prev-v',
        speed:800,
        autoplay:3000
    });
    $(".part3-item-img").hover(function(){
        $(this).parents(".part3-item").find(".part3-item-test dl").animate({"opacity":1},500)
    },function(){
        $(this).parents(".part3-item").find(".part3-item-test dl").animate({"opacity":0},500)

    })

    $(".newsBox .news-item").hover(function(){
        $(this).find(".img").removeClass("gray")
    },function(){
        $(this).find(".img").addClass("gray")

    })
    $(".goTop").on("click",function(){
        swiper.slideTo(0, 1000, false);//切换到第一个slide，速度为1秒
    })
    // 百度地图API功能
    var map = new BMap.Map("allmap");
    var point = new BMap.Point('{{ setting('longitude') }}', '{{ setting('latitude') }}');
    map.centerAndZoom(point, 14);
    var marker = new BMap.Marker(point);  // 创建标注
    map.addOverlay(marker);               // 将标注添加到地图中
    marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
    // map.enableScrollWheelZoom(false);     //开启鼠标滚轮缩放
    function postForm(){
        var company = $("[name='company']").val();
        var name = $("[name='name']").val();
        var tell = $("[name='tell']").val();
        var content = $("[name='content']").val();
        console.log(isEmpty(company),isEmpty(name) ,isEmpty(tell) ,isEmpty(content))
        if(isEmpty(company) || isEmpty(name) || isEmpty(tell) || isEmpty(content) ){
            $(".message").fadeIn(200).find(".message-con").text("请完善信息后提交")
        }else{
            $.ajax({
                url : "{{ route('pc.message.store') }}",
                data : {'_token':"{!! csrf_token() !!}","company":company,"name":name,"tel":tell,"content":content},
                type : 'post',
                dataType : "json",
                async:false,
                success : function (data) {
                    $(".message").fadeIn(200).find(".message-con").text(data.msg)
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message =  responseText.msg;
                    if(!message)
                    {
                        message = '服务器错误';
                    }
                    $(".message").fadeIn(200).find(".message-con").text(message)
                }
            });
        }
        setTimeout(function(){
            $(".message").fadeOut(200)
        },1500);

        return false;
    }
    function isEmpty(obj){
        if(typeof obj == "undefined" || obj == null || obj == ""){
            return true;
        }else{
            return false;
        }
    }
</script>