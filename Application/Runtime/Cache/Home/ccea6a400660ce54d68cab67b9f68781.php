<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>用户登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate icon" type="image/png" href="Public/amaze-css/assets/i/favicon.png">
    <link rel="stylesheet" href="Public/amaze-css/assets/css/amazeui.min.css"/>
    <style>
        .header {
            text-align: center;
        }
        .header h1 {
            font-size: 200%;
            color: #333;
            margin-top: 30px;
        }
        .header p {
            font-size: 14px;
        }

        body{background-color:#e7e7e7;}
    </style>
</head>
<body>

<div class="header">

    <div class="am-g"><br>
        <a href="/aliyunHost/bank/index.php"><img src="http://pics.sc.chinaz.com/Files/pic/icons128/5859/46.png" width="133" height="133" border="0" alt=""></a>

    </div>

</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        <form method="post" class="am-form" action="/aliyunHost/bank/?s=/Home/Index/checkLogin">
            <label >卡号:</label>
            <input type="text" name="cno" value="" placeholder="输入卡号" >
            <br>
            <label >密码:</label>
            <input type="password" name="pwd"  value="" placeholder="输入密码" >

            <p class="top15 captcha" id="captcha-container">
                <input type="checkbox" name='auto' class='auto' id='auto' checked='1'/>
                <label for="auto">记住我，下次自动登录</label>
            </p>
            <div class="am-cf">
              <input type="submit" name="" value="登录" class="am-btn am-btn-primary am-btn-sm am-fl"> &nbsp
             <input type="reset" name="" value="重置" class="am-btn am-btn-primary am-btn-sm ">
               <a class="am-btn am-btn-default am-btn-sm am-fr" href="/aliyunHost/bank/index.php?s=/Home/Index/register">没账号？点此开户
                </a>
            </div>

        </form>

        <p class="am-center"><p>银行储蓄卡管理系统&nbsp<small>© Copyright 2015.</small></p> </p>
    </div>
</div>

<script language="JavaScript">
    var captcha_img = $('#captcha-container').find('img')
    var verifyimg = captcha_img.attr("src");
    captcha_img.attr('title', '点击刷新');
    captcha_img.click(function(){
        if( verifyimg.indexOf('?')>0){
            $(this).attr("src", verifyimg+'&random='+Math.random());
        }else{
            $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
        }
    });


</script>
</body>
</html>