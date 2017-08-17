<?php 
    namespace Home\Controller;
    use Think\Controller;
    /**
     * @author asus1
     * 商铺控制器
     */
    class ShopController extends Controller{
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
            $s_time = session('shop.logintime');
            if (($nowtime - $s_time) > 1800) {
                session('shop',null);
            } else {
                session('shop.logintime', $nowtime);
            }
        }
        //用户注册
        public function index(){
            // 判断提交方式
            if (IS_POST) {
                // 实例化user对象
                $shop = D('shop');
                if (empty(I('post.s_username'))||empty(I('post.s_password'))){
                    $this->assign('error','登录失败,账号或密码不能为空!');
                    $this->display('Shop/login');
                }else{
                    // 组合查询条件
                    $result = $shop->where(array('s_username'=>I('post.s_username')))->select();
                    // 验证用户名 对比 密码
                    if ($result && $result[0]['s_password'] == I('post.s_password')) {
                        $data = array(
                            'id'=>$result[0]['id'],
                            's_phone'=>$result[0]['s_phone'],
                            's_name'=>$result[0]['s_name'],
                            's_username'=>$result[0]['s_username'],
                            's_email'=>$result[0]['s_email'],
                            'logintime'=>time()
                        );// 当前用户名 当前用户id
                        session('shop', $data);
                        $this->show();
                    }else {
                        $this->assign('error','登录失败,用户名或密码不正确!');
                        $this->display('Shop/login');
                    }
                }
            } else {
                $this->display();
            }
        }
        public function show(){
            if (!session('?shop')){
                $this->display('shop/login');
            }else {
                $record = D('record');
                //总消费金额
                $max_xf = $record->
                where(array("s_id"=>session('shop.id'),"gradetype"=>'N'))
                    ->sum('grade');
                $list['max_xf'] = $max_xf;
                session('max_xf',$max_xf);

                //今日消费金额
                $where['gradetime']=array('like',date("Y-m-d")."%");
                $today_xf = $record->
                where(array("s_id"=>session('shop.id'),"gradetype"=>'N'))->
                where($where)->sum('grade');
                $list['today_xf'] = $today_xf;

                //总共充值金额
                $max_cz = $record->
                where(array("s_id"=>session('shop.id'),"gradetype"=>'Y'))
                    ->sum('grade');
                $list['max_cz'] = $max_cz;

                //今日充值金额
                $today_cz = $record->
                where(array("s_id"=>session('shop.id'),"gradetype"=>'Y'))->
                where($where)->sum('grade');
                $list['today_cz'] = $today_cz;

                //商品总会员数量
                $shop = D("shop");
                $max_vipNum = $shop->join('t_shop_member ON t_shop.id = t_shop_member.s_id')->
                join('t_member ON t_shop_member.m_id = t_member.id')->
                where(array('t_shop.id'=>session('shop.id')))->count();
                $list['max_vipNum'] = $max_vipNum;

                //今日新注册会员数量
                $today['t_member.create_at']=array('like',date("Y-m-d")."%");
                $today_vipNum = $shop->join('t_shop_member ON t_shop.id = t_shop_member.s_id')->
                join('t_member ON t_shop_member.m_id = t_member.id')->
                where(array('t_shop.id'=>session('shop.id')))->where($today)->count();
                $list['today_vipNum'] = $today_vipNum;

                //查询会员充值总金额
                $arr = $record->field('m_id,sum(grade) as grade')->
                where(array("s_id"=>session('shop.id'),"gradetype"=>'Y'))->
                group('m_id')->select();
                $czMax = null;
                $czMin = null;
                foreach ($arr as $vo){
                    foreach ($arr as $v){
                        if ($vo['grade'] > $v['grade']){
                            $czMax = $vo;
                        }else{
							$czMax = $v;
						}
                        if ($vo['grade'] < $v['grade']){
                            $czMin = $vo;
                        }else{
							$czMin = $v;
						}
                    }

                }
                $member = D("Member");
                //充值最大金额会员
                $recordMax = $member->field('m_nickname')->find($czMax['m_id']);
                $recordMax['grade'] = $czMax['grade'];
                $list['recordMax'] = $recordMax;

                //充值最小金额会员
                $recordMin = $member->field('m_nickname')->find($czMin['m_id']);
                $recordMin['grade'] = $czMin['grade'];
                $list['recordMin'] = $recordMin;

                //查询会员消费总金额
                $arr = $record->field('m_id,sum(grade) as grade')->
                where(array("s_id"=>session('shop.id'),"gradetype"=>'N'))->
                group('m_id')->select();
                $xfMax = null;
                $xfMin = null;
                foreach ($arr as $vo){
                    foreach ($arr as $v){
                        if ($vo['grade'] > $v['grade']){
                            $xfMax = $vo;
                        }else{
							$xfMax = $v;
						}
                        if ($vo['grade'] < $v['grade']){
                            $xfMin = $vo;
                        }else{
							$xfMin = $v;
						}
                    }
                }
                $member = D("Member");
                //消费最大金额会员
                $consumeMax = $member->field('m_nickname')->find($xfMax['m_id']);
                $consumeMax['grade'] = $xfMax['grade'];
                $list['consumeMax'] = $consumeMax;

                //消费最小金额会员
                $consumeMin = $member->field('m_nickname')->find($xfMin['m_id']);
                $consumeMin['grade'] = $xfMin['grade'];
                $list['consumeMin'] = $consumeMin;
                $this->assign("list",$list);
                $this->display('home');
            }
        }
        // 退出登录
        /**
         * 用户注销
         */
        public function logout()
        {
            // 清楚所有session
            session('shop',null);
            $this->display('Shop/login');
        }
        //充值日志
        public function maddcash(){
            if (!session('?shop')){
                $this->display('shop/login');
            }else {
                $record = D('record');
                $count = $record->where(array('s_id'=>session('shop.id')))->where("gradetype = 'Y'")->count();// 查询满足要求的总记录数
                $Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show       = $Page->show();// 分页显示输出
                $lists = $record->join('t_member on t_record.m_id = t_member.id')->where(array('s_id' => session('shop.id')))->where("gradetype = 'Y'")->order('t_record.gradetime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('page',$show);// 赋值分页输出
                $this->assign('lists', $lists);
                $this->display('maddcash');
            }
        }
        //办卡日志
        public function addcard(){
            if (!session('?shop')){
                $this->display('shop/login');
            }else{
                $shop_member = D('shop_member');
                $count = $shop_member->where(array('s_id'=>session('shop.id')))->count();// 查询满足要求的总记录数
                $Page       = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show       = $Page->show();// 分页显示输出
                $members =  $shop_member ->join('t_member on t_shop_member.m_id = t_member.id')->where(array('s_id'=>session('shop.id')))->order('t_shop_member.create_at desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('page',$show);// 赋值分页输出
                $this->assign('members',$members);
                $this->display('addcard');
            }
        }
        //商铺消费日志
        public function usecash(){
            if (!session('?shop')){
                $this->display('shop/login');
            }else {
                $record = D('record');
                $count = $record->where(array('s_id'=>session('shop.id')))->where("gradetype = 'N'")->count();// 查询满足要求的总记录数
                $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show = $Page->show();// 分页显示输出
                $lists = $record->join('t_member on t_record.m_id = t_member.id')->where(array('s_id' => session('shop.id')))->where("gradetype = 'N'")->order('t_record.gradetime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('page',$show);// 赋值分页输出
                $this->assign('lists', $lists);
                $this->display('usecash');
            }
        }
    //会员列表
    public function members(){
        if (!session('?shop')){
            $this->display('shop/login');
        }else {
            $shop_member = D('shop_member');
            $count = $shop_member->where(array('s_id'=>session('shop.id')))->count();// 查询满足要求的总记录数
            $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show = $Page->show();// 分页显示输出
            $members =  $shop_member ->join('t_member on t_shop_member.m_id = t_member.id')->where(array('s_id'=>session('shop.id')))->order('t_shop_member.num desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('page',$show);// 赋值分页输出
            $this->assign('members',$members);
            $this->display('members');
        }
    }
    //添加会员
        public function addmember(){
            if (!session('?shop')){
                $this->display('shop/login');
            }else {
                $this->display('addmember');
            }
        }
        public function addmember2(){
            if (!session('?shop')){
                $this->display('shop/login');
            }else {
                if (IS_POST) {
                    $member = D('member');
                    $data = array(
                        'm_card' => I('post.m_card'),
                        'm_nickname' => I('post.m_nickname'),
                        'm_username' => I('post.m_username'),
                        'm_phone' => I('post.m_phone'),
                        'm_idcard' => I('post.m_idcard'),
                        'm_status' =>I('post.selcet'),
                        'create_at' => date('Y-m-d H:i:s')
                    );
                    $id = D('member')->add($data);
                    $data2 = array(
                        'm_id' => $id,
                        's_id' => session('shop.id'),
                        'num' => 0,
                        'create_at' => date('Y-m-d H:i:s')
                    );
                    D('shop_member')->add($data2);
                    //添加限制记录
                    $data3 = array(
                        's_id' => session('shop.id'),
                        'm_id' => $id,
                        'create_at' => date('Y-m-d H:i:s')
                    );
                    D('member_limit')->add($data3);
                    $this->ajaxReturn(array("status" => "ok", "data" => '注册成功!'));
                } else {
                    $this->display('Shop/login');
                }
            }
        }
    // 会员充值
        public function memberadd(){
            if (!session('?shop')){
                $this->display('shop/login');
            }else {
                $this->display();
            }
        }
        public function memberadd2(){
            if (!session('?shop')){
                $this->display('shop/login');
            }else {
                if (IS_POST) {
                    $shop = D('shop')->where(array('id' => session('shop.id')))->select();
                    if ($shop[0]['s_num'] < I('post.num')) {
                        $this->ajaxReturn(array("status" => "no", "data" => '账户余额不足,不能充值!'));
                    } else {
                        if (I('post.checked')=='true'){
                            $m_id = D('member')->where(array('m_phone' => I('post.m_card')))->select();
                        }else{
                            $m_id = D('member')->where(array('m_card' => I('post.m_card')))->select();
                        }
                        //添加充值记录
                        $data = array(
                            's_id' => session('shop.id'),
                            'm_id' => $m_id[0]['id'],
                            'grade' => I('post.num'),
                            'gradetype' => 'Y',
//                            'goods'=>'',
                            'gradetime' => date('Y-m-d H:i:s')
                        );
                        D('record')->add($data);
                        $data1 = array(
                            's_num' => $shop[0]['s_num'] - I('post.num')
                        );
                        D('shop')->where(array('id' => session('shop.id')))->save($data1);
                        //会员总积分增加
                        $data2 = array(
                            'm_num' => $m_id[0]['m_num'] + I('post.num'),
                        );
                        D('member')->where(array('id' => $m_id[0]['id']))->save($data2);

                        //会员对应店铺金额增加
                        $sm = D('shop_member')->where(array('s_id' => session('shop.id'), 'm_id' => $m_id[0]['id']))->select();
                        $data3 = array(
                            'num' => $sm[0]['num'] + I('post.num')
                        );
                        D('shop_member')->where(array('s_id' => session('shop.id'), 'm_id' => $m_id[0]['id']))->save($data3);
                        //今日消费剩余限额
                        $li = D('member_limit')->where(array('s_id' => session('shop.id'), 'm_id' => $m_id[0]['id']))->select();
                        $use_sum = D('record')->where("gradetype = 'N'")->where(array('s_id' => session('shop.id'), 'm_id' => $m_id[0]['id']))->sum('grade');
                        $limt = $li[0]['m_limit'] - $use_sum;
                        $money = D('shop_member')->where(array('s_id' => session('shop.id'), 'm_id' => $m_id[0]['id']))->select();
                        $infos = '本次充值：' . I('post.num') . '元<br>卡上余额：' . $money[0]['num'] . '元<br>今日可用限额剩余:'.$limt.'元';
                        $showname = $m_id[0]['m_nickname'] ? $m_id[0]['m_nickname'] : $m_id[0]['m_username'];
                        $speech = '尊敬的: ' . $showname . ' 会员，您本次成功充值 ' . I('post.num') . ' 元，本店铺余额剩余 ' . $money[0]['num'] .'元,今日可用限额剩余:'.$limt.'元,谢谢惠顾！';
                        $this->ajaxReturn(array("status" => "ok", "data" => $infos, "data1" => $speech));
                    }
                } else {
                    $this->display('Shop/login');
                }
            }
        }
        //查找会员
        public function findmember(){
            if (!session('?shop')){
                $this->display('shop/login');
            }else {
                if (I('post.checked')=='true'){
                    $member = D('member')->where(array('m_phone' => I('post.m_card')))->select();
                }else{
                    $member = D('member')->where(array('m_card' => I('post.m_card')))->select();
                }
                if (empty($member)) {
                    $this->ajaxReturn(array("status" => "no", "data" => '会员不存在'));
                } else {
                    $showname = $member[0]['m_nickname'] ? $member[0]['m_nickname'] : $member[0]['m_username'];
                    $info = "<i class='icmn-lock4'></i>" . $showname . "(" . $member[0]['m_phone'] . ")";
                    $this->ajaxReturn(array("status" => "ok", "data" => $info));
                }
            }
        }
        //会员消费
        public function usemember(){
            if (!session('?shop')){
                $this->display('shop/login');
            }else {
                $this->display();
            }
        }
        public function usemember2()
        {
            if (!session('?shop')) {
                $this->display('shop/login');
            } else {
                if (IS_POST) {
                    $shop = D('shop')->where(array('id' => session('shop.id')))->select();
                    if (I('post.checked')=='true'){
                        $m_id = D('member')->where(array('m_phone' => I('post.m_card')))->select();
                    }else{
                        $m_id = D('member')->where(array('m_card' => I('post.m_card')))->select();
                    }
                    $num = D('shop_member')->where(array('m_id' => $m_id[0]['id'], 's_id' => session('shop.id')))->select();
                    //今日消费剩余限额
                    $li = D('member_limit')->where(array('s_id' => session('shop.id'), 'm_id' => $m_id[0]['id']))->select();
                    $use_sum = D('record')->where("gradetype = 'N'")->where(array('s_id' => session('shop.id'), 'm_id' => $m_id[0]['id']))->sum('grade');
                    $limt = $li[0]['m_limit'] - $use_sum;
                    if ($num[0]['num'] < I('post.num')) {
                        $this->ajaxReturn(array("status" => "no", "data" => '账户余额不足,不能使用!'));
                    }elseif ($limt < I('post.num')){
                        $this->ajaxReturn(array("status" => "no", "data" => '今日消费额度不足!'));
                    }else{
                        //添加充值记录
                        $data = array(
                            's_id' => session('shop.id'),
                            'm_id' => $m_id[0]['id'],
                            'grade' => I('post.num'),
                            'gradetype' => 'N',
                            'goods'=> I('post.goods'),
                            'gradetime' => date('Y-m-d H:i:s')
                        );
                        D('record')->add($data);
                        $data1 = array(
                            's_num' => $shop[0]['s_num'] + I('post.num')
                        );
                        D('shop')->where(array('id' => session('shop.id')))->save($data1);
                        //会员总积分增加
                        $data2 = array(
                            'm_num' => $m_id[0]['m_num'] - I('post.num'),
                        );
                        D('member')->where(array('id' => $m_id[0]['id']))->save($data2);

                        //会员对应店铺金额增加
                        $sm = D('shop_member')->where(array('s_id' => session('shop.id'), 'm_id' => $m_id[0]['id']))->select();
                        $data3 = array(
                            'num' => $sm[0]['num'] - I('post.num')
                        );
                        D('shop_member')->where(array('s_id' => session('shop.id'), 'm_id' => $m_id[0]['id']))->save($data3);
                        //今日消费剩余限额
                        $li = D('member_limit')->where(array('s_id' => session('shop.id'), 'm_id' => $m_id[0]['id']))->select();
                        $use_sum = D('record')->where("gradetype = 'N'")->where(array('s_id' => session('shop.id'), 'm_id' => $m_id[0]['id']))->sum('grade');
                        $limt = $li[0]['m_limit'] - $use_sum;
                        $money = D('shop_member')->where(array('s_id' => session('shop.id'), 'm_id' => $m_id[0]['id']))->select();
                        $infos = '本次消费：' . I('post.num') . '元<br>卡上余额：' . $money[0]['num'] . '元<br>今日可用限额剩余:'.$limt.'元';

                        $showname = $m_id[0]['m_nickname'] ? $m_id[0]['m_nickname'] : $m_id[0]['m_username'];
                        $speech = '尊敬的: ' . $showname . ' 会员，您本次成功消费 ' . I('post.num') . ' 元，本店铺余额剩余 ' . $money[0]['num'] .'元,今日可用限额剩余:'.$limt.'元,谢谢惠顾！';


                        $record = D('record');
                        //店铺总消费金额
                        $max_xf = $record->
                        where(array("s_id"=>session('shop.id'),"gradetype"=>'N'))
                            ->sum('grade');
                        session('max_xf',$max_xf);


                        $this->ajaxReturn(array("status" => "ok", "data" => $infos, "data1" => $speech,'data2'=>$max_xf));
                    }
                } else {
                    $this->display('Shop/login');
                }
            }
        }
    }

