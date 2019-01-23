<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,minimal-ui" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="default" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <!-- uc强制竖屏 -->
    <meta content="portrait" name="screen-orientation"/>
    <!-- UC应用模式 -->
    <meta content="application" name="browsermode"/>
    <!-- QQ强制竖屏 -->
    <meta content="portrait" name="x5-orientation"/>
    <!-- QQ应用模式 -->
    <meta content="app" name="x5-page-mode"/>
    <!-- UC禁止放大字体 -->
    <meta content="no" name="wap-font-scale"/>
    <title>
        {{ setting('station_name') }} {!! Theme::getTitle() !!}
    </title>
    <link href="homeIcon.ico" rel="shortcut icon" type="image/x-icon"/>
    {!! Theme::asset()->styles() !!}
    {!! Theme::asset()->scripts() !!}
    <!--[if lt IE 9]>
    {!! Theme::asset()->container('ie9')->scripts() !!}
    <![endif]-->
    <script type="text/javascript"
            src="http://api.map.baidu.com/api?v=2.0&ak=5jCnjnCesElvVDufg6yjGMrlYimVXk5f"></script>
</head>
<body>
{!! Theme::partial('header') !!}
<div class="main">
    <!-- 这是PC端的轮播图 -->
    {!! Theme::content() !!}
</div>
{!! Theme::partial('footer') !!}
</body>
</html>
