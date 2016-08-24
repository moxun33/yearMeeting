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

                <li><a href="/aliyunHost/yearMeeting?s=/Admin"><span class="am-icon-angellist  "></span> 签到用户</a></li>
                <li><a href="/aliyunHost/yearMeeting"><span class="am-icon-pencil "></span> 签到系统</a></li>
              <!--  <li><a href="/aliyunHost/yearMeeting?s=/Admin/Index/photoWall/"><span class="am-icon-refresh am-icon-cube"></span>
                照片墙</a></li>-->
                <li><a href="/aliyunHost/yearMeeting?s=/Admin/Index/lotteryPage"><span class="am-icon-trophy "></span> 开始抽奖</a></li>
                <li><a href="/aliyunHost/yearMeeting?s=/Admin/Index/awardPage"><span class="am-icon-sitemap "></span> 奖品管理</a></li>
                <li><a href="/aliyunHost/yearMeeting?s=/Admin/Index/showAllStaff"><span class="am-icon-user-secret "></span> 全部员工</a></li>
                <li><a href="/aliyunHost/yearMeeting?s=/Admin/Index/unknowSignUser"><span class="am-icon-user-times "></span> 未知人员
            </a></li>
                <li><a href="/aliyunHost/yearMeeting?s=/Admin/Index/settingPage"><span class="am-icon-wrench"></span> 年会设置</a></li>
              <!--  <li><a href="/aliyunHost/yearMeeting?s=/Admin/Index/addAdminPage"><span class="am-icon-plus "></span>
              添加管理员</a></li>-->
                <li><a href="/aliyunHost/yearMeeting?s=/Admin/Index/lotteryUserList"><span class="am-icon-yelp "></span> 中奖名单</a></li>


            </ul>
        </div>
    </div>


    <!-- sidebar end -->

    <!-- content start -->
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">员工</strong> / <small>编辑信息</small></div>
        </div>

        <div class="am-g am-g-fixed">
            <div class="am-u-sm-12  am-u-sm-centered">

                <form class="am-form" method="post" action="/aliyunHost/yearMeeting/?s=/Admin/Index/checkEditAllStaff" enctype="multipart/form-data" >
                    <fieldset>
                        <input type="hidden" class="" name="id"  value="<?php echo ($id); ?>" >

                        <div class="am-form-group">
                            <label >真实姓名<a style="color: #4b59ff">  </a></label>
                            <input type="text" class="" name="real"  value="<?php echo ($name); ?>" placeholder="输入真实姓名">
                        </div>

                        <div class="am-form-group">
                            <label for="doc-ipt-phone-1">所属部门<a style="color: #4b59ff">  </a></label>
                            <input type="text" class="" name="belong" id="doc-ipt-phone-1"  value="<?php echo ($department); ?>" placeholder="">
                        </div>
                        <div class="am-form-group">
                            <label for="status-select">选择身份<a style="color: #4b59ff"> </a></label><br/>

                            <select id="status-select" style="width:100px;" name="status" value="<?php echo ($status); ?>">
                                <option value="<?php echo ($status); ?>" ><?php echo ($status); ?></option>
                                <option value="员工">员工</option>
                                <option value="嘉宾">嘉宾</option>



                            </select>
                            <hr>
                        </div>
                       <!-- <div class="am-form-group" id="setLevel">
                            <?php if($status == '员工' ): ?><label for="level-select">设置中奖等级<a style="color: #4b59ff"> </a></label><br/>

                                            <select id="level-select" style="width:100px;" name="level" value="<?php echo ($setLevel); ?>">
                                                <option value="<?php echo ($setLevel); ?>" ><?php echo ($setLevel); ?></option>
                                                <option value="特等奖">特等奖</option>
                                                <option value="一等奖">一等奖</option>
                                                <option value="二等奖">二等奖</option>
                                                <option value="三等奖">三等奖</option>
                                                <option value="五等奖">五等奖</option>


                                            </select>
                                            <hr>

                                <?php else: endif; ?>
                        </div>
-->
                        <p><button type="submit" class="am-btn am-btn-primary am-btn-fr" id="confirmEditSign">提交</button></p>
                    </fieldset>
                </form>


            </div>

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
            <script>/*
                $('#status-select').change(function(){
                    var status = $(this).val();
                   // alert (status);
                    //从嘉宾变为员工,增加抽奖等级选择
                    if(status==="员工"){
                        var showLevel ='<label for="level-select">设置中奖等级<a style="color: #4b59ff"> </a></label><br/>'+

                                ' <select id="level-select" style="width:100px;" name="level" value="<?php echo ($setLevel); ?>">'+
                                ' <option value="<?php echo ($setLevel); ?>" ><?php echo ($setLevel); ?></option>'+
                                '<option value="特等奖">特等奖</option>'+
                                '<option value="一等奖">一等奖</option>'+
                                '<option value="二等奖">二等奖</option>'+
                                '<option value="三等奖">三等奖</option>'+
                                '<option value="五等奖">五等奖</option>'+


                                '</select>'+
                                '<hr>';
                        $('#setLevel').html(showLevel);
                    }else{
                        var showLevel="";
                        $('#setLevel').html(showLevel);
                    }
                });
                $('#confirmEditSign').click(function(){
                    var levelValue = $('#level-select').val();

                    if(levelValue!=""){
                        return;
                    }else{
                        alert("请选择等级!");
                        return false;
                    }
                });
            </script>
</body>
</html>