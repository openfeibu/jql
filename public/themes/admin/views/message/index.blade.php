<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="﻿{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>留言信息管理</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">删除</button>
                </div>
                {{--<div class="layui-inline">--}}
                    {{--<input class="layui-input search_key" name="company" id="demoReload" placeholder="搜索" autocomplete="off">--}}
                {{--</div>--}}
                {{--<button class="layui-btn" data-type="reload">搜索</button>--}}
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table" lay-size="lg">

            </table>
        </div>
    </div>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>
<script type="text/html" id="imageTEM">
    <img src="@{{d.image}}" alt="" height="28">
</script>

<script>
    var main_url = "{{guard_url('message')}}";
    var delete_all_url = "{{guard_url('message/destroyAll')}}";
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
                ,{field:'company',title:'公司'}
                ,{field:'name',title:'姓名'}
                ,{field:'tel',title:'电话'}
                ,{field:'content',title:'留言内容',minWidth:200}
                ,{field:'ip',title:'IP'}
                ,{field:'score',title:'操作', width:100, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 10
            ,height: 'full-200'
        });

        //监听锁定
        form.on('switch(lock)', function(obj){
            $.post("{{guard_url('news/updateRecommend')}}",{"id":this.value,"home_recommend":obj.elem.checked,'_token':"{!! csrf_token() !!}" },function(){

            })
            // layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
        });

    });
</script>
{!! Theme::partial('common_handle_js') !!}