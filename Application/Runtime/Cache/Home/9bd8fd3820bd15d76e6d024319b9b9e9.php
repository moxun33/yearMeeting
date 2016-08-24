<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>签到成功</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate icon" type="image/png" href="Public/amaze-css/assets/i/favicon.png">
    <link rel="stylesheet" href="Public/amaze-css/assets/css/amazeui.min.css"/>

</head>
<body style="background-image: url(http://139.129.34.35/yearMeeting/Public/picture/bg-image.jpg);">
<div class="am-g ">
    <div class="am-u-sm-12 am-margin-top" >
        <a href="?s=/home/Index/signPage">
            <img style="width:100%;height:100px;" src="./Public/LotteryLib/logo2.jpg"></a>
        <hr style="opacity: 0;"/>
    </div>

    <div class="am-u-sm-12 ">

        <section class="am-panel am-panel-success">
            <header class="am-panel-hd">
                <h3 class="am-panel-title "style="text-align: center">签到成功</h3>
            </header>
            <div class="am-panel-bd">
                <p style="text-align: center"> <?php echo ($staffSigned); ?></p>
                <p style="text-align: center"> <?php echo ($vipSigned); ?></p>
                <p style="text-align: center"> <?php echo ($unknowSigned); ?></p>
                <hr>
                <a class="am-btn am-btn-danger am-block" href="?s=/Home/Index/index">返回首页</a>
            </div>
        </section>

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
        $('#confirmSign').click(function(){/*
            var name = $('input[name=real]').val();
            var phone = $('input[name=phone]').val();
            var status = $( "input:radio[name=status]:checked" ).val()
            if(name==""||phone==""||status==""){
                alert('所有信息必填!');
            }else{

            }*/
        })
    });

</script>
</body>
</html>