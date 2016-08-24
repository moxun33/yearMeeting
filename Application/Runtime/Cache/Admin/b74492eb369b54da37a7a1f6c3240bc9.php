<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
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



        <div class="am-g">
            <div class="am-u-sm-12">
                <hr/>

                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>中奖员工列表
                    </small></div>

                    <a href="">
                        <button type="button" id="manualFresh" class="am-btn am-btn-success am-round am-fr">手动刷新页面
                        </button>
                    </a>
                </div>
                <div data-am-widget="tabs" class="am-tabs am-tabs-d2">
                    <ul class="am-tabs-nav am-cf">
                        <li class="am-active"><a class='level' href="[data-tab-panel-5]">五等奖</a></li>
                        <li class=""><a class='level' href="[data-tab-panel-4]">四等奖</a></li>
                        <li class=""><a class='level' href="[data-tab-panel-3]">三等奖</a></li>
                        <li class=""><a class='level' href="[data-tab-panel-2]">二等奖</a></li>
                        <li class=""><a class='level' href="[data-tab-panel-1]">一等奖</a></li>
                        <li class=""><a class='level' href="[data-tab-panel-0]">特等奖</a></li>
                    </ul>


                    <div class="am-tabs-bd">
                        <div data-tab-panel-5 class="am-tab-panel am-active">
                            <table class="am-table am-table-bd am-table-striped admin-content-table">
                                <thead>
                                <tr>
                                    <th>编号</th> <th>姓名</th><th>手机号</th><th>兑奖号</th><th>是否已领奖</th><th>操作</th>
                                </tr>
                                </thead>
                                <tbody >
                                <?php if(is_array($level5List)): $i = 0; $__LIST__ = $level5List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol5): $mod = ($i % 2 );++$i;?><tr>

                                        <td><?php echo ($vol5["id"]); ?></td>
                                        <td><?php echo ($vol5["real_name"]); ?></td>
                                        <td><?php echo ($vol5["phone_number"]); ?></td>
                                        <td><?php echo ($vol5["lottery_code"]); ?></td>
                                        <td><?php echo ($vol5["got_award"]); ?></td>
                                        <td>
                                            <div class="am-dropdown" data-am-dropdown>
                                                <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog am-icon-spin"></span> <span class="am-icon-caret-down"></span></button>
                                                <ul class="am-dropdown-content">
                                                    <li><a href="/aliyunHost/lottery?s=/Admin/Index/changeGotAward&id=<?php echo ($vol5["id"]); ?>">
                                                        更改领奖状态</a></li>

                                                </ul>
                                            </div>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>


                                </tbody>
                             </table>
                        </div>
                        <div data-tab-panel-4 class="am-tab-panel ">
                            <table class="am-table am-table-bd am-table-striped admin-content-table">
                                <thead>
                                <tr>
                                    <th>编号</th> <th>姓名</th><th>手机号</th><th>兑奖号</th><th>是否已领奖</th><th>操作</th>
                                </tr>
                                </thead>
                                <tbody >
                                <?php if(is_array($level4List)): $i = 0; $__LIST__ = $level4List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol4): $mod = ($i % 2 );++$i;?><tr>

                                        <td><?php echo ($vol4["id"]); ?></td>
                                        <td><?php echo ($vol4["real_name"]); ?></td>
                                        <td><?php echo ($vol4["phone_number"]); ?></td>
                                        <td><?php echo ($vol4["lottery_code"]); ?></td>
                                        <td><?php echo ($vol4["got_award"]); ?></td>
                                        <td>
                                            <div class="am-dropdown" data-am-dropdown>
                                                <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog am-icon-spin"></span> <span class="am-icon-caret-down"></span></button>
                                                <ul class="am-dropdown-content">
                                                    <li><a href="/aliyunHost/lottery?s=/Admin/Index/changeGotAward&id=<?php echo ($vol4["id"]); ?>">
                                                        更改领奖状态</a></li>

                                                </ul>
                                            </div>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>


                                </tbody>
                            </table>
                        </div>
                        <div data-tab-panel-3 class="am-tab-panel ">
                            <table class="am-table am-table-bd am-table-striped admin-content-table">
                                <thead>
                                <tr>
                                    <th>编号</th> <th>姓名</th><th>手机号</th><th>兑奖号</th><th>是否已领奖</th><th>操作</th>
                                </tr>
                                </thead>
                                <tbody >
                                <?php if(is_array($level3List)): $i = 0; $__LIST__ = $level3List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol3): $mod = ($i % 2 );++$i;?><tr>

                                        <td><?php echo ($vol3["id"]); ?></td>
                                        <td><?php echo ($vol3["real_name"]); ?></td>
                                        <td><?php echo ($vol3["phone_number"]); ?></td>
                                        <td><?php echo ($vol3["lottery_code"]); ?></td>
                                        <td><?php echo ($vol3["got_award"]); ?></td>
                                        <td>
                                            <div class="am-dropdown" data-am-dropdown>
                                                <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog am-icon-spin"></span> <span class="am-icon-caret-down"></span></button>
                                                <ul class="am-dropdown-content">
                                                    <li><a href="/aliyunHost/lottery?s=/Admin/Index/changeGotAward&id=<?php echo ($vol3["id"]); ?>">
                                                        更改领奖状态</a></li>

                                                </ul>
                                            </div>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>


                                </tbody>
                            </table>
                              </div>

                        <div data-tab-panel-2 class="am-tab-panel">
                            <table class="am-table am-table-bd am-table-striped admin-content-table">
                                <thead>
                                <tr>
                                    <th>编号</th> <th>姓名</th><th>手机号</th><th>兑奖号</th><th>是否已领奖</th><th>操作</th>
                                </tr>
                                </thead>
                                <tbody >
                                <?php if(is_array($level2List)): $i = 0; $__LIST__ = $level2List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol2): $mod = ($i % 2 );++$i;?><tr>

                                        <td><?php echo ($vol2["id"]); ?></td>
                                        <td><?php echo ($vol2["real_name"]); ?></td>
                                        <td><?php echo ($vol2["phone_number"]); ?></td>
                                        <td><?php echo ($vol2["lottery_code"]); ?></td>
                                        <td><?php echo ($vol2["got_award"]); ?></td>
                                        <td>
                                            <div class="am-dropdown" data-am-dropdown>
                                                <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog am-icon-spin"></span> <span class="am-icon-caret-down"></span></button>
                                                <ul class="am-dropdown-content">
                                                    <li><a href="/aliyunHost/lottery?s=/Admin/Index/changeGotAward&id=<?php echo ($vol2["id"]); ?>">
                                                        更改领奖状态</a></li>

                                                </ul>
                                            </div>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>


                                </tbody>
                            </table>
                          </div>
                        <div data-tab-panel-1 class="am-tab-panel ">
                            <table class="am-table am-table-bd am-table-striped admin-content-table">
                            <thead>
                            <tr>
                                <th>编号</th> <th>姓名</th><th>手机号</th><th>兑奖号</th><th>是否已领奖</th><th>操作</th>
                            </tr>
                            </thead>
                            <tbody >
                            <?php if(is_array($level1List)): $i = 0; $__LIST__ = $level1List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol1): $mod = ($i % 2 );++$i;?><tr>

                                    <td><?php echo ($vol1["id"]); ?></td>
                                    <td><?php echo ($vol1["real_name"]); ?></td>
                                    <td><?php echo ($vol1["phone_number"]); ?></td>
                                    <td><?php echo ($vol1["lottery_code"]); ?></td>
                                    <td><?php echo ($vol1["got_award"]); ?></td>
                                    <td>
                                        <div class="am-dropdown" data-am-dropdown>
                                            <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog am-icon-spin"></span> <span class="am-icon-caret-down"></span></button>
                                            <ul class="am-dropdown-content">
                                                <li><a href="/aliyunHost/lottery?s=/Admin/Index/changeGotAward&id=<?php echo ($vol1["id"]); ?>">
                                                    更改领奖状态</a></li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>


                            </tbody>
                            </table>
                            </div>
                        <div data-tab-panel-0 class="am-tab-panel ">
                            <table class="am-table am-table-bd am-table-striped admin-content-table">
                                <thead>
                                <tr>
                                    <th>编号</th> <th>姓名</th><th>手机号</th><th>兑奖号</th><th>是否已领奖</th><th>操作</th>
                                </tr>
                                </thead>
                                <tbody >
                                <?php if(is_array($level0List)): $i = 0; $__LIST__ = $level0List;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol0): $mod = ($i % 2 );++$i;?><tr>

                                        <td><?php echo ($vol0["id"]); ?></td>
                                        <td><?php echo ($vol0["real_name"]); ?></td>
                                        <td><?php echo ($vol0["phone_number"]); ?></td>
                                        <td><?php echo ($vol0["lottery_code"]); ?></td>
                                        <td><?php echo ($vol0["got_award"]); ?></td>
                                        <td>
                                            <div class="am-dropdown" data-am-dropdown>
                                                <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog am-icon-spin"></span> <span class="am-icon-caret-down"></span></button>
                                                <ul class="am-dropdown-content">
                                                    <li><a href="/aliyunHost/lottery?s=/Admin/Index/changeGotAward&id=<?php echo ($vol0["id"]); ?>">
                                                        更改领奖状态</a></li>

                                                </ul>
                                            </div>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>


                                </tbody>
                            </table>
                          </div>
                    </div>
                </div>



            </div>
        </div>



        <footer>
            <hr>
            <p class="am-padding-left">   © 2015 CopyRight.由Machine提供技术支持</p>
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
<script>
    $('#manualFresh').click(function(){
      location.reload();
    })
</script>
</body>
</html>