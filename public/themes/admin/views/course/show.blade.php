<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="{{ route('home') }}">主页</a><span lay-separator="">/</span>
            <a><cite>{{ trans('course.name') }}详情</cite></a>
        </div>
    </div>
    <div class="main_full">
        <div class="layui-col-md12">
            {!! Theme::partial('message') !!}
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('course/'.$course->id)}}" method="post" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.description') }}</label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="description" style="width:1000px;height:240px;">
                            {!! $course->description !!}
                            </script>
                        </div>
                    </div>
                    <!--<div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('course.label.image') }}</label>
                        {!! $course->files('image')
                        ->url($course->getUploadUrl('image'))
                        ->uploader()!!}
                    </div>-->
                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans('app.date') }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="date" class="layui-input" id="date" value="{{ $course->year }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="" class="layui-input" value="{{ $course->order }}">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    {!!Form::token()!!}
                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>
{!! Theme::asset()->container('ueditor')->scripts() !!}
<script>
    var ue = getUe();
</script>
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        laydate.render({
            elem: '#date' //指定元素,
            ,type:'year'
        });
    });
</script>