<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="format-detection" content="telephone=no" />
    <title>
        {{ setting('station_name') }} {!! Theme::getTitle() !!}
    </title>
    {!! Theme::asset()->styles() !!}
    {!! Theme::asset()->scripts() !!}
    <script type="text/javascript"
            src="http://api.map.baidu.com/api?v=2.0&ak=5jCnjnCesElvVDufg6yjGMrlYimVXk5f"></script>
</head>
<body  ontouchstart >
{!! Theme::partial('header') !!}
{!! Theme::partial('nav') !!}
{!! Theme::content() !!}
{!! Theme::partial('footer') !!}

</body>

</html>