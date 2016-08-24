<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>签到系统--首页</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate icon" type="image/png" href="Public/amaze-css/assets/i/favicon.png">
    <link rel="stylesheet" href="Public/amaze-css/assets/css/amazeui.min.css"/>

</head>
<body style="background-image: url(http://139.129.34.35/yearMeeting/Public/picture/bg-image.jpg);">
<div class="am-g am-g-fixed">
    <div class="am-u-sm-10 " style="margin-top: 20px;margin-bottom: 15px;">
        <a href="?s=/home/Index/signPage">
            <img style="height:100px;margin-left:15px;" src="./Public/LotteryLib/logo2.jpg">
        </a>
    </div>

</div>
<div class="am-g am-g-fixed">
    <div class="am-u-sm-12  am-u-sm-centered">

        <form class="am-form" method="post" action="/aliyunHost/lottery/?s=/Home/Index/checkSignIn" enctype="multipart/form-data" >
            <fieldset>
                <legend><small>填写签到信息 <!-- <a class="am-fr am-icon-magic" href="/aliyunHost/lottery?s=/Admin"><span>后台入口</span> </a>-->
                    <a style="color: #4b59ff"> Please enter your personal information! All options are necessary! </a> </small>


                    </legend>

                <div class="am-form-group">
                    <label >真实姓名<a style="color: #4b59ff"> Enter FirstName LastName. </a></label>
                    <input type="text" class="" name="real"  placeholder="输入真实姓名">
                </div>

                <div class="am-form-group">
                    <label for="doc-ipt-phone-1">手机号码<a style="color: #4b59ff">  Enter telephone Number.  </a></label>
                    <input type="number" class="" name="number" id="doc-ipt-phone-1" placeholder="输入手机号码">
                </div>
                <div class="am-form-group">
                    <label for="doc-ipt-phone-1">选择身份(嘉宾不参与抽奖!)<a style="color: #4b59ff">  Choose your status. (VIP can not join lottery activity.)</a></label><br/>
                    <label class="am-radio-inline">
                        <input type="radio"  name="status" value="员工"> 普通员工(normal staff)
                    </label>
                    <label class="am-radio-inline">
                        <input type="radio" name="status" value="嘉宾">嘉宾(VIP)
                    </label>
                    <hr>
                </div>
                <div class="am-form-group">
                    <label >本人照片<a style="color: #4b59ff">  Upload your photo. Format support: jpg,png,gif,bmp;max-size: 2MB</a></label>


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


                <p><button type="submit" class="am-btn am-btn-primary am-btn-fr" id="confirmSign">提交(Submit)</button></p>
            </fieldset>
        </form>
        <footer class="my-footer">
            <p style="text-align: center">*请正确填写并提交所有信息，此提交信息将进入抽奖程序中!
                </p>

        </footer>

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