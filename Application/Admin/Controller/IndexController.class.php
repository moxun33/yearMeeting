<?php
namespace Admin\Controller;
use Think\Controller;
header('Content-Type:text/html; charset=utf-8');

class IndexController extends Controller {

    public function index(){
        
        if(session('uid')!==""){
            $this->isLogin();
            $sign_user =M('User');
            $number =M ('Data_sum');
            $data_info=$number->where('id=1')->find();
            $this->assign('now_sign_number',$data_info['latest_sign_number']);
            $this->assign('total_sign_number',$data_info['total_sign_number']);
            $this->assign('total_meeting_number',$data_info['total_meeting_number']);
            $user_list =$sign_user->order('sign_time DESC')->select();//所有签到用户
            $this->assign('list',$user_list);
            $this->display('Index:index');
        }else{
            $this->display('Index:login');
        }

    }
    private function isLogin(){
        $this->assign('myName',session('uname'));
    }
    //首页抽奖候选用户的管理(删除)
    public function deleteUser(){
        if(session('uid')!==""){
            $this->isLogin();
            $User=M('User');
            $res = $User->delete($_GET['id']);
            if($res){
                $da=M('Data_sum');
                $desc_number=$da->where('id=1')->find();
                $data2['total_sign_number']=$desc_number['total_sign_number']-1;
                $da->where('id=1')->save($data2);
                $this->success('操作成功！','?s=/admin',1);
            }else{
                $this->error('操作失败!',$this->site_url,1);
            }

        }else{
            $this->display('Index:login');
        }


    }

    //签到用户导出
    public function signUserOut(){
        header("Content-type: text/html; charset=utf-8");
        if(session('uid')!==""){
            $this->isLogin();
            $Jinglongyu =M('User');

            $user_list = $Jinglongyu->order('sign_time desc')->select();
            //print_r($user_list);
            //echo json_encode($user_list);
            //exit;
            $data = array();
            foreach ($user_list as $k=>$user_info){
                $data[$k][id] = $user_info['id'];
                $data[$k][name] = $user_info['real_name'];

                $data[$k][phone]  = '+86'.$user_info['phone_number'];

                $data[$k][stime] = date('Y-m-d H:i:s',$user_info['sign_time']);
            }

            //print_r($user_list);
            //print_r($data);exit;

            foreach ($data as $field=>$v){
                if($field == 'id'){
                    $headArr[]='ID';
                }

                if($field == 'name'){
                    $headArr[]='姓名';
                }


                if($field == 'phone'){
                    $headArr[]='手机号码';
                }
                if($field == 'stime'){
                    $headArr[]='签到时间';
                }

            }

            $filename="全部签到人员表";

            $this->getExcel($filename,$headArr,$data);
        }else{
            $this->display('Index:login');
        }


    }
    //excel导出类
    private  function getExcel($fileName,$headArr,$data){
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        Vendor("PHPExcel");
        Vendor("PHPExcel.Writer.Excel5");
        Vendor("PHPExcel.IOFactory.php");

        $date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";

        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        //print_r($headArr);exit;
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }

        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();

