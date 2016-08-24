<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>银行储蓄卡管理系统--历史记录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate icon" type="image/png" href="Public/amaze-css/assets/i/favicon.png">
    <link rel="stylesheet" href="Public/amaze-css/assets/css/amazeui.min.css"/>
    <style>
        @media only screen and (min-width: 641px) {
            .am-offcanvas {
                display: block;
                position: static;
                background: none;
            }

            .am-offcanvas-bar {
                position: static;
                width: auto;
                background: none;
                -webkit-transform: translate3d(0, 0, 0);
                -ms-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
            .am-offcanvas-bar:after {
                content: none;
            }

        }

        @media only screen and (max-width: 640px) {
            .am-offcanvas-bar .am-nav>li>a {
                color:#ccc;
                border-radius: 0;
                border-top: 1px solid rgba(0,0,0,.3);
                box-shadow: inset 0 1px 0 rgba(255,255,255,.05)
            }

            .am-offcanvas-bar .am-nav>li>a:hover {
                background: #404040;
                color: #fff
            }

            .am-offcanvas-bar .am-nav>li.am-nav-header {
                color: #777;
                background: #404040;
                box-shadow: inset 0 1px 0 rgba(255,255,255,.05);
                text-shadow: 0 1px 0 rgba(0,0,0,.5);
                border-top: 1px solid rgba(0,0,0,.3);
                font-weight: 400;
                font-size: 75%
            }

            .am-offcanvas-bar .am-nav>li.am-active>a {
                background: #1a1a1a;
                color: #fff;
                box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
            }

            .am-offcanvas-bar .am-nav>li+li {
                margin-top: 0;
            }
        }

        .my-head {
            margin-top: 40px;
            text-align: center;
        }

        .my-button {
            position: fixed;
            top: 0;
            right: 0;
            border-radius: 0;
        }
        .my-sidebar {
            padding-right: 0;
            border-right: 1px solid #eeeeee;
        }

        .my-footer {
            border-top: 1px solid #eeeeee;
            padding: 10px 0;
            margin-top: 10px;
            text-align: center;
        }

    </style>
</head>
<body>
<div class="am-g" style="margin-top:3%;">

    <div class="am-u-sm-6 am-u-sm-offset-3">
        <table class="am-table am-table-striped am-table-hover">
        <thead>
        <tr>
            <th>操作选项</th>

            <th>操作时间</th>
        </tr>
        </thead>
        <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><br/>

                <tr>
                    <td><?php echo ($vo["option"]); ?></td>

                    <td><?php echo ($vo["option_time"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>

    </div>

</div>


<footer class="my-footer">
    <p>银行储蓄卡管理系统--历史记录<br><small>© Copyright 2015.</small></p>
    <p><a href="/aliyunHost/bank"><button>首页</button></a>
        <?php if(!empty($myCno)): ?>您好,<?php echo ($myCno); ?>
            &nbsp&nbsp<a href="/aliyunHost/bank/index.php?s=/Home/Index/logout" class="am-btn am-btn-danger ">退出</a>
            <?php else: ?>
            <a href="/aliyunHost/bank/?s=/Home/Index/login"><button>登录</button></a><?php endif; ?>
    </p>
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