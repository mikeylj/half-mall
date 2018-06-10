<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>确认订单</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0"
    />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name='apple-touch-fullscreen' content='yes'>
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <script type="text/javascript" src="/js/ap.js"></script>

</head>

<body >
    <?php
        $str=http_build_query($Configs);
    ?>
    <script>
            var queryParam = '<?php echo $str;?>';
            var gotoUrl = document.querySelector("#pay_form").getAttribute('action') + '?' + queryParam;
            _AP.pay(gotoUrl);
    </script>
</body>

</html>