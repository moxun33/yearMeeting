<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>佐敦公司年会抽奖</title>
    <meta name="description" content="抽奖页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <META HTTP-EQUIV="pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
    <META HTTP-EQUIV="expires" CONTENT="0">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="Public/amaze-css/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="Public/amaze-css/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="Public/amaze-css/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="Public/amaze-css/assets/css/admin.css">
    <link href="./Public/LotteryLib/css/mainPage.css" rel="stylesheet" type="text/css" />
    <script src="Public/LotteryLib/js/jquery-1.7.2.min.js"></script>

</head>
<body  id="wrapper">


<style>
        #wrapper{
            font-family: "黑体";
            position:absolute;
            top:0;
            left:0;
            height:100%;
            width:100%;
            overflow: hidden;
            /*background-image:url("./Public/LotteryLib/bodybg.jpg");*/
            background-color: #f70b0a;
            background-position: center 0;
            background-repeat: no-repeat;
            background-attachment:fixed;
            background-size: cover;
            -webkit-background-size: cover;/* 兼容Webkit内核浏览器如Chrome和Safari */
            -o-background-size: cover;/* 兼容Opera */
            zoom: 1;
        }

        #content{

            height:39%;
        }
        .blog-sidebar{
            background-color: white;
            padding: 0px;
            margin:0px;
            border:0px;
            height:100%;
            overflow: auto;
            border-left:0px;
            border-top: 0px;;
            border-bottom:1px solid rgba(233, 229, 243, 0.4);
            border-right:1px solid rgba(233, 229, 243, 0.4);
        }

    .lottery-main{
        top:5px;
        overflow: auto;
    }
    #lottery-avatar{
        background-color: rgba(255, 255, 255, 0.01);
        width:150px;
        height:150px;
        margin-bottom: 10px;
        margin-left:50px;
        margin-top:0px;

    }
     #lottery-avatar img{
            margin:0px;
            position: absolute;
            width:100%;
            height:100%;
            padding:0px;


        }
    #name{
        background-color: rgba(255, 102, 67, 0.8);
        width:300px;
        height:100px;
        float: right;
        margin-right:-50px;
        color: #29181e;
        font-size: 47px;
        margin-bottom: 20px;
        font-weight: bolder;
        opacity:0.9;
        margin-top: 30px;
        border-left:0px;
        border-top: 0px;;
        border-bottom:3px solid rgba(159, 154, 164, 0.37);
        border-right:3px solid rgba(159, 154, 164, 0.37);
    }

    #phone-number{
        margin-top: 30px;;
        width:600px;
        background-color:rgba(255, 102, 67, 0.8);
        height:100px;
        float: left;;
        margin-bottom: 20px;
        font-size: 50px;
        color: #29181e;
        font-weight: bolder;
        opacity:0.9;
        border-left:0px;
        border-top: 0px;;
        border-bottom:3px solid rgba(159, 154, 164, 0.37);
        border-right:3px solid rgba(159, 154, 164, 0.37);
    }
    #beginLottery{
        width:150px;
        height:100px;
        opacity: 0.9;
        font-size: 50px;
        float: right;
        color: #29181e;
        font-weight: bolder;
        background-color: rgba(255, 102, 67, 0.8);
        border-left:0px;
        border-top: 10px;;
        border-bottom:3px solid rgba(159, 154, 164, 0.37);
        border-right:3px solid rgba(159, 154, 164, 0.37);
        margin-bottom:20px;
        margin-right:9px;
    }
        #stopLottery{
            width:150px;
            height:100px;
            opacity: 0.9;
            font-size: 50px;

            color: #29181e;
            font-weight: bolder;
            background-color: rgba(255, 102, 67, 0.8);
            border-left:0px;
            border-top: 10px;;
            border-bottom:3px solid rgba(159, 154, 164, 0.37);
            border-right:3px solid rgba(159, 154, 164, 0.37);
            margin-bottom:20px;
        }

    .myFont{
        font-weight: lighter;
        text-align: center;
        font-family: '微软雅黑', sans-serif, arial;
    }
    #show-lottery{

        margin-top:-10px;
    }
</style>

