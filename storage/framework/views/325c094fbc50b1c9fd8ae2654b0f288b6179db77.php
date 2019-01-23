<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>
        <?php echo e(setting('station_name')); ?> <?php echo Theme::getTitle(); ?>

    </title>
    <?php echo Theme::asset()->styles(); ?>

    <?php echo Theme::asset()->scripts(); ?>

    <script type="text/javascript"
            src="http://api.map.baidu.com/api?v=2.0&ak=5jCnjnCesElvVDufg6yjGMrlYimVXk5f"></script>
</head>
<body  ontouchstart >
<?php echo Theme::partial('header'); ?>

<?php echo Theme::partial('nav'); ?>

<?php echo Theme::content(); ?>

<?php echo Theme::partial('footer'); ?>


</body>

</html>