        //print_r($data);exit;
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);

                $objActSheet->setCellValue($j.$column, $value);


                $span++;
            }
            $column++;
        }


        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        //$objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }

    //手动添加签到用户(页面)
    public function addUser(){
        if(session('uid')!==""){
            $this->isLogin();
            $this->display('Index:addSignUser');
        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }

    }

    //检测手动添加签到用户
    public function checkAddUser(){
        header('Content-Type:text/html; charset=utf-8');
        if(session('uid')!==""){
            $this->isLogin();
            $User = M('User');
            $data['real_name']=trim(I('post.real'));//姓名
            $data['phone_number']=trim(I('post.number'));//手机号
            $data['status']=trim(I('post.status'));//身份
            $data['lottery_done']=0;//默认还没抽奖
            $data['lottery_allow']=trim(I('post.allowLottery'))=='是'?1:0;
            //echo json_encode($data);
            if(is_numeric($data['phone_number'])&&strlen($data['phone_number'])<=13){
                if($data['phone_number']!==null&&$data['real_name']!==null&&$data['status']!==null){
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
                        if($data['status']!=='嘉宾'){//员工

                            $this->success('添加并签到成功,这是第'.$data1['total_sign_number'].'签到,签到成功后可参加抽奖',
                                '?s=/Admin/Index/addUser',5);
                        }else{
                            $this->success('添加并签到成功,这是第'.$data1['total_sign_number'].'签到,因该用户身份是嘉宾，本次参加年会不参与抽奖！谢谢！',
                                '?s=/Admin/Index/addUser',5);
                        }

                    }else{
                        $this->error('添加失败');
                    }

                }else{

                    $this->error('所有信息不能为空!');

                }
            }else{
                $this->error('请正确填写手机号码!');
            }



        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }

    }
    //编辑签到用户的信息(页面)
    public function editSignUser(){
        if(session('uid')!==""){
            $this->isLogin();
            $all=M('User');
            $editInfo = $all->where('id='.$_GET['id'])->find();
            $this->assign('id',$_GET['id']);
            $this->assign('name',$editInfo['real_name']);
            $this->assign('phone',$editInfo['phone_number']);
            $this->assign('status',$editInfo['status']);
            $this->assign('setLevel',$editInfo['level']);
            $this->assign('avatar_url',$editInfo['avatar_url']);
            $this->display('Index:editSignUser');
        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }

    }
   //处理编辑签到用户的信息
    public function checkEditSignUser(){
        if(session('uid')!==""){
            $this->isLogin();
            $editSign=M('User');
            $map['id']=I('id');
            $data['real_name']=I('real');
            $data['status']=I('status');
            $data['phone_number']=I('phone');
            $data['level']=I('level');
            $res=$editSign->where($map)->save($data);
            if($res){
                $this->success('编辑成功','?s=/Admin/Index',3);
            }else{
                $this->error('编辑失败',$this->stie_url,3);
            }
        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }

    }

    //login页面
    public function loginPage(){
        $this->display('Index:login');
    }

    //登录验证
    public function checkLogin(){
        header('Content-Type:text/html; charset=utf-8');
        // 检查验证码
        /* $verify = I('param.verify','');
            if(!check_verify($verify)){
           $this->error("验证码错误！",$this->site_url,3);
           }    */
        $user =M ('Admin');
        $name = trim(I('post.user'));
        $pwd = trim(I('post.pwd'));
        $condition['name'] = $name;
        $condition['passwd'] = $pwd;
        $user_info= $user->where($condition)->find();
        if($user_info&&$user_info['passwd']===$pwd&&$user_info['state']==1){
            session('uid',$user_info['id']);
            session('uname',$user_info['name']);
            $this->success('登录成功,返回首页！','?s=/Admin/',1);
        }else{
            $this->error('信息错误或用户被禁用!',$this->site_url,1);
        }

    }
    //退出登录
    public function logout(){
        if(session('uid')!==""){
            session('uid',null);
            session('uname',null);
            $this->success('退出成功！','?s=/Home',1);
        }else{
            $this->error('未登录!',$this->site_url,1);
        }
    }

    //创建,管理奖品的页面
    public function awardPage(){
        if(session('uid')!==""){
            $this->isLogin();
            $award =M('Award_goods');
            $award_list = $award->order('winner_number')->select();
            $this->assign('awardList',$award_list);
            $this->display('Index:award');
        }else{
            $this->display('Index:login');
        }

    }
    //处理创建奖品过程
    public function createAward(){

        if(session('uid')!==""){
            $this->isLogin();
            $create=M('Award_goods');
            $data['goods_name']=I('post.goodsName');
            $data['winner_number']=I('post.goodsNumber');
            $data['award_level']=I('post.awardLevel');
            $created=$create->add($data);
            if($created){
                $this->success('创建成功','?s=/Admin/Index/awardPage',1);
            }else{
                $this->erro('创建失败',$this->site_url,1);
            }

        }else{
            $this->display('Index:login');
        }
    }
    //编辑奖品的页面
    public function editAward($id){
        if(session('uid')!==""){
            $this->isLogin();
            $edit=M('Award_goods');
            $map['id']=$_GET['id'];
            $res = $edit->where($map)->find();
            if($res){
                $this->assign('editAward',$res);
                $this->display('Index:editAward');
            }else{
                $this->error('未知错误!',$this->site_url,1);
            }
        }else{
            $this->display('Index:login');
        }

    }
    //处理编辑奖品的更新过程
    public function updateAward(){
        if(session('uid')!==""){
            $this->isLogin();
            $update=M('Award_goods');
            $data['id']=I('post.id');
            $data['goods_name']=I('post.goodsName');
            $data['winner_number']=I('post.goodsNumber');
            $data['award_level']=I('post.awardLevel');

            $res=$update->save($data);
           if($res){
                $this->success('编辑成功','?s=/Admin/Index/awardPage',1);
            }else{
                $this->error('数据未改变',$this->site_url,1);
            }

        }else{
            $this->display('Index:login');
        }
    }
    //处理删除奖品过程
    public function deleteAward(){
        if(session('uid')!==""){
            $this->isLogin();
            $delete=M('Award_goods');
            $res = $delete->delete($_GET['id']);
            if($res){
                $this->success('删除成功','?s=/Admin/Index/awardPage',1);
            }else{
                $this->erro('删除失败',$this->site_url,1);
            }
        }else{
            $this->display('Index:login');
        }

    }
    //系统设置的页面
    public function settingPage(){
        if(session('uid')!==""){
            $this->isLogin();
            //返回特等奖配置信息

            $configModel =M('config');
            $special =$configModel->where('id=1')->find();
            $level =trim($special['now_level']);
            $this->assign('specialToggle',$special['special_toggle']);
            $this->assign('nowLevel',$special['now_level']);



            $this->display('Index:setting');
        }else{
            $this->display('Index:login');
        }

    }
    //更新统计数据;前台签到后更新最近签到(一分钟内的:last_sign_time)人数和总签到人数
    public function updateMeetingNum(){
        if(session('uid')!==""){
            $number =M ('Data_sum');
            $data['total_meeting_number'] = intval(trim(I('post.meeting')));
            if(I('post.meeting')!==''){
                $data['act_person']=session('uname');

                $update =$number->where('id=1')->save($data);
                if($update){
                    $this->success('更新成功,返回首页！','?s=/Admin/',1);
                }else{
                    $this->error('未授权!',$this->site_url,1);

                }
            }else{
                $this->error('不允许为空!',$this->site_url,1);
            }


        }else{
            $this->display('Index:login');
        }

    }
    //添加管理员页面
    public function addAdminPage(){
        if(session('uid')!==""){
            $this->isLogin();
            $this->display('Index:add');
        }else{
            $this->display('Index:login');
        }

    }
    //addAdmin处理添加管理员
    public function addAdmin(){
        if(session('uid')!==""){
            $admin = M('Admin');
            $data['name']=trim(I('post.user'));
            $data['passwd']=trim(I('post.pwd'));
            if($admin->add($data)){
                $this->success('添加成功,返回首页！','?s=/Admin/',1);
            }else{
                $this->error('未授权!',$this->site_url,1);
            }
        }else{
            $this->display('Index:login');
        }
    }
    //照片墙
    public function photoWall(){
       if(session('uid')!==""){
            $this->isLogin();
           $avatar =M('User');
           $lists =$avatar->select();
           $this->assign('avatarInfo',$lists);
           $this->display('Index:photo-wall');

        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',3);
        }

    }


    //公司全部员工列表
    public function showAllStaff(){
        //
        //登录检测
        if(session('uid')!==""){
            $this->isLogin();

            $allStaff = M('all_staff');
            $all_list = $allStaff->select();
            $this->assign('alllist',$all_list);
            $this->display('Index:all-staff');
        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }

    }

    //从全部员工列表删除某员工
    public function deleteFromAllStaff(){
        //登录检测
        if(session('uid')!==""){
            $this->isLogin();
            $this->error('没有删除权限');
        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }


    }
    //从全部员工列表编辑某员工
    public function editAllStaff(){
        //登录检测
        if(session('uid')!==""){
            $this->isLogin();
            $all=M('all_staff');
            $editInfo = $all->where('id='.$_GET['id'])->find();
            $this->assign('id',$_GET['id']);
            $this->assign('name',$editInfo['real_name']);
            $this->assign('status',$editInfo['status']);
            $this->assign('setLevel',$editInfo['level']);
            $this->assign('department',$editInfo['department']);
            $this->display('Index:editAllStaff');
        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }


    }
    //处理编辑全部员工的信息
    public function checkEditAllStaff(){
        //登录检测
        if(session('uid')!==""){
            $this->isLogin();
            $all=M('all_staff');
            $map['id']=I('id');
            $data['real_name']=I('real');
            $data['department']=I('belong');
            $data['status']=I('status');
            $data['level']=I('level');
            $res=$all->where($map)->save($data);
            if($res){
                $this->success('编辑成功','?s=/Admin/Index/showAllStaff',1);
            }else{
                $this->error('编辑失败',$this->stie_url,1);
            }

        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }


    }
    //从Excel导入全部员工
    public function upload(){
        //登录检测
        if(session('uid')!==""){
            $this->isLogin();
            //上传文件
            header("Content-Type:text/html;charset=utf-8");
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('xls', 'xlsx');// 设置附件上传类。
            $upload->savePath  =      '/Uploads/Attachment/'; // 设置附件上传目录
            // 上传文件
            $info   =   $upload->uploadOne($_FILES['excelData']);
            $filename = './Uploads'.$info['savepath'].$info['savename'];
            $exts = $info['ext'];
            //print_r($info);exit;
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功
                //$this->success("success!");
                $this->allStaffImport($filename, $exts);
            }
        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }


    }
    //员工导入类
    public function allStaffImport($filename, $exts='xlsx'){
        //登录检测
        if(session('uid')!==""){
            $this->isLogin();
            //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能import导入
            vendor("PHPExcel");
            //创建PHPExcel对象，注意，不能少了\
            $PHPExcel=new \PHPExcel();

            //如果excel文件后缀名为.xls，导入这个类
            if($exts == 'xls'){
                import("Vender.PHPExcel.Reader.Excel5");
                $PHPReader=new \PHPExcel_Reader_Excel5();
            }else if($exts == 'xlsx'){
                import("Vender.PHPExcel.Reader.Excel2007");
                $PHPReader=new \PHPExcel_Reader_Excel2007();
            }
            //载入文件
            $PHPExcel=$PHPReader->load($filename);
            $PHPExcel->setActiveSheetIndex(0);
            //$sheetCount = getSheetCount();
            // for($num=0;$num<=$sheetCount-1;$num++){
            //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
            $currentSheet=$PHPExcel->getSheet(0);
            //获取总列数
            $allColumn=$currentSheet->getHighestColumn();
            //获取总行数
            $allRow=$currentSheet->getHighestRow();
            //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
            /*   for($currentRow=1;$currentRow<=$allRow;$currentRow++){
                   //从哪列开始，A表示第一列
                   for($currentColumn='A';$currentColumn<=$allColumn;$currentColumn++){
                       //数据坐标
                       $address=$currentColumn.$currentRow;
                       //读取到的数据，保存到数组$arr中
                       $data[$currentRow][$currentColumn]=$currentSheet->getCell($address)->getValue();
                   }

               }
            */ for ($i = 2; $i <= $allRow; $i++){
                $item['status']=$currentSheet->getCell('B'.$i)->getValue();
                $item['real_name']=$currentSheet->getCell('D'.$i)->getValue();
                $item['department']=$currentSheet->getCell('C'.$i)->getValue();
                $data[]=$item;
            }
            //$this->save_import($data);
            $success=0;
            $error=0;
            $sum=count($data);
            foreach($data as $k=>$v){
                if(M('all_staff')->data($v)->add()){
                    $success++;
                }else {
                    $error++;
                    $this->error('导入失败');
                }
            }
            if($sum>=151){
                echo "<script>alert('导入成功');</script>";
                header('Location:?s=/Admin/Index/showAllStaff');
            }else{
                echo "<script>alert('部分导入失败');</script>";
                header('Location:?s=/Admin/Index/showAllStaff');
            }



            //}

        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }





    }
    //全部员工导出
    public function allStaffOutExcel(){
        header("Content-type: text/html; charset=utf-8");
        if(session('uid')!==""){
            $this->isLogin();
            $alls =M('all_staff');

            $user_list = $alls->select();
            //print_r($user_list);
            //echo json_encode($user_list);
            //exit;
            $data = array();
            foreach ($user_list as $k=>$user_info){
                $data[$k][id] = $user_info['id'];
                $data[$k][name] = $user_info['real_name'];

                $data[$k][status]  = $user_info['status'];
                $data[$k][signed]  = $user_info['signed'];
                $data[$k][gotAward]  = $user_info['level'];

            }

            //print_r($user_list);
            //print_r($data);exit;

            foreach ($data as $field=>$v){
                if($field == 'id'){
                    $headArr[]='ID';
                }

                if($field == 'name'){
                    $headArr[]='姓名';
                }


                if($field == 'status'){
                    $headArr[]='身份';
                }
                if($field == 'signed'){
                    $headArr[]='已签到';
                }
                if($field == 'gotAward'){
                    $headArr[]='中奖(空白即不中奖)';
                }

            }

            $filename="全部人员年会记录表";

            $this->getExcel($filename,$headArr,$data);
        }else{
            $this->display('Index:login');
        }
    }

    //未知人员但签到了的
    public function unknowSignUser(){
        //登录检测
        if(session('uid')!==""){
            $this->isLogin();
            $unknowUser =M('User');

            $condition['status'] = "未知";
            $unknowList = $unknowUser->where($condition)->select();
            $num =count($unknowList);
            for($i=0;$i<$num;$i++) {
              $unknowList[$i]['lottery_allow']= $unknowList[$i]['lottery_allow']=='1'?'是':'否';
            }
            $this->assign('unknowUserList',$unknowList);
            $this->display('Index:unknow');
        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }


    }
    //从未知人员列表编辑某员工(页面)
    public function editUnknowUser(){
        //登录检测
        if(session('uid')!==""){
            $this->isLogin();
            $info=M('User');
            $map['id']=intval(trim($_GET['id']));

            $editInfo = $info->where($map)->find();
            $this->assign('id',$_GET['id']);
            $this->assign('name',$editInfo['real_name']);
            $this->assign('phone',$editInfo['phone_number']);
            $this->assign('status',$editInfo['status']);
            $this->assign('allow',$editInfo['lottery_allow']);
            $this->assign('avatar_url',$editInfo['avatar_url']);
            $this->display('Index:editUnknowUser');
        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }


    }

    //从未知人员列表编辑某员工(动作)
    public function checkEditUnknowUser(){
        //登录检测
        if(session('uid')!==""){
            $this->isLogin();

            $edit=M('User');
            $allStaff=M('all_staff');
            $map['id']=I('id');
            $data['real_name']=I('real');
            $data['status']=I('status');
            $data['phone_number']=I('phone');
            $data['lottery_allow']=I('allow')=='是'?1:0;
            //dump($data);
           $res=$edit->where($map)->save($data);
            if($res){
                //未知人员加到全部员工列表中
                $data1['real_name']=I('real');
                $data1['department']='JCMC';
                $data1['status']=I('status');
                $data1['signed']="是";
                $allStaff->add($data1);
                $this->success('编辑成功','?s=/Admin/Index/unknowSignUser',3);
            }else{
                $this->error('编辑失败',$this->stie_url,3);
            }
        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }


    }

    //从未知人员列表删除某员工
    public function deleteUnknowUser(){
        //登录检测
        if(session('uid')!==""){
            $this->isLogin();
            $this->error('删除失败');
        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }


    }

    //更改领奖状态
   public function changeGotAward(){
         $id = I('get.id');
       $map['id']=$id;
       $lottery = M('lottery_list');
       $info =$lottery->where($map)->find();
       $nowGotAwardState =$info['got_award'];
       if($nowGotAwardState==='否'){
           $data['got_award']="是";
           $res = $lottery->where($map)->save($data);
           if($res){
               $this->success('成功改为已领奖状态');
           }
       }else{
           $data['got_award']="否";
           $res = $lottery->where($map)->save($data);
           if($res){
               $this->success('成功改为未领奖状态');
           }
       }

    }

    //检测特等奖开启
    public function checkSpecial(){
        header('Content-Type:text/html; charset=utf-8');
        $toggle_from = trim(I('post.toggleValue'));
        if($toggle_from!==''){
            $configModel =M('config');
            $special =$configModel->where('id=1')->find();
            $toggle = $special['special_toggle'];
            if($toggle_from!==$toggle){
                $data['special_toggle']=$toggle_from;
                $res = $configModel->where('id=1')->save($data);
                if($res){
                    echo "配置已修改,开启特等奖: ".$toggle_from;
                }
            }else{

            }
        }else{
            echo "不能为空";
        }


    }
    //中奖者名单显示页面
    public function adminLotteryUserList(){
        //登录检测
        if(session('uid')!==""){
            $this->isLogin();
            $condition5['level']='五等奖';
            $condition4['level']='四等奖';
            $condition3['level']='三等奖';
            $condition2['level']='二等奖';
            $condition1['level']='一等奖';
            $condition0['level']='特等奖';
            $lottery = M('lottery_list');
            $level5 = $lottery->where($condition5)->select();
            $level4 = $lottery->where($condition4)->select();
            $level3 = $lottery->where($condition3)->select();
            $level2 = $lottery->where($condition2)->select();
            $level1 = $lottery->where($condition1)->select();
            $level0 = $lottery->where($condition0)->select();
            $this->assign('level5List',$level5);
            $this->assign('level4List',$level4);
            $this->assign('level3List',$level3);
            $this->assign('level2List',$level2);
            $this->assign('level1List',$level1);
            $this->assign('level0List',$level0);
            $this->display('Index:lottery-list');
        }else{
            $this->error('非法操作,先登录','?s=/Admin/Index/loginPage',2);
        }

    }
    //进入抽奖页面
    public function lotteryPage(){
            $award =M('Award_goods');
        $config =M('config');
        $special = $config->where('id=1')->find();
        if($special['special_toggle']!=='否'){
            //开启特等奖
            $award_list = $award->order('id')->select();
        }else{
            //不开启特等奖
            $award_list = $award->where('id!=0')->order('id')->select();
        }
        $this->assign('awardList',$award_list);
        $this->display('start-lottery');
    }
    //前端抽奖平台开始按钮的post请求,返回全部候选用户,用于滚动
    public function lotteryPageAllSignUser(){//加上嘉宾和未知人员
        $user=M('User');
        $map['lottery_done']=false;//头像滚动只显示未中奖的
        $res = $user->where($map)->select();
        shuffle($res);
        echo json_encode($res);
    }

    //后台设置当前抽奖等级
    public function setNowLevel(){
        $nowLevel=I('post.nowLevel');
        $config=M('config');
        $data['now_level']=$nowLevel;
        $res=$config->where('id=1')->save($data);
        if($res){
            $this->success('成功更改当前抽奖等级为'.$nowLevel);
        }

    }
    /*前端抽奖平台开始按钮的post请求,返回对应等级的抽奖用户结果.
    *   从数据库抽取用户后,在签到用户表做相应标记,不允许此轮用户进入下一轮抽奖.
     * 在中奖者表记录中奖人和生成兑奖号,并发送短信
     *
     *

    */
    public function lotteryNowLevel(){
        $config=M('config');
        $nowLevel=$config->where('id=1')->find();
        echo $nowLevel['now_level'];
    }
    public function lotteryPageBegin(){
        header("Cache-Control: no-cache, must-revalidate");
        $config=M('config');
    $nowLevel=$config->where('id=1')->find();
     $level =trim($nowLevel['now_level']);
        if($level!==""){
                switch($level){
                    case "特等奖":
                        $levelNum =1;
                        break;
                    case "一等奖":
                        $levelNum=1;
                        break;
                    case "二等奖":
                        $levelNum=4;
                        break;
                    case "三等奖":
                        $levelNum=10;
                        break;
                    case "四等奖":
                        $levelNum=10;//分两次,总共20人
                        break;
                    case "五等奖":
                        $levelNum=20;//总共40人,分2次
                        break;
                    default:
                        $levelNum=0;
                }
                //echo '你的选择是'.$level.' ,立刻开始抽奖! 共'.$levelNum.'名';
                $user = M('');
                $muser=M('User');

                $res = $user->query('SELECT * FROM user WHERE status="员工"  and lottery_allow=1 and lottery_done=0   ORDER BY rand()
                LIMIT '.$levelNum);
            shuffle($res);
                 echo json_encode($res);
                //抽取用户后,设置是否已经参加了抽奖....若数据库的符合条件的用户数小于抽奖预设数量???
                $doneNum =count($res);
                for ($i = 0; $i<= $doneNum; $i++) {
                    $condition['id'] = $res[$i]['id'];
                    $data['lottery_done'] = false;
                    $getUserList=$muser->where($condition)->save($data);////抽奖后标记好,不进入下一轮
                    if($getUserList){
                        //更新该用户在全部员工表中的等级状态
                        $allStaff=M('all_staff');
                        $map4['real_name']=$res[$i]['real_name'];
                        $data4['level']=$level;
                        $allStaff->where($map4)->save($data4);
                        //逐个写入中奖表
                        $data1['real_name']=$res[$i]['real_name'];
                        $data1['phone_number']=$res[$i]['phone_number'];
                        $data1['level']=$level;
                        $data1['lottery_code']='201600'.$res[$i]['id'];
                        $data1['got_award']='否';//默认还没领奖
                        $data1['ctime']=date('Y-m-d H:i:s',time());
                        $lotteryList=M('lottery_list');
                        $re =$lotteryList->add($data1);
                        if($re){//开始逐个发短信
                            $smscontent='【佐敦中国】欢迎参加佐敦中国南部年会，恭喜您获得'.$level.'，您的领取奖品验证码是'.$data1['lottery_code'].',请在年会结束前凭着验证码到领奖处领取奖品，谢谢！';
                            /*$ch = curl_init();
                            $mobile =$data1['phone_number'];
                            $content =$smscontent;
                            $url = 'http://apis.baidu.com/kingtto_media/106sms/106sms?mobile='
                                .$mobile.'&content='.$content;
                            $header = array(
                                'apikey: 02b9c6ae2c6d0345bd10ea0a9db216ab',
                            );
                            // 添加apikey到header
                            curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            // 执行HTTP请求
                            curl_setopt($ch , CURLOPT_URL , $url);
                            curl_exec($ch);*/
                        }
                    }


                }


        }else{
            $this->error('非法操作!','?s=/Admin/Index/lotteryPage',2);
        }
    }
    //给中奖者发送短信
    public function sendLotterySms($phone,$smscontent){
        $ch = curl_init();
        $mobile = $phone;
        $content =$smscontent;
        $url = 'http://apis.baidu.com/kingtto_media/106sms/106sms?mobile='
        .$mobile.'&content='.$content;
        $header = array(
            'apikey: 02b9c6ae2c6d0345bd10ea0a9db216ab',
        );
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
         curl_exec($ch);

    }
    public function delete5(){
        $condition=array("劳锦胜","邹海亮","姚若浩","邓子鹏","赵子义","樊剑锋","伍宽平","何小明","周银河","卢海彬","吴蔚蔚","丁振明","张志捷",
            "黄齐放","张宝仪","张云","孙义培","李书峰","饶强","郭健","江立询","杜文善","唐黎明","廖章成","李晟源","刘海洋","杨家亮","黄伟","马星辉","耿彦","高昌国",
            "张志宪","刘小东","韦青","张华","冯胜国","周钢加","阮清格","吴彦锁","李静");
        $lott=M('user');
        $data['lottery_done']=false;

        for($i=0;$i<count($condition);$i++){
            $map['real_name']=$condition[$i];
            $lott->delete($data);
        }

    }

    public function delete4(){
        $condition=array("蔡敏琅","严寒","成军","陈世潮","刘杰","渠立恒","石亮","林榛苹","张裕敏","王惠娴");
        $lott=M('user');
        $data['lottery_done']=false;
        for($i=0;$i<count($condition);$i++){
            $map['real_name']=$condition[$i];
            $lott->where($map)->save($data);
        }

    }



}