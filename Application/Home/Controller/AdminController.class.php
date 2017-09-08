<?php 
    namespace Home\Controller;
    use Think\Controller;
                
    /**
     * @author asus1
     * 总台控制器
     */
    class AdminController extends Controller{
        //检查session 时间
        public function __construct()
        {
            parent::__construct();
            $this->checkAdminSession();
        }
        //检查session 时间 半个小时
        public function checkAdminSession()
        {
            //设置超时为30分钟
            $nowtime = time();
            $s_time = session('admin.logintime');
            if (($nowtime - $s_time) > 1800) {
                session('admin',null);
            } else {
                session('admin.logintime', $nowtime);
            }
        }
        // 检查是否登录
        public function checkAdminLogin(){

        }
        /* 登录页面 */
        public function home(){
            $this->display('index/index');
        }
        /**
         * 用户登录
         */
                public function login()
        {
            // 判断提交方式
            if (IS_POST) {
                $verify = new \Think\Verify();
                // 实例化user对象
                $admin = D('admin');
                if (!$admin->autoCheckToken($_POST)) {
                    $this->show();
                }else{
                    if (empty(I('post.a_username'))||empty(I('post.password'))){
                        $this->assign('error','登录失败,账号或密码不能为空!');
                        $this->display('index/index');
                    }elseif(empty(I('post.verify'))){
                        $this->assign('error','请输入验证码!');
                        $this->display('index/index');
                    }else{
                        // 组合查询条件
                        $result = $admin->where(array('a_username'=>I('post.a_username')))->select();
                        // 验证用户名 对比 密码
                        if(!$verify->check(I('post.verify'), '')){
                            $this->assign('error','验证码错误请重新输入!');
                            $this->display('index/index');
                        }elseif ($result && $result[0]['a_password'] == I('post.password')) {
                            $d = D('admin');
                            $arr = $d->queryQX($result[0]['id']);
                            $data = array(
                                'id'=>$result[0]['id'],
                                'a_position'=>$arr[0]['p_name'],
                                'a_phone'=>$result[0]['a_phone'],
                                'a_email'=>$result[0]['a_email'],
                                'a_name'=>$result[0]['a_name'],
                                'logintime'=>time()
                            );// 当前用户名 当前用户id
                            session('admin', $data);
                            $arr = $d->queryQX($result[0]['id']);
                            $Qarr = explode('/',$arr[0]['content']);
                            session('adminQX0', $Qarr[0]);
                            session('adminQX1', $Qarr[1]);
                            session('adminQX2', $Qarr[2]);
                            session('adminQX3', $Qarr[3]);
                            session('adminQX4', $Qarr[4]);
                            $this->show();
                        }else {
                            $this->assign('error','登录失败,用户名或密码不正确!');
                            $this->display('index/index');
                        }
                    }
                }
            } else {
                $this->display();
            }
        }
        public function show(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                //取现在的时间 年-月-日
                $date = date('Y-m-d');
                $record = D('record');

                //充值总金额
                $max_cz = $record->where(array("gradetype"=>"Y"))->sum('grade');
                $this->assign('max_cz',$max_cz);
                session('max_cz',$max_cz);

                //今日充值金额
                $where['gradetime']=array('like',$date."%");
                $today_cz = $record->where(array("gradetype"=>"Y"))->where($where)->sum('grade');
                $this->assign('today_cz',$today_cz);
                
                $member = D("member");

                //总会员人数
                $max_vip = $member->count("id");
                $this->assign('max_vip',$max_vip);

                //今日新增会员人数
                $where['create_at']=array('like',$date."%");
                $today_vip = $member->where($where)->count('id');
                $this->assign('today_vip',$today_vip);

                //查询每个会员充值总金额
                $arr = $record->field('m_id,sum(grade) as grade')->
                where(array("gradetype"=>'Y'))->
                group('m_id')->select(); 
                $czMax = $arr[0];
                foreach ($arr as $vo){
                    if ($vo['grade'] > $czMax['garde']){
                        $czMax = $vo;
                    }
                }   

                //充值最大金额会员
                if (!empty($czMax)) {
                    $recordMax = $member->field('m_nickname')->find($czMax['m_id']);
                    $recordMax['grade'] = $czMax['grade'];
                    $this->assign("recordMax",$recordMax);
                }

                //查询每个商户的充值金额
                $admin_shop = D("admin_shop");

                $shops = $admin_shop->field('s_id,sum(num) as num')->
                group('s_id')->select();
                $max_shop = $shops[0]; 
                foreach ($shops as $vo){
                    if ($vo['num'] > $max_shop['num']){
                        $max_shop = $vo;
                    }
                }
                $shop = D("shop");
                //充值最大金额商铺
                if (!empty($max_shop)) {
                    $maxShop = $shop->field('s_name')->find($max_shop['s_id']);
                    $maxShop['num'] = $max_shop['num'];
                    $this->assign("maxShop",$maxShop);

                }

                //查询每个商铺消费总额
                $arr = $record->field('s_id,sum(grade) as grade')->
                where(array("gradetype"=>'Y'))->
                group('s_id')->select();
                $max_shop_xf = $arr[1];
                foreach ($arr as $vo){
                    if ($vo['grade'] > $arr[1]['garde']){
                        $max_shop_xf = $vo;
                    }
                }
                if (!empty($max_shop_xf)) {
                    $maxShopXf = $shop->field('s_name')->find($max_shop_xf['s_id']);
                    $maxShopXf['grade'] = $max_shop_xf['grade'];
                    $this->assign("maxShopXf",$maxShopXf);
                }

                //查询每个会员的总消费金额
                $arr = $record->field('m_id,sum(grade) as grade')->
                where(array("gradetype"=>'N'))->
                group('m_id')->select();
                $max_member_xf = $arr[1];
                foreach ($arr as $vo){
                    if ($vo['grade'] > $arr[1]['grade']){
                        $max_member_xf = $vo;
                    }
                }
                if (!empty($max_member_xf)) {
                    $maxMemberXf = $member->field('m_nickname')->find($max_member_xf['m_id']);
                    $maxMemberXf['grade'] = $max_member_xf['grade'];
                    $this->assign("maxMemberXf",$maxMemberXf);
                }

                //总充值记录条数
                $czCount = $record->where(array('gradetype'=>"Y"))->count('id');
                $this->assign("czCount",$czCount);

                //总消费记录条数
                $xfCount = $record->where(array('gradetype'=>"N"))->count('id');
                $this->assign("xfCount",$xfCount);

                //目前的资金总和
                $nowSum = $record->where(array('gradetype'=>"Y"))->sum('grade'); 
                //今日的资金之前有查询   
                $this->display("logined");
            }
        }

        /**
         * 用户注销
         */
        public function logout()
        {
            // 清楚所有session
            session('admin',null);
            session('adminQX0',null);
            session('adminQX1',null);
            session('adminQX2',null);
            session('adminQX3',null);
            session('adminQX4',null);
            session('adminQX5',null);
            $this->display('index/index');
        }
        //商铺列表
        public function shoplist(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $shop = D('shop');
                $count = $shop->count();// 查询满足要求的总记录数
                $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show = $Page->show();// 分页显示输出
                $shops = $shop->where(array('s_sid'=>0))->order('create_at desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('page',$show);// 赋值分页输出
                $this->assign('shops', $shops);
                $this->display('shoplist');
            }
        }
        //商铺会员列表
        public function shopmember(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $shop = D('shop')->where(array('id' => I('get.id')))->select();
                $shop_member = D('shop_member');
                $count = $shop_member->where(array('s_id'=>I('get.id')))->count();// 查询满足要求的总记录数
                $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show = $Page->show();// 分页显示输出
                $members =  $shop_member->join('t_member on t_shop_member.m_id = t_member.id')->where(array('s_id'=>I('get.id')))->order('t_shop_member.num desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('page',$show);// 赋值分页输出
                $this->assign('shop', $shop);
                $this->assign('members', $members);
                $this->display('shopmember');
            }
        }
        //商铺办卡日志
        public function addcard(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $shop = D('shop')->where(array('id' => I('get.id')))->select();
                $shop_member = D('shop_member');
                $count = $shop_member->where(array('s_id'=>I('get.id')))->count();// 查询满足要求的总记录数
                $Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show       = $Page->show();// 分页显示输出
                $members =  $shop_member ->join('t_member on t_shop_member.m_id = t_member.id')->where(array('s_id'=>I('get.id')))->order('t_member.m_num desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('page',$show);// 赋值分页输出
//                var_dump($members);
                $this->assign('shop', $shop);
                $this->assign('members', $members);
                $this->display('addcard');
            }
        }
        //商户详情
        public function shopinfo(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $shop = D('shop')->where(array('id' => I('get.id')))->select();
                $this->assign('shop',$shop);
                $this->display('shopinfo');
            }
        }
        //跟新商铺信息
        public function update(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $shop = D('shop');
                $data = array(
                    's_name' => I('post.s_name'),
                    's_username' => I('post.s_username'),
                    's_password' => I('post.s_password'),
                    's_email' => I('post.s_email'),
                    's_address' => I('post.s_address'),
                    's_license' => I('post.s_license')
                );
                $shop->where(array('id' => I('post.id')))->save($data);
                $this->shoplist();
            }
        }
        //给商铺充值
        public function cash(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $shop = D('shop')->where(array('id' => I('get.id')))->select();
                $this->assign('shop', $shop);
                $this->display('cash');
            }
        }
        //商铺充值保存
        public function updatecash(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $shop = D('shop')->where(array('id' => I('post.id')))->select();
                if (empty(I('post.mcash')) && !empty(I('post.addcash'))) {
                    $data = array(
                        's_num' => $shop[0]['s_num'] + I('post.addcash')
                    );
                    $data2 = array(
                        'a_id' => 1,
                        's_id' => I('post.id'),
                        'num' => I('post.addcash'),
                        'num_time ' => date('Y-m-d H:i:s')
                    );
                    D('shop')->where(array('id' => I('post.id')))->save($data);
                    D('admin_shop')->add($data2);
                    $this->shoplist();

                } elseif (!empty(I('post.mcash')) && empty(I('post.addcash'))) {
                    $data = array(
                        's_num' => $shop[0]['s_num'] - I('post.mcash')
                    );
                    $data2 = array(
                        'a_id' => 1,
                        's_id' => I('post.id'),
                        'num' => -I('post.mcash'),
                        'num_time ' => date('Y-m-d H:i:s')
                    );
                    D('shop')->where(array('id' => I('post.id')))->save($data);
                    D('admin_shop')->add($data2);
                    $this->shoplist();
                }else{
                    $this->assign('shop', $shop);
                    $this->assign('error','输入错误');
                    $this->display('cash');
                }
            }
        }
        //充值日志
        public function sadd(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $shop = D('shop')->where(array('id' => I('get.id')))->select();
                $record = D('record');
                $count = $record->where(array('s_id'=>I('get.id')))->where("gradetype = 'Y'")->count();// 查询满足要求的总记录数
                $Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show       = $Page->show();// 分页显示输出
                $lists = $record->join('t_member on t_record.m_id = t_member.id')->where(array('s_id' => I('get.id')))->where("gradetype = 'Y'")->order('t_record.gradetime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('page',$show);// 赋值分页输出
                $this->assign('lists', $lists);
                $this->assign('shop', $shop);
                $this->display('sadd');
            }
        }
        //消费日志
        public function smcash(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $shop = D('shop')->where(array('id' => I('get.id')))->select();
                $record = D('record');
                $count = $record->where(array('s_id'=>I('get.id')))->where("gradetype = 'N'")->count();// 查询满足要求的总记录数
                $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show = $Page->show();// 分页显示输出
                $members = $record->join('t_member on t_record.m_id = t_member.id')->where(array('s_id' => I('get.id')))->where("gradetype = 'N'")->order('t_record.gradetime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('page',$show);// 赋值分页输出
                $this->assign('members', $members);
                $this->assign('shop', $shop);
                $this->display('smcash');
            }
        }
        //添加商户
        public function addshop(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $this->display('addshop');
            }
        }
        //保存添加用户数据
        public function addshoppost(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                if (IS_POST){
                    $shop = D('shop');
                    if (!$shop->autoCheckToken($_POST)) {
                        $this->assign('error','请勿重复提交!');
                        $this->display('addshop');
                    }else {
                        if (!empty(I('post.s_name')) &&!empty(I('post.s_username')) && !empty(I('post.s_password'))) {
                            $upload = new \Think\Upload();// 实例化上传类
                            $upload->maxSize   =     3145728 ;// 设置附件上传大小
                            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                            $upload->rootPath  =     'Uploads/'; // 设置附件上传根目录
                            $upload->savePath  =     I('post.s_username').'/'; // 设置附件上传（子）目录
                            $upload->saveName = array('uniqid', array('', true));
                            // 上传文件
                            $info   =   $upload->upload();
//                            if(!$info) {// 上传错误提示错误信息
//                                $this->assign('error','上传失败，请重新操作！');
//                                $this->addshop();
//                            }else{// 上传成功
                            if (strlen(I('post.s_password'))<6||strlen(I('post.s_password'))>=10){
                                $this->assign('error','密码长度为6-10位！');
                                $this->addshop();
                                exit;
                            }
                            $data = array(
                                's_name' => I('post.s_name'),
                                's_username' => I('post.s_username'),
                                's_password' => I('post.s_password'),
                                's_card' =>I('post.s_card'),
                                's_phone' => I('post.s_phone'),
                                's_address' => I('post.s_address'),
                                's_email' => I('post.s_email'),
                                's_sid' => 0,
                                's_num' => 0,
                                's_license' => I('post.s_license'),
                            );
                            foreach($info as $file){
                                $data[$file['key']] = $file['savepath'].$file['savename'];
                            }
                            D('shop')->add($data);

                            //工单系统同步添加账户
                            $sid  = D('user')->field('sid,count(id)')->group('sid')->order("count('id') asc")->select();
                            $data2 = array(
                                'userid' => I('post.s_username'),
                                'pwd' => md5(I('post.s_password')),
                                'email' => I('post.s_email'),
                                'uname' => I('post.s_name'),
                                'zl_status' => 1,
                                'limits' => 3,
                                'sid' => $sid[1]['sid'],
                                'u_status' => '商铺',
                                'f_date' => time(),
                            );
                            $user = D('user');
                            $user->add($data2);

                            $this->assign('success','创建新商铺成功!');
                            $this->display('addshop');
//                            }
                        }else{
                            $this->assign('error','输入错误! 请重新填表!');
                            $this->addshop('addshop');
                        }
                    }
                }else{
                    $this->display('index/index');
                }
            }
        }
        //跳转到shop登录页面
        public function shop(){
            $this->display('Shop/login');
        }
        /**
         *会员基本信息页面
         */
        function index(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                if (IS_GET) {
                    $d = D('Member');
                    $arr = $d->queryAll();
                    $this->assign('list', $arr['list']);
                    $this->assign('page',$arr['page']);
                    $this->display('memberCenter');
                }
            }
        }
        /**
         *资金记录
         */
        public function moneyRecord(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                if (IS_GET) {
                    $d = D("Member");
                    $list1 = $d->queryY(I('get.id'), "Y");
                    $this->assign("list1", $list1);
                    $list = $d->queryY(I('get.id'), "N");
                    $this->assign("list", $list);
                    $this->display('moneyRecord');
                }
            }
        }
        
        /**
         *会员详情
         */
        function  memberInfo(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                if (IS_GET) {
                    $d = D('Member');
                    $arr = $d->queryById(I('get.id'));
                    $d = D("member_level");
                    $list = $d->select();
                    $this->assign('list',$list);
                    $this->assign('vo', $arr);
                    $this->display('memberInfo');
                }
            }
        }
        /**
         *会员详情修改
         */
        function updateMember(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                if (IS_POST) {
                    $d = D('Member');
                    $arr = $d->queryById(I('post.id'));
                    $arr['m_nickname'] = I('post.m_nickname');
                    $arr['m_num'] = I('post.m_num');
                    $arr['m_card'] = I('post.m_card');
                    $arr['m_username'] = I('post.m_username');
                    $arr['m_password'] = I('post.m_password');
                    $arr['m_email'] = I('post.m_email');
                    $arr['m_address'] = I('post.m_address');
                    $arr['m_phonenum'] = I('post.m_phonenum');
                    $arr['l_id'] = I('post.l_id');
                    $res = $d->saveMember($arr);
                    $arr = $d->queryById(I('post.id'));
                    $d = D("member_level");
                    $list = $d->select();
                    $this->assign('list',$list);
                    $this->assign('vo', $arr);
                    $this->assign('ref', '修改成功！');
                    $this->display('memberInfo');

                }
            }
        }
        /**
         *查询充值记录
         */
        function memberF(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D("Member");
                $arr = $d->find(I("get.id"));
                $this->assign('vo', $arr);
                $this->display("memberF");
            }
        }
        function member(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D("Member");
                $arr = $d->find(I("get.id"));
                $this->assign('vo', $arr);
                $this->display('garde');
            }
        }
        function moneyFQ(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D("Member");
                $arr = $d->find(I("get.id"));
                $this->assign('vo', $arr);
                $this->display("installments");
            }
        }
        function Sureupdate(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $member = D("Member");
                $arr = $member->find(I("post.id"));
                $arr['m_nickname'] = I('post.m_nickname');
                $arr['m_num'] = I('post.m_num');
                $arr['m_card'] = I('post.m_card');
                $arr['m_username'] = I('post.m_username');
                $arr['m_fenqi'] = I('post.m_fenqi');
                //计算分期到期时间
                $fqTime = date('Y-m-d H:i:s',strtotime('+'.I('post.m_day'). 'day'));
                $arr['m_day'] = $fqTime;
                $res = $member->saveMember($arr);

                //每日限定可用额度
                $member_limit = D("member_limit");
                $data = $member_limit->where(array('m_id'=>I("post.id")))->select();
                $data[0]['m_limit'] = I('post.m_limit');
                $member_limit->save($data[0]);
                if ($res) {
                    $this->assign('vo', $arr);
                    $this->assign('ref', '修改成功！');
                    $this->display('Installments');
                }
            }
        
        }
        function memberBC(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D("Member");
                $arr = $d->find(I("post.id"));
                $arr['m_num'] = $arr['m_num'] + I('post.num');
                $res = $d->saveMember($arr);
                if ($res) {
                    //会员对应店铺金额增加
                    $shop_member = D('shop_member');
                    $sm = $shop_member->where(array('m_id' =>I("post.id")))->select();
                    $sm[0]['num'] = $sm[0]['num'] + I('post.num');
                    $shop_member->save($sm[0]);
                    //充值记录添加
                    $record = D('record');
                    $data['s_id'] = $sm[0]['s_id'];
                    $data['m_id'] = I('post.id');
                    $data['grade'] = I('post.num');
                    $data['gradetype'] = "Y";
                    $data['goods'] = "总台充值";
                    $id = $record->add($data);
                    $this->assign('ref', '充值成功');
                    $this->display('garde');
                };
            }
        }
        function queryRecord(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D('Member');
                $count = $d->join("t_record ON t_record.m_id = t_member.id")->
                join('t_shop ON t_shop.id = t_record.s_id')->where(array('gradetype' => "Y"))->count();
                $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show = $Page->show();// 分页显示输出
                $arr = $d->join("t_record ON t_record.m_id = t_member.id")->
                join('t_shop ON t_shop.id = t_record.s_id')->where(array('gradetype' => "Y"))->
                order('gradetime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('list', $arr);
                $this->assign('page',$show);
                $this->display("recharge");
            }
        }
        function queryRecordN(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D('Member');
                $count = $d->join("t_record ON t_record.m_id = t_member.id")->
                join('t_shop ON t_shop.id = t_record.s_id')->where(array('gradetype' => "N"))->count();
                $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show = $Page->show();// 分页显示输出
                $arr = $d->join("t_record ON t_record.m_id = t_member.id")->
                join('t_shop ON t_shop.id = t_record.s_id')->where(array('gradetype' => "N"))->
                order('gradetime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('list', $arr);
                $this->assign('page',$show);
                $this->display("rechargeN");
            }
        }
        //总台会员新增页面
        function addmember(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $shop = D("shop");
                $arr = $shop->select();
                $this->assign('list',$arr);
                $this->display('addmember');
            }
        }
        function sureAddMember(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $member = D("member");
                $data['m_nickname'] = I("post.m_nickname");
                $data['m_card'] = I("post.m_card");
                $data['m_username'] = I("post.m_username");
                if (!empty(I("post.m_password"))) {
                    $data['m_password'] = I("post.m_password");
                }
                $data['m_email'] = I("post.m_email");
                $data['m_idcard'] = I("post.m_idcard");
                $data['m_address'] = I("post.m_address");
                $data['m_phone'] = I("post.m_phone");
                $id = $member->add($data);
                if ($id) {
                    $shop_member = D('shop_member');
                    $arr['m_id'] = $id;
                    $arr['s_id'] = I("post.s_id");
                    $arr['num']  = 0;
                    $sm_id = $shop_member->add($arr);
                    if ($sm_id) {
                        $data3 = array(
                        's_id' => I("post.s_id"),
                        'm_id' => $id
                    );
                    D('member_limit')->add($data3);
                        $info = '注册成功';
                    }else{
                        $member->delete($id);
                        $info = '注册失败，请稍后重试！';
                    }
                    $this->assign("info",$info);
                    $this->display('addmember');
                }
            }
        }
        //查找会员
        public function findmember(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                if (I('post.checked')=='true'){
                    $member = D('member')->where(array('m_phone' => I('post.m_card')))->select();
                }else{
                    $member = D('member')->where(array('m_card' => I('post.m_card')))->select();
                }
                if (empty($member)) {
                    $this->ajaxReturn(array("status" => "no", "data" => '会员不存在'));
                } else {
                    $this->ajaxReturn(array("status" => "ok", "data" => '会员已存在'));
                }
            }
        }
        public function memberClass(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D("member_level");
                $list = $d->select();
                $this->assign('list',$list);
                $this->display('memberClass');
            }
        }
        public function vipClassSetUp(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $member_level = D("member_level");
                $id = $member_level->save(I('post.'));
                if ($id) {
                    $d = D("member_level");
                    $list = $d->select();
                    $this->assign('list',$list);
                    $this->display('memberClass');
                }else{
                    $this->error("重置失败，请稍后再试！");
                }
            }
        }
        public function addMemberClass(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $this->display('addMemberClass');
            }
        }
        public function sureAddMemberClass(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D("member_level");
                $id = $d->add(I('post.'));
                if ($id) {
                    $d = D("member_level");
                    $list = $d->select();
                    $this->assign('list',$list);
                    $this->display('memberClass');
                }
            }
        }
        public function deleMemberClass(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D("member_level");
                $num = $d->delete(I("get.id"));
                if ($num > 0) {
                    $this->memberClass();
                }else if ($num == 0) {
                    $this->error('没有任何操作');
                }else{
                    $this->error('删除失败，请稍后重试！');
                }
            }
        }
        //商户验证
        public function validate(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $shop = D('shop');
                $shops = $shop->where(array('s_num'=>0))->order('create_at desc')->select();
                $this->assign('shops',$shops);
                $this->display('validate');
            }
        }
        //消息列表
        public function messagelist(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $message = D('message');
                $count = $message->count();
                $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show = $Page->show();// 分页显示输出
                $messages = $message
                    ->limit($Page->firstRow.','.$Page->listRows)
                    ->order('create_at desc')
                    ->select();
                $lists=[];
                foreach ($messages as $list){
                    $counts = D('shop_message')->where(array('status'=>1,'me_id'=>$list['id']))->group('me_id')->count('s_id');
                    $counts = $counts ? $counts : 0;
                    array_push($list,$counts);
                    array_push($lists,$list);
                }
                $this->assign('page',$show);// 赋值分页输出
                $this->assign('lists', $lists);
                $this->display('messagelist');
            }
        }
        //删除消息
        public function messagedel(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                D('message')->delete(I('get.id'));
                D('shop_message')->where(array('me_id'=>I('get.id')))->delete();
                $this->messagelist();
            }
        }
        //消息提送
        public function message(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $this->display('message');
            }
        }
        public function message2(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $message = D('message');
                if (!$message->autoCheckToken($_POST)) {
                    $this->messagelist();
                } else {
                    if (empty(I('post.title'))){
                        $this -> assign('error','请输入消息标题!');
                        $this -> message();
                    }else{
                        $upload = new \Think\Upload();// 实例化上传类
                        $upload->maxSize   =     3145728 ;// 设置附件上传大小
                        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg' ,'doc' ,'docx' ,'xlsx','rar','zip','xls');// 设置附件上传类型
                        $upload->rootPath  =     'Uploads/'; // 设置附件上传根目录
                        $upload->savePath  =     'file/'; // 设置附件上传（子）目录
                        $upload->saveName = array('uniqid', array('', true));
                        // 上传文件
                        $info   =   $upload->upload();
                        $data = array(
                            'title' => I('post.title'),
                            'content' => I('post.content'),
                            'create_at' => date('Y-m-d H:i:s'),
                            'file' => $info['file']['savepath'].$info['file']['savename'],
                            'name' => $info['file']['name']
                        );
                        $id = D('message')->add($data);
                        $shops = D('shop')->field('id')->select();
                        foreach ($shops as $shop) {
                            $data1 = array(
                                's_id' => $shop['id'],
                                'me_id' => $id,
                                'status' => 0,
                                'create_at' => date('Y-m-d H:i:s')
                            );
                            D('shop_message')->add($data1);
                        }
                        $this->messagelist();
                    }
                }
            }
        }
        //消息详情
        public function messageinfo(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $message = D('message')->find(I('get.id'));
                $this->assign('message',$message);
                $this->display('messageinfo');
            }
        }
        //消息修改
        public function updata(){
            if (!session('?admin')){
                $this->display('index/index');
            }else{
                $message = D('message');
                if (!$message->autoCheckToken($_POST)) {
                    $this->messagelist();
                }else {
                    $data = array(
                        'title' => I('post.title'),
                        'content' => I('post.content')
                    );
                    $message->where(array('id' => I('post.id')))->save($data);
                    $this->messagelist();
                }
            }
        }
        public function addadmin(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $admin = D("admin")->order('id desc')->limit(1)->select();
                $positions = D('position')->select();
                $this->assign('num',$admin[0]['id']);
                $this->assign("positions",$positions);
                $this->display('addadmin');
            }
        }
        public function addadmin2(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $admin = D("admin");
                if (!$admin->autoCheckToken($_POST)) {
                    $this->addadmin();
                }else{
                    $data['a_name'] = I("post.a_name");
                    $data['a_username'] = I("post.a_username");
                    $data['a_password'] = I("post.a_password");
                    $data['a_phone'] = I("post.a_phone");
                    $data['a_email'] = I("post.a_email");
                    $id = $admin->add($data);
                    if ($id) {
                        $data1 = array("a_id"=>$id,"p_id"=>I('post.selvalue'));
                        $AP = D('admin_position');
                        $APid = $AP->add($data1);
                        if ($APid) {
                            $info = "管理员账号添加成功！";
                        }else{
                            $admin->delete($id);
                            $info = "管理员账号添加失败，请稍后重试！";
                        }
                    }else{
                        $info = "管理员账号添加失败，请稍后重试！";
                    }
                    $this->assign('info',$info);
                    $this->addadmin();
                }
            }
        }
        public function adminlist(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D('admin');
                $count = $d->join('t_admin_position on t_admin.id = t_admin_position.a_id')->
                join('t_position on t_admin_position.p_id = t_position.id')->
                where('t_admin.id <> 1')->count();// 查询满足要求的总记录数
                $Page       = new \Think\Page($count,5);//实例化分页类传入总记录数和每页显示的记录数(5)
                $show       = $Page->show();// 分页显示输出
                $admins = $d->join('t_admin_position on t_admin.id = t_admin_position.a_id')->
                join('t_position on t_admin_position.p_id = t_position.id')->
                where('t_admin.id <> 1')->
                order('a_time')->
                limit($Page->firstRow.','.$Page->listRows)->
                select();
                $positions = D('position')->select();
                $this->assign("positions",$positions);
                $this->assign('admins',$admins);
                $this->assign('page',$show);// 赋值分页输出
                $this->display("adminlist");
            }
        }
        //修改已存在的管理员权限
        public function updateAdminPosition(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D("admin_position");
                if (!$d->autoCheckToken($_POST)) {
                    $this->adminlist();
                }else{
                    $AP = $d->where(array('a_id'=>I("post.id")))->select();
                    $AP[0]['p_id'] = I("post.selvalue");
                    $rel = $d->save($AP[0]);
                    $info = "修改失败，请稍后再试！";
                    if ($rel) {
                        $info = "修改成功！";
                    }
                    $this->assign('info',$info);
                    $this->adminlist();
                }
            }
        }
        public function position(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D('position');
                $count = $d->join('t_position_restrict on t_position.id = t_position_restrict.p_id')->count();// 查询满足要求的总记录数
                $Page       = new \Think\Page($count,5);//实例化分页类传入总记录数和每页显示的记录数(5)
                $show       = $Page->show();// 分页显示输出
                $positions = $d->
                join('t_position_restrict on t_position.id = t_position_restrict.p_id')->
                limit($Page->firstRow.','.$Page->listRows)->
                select();
                $d = D("restrict");
                $restrict = $d->select();
                $this->assign("restrict",$restrict);
                $this->assign('list',$positions);
                $this->assign('page',$show);
                $this->display("position");
            }
        }
        //修改已经存在的职位权限
        public function updatePositionR (){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D("position_restrict");
                if (!$d->autoCheckToken($_POST)) {
                    $this->position();
                }else{
                    $data = $d->where(array('p_id'=>I('post.id')))->select();
                    $data[0]['content'] = I('post.content');
                    $rel = $d->save($data[0]);
                    if ($rel) {
                       $info = "修改成功！";
                    }else{
                        $info = "修改失败，请稍后重试！";
                    }
                    $this->assign('info',$info);
                    $this->position();
                }
            }
        }
        //职位权限修改页面
        public function addPosition (){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D("restrict");
                $restrict = $d->select();
                $this->assign("restrict",$restrict);
                $this->display("addPosition");
            }
        }
        //新增职位
        public function addPosition2(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D("position");
                if (!$d->autoCheckToken($_POST)) {
                    $this->addPosition();
                }else{
                    $arr = array('p_name'=>I("post.p_name"));
                    $id = $d->add($arr);
                    $PR = D('position_restrict');
                    $data = array('p_id'=>$id,'content'=>I('post.content'));
                    $PRid = $PR->add($data);
                    $info ="新增失败，请稍后再试！";
                    if ($PRid) {
                        $info ="新增成功！";
                    }
                    $this->assign('info',$info);
                    $d = D("restrict");
                    $restrict = $d->select();
                    $this->assign("restrict",$restrict);
                    $this->display("addPosition");
                }
            }
        }
    }