
$(document).ready(function(){
        var levelVl;
        var checklevelVl;
        var clickCount;
        var obj;
        var objAll;
        var objList;
        var i=0;
        var j=0;
        var k=2000;
        var isBegin=0;
        var avatar_url;
        var levelNumber;
        var stopList = ' <img class="am-circle " style="" src="Public/image/staticAvatar.png" width="160" max-height="160"/>'+
                '<p style="margin-left: 45px;margin-right:auto;margin-bottom: 20px;" class="am-btn am-btn-default am-round">姓名</p>';

        $(".allUser").html(stopList);//加载好页面的头像和姓名

        $('.mylevel').click(function(){
            clickCount='enable';
            //更换等级是清空中奖列表
            $(".am-thumbnails").empty();
          //  levelVl = $('input[name="level"]:checked').val();
            //alert('选择'+levelVl+'?');

        });
        //点击开始后,头像和名字快速滚动
    $('.classLotteryBegin').click(function(){

            j=0;//防止没刷新页面时切换抽奖等级,重置i的值
            checklevelVl = $('input[name="level"]:checked').val();
            if(checklevelVl!=null){
                //console.log(checklevelVl);
                switch (checklevelVl){
                    case "特等奖":
                        levelNumber =1;
                        break;
                    case "一等奖":
                        levelNumber=1;
                        break;
                    case "二等奖":
                        levelNumber=4;
                        break;
                    case "三等奖":
                        levelNumber=10;
                        break;
                    case "五等奖":
                        levelNumber=40;
                        break;
                    default:
                        levelNumber=0;
                }
                console.log(levelNumber);
                $.get("?s=/Admin/Index/lotteryAll",
                    function(json1){

                        var dataAll=JSON.parse(json1);//解析json
                        objAll=eval(dataAll);//转变为json对象
                        //alert('所有用户数量'+objAll.length);
                        //到达抽奖的时间后,头像和姓名不滚动.

                            setInterval(outAllList, 500);


                    });
                function outAllList(){
                    if(j<objAll.length){
                         objList = ' <img class="am-circle " style="" src="' + objAll[j].avatar_url + '" max-width="170" height="160"/>'+
                            '<p style="margin-left: 45px;margin-right:auto;margin-bottom: 20px;" class="am-btn am-btn-default am-round">'+objAll[j].real_name+'</p>';
                        j+=1;
                        $(".allUser").html(objList);


                        if(j==objAll.length )//循环遍历所有用户
                           j=0;


                    }


                }
            }



    });
        $('#beginLottery').click(function(){
            $(".am-thumbnails").empty();
            i=0;//防止没刷新页面时切换抽奖等级,重置i的值
            checklevelVl = $('input[name="level"]:checked').val();
            if(checklevelVl==null){
                alert( '你未选择抽奖等级');
            }else{
             // alert('你的选择是'+$('input[name="level"]:checked').val());
                //如果连续两次的level一样,不返回数据.
                if(clickCount==='enable'){
                    clickCount='disable';
                    $.post("?s=/Admin/Index/lotteryBegin",
                        {
                            level:checklevelVl
                        },
                        function(json){

                                var data=JSON.parse(json);//解析json
                                obj=eval(data);//转变为json对象
                                //alert(obj.length);
                            setInterval(outLotteryList, 2000);
                        });
                        function outLotteryList(){
                                if(i<=obj.length){
                                    var append = '<li style="background-color: #48cb70;height:105px;" class="am-thumbnail" >' +
                                        '<img  style="height=60px;width:65px;" src="' + obj[i].avatar_url + '" /><p style="text-align: center;font-size: smaller;">'+obj[i].real_name+'</p></li>';
                                    i+=1;
                                    $(".am-thumbnails").append(append);
                                }
                        }





                }else{
                    alert( '不能连续对同一等级抽奖,请重新选择抽奖等级!');

                }


            }
        });

    }

);





/*var g_Interval = 1;
var g_PersonCount = 500;//参加抽奖人数
var g_Timer;
var running = false;
function beginRndNum(trigger){
	if(running){
		running = false;
		clearTimeout(g_Timer);		
		$(trigger).val("开始");
		$('#ResultNum').css('color','red');
	}
	else{
		running = true;
		$('#ResultNum').css('color','black');
		$(trigger).val("停止");
		beginTimer();
	}
}

function updateRndNum(){
	var num = Math.floor(Math.random()*g_PersonCount+1);
	$('#ResultNum').html(num);
}

function beginTimer(){
	g_Timer = setTimeout(beat, g_Interval);
}

function beat() {
	g_Timer = setTimeout(beat, g_Interval);
	updateRndNum();
}

    */

