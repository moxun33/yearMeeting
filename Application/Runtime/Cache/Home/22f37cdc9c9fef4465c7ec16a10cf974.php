<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>存款</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="alternate icon" type="image/png" href="Public/amaze-css/assets/i/favicon.png">
    <link rel="stylesheet" href="Public/amaze-css/assets/css/amazeui.min.css"/>
    <style>
        .get {
            background: #1E5B94;
            color: #fff;
            text-align: center;
            padding: 100px 0;
        }

        .get-title {
            font-size: 200%;
            border: 2px solid #fff;
            padding: 20px;
            display: inline-block;
        }

        .get-btn {
            background: #fff;
        }

        .detail {
            background: #fff;
        }

        .detail-h2 {
            text-align: center;
            font-size: 150%;
            margin: 40px 0;
        }

        .detail-h3 {
            color: #1f8dd6;
        }

        .detail-p {
            color: #7f8c8d;
        }

        .detail-mb {
            margin-bottom: 30px;
        }

        .hope {
            background: #0bb59b;
            padding: 50px 0;
        }

        .hope-img {
            text-align: center;
        }

        .hope-hr {
            border-color: #149C88;
        }

        .hope-title {
            font-size: 140%;
        }

        .about {
            background: #fff;
            padding: 40px 0;
            color: #7f8c8d;
        }

        .about-color {
            color: #34495e;
        }

        .about-title {
            font-size: 180%;
            padding: 30px 0 50px 0;
            text-align: center;
        }

        .footer p {
            color: #7f8c8d;
            margin: 0;
            padding: 15px 0;
            text-align: center;
            background: #2d3e50;
        }
    </style>
</head>
<body>
<header class="am-topbar am-topbar-fixed-top">

</header>

<div class="get">
    <?php if(!empty($nowSave)): ?><div class="am-g">
            <div class="am-u-lg-12">
                <h1 class="get-title">此次存款金额:<?php echo ($nowSave); ?></h1>


            </div>
        </div><?php endif; ?>

    <div class="am-g">
        <p>
            <strong>存款页面</strong>
        </p>
        <div class="am-u-sm-3" style="margin-left: 38%">
            <form method="post" class="am-form" action="/aliyunHost/bank/?s=/Home/Index/save_money">
                <input type="text" name="moneySave" class="" id="doc-ipt-email-1" placeholder="输入人民币金额,(单位:元)">

                <p><button type="submit" class="am-btn am-btn-default">提交</button></p>

            </form>
        </div>

    </div>


</div>



<footer class="footer">
    <p>© 2015</p>
    <p><a href="/aliyunHost/bank"><button>首页</button></a>
        <?php if(!empty($myCno)): ?>您好,<?php echo ($myCno); ?>
            &nbsp&nbsp<a href="/aliyunHost/bank/index.php?s=/Home/Index/logout" class="am-btn am-btn-danger ">退出</a>
            <?php else: ?>
            <a href="/aliyunHost/bank/?s=/Home/Index/login"><button>登录</button></a><?php endif; ?></p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="Public/amaze-css/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
</body>
</html>