<?php
namespace Home\Controller;
use Think\Controller;
header('Content-Type:text/html; charset=utf-8');
class IndexController extends Controller {
    public function index(){
     $this->display('Index:index');
    }
    public function signPage(){
        $this->display('Index:sign-page');
    }
    //上传签到信息
    public function checkSignIn(){
        $User = M('User');
        $data['real_name']=trim(I('post.real'));//姓名
        $data['phone_number']=trim(I('post.number'));//手机号
        $data['status']=trim(I('post.status'));//身份
        $data['lottery_allow']=1;//默认允许抽奖
        $data['lottery_done']=0;//默认还没抽奖

        if($data['phone_number']!==null&&$data['real_name']!==null&&$data['status']!==null){
            ////判断是否在名单里,不在则需要把身份设置为未知,且抽奖资格留空.
            $map['real_name']= $data['real_name'];
           // $map['phone_number'] =$data['phone_number'];
            //跟全部员工表的姓名做对比
            $allStaff = M('all_staff');
            $isInList=$allStaff->where($map)->find();
            if(!$isInList){
                //不在名单里
                //echo "<script>alert('您没有邀请函');</script>";
                $data['status']="未知";//身份
                $data['lottery_allow']=0;//不允许抽奖
                //在名单里

            }
            if($data['status']==="嘉宾"){//嘉宾身份
                $data['lottery_allow']=0;//不允许抽奖
            }
                // 上传文件
           if($User->where($map)->find()){
               echo "<script>alert('你已签到成功，无需再提交信息！')</script>";
                header('Location:?s=/home/Index/signPage');
            }else{
                $setting=C('UPLOAD_SITEIMG_QINIU');
                $upload = new \Think\Upload($setting);// 实例化上传类
                $info   =   $upload->upload();
                if(!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                }
                $data['avatar_url'] ="http://7xkr3w.com1.z0.glb.clouddn.com/".date("Y-m-d")."_".$info['photo']['savename'];
                $data['sign_time'] = date('Y-m-d H:i:s',time());
                $profile = $User->add($data);
                if($profile){
                    //更新全部员工表中的签到状态
                    $map1['real_name']=$data['real_name'];
                    $data3['signed']="是";
                    $allStaff->where($map1)->save($data3);
                    /*if($up)
                    {
                        echo "<script>alert('成功更新签到状态！')</script>";
                    }else{
                        echo "<script>alert('更新签到状态错误')</script>";
                    }*/

                    //更新统计数据,最近签到人数()和总签到人数(签到人数与总参会人数?)
                    $number =M ('Data_sum');
                    $last_sign=$number->where('id=1')->find();
                    if(time()-$last_sign['last_sign_time']<120){
                        $data2['latest_sign_number']=$last_sign['latest_sign_number']+1;
                        $number->where('id=1')->save($data2);
                    }else{
                        $data3['latest_sign_number']=1;
                        $number->where('id=1')->save($data3);
                    }
                    $data1['last_sign_time']=time();
                    $data1['total_sign_number']=$last_sign['total_sign_number']+1;
                    $number->where('id=1')->save($data1);
                    //判断身份
                    if($data['status']=="嘉宾"){//员工
                        $vipSuccess='签到成功,你是第'.$data1['total_sign_number'].'位签到,因您是嘉宾，本次参加年会不参与抽奖！谢谢！';
                        $this->assign('vipSigned',$vipSuccess);
                        $this->display('Index:sign-success');

                    }elseif($data['status']=="员工"){
                        $staffSuccess ='签到成功,你是第'.$data1['total_sign_number'].'位签到,签到成功后可参加抽奖';
                        $this->assign('staffSigned',$staffSuccess);
                        $this->display('Index:sign-success');

                    }else{
                        $unknowSuccess ='签到成功,你是第'.$data1['total_sign_number'].'位签到,由于您未在本次年会名单中,工作人员将会对您进行核查,谢谢!';
                        $this->assign('unknowSigned',$unknowSuccess);
                        $this->display('Index:sign-success');
                    }

                }else{
                   // $this->error('签到失败');
                    echo "<script>alert('你所提交信息有误，请重新提交!')</script>";
                    header('Location:?s=/home/Index/signPage');
                }


            }

//dump($data);
        }else{
            echo "<script>alert('所有信息不能为空,且请填写正确的手机号码!')</script>";
            //$this->error('所有信息不能为空,且请填写正确的手机号码!');
        }

    }

public function showsuccess(){
    $this->display('Index:sign-success');
}

}