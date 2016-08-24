//Creating 50 thumbnails inside .grid
//the mainPageImage are stored on the server serially. So we can use a loop to generate the HTML.

/*var mainPageImage = "", count = 201;
for(var i = 1; i <= count; i++)
    mainPageImage += '<img src="./Uploads/lotteryUserImages/'+i+'.jpg" />';

//appending the mainPageImage to .grid
$(".grid").append(mainPageImage);
*/
var d = 0; //delay
var ry, tz, s; //transform params

//animation time
$(".animate").on("click", function(){
    //fading out the thumbnails with style
    $("img.grid-image").each(function(){
        d = Math.random()*1000; //1ms to 1000ms delay
        $(this).delay(d).animate({opacity: 0}, {
            //while the thumbnails are fading out, we will use the step function to apply some transforms. variable n will give the current opacity in the animation.
            step: function(n){
                s = n; //scale - will animate from 0 to 1
                $(this).css("transform", "scale("+s+")");
            },
            duration: 1000,
            easing: 'easeInOutElastic',
        })
    }).promise().done(function(){
        //after *promising* and *doing* the fadeout animation we will bring the images back
        storm();
    })
})
//bringing back the images with style
function storm()
{
    $("img.grid-image").each(function(i){
        d = Math.random()*1000;
        $(this).delay(d).animate({opacity: 1}, {
            step: function(n){
                //rotating the images on the Y axis from 360deg to 0deg
                ry = (1-n)*-360;
                //translating the images from 1000px to 0px
                tz = (1-n)*1000;
                //applying the transformation
                $(this).css("transform", "rotateY("+ry+"deg) translateZ("+tz+"px) translateY("+tz+"px)");
            },
            duration: 3000,
            //some easing fun. Comes from the jquery easing plugin.
            easing: 'easeOutQuint',
        })
    })
}
//定时自动执行更新列表
function dingShi() {
    $('.animate').trigger("click");
}
setInterval(dingShi, 9000);

/*
//隐藏图片标题
$('.myText').hide();
    */