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
        /* 登录页面 */
        /**
         * 用户登录
         */
        public function login()
        {
            // 判断提交方式
            if (IS_POST) {
                // 实例化user对象
                $admin = D('admin');
                if (empty(I('post.a_username'))||empty(I('post.password'))){
                    $this->assign('error','登录失败,账号或密码不能为空!');
                    $this->display('Shop/login');
                }else{
                    // 组合查询条件
                    $result = $admin->where(array('a_username'=>I('post.a_username')))->select();
                    // 验证用户名 对比 密码
                    if ($result && $result[0]['a_password'] == I('post.password')) {
                        $data = array(
                            'id'=>$result[0]['id'],
                            'a_phone'=>$result[0]['a_phone'],
                            'a_email'=>$result[0]['a_email'],
                            'a_username'=>$result[0]['a_username'],
                            'logintime'=>time()
                        );// 当前用户名 当前用户id
                        session('admin', $data);
                        $this->show();
                    }else {
                        $this->assign('error','登录失败,用户名或密码不正确!');
                        $this->display('index/index');
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
                $czMax = null;
                foreach ($arr as $vo){
                    foreach ($arr as $v){
                        if ($vo['grade'] > $v['grade']){
                            $czMax = $vo;
                        }else{
                            $czMax = $v;
                        }
                    }

                }   

                //充值最大金额会员
                $recordMax = $member->field('m_nickname')->find($czMax['m_id']);
                $recordMax['grade'] = $czMax['grade'];
                $this->assign("recordMax",$recordMax);

                //查询每个商户的充值金额
                $admin_shop = D("admin_shop");

                $shops = $admin_shop->field('s_id,sum(num) as num')->
                group('s_id')->select();
                $max_shop = null; 
                foreach ($shops as $vo){
                    foreach ($shops as $v){
                        if ($vo['grade'] > $v['grade']){
                            $max_shop = $vo;
                        }else{
                            $max_shop = $v;
                        }
                    }
                }   
                $shop = D("shop");
                //充值最大金额商铺
                $maxShop = $shop->field('s_name')->find($max_shop['s_id']);
                $maxShop['num'] = $max_shop['num'];
                $this->assign("maxShop",$maxShop);

                //查询每个商铺消费总额
                $arr = $record->field('s_id,sum(grade) as grade')->
                where(array("gradetype"=>'Y'))->
                group('s_id')->select();
                $max_shop_xf = null; 
                foreach ($arr as $vo){
                    foreach ($arr as $v){
                        if ($vo['grade'] > $v['grade']){
                            $max_shop_xf = $vo;
                        }else{
                            $max_shop_xf = $v;
                        }
                    }
                }  
                $maxShopXf = $shop->field('s_name')->find($max_shop_xf['s_id']);
                $maxShopXf['grade'] = $max_shop_xf['grade']; 
                $this->assign("maxShopXf",$maxShopXf);

                //查询每个会员的总消费金额
                $arr = $record->field('m_id,sum(grade) as grade')->
                where(array("gradetype"=>'N'))->
                group('m_id')->select();
                $max_member_xf = null; 
                foreach ($arr as $vo){
                    foreach ($arr as $v){
                        if ($vo['grade'] > $v['grade']){
                            $max_member_xf = $vo;
                        }else{
                            $max_member_xf = $v;
                        }
                    }
                }
                $maxMemberXf = $member->field('m_nickname')->find($max_member_xf['m_id']);
                $maxMemberXf['grade'] = $max_member_xf['grade']; 
                $this->assign("maxMemberXf",$maxMemberXf);

                //总充值记录条数
                $czCount = $record->where(array('gradetype'=>"Y"))->count('id');
                $this->assign("czCount",$czCount);

                //总消费记录条数
                $xfCount = $record->where(array('gradetype'=>"N"))->count('id');
                $this->assign("xfCount",$xfCount);

                //目前的资金总和
                $nowSum = $record->where(array('gradetype'=>"Y"))->sum('grade'); 
                //今日的资金之前有查询   
                $this->display(logined);
            }
        }

        /**
         * 用户注销
         */
        public function logout()
        {
            // 清楚所有session
            session('admin',null);
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
                $shops = $shop->order('create_at asc')->limit($Page->firstRow.','.$Page->listRows)->select();
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
                $Page = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
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
                if (!empty(I('post.s_username') && !empty(I('post.s_password')))) {
                    $data = array(
                        's_name' => I('post.s_name'),
                        's_username' => I('post.s_username'),
                        's_password' => I('post.s_password'),
                        's_email' => I('post.s_email'),
                        's_address' => I('post.s_address'),
                        's_license' => I('post.s_license'),
                    );
                    D('shop')->add($data);
                    $this->display('addshop');
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
                    $this->assign('list', $arr);
                    $this->display('memberCenter');
                }
            }
        }
        /**
         *资金记录
         */
        function moneyRecord(){
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
                    $this->assign('vo', $arr);
                    $this->display('MemberInfo');
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
                    $res = $d->saveMember($arr);
                    if ($res) {
                        $this->assign('vo', $arr);
                        $this->assign('ref', '修改成功！');
                        $this->display('memberInfo');
                    }
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
                $d = D("Member");
                $arr = $d->find(I("post.id"));
                $arr['m_nickname'] = I('post.m_nickname');
                $arr['m_num'] = I('post.m_num');
                $arr['m_card'] = I('post.m_card');
                $arr['m_username'] = I('post.m_username');
                $arr['m_fenqi'] = I('post.m_fenqi');
                $arr['m_day'] = I('post.m_day');
                $arr['m_limit'] = I('post.m_limit');
                $res = $d->saveMember($arr);
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
                $arr['m_num'] = I('post.num');
                $res = $d->saveMember($arr);
                if ($res) {
                    $this->assign('ref', '充值成功！');
                    $this->display('garde');
                };
            }
        }
        function queryRecord(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D('Member');
                $arr = $d->join("t_record ON t_record.m_id = t_member.id")->
                join('t_shop ON t_shop.id = t_record.s_id')->where(array('gradetype' => "Y"))->select();
                $this->assign('list', $arr);
                $this->display("recharge");
            }
        }
        function queryRecordN(){
            if (!session('?admin')){
                $this->display('index/index');
            }else {
                $d = D('Member');
                $arr = $d->join("t_record ON t_record.m_id = t_member.id")->
                join('t_shop ON t_shop.id = t_record.s_id')->where(array('gradetype' => "N"))->select();
                $this->assign('list', $arr);
                $this->display("recharge");
            }
        }
    }