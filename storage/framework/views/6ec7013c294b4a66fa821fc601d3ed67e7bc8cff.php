<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="﻿<?php echo e(route('home')); ?>">主页</a><span lay-separator="">/</span>
            <a><cite>员工福利管理</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    
                    <button class="layui-btn layui-btn-warm " data-type="ajax_add" data-events="ajax_add">添加员工福利</button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">删除</button>
                </div>
                <div class="layui-inline">
                    <input class="layui-input search_key" name="title" id="demoReload" placeholder="搜索标题" autocomplete="off">
                </div>
                <button class="layui-btn" data-type="reload">搜索</button>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>

<script>
    var main_url = "<?php echo e(guard_url('benefit')); ?>";
    var delete_all_url = "<?php echo e(guard_url('benefit/destroyAll')); ?>";
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'title',title:'标题',edit:'title'}
                ,{field:'order',title:'排序',edit:'title', width:200}
                ,{field:'score',title:'操作', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 10
            ,height: 'full-200'
        });

        //监听锁定
        form.on('switch(lock)', function(obj){
            $.post("<?php echo e(guard_url('benefit/updateRecommend')); ?>",{"id":this.value,"home_recommend":obj.elem.checked,'_token':"<?php echo csrf_token(); ?>" },function(){

            })
            // layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
        });

    });
</script>
<?php echo Theme::partial('common_handle_js'); ?>