<div class="am-g " id="content" >
    <img style="height:50px;float:right;margin-top:1px;" src="./Public/LotteryLib/logo2.jpg">
    <div class="am-u-sm-12 lottery-main">
        <!--<div  style="margin-bottom: 10px;" class="am-u-sm-offset-4 am-u-sm-4 am-u-md-4 am-u-md-offset-4 am-u-lg-4 am-u-lg-offset-4">
            <div class="am-u-sm-4 am-usm-offset-4 allUser">-->
                <!--<div class="am-g " >
                    <div class="am-u-sm-6 am-u-sm-offset-4" id="avatar-parent">

                        <img class="am-circle " id="lottery-avatar" src="./Public/LotteryLib/JOTUN.jpg"/>
                    </div>
                </div>-->
                <div class="am-g " >

                    <div class="am-u-sm-4" id="name-parent">
                        <div id="name" class="am-btn am-btn-default am-round"disabled="disabled" >
                           <p>姓名</p>
                        </div>
                    </div>
                    <div class="am-u-sm-2 " id="avatar-parent">

                        <img class="am-circle " id="lottery-avatar" src="./Public/LotteryLib/JOTUN.jpg"/>
                    </div>
                    <div class="am-u-sm-6" id="phone-number-parent">
                        <div id="phone-number" class="am-btn am-btn-default am-round" disabled="disabled">
                           <p>手机号码</p>
                        </div>
                    </div>
                </div>
                <div class="am-g " >
                    <div class="am-u-sm-6">
                        <button  id="beginLottery" class=" am-btn am-btn-deafault am-btn-block am-round">
                            抽奖
                        </button>

                    </div>
                    <!--<div class="am-u-sm-7">
                        <button  id="stopLottery" class=" am-btn am-btn-deafault am-btn-block am-round">
                            停止
                        </button>

                    </div>-->

                 </div>


    </div>

  <!--  <div class="am-u-sm-2 blog-sidebar">
                <div class="am-panel-bd">

                    <?php if(is_array($awardList)): $i = 0; $__LIST__ = $awardList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl3): $mod = ($i % 2 );++$i;?><div class="am-radio ">
                            <label class="myFont">
                                <input type="radio"   class='mylevel' name="level"   value="<?php echo ($vl3["award_level"]); ?>"  >
                                <p class="myFont" class="myvl" ><strong><?php echo ($vl3["award_level"]); ?></strong></p>
                                <p class="myFont" class="am-text-primary"> <?php echo ($vl3["winner_number"]); ?>名
                                    &nbsp;&nbsp;<?php echo ($vl3["goods_name"]); ?></p>
                            </label>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>

    </div>-->

</div>
<!--输出中奖用户列表-->
<div class="am-g " id="show-lottery">
    <ul class="am-avg-sm-10 am-thumbnails">



    </ul>

</div>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.4.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="Public/amaze-css/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="Public/amaze-css/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.js"></script>


