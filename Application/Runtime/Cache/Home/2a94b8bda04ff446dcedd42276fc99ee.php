<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>签到系统--欢迎页</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate icon" type="image/png" href="Public/amaze-css/assets/i/favicon.png">
    <link rel="stylesheet" href="Public/amaze-css/assets/css/amazeui.min.css"/>

</head>
<body style="background-image: url(http://139.129.34.35/yearMeeting/Public/picture/bg-image.jpg);">

<div class="am-g">
    <div class="am-u-sm-6 am-u-md-6 am-u-lg-6 " style="margin-top:0px;margin-left:-10px;">
       <a href="?s=/home/Index/signPage">
           <img src="./Public/LotteryLib/JOTUN.jpg">
       </a>


    </div>

</div>


<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="Public/amaze-css/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="Public/amaze-css/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="Public/amaze-css/assets/js/amazeui.min.js"></script>
<script>

    $(document).ready(function(){
       setTimeout(jumpSignPage,5000);
        function jumpSignPage(){
            location.href="?s=/home/Index/signPage";
        }
    });
</script>
</body>
</html>