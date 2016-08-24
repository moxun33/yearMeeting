<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>照片墙</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta http-equiv="refresh" content="54">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="Public/amaze-css/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="Public/amaze-css/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="Public/amaze-css/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="Public/amaze-css/assets/css/admin.css">
    <link href="Public/LotteryLib/css/photowall.css" rel="stylesheet" type="text/css" />

</head>
<style type="text/css">
    @font-face {
        font-family: 'icomoon';
        src:url('../fonts/icomoon.eot?rretjt');
        src:url('../fonts/icomoon.eot?#iefixrretjt') format('embedded-opentype'),
        url('../fonts/icomoon.woff?rretjt') format('woff'),
        url('../fonts/icomoon.ttf?rretjt') format('truetype'),
        url('../fonts/icomoon.svg?rretjt#icomoon') format('svg');
        font-weight: normal;
        font-style: normal;
    }

    [class^="icon-"], [class*=" icon-"] {
        font-family: 'icomoon';
        speak: none;
        font-style: normal;

        font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;

    /* Better Font Rendering =========== */
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    }

    body, html { font-size: 100%; 	padding: 0; margin: 0;}

    /* Reset */
    *,
    *:after,
    *:before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    /* Clearfix hack by Nicolas Gallagher: http://nicolasgallagher.com/micro-clearfix-hack/ */
    .clearfix:before,
    .clearfix:after {
        content: " ";
        display: table;
    }

    .clearfix:after {
        clear: both;
    }

    body{
        background: #f9f7f6;
        color: #404d5b;
        font-weight: 500;
        font-size: 1.05em;
        font-family: "Microsoft YaHei","宋体","Segoe UI", "Lucida Grande", Helvetica, Arial,sans-serif, FreeSans, Arimo;
    }
    a{color: #2fa0ec;text-decoration: none;outline: none;}
    a:hover,a:focus{color:#74777b;}

    /*Montserrat font*/
    @import url(http://fonts.useso.com/css?family=Montserrat);
    /*basic reset*/
    * {margin: 0; padding: 0;}
    body {text-align: center; }

    .grid {

        width: 99%; height: 300px; margin: 20px auto 50px auto;
        perspective: 500px; /*For 3d*/
    }
    .grid img {width: 50px; height: 50px; display: block; float: left; border-radius: 100%; margin: 5px;}

    .animate {
        font: 12px Montserrat; text-transform: uppercase;
        background: rgb(0, 100, 0); color: white;
        padding: 10px 20px; border-radius: 5px;
        cursor: pointer;
    }
    .animate:hover {background: rgb(0, 75, 0);}
</style>
<body >
<h1 style="text-align: center">签到用户</h1>
<hr/>
<!--
<div class="am-g" style="height:20px;">

    <div class="am-u-sm-2 am-u-sm-offset-1 ">
        <a class="am-btn am-btn-success" href="?s=/Admin/Index/lotteryPage">抽奖平台</a>
    </div>
    <div class=" am-u-sm-2 ">
        <button class="am-btn am-btn-warning" data-am-popover="
        {content: '1.进入抽奖平台,选择抽奖等级选项. <br>2.点击开始按钮,抽奖人数达到预定数量时系统自动停止.<br>3.进行下一轮时,先切换抽奖等级,再点击开始按钮.', trigger: 'hover focus'}">抽奖说明</button>
    </div>
    <div class="am-u-sm-2  ">
        <a class="am-btn am-btn-primary" href="?s=/Home/Index">签到系统</a>
    </div>
    <div class="am-u-sm-1  ">
        <a class="am-btn am-btn-danger" href="?s=/Admin">后台入口</a>
    </div>


    <div class="am-u-sm-3 ">
        <a class="am-btn am-btn-secondary"  href="javascript:;" id="admin-fullscreen">开(关)全屏</a>

    </div>

</div>
-->

<div class=" grid">
    <?php if(is_array($avatarInfo)): $i = 0; $__LIST__ = $avatarInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol1): $mod = ($i % 2 );++$i;?><div class="gridTu">
            <img class="grid-image"  src=" <?php echo ($vol1["avatar_url"]); ?>"/>
           <!-- <p><?php echo ($vol1["real_name"]); ?></p>-->
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<span class="animate" style="visibility: hidden;"></span>
<footer>
    <hr>
    <p class="am-padding-left">   © 2015 CopyRight.由Machine提供技术支持<br>
        <a  href="?s=/Admin/Index/lotteryPage">抽奖平台&nbsp</a>
        <a class="am-danger" href="?s=/Admin" style="color:red">后台入口</a>
    </p>
</footer>
<script src="http://libs.useso.com/js/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="http://libs.useso.com/js/jquery-easing/1.3/jquery.easing.min.js" type="text/javascript"></script>
<script src="Public/LotteryLib/js/photowall.js"></script>
<script src="Public/LotteryLib/js/prefixfree-1.0.7.js" type="text/javascript"></script>
<script src="Public/amaze-css/assets/js/amazeui.min.js"></script>
<script src="Public/amaze-css/assets/js/app.js"></script>
</body>
</html>