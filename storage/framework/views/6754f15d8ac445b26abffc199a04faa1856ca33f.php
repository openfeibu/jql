<div class="footer">
    <div class="footer-b">
        <div class="f-logo"><img src="<?php echo theme_asset('images/flogo.jpg'); ?>" alt=""></div>
        <div class="info">
            <p><?php echo e(setting('company_name')); ?></p>
            <p> <?php echo e(setting('address')); ?></p>
            <p>TEL：<?php echo e(setting('tel')); ?></p>
            <p> QQ：<?php echo e(setting('qq')); ?></p>
            <p> <?php echo e(setting('http')); ?></p>
        </div>
        <div class="copy">
            <?php echo e(setting('company_name')); ?> <br>
            <?php echo e(setting('copyright')); ?>

        </div>
    </div>
    <div id="allmap"></div>
</div>

<script>
    // 百度地图API功能
    var map = new BMap.Map("allmap");
    var point = new BMap.Point('<?php echo e(setting('longitude')); ?>', '<?php echo e(setting('latitude')); ?>');
    map.centerAndZoom(point, 14);
    var marker = new BMap.Marker(point);  // 创建标注
    map.addOverlay(marker);               // 将标注添加到地图中
    setTimeout(function(){
        map.panTo(new BMap.Point('<?php echo e(setting('longitude')); ?>', '<?php echo e(setting('latitude')); ?>'));
    },100)

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
                url : "<?php echo e(route('pc.message.store')); ?>",
                data : {'_token':"<?php echo csrf_token(); ?>","company":company,"name":name,"tel":tell,"content":content},
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
        },1500)
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
