<?php if (!defined('THINK_PATH')) exit();?>
            <!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>签到抽奖系统后台管理</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="Public/amaze-css/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="Public/amaze-css/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="Public/amaze-css/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="Public/amaze-css/assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，网站 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
    <div class="am-topbar-brand">
        <strong><a href="?s=/Admin/Index/">年会签到抽奖</a></strong> <small>系统</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> <?php echo ($myName); ?> <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="?s=/Admin/Index/logout"><span class="am-icon-power-off"></span> 退出</a></li>

                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen">
                <span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">

                <li><a href="/aliyunHost/lottery?s=/Admin"><span class="am-icon-angellist  "></span> 签到用户</a></li>
                <li><a href="/aliyunHost/lottery?s=/home"><span class="am-icon-pencil "></span> 签到系统</a></li>
              <!--  <li><a href="/aliyunHost/lottery?s=/Admin/Index/photoWall/"><span class="am-icon-refresh am-icon-cube"></span>
                照片墙</a></li>-->
                <li><a href="/aliyunHost/lottery?s=/Admin/Index/lotteryPage"><span class="am-icon-trophy "></span> 开始抽奖</a></li>
                <li><a href="/aliyunHost/lottery?s=/Admin/Index/awardPage"><span class="am-icon-sitemap "></span> 奖品管理</a></li>
                <li><a href="/aliyunHost/lottery?s=/Admin/Index/showAllStaff"><span class="am-icon-user-secret "></span> 全部员工</a></li>
                <li><a href="/aliyunHost/lottery?s=/Admin/Index/unknowSignUser"><span class="am-icon-user-times "></span> 未知人员
            </a></li>
                <li><a href="/aliyunHost/lottery?s=/Admin/Index/settingPage"><span class="am-icon-wrench"></span> 年会设置</a></li>

                <li><a href="/aliyunHost/lottery?s=/Admin/Index/adminLotteryUserList"><span class="am-icon-yelp "></span> 中奖名单
                </a></li>


            </ul>
        </div>
    </div>


    <!-- sidebar end -->

    <!-- content start -->
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">奖品管理</strong> / <small>创建</small></div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">
                <form method="post" class="am-form" action="/aliyunHost/lottery/?s=/Admin/Index/createAward">
                    <div class="am-form-group">

                        <select id="doc-select-1" style="width:100px;" name="awardLevel">
                            <option value="特等奖">特等奖</option>
                            <option value="一等奖">一等奖</option>
                            <option value="二等奖">二等奖</option>
                            <option value="三等奖">三等奖</option>
                            <option value="四等奖">四等奖</option>
                            <option value="五等奖">五等奖</option>
                        </select>
                        <br>
                        <input style="width:300px;" type="text" class="goodsName" name="goodsName" placeholder="每个等级的奖品名称">
                        <br>
                        <input style="width:500px;" type="number" class="goodsNumber"  name="goodsNumber" placeholder="每个等级的奖品数量">

                    </div>

                    <input type="submit" name="" value="提交" class="am-btn am-btn-success am-btn-sm am-fl">


                </form>

            </div>



        </div>

        <hr>
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">奖品管理</strong> / <small>奖品列表</small></div>

        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <table class="am-table am-table-bd am-table-striped admin-content-table">
                    <thead>
                    <tr>
                        <th>等级</th><th>奖品名称</th><th>奖品数量</th><th>管理</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($awardList)): $i = 0; $__LIST__ = $awardList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?><tr>

                            <td><?php echo ($vl["award_level"]); ?></td>
                            <td><?php echo ($vl["goods_name"]); ?></td>
                            <td><?php echo ($vl["winner_number"]); ?></td>
                            <td>
                                <div class="am-dropdown" data-am-dropdown>
                                    <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog am-icon-spin"></span> <span class="am-icon-caret-down"></span></button>
                                    <ul class="am-dropdown-content">

                                        <li><a href="/aliyunHost/lottery?s=/Admin/Index/editAward&id=<?php echo ($vl["id"]); ?>">编辑</a></li>
                                        <li><a href="/aliyunHost/lottery?s=/Admin/Index/deleteAward&id=<?php echo ($vl["id"]); ?>">删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>

            </div>
        </div>




        <footer>
            <hr>
            <p class="am-padding-left">   © 2015 CopyRight</p>
        </footer>
    </div>
    <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="Public/amaze-css/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="Public/amaze-css/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="Public/amaze-css/assets/js/amazeui.min.js"></script>
<script src="Public/amaze-css/assets/js/app.js"></script>
</body>
</html>