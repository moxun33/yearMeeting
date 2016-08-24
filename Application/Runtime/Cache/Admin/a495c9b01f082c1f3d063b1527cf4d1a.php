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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">签到用户</strong> /
                <small>新增用户</small></div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">

                <form class="am-form" method="post" action="/aliyunHost/yearMeeting/?s=/Admin/Index/checkAddUser" enctype="multipart/form-data" >

                    <div class="am-form-group">
                        <label >真实姓名<a style="color: #4b59ff"></a></label>
                        <input type="text" class="" name="real"  placeholder="输入姓名">
                    </div>

                    <div class="am-form-group">
                        <label for="doc-ipt-phone-1">手机号码<a style="color: #4b59ff">    </a></label>
                        <input type="number" class="" name="number" id="doc-ipt-phone-1" placeholder="输入手机号码">
                    </div>
                    <div class="am-form-group">
                        <label for="doc-ipt-phone-1">选择身份(嘉宾不参与抽奖!)<a style="color: #4b59ff">  </a></label><br/>
                        <label class="am-radio-inline">
                            <input type="radio"  name="status" value="员工"> 员工
                        </label>
                        <label class="am-radio-inline">
                            <input type="radio" name="status" value="嘉宾">嘉宾
                        </label>
                        <label class="am-radio-inline">
                            <input type="radio" name="status" value="未知">未知
                        </label>
                        <hr>
                    </div>


                    <div class="am-form-group">
                        <label for="doc-ipt-phone-1">是否允许参加抽奖<a style="color: #4b59ff">  </a></label><br/>
                        <label class="am-radio-inline">
                            <input type="radio"  name="allowLottery" value='是'> 是
                        </label>
                        <label class="am-radio-inline">
                            <input type="radio" name="allowLottery" value='否'>否
                        </label>

                    </div>
                    <hr>
                    <div class="am-form-group">
                        <label >真实照片<a style="color: #4b59ff">   支持的格式: jpg,png,gif,bmp;最大尺寸: 2MB</a></label>


                        <div class="am-panel am-panel-default">
    <div class="am-panel-bd">


        <input type='file'  name='photo' onchange='PreviewImage(this)'>
        <script>
            function PreviewImage(imgFile)
            {
                var filextension=imgFile.value.substring(imgFile.value.lastIndexOf("."),imgFile.value.length);
                filextension=filextension.toLowerCase();
                if ((filextension!='.jpg')&&(filextension!='.gif')&&(filextension!='.jpeg')&&(filextension!='.png')&&(filextension!='.bmp'))
                {
                    alert(" 图片格式不正确!");
                    imgFile.focus();
                }
                else
                {
                    var path;
                    if(document.all)//IE
                    {
                        imgFile.select();
                        path = document.selection.createRange().text;
                        document.getElementById("imgPreview").innerHTML="";
                        document.getElementById("imgPreview").style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\"" + path + "\")";//使用滤镜效果
                    }
                    else//FF
                    {
                        path=window.URL.createObjectURL(imgFile.files[0]);// FF 7.0以上
                        //path = imgFile.files[0].getAsDataURL();// FF 3.0
                        document.getElementById("imgPreview").innerHTML = "<img id='img1' width='120px' height='100px' src='"+path+"'/>";
                        //document.getElementById("img1").src = path;
                    }
                }
            }
        </script>

    </div>
    <div id="imgPreview" class="am-panel-bd">
        <img id="img1" src="" width="120" height="100" />
        <br>   <br>
    </div>
</div>


                    </div>

                    <button type="submit" class="am-btn am-btn-success am-btn-fr">提交</button>

                </form>


            </div>
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
<script>
    $('input[name=allowLottery]').click(function(){
        var allowLottery = $(this).val();
       // alert(allowLottery);
    })

</script>

</body>
</html>