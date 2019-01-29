<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="﻿{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>系统设置</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('setting/updateCompany')}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">站点名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="station_name" lay-verify="station_name" autocomplete="off" placeholder="请输入站点名称" class="layui-input" value="{{$setting['station_name']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">Logo</label>
                        {!! $setting_logo->files('value')->field('logo')
                        ->url($setting_logo->getUploadUrl('value'))
                        ->uploader()!!}
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">邮箱(接受留言)</label>
                        <div class="layui-input-inline">
                            <input type="text" name="email" lay-verify="email" autocomplete="off" placeholder="请输入邮箱" class="layui-input" value="{{$setting['email']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">版权声明</label>
                        <div class="layui-input-inline">
                            <input type="text" name="copyright" lay-verify="copyright" autocomplete="off" placeholder="请输入版权声明" class="layui-input" value="{{$setting['copyright']}}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">简历模板下载链接</label>
                        <div class="layui-input-inline">
                            <input type="text" name="resume_url" lay-verify="email" autocomplete="off" placeholder="请输入链接" class="layui-input" value="{{$setting['resume_url']}}">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>


    layui.use(['jquery','element','form','table','upload'], function(){
        var form = layui.form;
        var $ = layui.$;
        //监听提交
        form.on('submit(demo1)', function(data){
            data = JSON.stringify(data.field);
            data = JSON.parse(data);
            data['_token'] = "{!! csrf_token() !!}";
            var load = layer.load();
            $.ajax({
                url : "{{guard_url('setting/updateSetting')}}",
                data :  data,
                type : 'POST',
                success : function (data) {
                    layer.close(load);
                    layer.msg('更新成功');
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    layer.close(load);
                    layer.msg('服务器出错');
                }
            });
            return false;
        });

    });
</script>