<!--<script src="Public/amaze-css/assets/js/app.js"></script>
-->
<script >

   $(document).ready(function(){
               //点击一次开始按钮后如何取消该按钮的禁用状态???????
                var obj;
                var objAll;
                var obj3;
                var i=0;
                var j=0;
       var nowLevel;
               //选择等级事件/*
             /*  $('.mylevel').click(function(){
                    //alert('选择'+ $('input[name="level"]:checked').val()+'?');
                   clearInterval(outLotteryList);
                   $("#lottery-user-list").empty();


               });*/

                //点击开始后,头像和名字快速滚动
               //中奖用户的列表
       $.get("?s=/Admin/Index/lotteryNowLevel",
               function (data) {
                   nowLevel=data;
                   //alert(nowLevel);
               });

       $.get("?s=/Admin/Index/lotteryPageAllSignUser",
               function(json1){

                   var dataAll=JSON.parse(json1);//解析json
                   objAll=eval(dataAll);//转变为json对象
                   // alert('所有用户数量'+objAll.length);
                   //到达抽奖的时间后,头像和姓名不滚动.

                   setInterval(outAllList, 200);
               });
       function outAllList(){

           if(j<=objAll.length||j<=obj.length){

               var objAvatar = ' <img class="am-circle "  id="lottery-avatar" src="' +
                       objAll[j].avatar_url + '" />';
               var objName =  '<div id="name" class="am-btn am-btn-default am-round" disabled="disabled">'+
                       objAll[j].real_name+'</div>';
               var objPhone ='<div id="phone-number" class="am-btn am-btn-default am-round"disabled="disabled" >'+
                       objAll[j].phone_number+'</div>';
               j+=1;
               $("#avatar-parent").html(objAvatar);
               $("#name-parent").html(objName);
               $("#phone-number-parent").html(objPhone);
               if(j==objAll.length)//循环遍历所有用户
                   //j=objAll.length+1;
               j=0;


           }
       }
                $('#beginLottery').click(function(){

                    $(".am-thumbnails").empty();
                    j=1000;
                    i=0;//防止没刷新页面时切换抽奖等级,重置i的值
                    clearInterval(outAllList);//点击开始抽奖时头像滚动切换成抽奖名单
                   /* checklevelVl = $('input[name="level"]:checked').val();
                   */

                        //用户头像等信息滚动+中奖用户
                   // alert(nowLevel);
                  //  if(nowLevel=="一等奖"||nowLevel=="二等奖"||nowLevel=="三等奖"||nowLevel=="特等奖") {
                      // alert(nowLevel);
                        //一,二,三等奖,头像在最后一个抽奖用户出来时停止滚动
                        $.get("?s=/Admin/Index/lotteryPageBegin",
                                function(json){
                                    var data=JSON.parse(json);//解析json
                                    obj=eval(data);//转变为json对象
                                     //alert('收到后台的数量'+obj.length);
                                    setInterval(outLotteryList2, 50);
                                });
                        function outLotteryList2(){
                            if(i<=obj.length){
                                var objAvatar = ' <img class="am-circle "  id="lottery-avatar" src="' +
                                        obj[i].avatar_url + '" />';
                                var objName =  '<div id="name" class="am-btn am-btn-default am-round" disabled="disabled">'+
                                        obj[i].real_name+'</div>';
                                var objPhone ='<div id="phone-number" class="am-btn am-btn-default am-round"disabled="disabled" >'+
                                        obj[i].phone_number+'</div>';
                                var append = '<li >' +
                                        '<img class="am-thumbnail am-circle" style="background-color: rgba(255, 255, 255, 0.31);width:150px;height:120px;margin:0px;padding:0px;" src="' + obj[i].avatar_url + '" />' +
                                        '<p style="text-align: center;color:black;font-weight: bolder;margin-top:-2px;">'+obj[i].real_name+'</p>' +
                                        '<p style="text-align: center;color:black;font-weight: bolder;margin-top:-10px;"">'+obj[i].phone_number+'</p>' +
                                        '</li>'
                                 $("#avatar-parent").html(objAvatar);
                                 $("#name-parent").html(objName);
                                 $("#phone-number-parent").html(objPhone);
                                $(".am-avg-sm-10").append(append);
                                i+=1;

                            }
                        }
                 /*   }else{
                        //alert(nowLevel);
                        //中奖的

                        $.get("?s=/Admin/Index/lotteryPageBegin",
                                function(json){
                                    var data=JSON.parse(json);//解析json
                                    obj=eval(data);//转变为json对象
                                    // alert('收到后台的数量'+obj.length);
                                    setInterval(outLotteryList, 50);
                                });
                        function outLotteryList(){
                            if(i<=obj.length){

                                var append = '<li>' +
                                        '<img class="am-thumbnail am-circle" style="background-color: rgba(255, 255, 255, 0.31);width:150px;height:150px;margin:0px;padding:0px;" src="' + obj[i].avatar_url + '" />' +
                                        '<p style="text-align: center;color:black;font-weight: bolder;margin-top:-2px;">'+obj[i].real_name+'</p>' +
                                        '<p style="text-align: center;color:black;font-weight: bolder;margin-top:-10px;"">'+obj[i].phone_number+'</p>' +
                                        '</li>'
                                $(".am-avg-sm-10").append(append);
                                i+=1;


                            }
                        }
                        //四,五等奖的时候,头像滚动的
                        $.get("?s=/Admin/Index/lotteryPageAllSignUser",
                                function(json1){

                                    var dataAll=JSON.parse(json1);//解析json
                                    objAll=eval(dataAll);//转变为json对象
                                    // alert('所有用户数量'+objAll.length);
                                    //到达抽奖的时间后,头像和姓名不滚动.

                                    setInterval(outAllList, 200);
                                });
                        function outAllList(){

                                if(j<=objAll.length||j<=obj.length){

                                    var objAvatar = ' <img class="am-circle "  id="lottery-avatar" src="' +
                                            objAll[j].avatar_url + '" />';
                                    var objName =  '<div id="name" class="am-btn am-btn-default am-round" disabled="disabled">'+
                                            objAll[j].real_name+'</div>';
                                    var objPhone ='<div id="phone-number" class="am-btn am-btn-default am-round"disabled="disabled" >'+
                                            objAll[j].phone_number+'</div>';
                                    j+=1;
                                    $("#avatar-parent").html(objAvatar);
                                    $("#name-parent").html(objName);
                                    $("#phone-number-parent").html(objPhone);
                                    if(j==obj.length)//循环遍历所有用户
                                        j=objAll.length+1;


                                }
                            }


                        }*/


                });

            }

    );

</script>
</body>
</html>