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
        }else {
            if (session('?shop')){
                $data2 = array(
                    'stop_time' => date('Y-m-d H:i:s', strtotime('+30 minute'))
                );
                D('session')->where(array('s_username'=>session('shop.s_username')))->order('create_at desc')->limit(1)->save($data2);
            }
            session('shop.logintime', $nowtime);
        }
    }
    //用户登录
    public function index(){
        // 判断提交方式
        if (IS_POST) {
            // 实例化user对象
            $verify = new \Think\Verify();
            $shop = D('shop');
            $session_l = session_id();
            $session = D('session')
                ->where(array('session_id'=>array('neq',$session_l)))
                ->where(array('s_username'=>I('post.s_username')))
                ->where('stop_time > now()')
                ->select();
            echo($session);
            if (!empty($session)){
                $this->assign('error', '用户已在线!请检查你的账号!');
                $this->display('Shop/login');
                exit;
            }
            if (!$shop->autoCheckToken($_POST)) {
                $this->show();
            }else {
                if (empty(I('post.s_username')) || empty(I('post.s_password'))) {
                    $this->assign('error', '登录失败,账号或密码不能为空!');
                    $this->display('Shop/login');
                } elseif (empty(I('post.verify'))) {
                    $this->assign('error', '请输入验证码!');
                    $this->display('Shop/login');
                } else {
                    // 组合查询条件
                    $result = $shop->where(array('s_username' => I('post.s_username')))->select();
                    // 验证用户名 对比 密码
                    if (!$verify->check(I('post.verify'), '')) {
                        $this->assign('error', '验证码错误请重新输入!');
                        $this->display('Shop/login');
                    } elseif ($result && $result[0]['s_password'] == I('post.s_password')) {
                        if($result[0]['s_sid']==0){
                            //店铺管老板
                            $data = array(
                                'id' => $result[0]['id'],//店铺id
                                's_phone' => $result[0]['s_phone'],
                                's_name' => $result[0]['s_name'],
                                's_username' => $result[0]['s_username'],
                                's_email' => $result[0]['s_email'],
                                'logintime' => time(),
                                's_sid'=>$result[0]['s_sid'],//经手人id
                                'session_id' => session_id()
                            );// 当前用户名 当前用户id
                        }else{
                            $result2 = $shop->find($result[0]['s_sid']);//店铺信息
                            $data = array(
                                'id' => $result2['id'],//店铺id
                                's_phone' => $result[0]['s_phone'],
                                's_name' => $result2['s_name'],
                                's_username' => $result[0]['s_username'],
                                's_email' => $result[0]['s_email'],
                                'logintime' => time(),
                                's_sid'=>$result[0]['id'],//经手人id
                                'session_id' => session_id()
                            );
                        }
                        $data2 = array(
                            'session_id' => session_id(),
                            's_username' => $result[0]['s_username'],
                            'create_at' => date('Y-m-d H:i:s'),
                            'stop_time' => date('Y-m-d H:i:s', strtotime('+30 minute'))
                        );
                        D('session')->add($data2);
                        //存储session
                        session('shop', $data);
                        $this->show();
                    } else {
                        $this->assign('error', '登录失败,用户名或密码不正确!');
                        $this->display('Shop/login');
                    }
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
            $this->assign('max_xf',$max_xf);
            session('max_xf',$max_xf);

            //今日消费金额
            $where['gradetime']=array('like',date("Y-m-d")."%");
            $today_xf = $record->
            where(array("s_id"=>session('shop.id'),"gradetype"=>'N'))->
            where($where)->sum('grade');
            $this->assign('today_xf',$today_xf);

            //总共充值金额
            $max_cz = $record->
            where(array("s_id"=>session('shop.id'),"gradetype"=>'Y'))
                ->sum('grade');
            $this->assign('max_cz',$max_cz);

            //今日充值金额
            $today_cz = $record->
            where(array("s_id"=>session('shop.id'),"gradetype"=>'Y'))->
            where($where)->sum('grade');
            $this->assign('today_cz',$today_cz);

            //商铺总会员数量
            $shop = D("shop");
            $max_vipNum = $shop->join('t_shop_member ON t_shop.id = t_shop_member.s_id')->
            join('t_member ON t_shop_member.m_id = t_member.id')->
            where(array('t_shop.id'=>session('shop.id')))->count();
            $this->assign('max_vipNum',$max_vipNum);

            //今日新注册会员数量
            $today['t_member.create_at']=array('like',date("Y-m-d")."%");
            $today_vipNum = $shop->join('t_shop_member ON t_shop.id = t_shop_member.s_id')->
            join('t_member ON t_shop_member.m_id = t_member.id')->
            where(array('t_shop.id'=>session('shop.id')))->where($today)->count();
            $this->assign('today_vipNum',$today_vipNum);

            //查询会员充值总金额
            $arr = $record->field('m_id,sum(grade) as grade')->
            where(array("s_id"=>session('shop.id'),"gradetype"=>'Y'))->
            group('m_id')->select();
            $czMax = $arr[0];
            $czMin = $arr[0];
            foreach ($arr as $key => $vo){
                if ($vo['grade'] > $czMax['grade']) {
                    $czMax = $vo;
                }
                if ($vo['grade'] < $czMin['grade']) {
                    $czMin = $vo;
                }
            }
            $member = D("Member");
            //充值最大金额会员
            if (!empty($czMax)) {
                $recordMax = $member->field('m_nickname')->find($czMax['m_id']);
                $recordMax['grade'] = $czMax['grade'];
                $this->assign('recordMax',$recordMax);
            }
            //充值最小金额会员
            if (!empty($czMin)) {
                $recordMin = $member->field('m_nickname')->find($czMin['m_id']);
                $recordMin['grade'] = $czMin['grade'];
                $this->assign('recordMin',$recordMin);
            }
            //查询会员消费总金额
            $arr = $record->field('m_id,sum(grade) as grade')->
            where(array("s_id"=>session('shop.id'),"gradetype"=>'N'))->
            group('m_id')->select();
            $xfMax = $arr[0];
            $xfMin = $arr[0];
            foreach ($arr as $vo){
                foreach ($arr as $v){
                    if ($vo['grade'] > $xfMax['grade']){
                        $xfMax = $vo;
                    }
                    if ($vo['grade'] < $xfMin['grade']){
                        $xfMin = $vo;
                    }
                }
            }
            $member = D("Member");
            //消费最大金额会员
            if (!empty($xfMax)) {
                $consumeMax = $member->field('m_nickname')->find($xfMax['m_id']);
                $consumeMax['grade'] = $xfMax['grade'];
                $this->assign('consumeMax',$consumeMax);
            }
            //消费最小金额会员
            if (!empty($xfMin)) {
                $consumeMin = $member->field('m_nickname')->find($xfMin['m_id']);
                $consumeMin['grade'] = $xfMin['grade'];
                $this->assign("consumeMin",$consumeMin);
            }
            $this->display('home');
        }
    }
    // 退出登录
    /**
     * 用户注销
     */
    public function logout()
    {
        D('session')->where(array('s_username'=>session('shop.s_username')))
                    ->where('stop_time > now()')
                    ->delete();
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
            $records = $record->field('t_member.m_card,t_member.m_nickname,t_member.m_username,t_member.m_phone,t_record.s_sid,t_record.gradetime,t_record.grade')
                            ->join('t_member on t_record.m_id = t_member.id')
                            ->where(array('s_id' => session('shop.id')))
                            ->where("gradetype = 'Y'")
                            ->order('t_record.gradetime desc')
                            ->limit($Page->firstRow.','.$Page->listRows)->select();
            $lists = [];
            foreach ($records as $list){
                if ($list['s_sid']==0){
                    $s_sid = D('shop')->field('s_name')->where(array('id'=>session('shop.id')))->select();
                }else{
                    $s_sid = D('shop')->field('s_name')->where(array('id'=>$list['s_sid']))->select();
                }
                array_push($list,$s_sid['0']);
                array_push($lists,$list);
            }
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
            $records = $record->field('t_member.m_card,t_member.m_nickname,t_member.m_username,t_member.m_phone,t_record.s_sid,t_record.gradetime,t_record.grade')
                            ->join('t_member on t_record.m_id = t_member.id')
                            ->where(array('s_id' => session('shop.id')))
                            ->where("gradetype = 'N'")
                            ->order('t_record.gradetime desc')
                            ->limit($Page->firstRow.','.$Page->listRows)->select();
            $lists = [];
            foreach ($records as $list){
                if ($list['s_sid']==0){
                    $s_sid = D('shop')->field('s_name')->where(array('id'=>session('shop.id')))->select();
                }else{
                    $s_sid = D('shop')->field('s_name')->where(array('id'=>$list['s_sid']))->select();
                }
                array_push($list,$s_sid['0']);
                array_push($lists,$list);
            }
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
            $members =  $shop_member ->join('t_member on t_shop_member.m_id = t_member.id')->join('t_member_level on t_member.l_id = t_member_level.id')->where(array('s_id'=>session('shop.id')))->order('t_shop_member.num desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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
                $cards = D('cards');
                $card = $cards->where(array('card'=>I('post.m_card')))->select();
                $card[0]['status'] = 1;
                $cards->save($card[0]);
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
                        's_sid' => session('shop.s_sid'),//充值经手人
                        'gradetime' => date('Y-m-d H:i:s')
                    );
                    D('record')->add($data);
                    //会员等级
                    $d = D('record');
                    $num = $d->where(array('m_id'=>$m_id[0]['id']))->sum('grade');//查询当前会员充值总金额
                    $member_level = D('member_level');
                    $arr = $member_level->where('term <= '.$num)->order('term desc')->limit(1)->select();
                    $m_id[0]["l_id"] = $arr[0]['id'];
                    D('member')->save($m_id[0]);

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

                    $print="<table>
                                <tr><td colspan='2' style='text-align: center'>".session('shop.s_name')."</td></tr>
                                <tr><td colspan='2' style='text-align: center'>会员信息</td></tr>
                                <tr><td>会员名:</td><td>".$m_id[0]['m_nickname']."</td></tr>
                                <tr><td>会员卡号:</td><td>".$m_id[0]['m_card']."</td></tr>
                                <tr><td>会员电话:</td><td>".$m_id[0]['m_phone']."</td></tr>
                                <tr><td>本次充值金额:</td><td style='text-align: center'> ".I('post.num')." 元</td></tr>
                                <tr><td>总共剩余金额:</td><td style='text-align: center'> ".$money[0]['num']." 元</td></tr>
                                <tr><td>消费时间:</td><td style='text-align: center'>".date('Y-m-d H:i:s')."</td></tr>
                            </table>";
                    $infos = '本次充值：' . I('post.num') . '元<br>卡上余额：' . $money[0]['num'] . '元!';
                    $showname = $m_id[0]['m_nickname'] ? $m_id[0]['m_nickname'] : $m_id[0]['m_username'];
                    $speech = '尊敬的: ' . $showname . ' 会员，您本次成功充值 ' . I('post.num') . ' 元，本店铺余额剩余 ' . $money[0]['num'] .'元！';
                    $this->ajaxReturn(array("status" => "ok", "data" => $infos, "data1" => $speech,"data3"=>$print));
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
            if (I('post.checked')==1){
                $cards = D('cards');
                $card = $cards->where(array('numbers'=>I('post.m_card'),'status'=>1))->select();
                $member = D('member')->join('t_shop_member on t_member.id = t_shop_member.m_id')->where(array('t_shop_member.s_id'=>session('shop.id')))->where(array('t_member.m_card' => $card[0]['card']))->select();
            }elseif (I('post.checked')==2){
                $member = D('member')->join('t_shop_member on t_member.id = t_shop_member.m_id')->where(array('t_shop_member.s_id'=>session('shop.id')))->where(array('t_member.m_card' => I('post.m_card')))->select();
            }elseif(I('post.checked')==3){
                $member = D('member')->join('t_shop_member on t_member.id = t_shop_member.m_id')->where(array('t_shop_member.s_id'=>session('shop.id')))->where(array('t_member.m_phone' => I('post.m_card')))->select();
            }else{
                if (I("post.rel") == 0) {
                    $card = D('cards')->where(array('numbers'=> I('post.m_card'),'status'=> 0))->select();
                }else{
                    $card = D('cards')->where(array('card' => I('post.m_card'),'status'=> 0))->select();
                }
                if (!empty($card)) {
                    $this->ajaxReturn(array("status" =>'yes', "data" => $card[0]['card']));
                }else{
                    $this->ajaxReturn(array("status" =>'no', "data" =>'该卡号已注册或者卡号不正确!'));
                }
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
    //验证手机是否注册
    public function findmember2(){
        if (!session('?shop')){
            $this->display('shop/login');
        }else {
            $member = D('member')->where(array('m_phone' => I('post.m_phone')))->select();
            if (empty($member)) {
                $this->ajaxReturn(array("status" => "no", "data" => '会员不存在'));
            } else {
                $this->ajaxReturn(array("status" => "ok", "data" => '该手机已注册!'));
            }
        }
    }
    //搜索
    public function findall(){
        if (!session('?shop')){
            $this->display('shop/login');
        }else {
            $member = D('member');
            $condition['m_card'] = I('post.input_ss');
            if (I("post.rel") == 1) {
                $cards = D('cards');
                $card = $cards->where(array('numbers'=>I('post.input_ss'),'status'=>1))->select();
                $condition['m_card'] = $card[0]['card'];
            }
            $condition['m_nickname'] = I('post.input_ss');
            $condition['m_phone'] = I('post.input_ss');
            $condition['_logic'] = 'OR';
            $where_main['_complex'] = $condition;
            $where_main['s_id'] = session("shop.id");
            $members = $member->field('t_member.id,t_member.m_nickname,t_member.m_card,t_member.m_phone,t_member_level.m_level,t_shop_member.num')->join('t_shop_member on t_member.id = t_shop_member.m_id')->join('t_member_level on t_member.l_id = t_member_level.id')->where($where_main)->select();
            if (empty($members)) {
                $this->ajaxReturn(array("status" => "no", "data" => '会员不存在'));
            } else {
                $table = "<div class='page-content-inner'>
                            <section class='panel'>
                                <div class='panel-heading'>
                                    <h3>搜索结果</h3>
                                </div>
                                <div class='panel-body'>
                                    <div class='row'>
                                        <div class='col-lg-12'>
                                            <h4>会员列表说明</h4>
                                            <br />
                                            <div class='table-responsive margin-bottom-50'>
                                                <table class='table table-hover' >
                                                    <thead>
                                                    <tr>
                                                        <th>姓名</th>
                                                        <th>卡号</th>
                                                        <th>联系方式</th>
                                                        <th>会员等级</th>
                                                        <th>会员余额</th>
                                                        <th>充值记录</th>
                                                        <th>消费记录</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id='memberinfo'>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <script>
                            $(function () {
                                $('[data-toggle=tooltip]').tooltip();
                            });
                        </script>";
                $info = '';
                foreach ($members as $member){
//                        $info = $member['m_username'];
                    $info = $info."<tr>
                                        <td>".$member['m_nickname']."</td>
                                        <td>".$member['m_card']."</td>
                                        <td>".$member['m_phone']."</td>
                                        <td>".$member['m_level']."</td>
                                        <td>".$member['num']."</td>
                                        <td>
                                            <a href='".__MODULE__."/shop/memberCz?id=".$member['id']."'>
                                                <span class='label label-primary'>  充值记录</span>
                                            </a>
                                        </td>
                                        <td>
                                            <a href='".__MODULE__."/shop/memberXf?id=".$member['id']."'>
                                                <span class='label label-primary'>  消费记录</span>
                                            </a>
                                        </td>
                                    </tr>";
                }
                $this->ajaxReturn(array("status" => "ok","data1"=>$table, "data" => $info));
            }
        }
    }
    /**
     *会员充值记录
     */
    public function memberCz(){
        if (!session('?shop')){
            $this->display('shop/login');
        }else {
            if (IS_GET) {
                $member = D('member')->where(array('id'=>I('get.id')))->select();
                $record = D('record');
                $count = $record->where(array('m_id'=>I('get.id')))->where("gradetype = 'Y'")->count();// 查询满足要求的总记录数
                $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show = $Page->show();// 分页显示输出
                $records = $record->field('t_record.grade,t_record.goods,t_record.gradetime,t_record.s_sid')
                                ->join('t_shop on t_record.s_id = t_shop.id')
                                ->where(array('m_id' => I('get.id'),'s_id'=>session('shop.id')))
                                ->where("gradetype = 'Y'")
                                ->order('t_record.gradetime desc')
                                ->limit($Page->firstRow.','.$Page->listRows)->select();
                $lists = [];
                foreach ($records as $list){
                    if ($list['s_sid']==0){
                        $s_sid = D('shop')->field('s_name')->where(array('id'=>session('shop.id')))->select();
                    }else{
                        $s_sid = D('shop')->field('s_name')->where(array('id'=>$list['s_sid']))->select();
                    }
                    array_push($list,$s_sid['0']);
                    array_push($lists,$list);
                }
                $this->assign('page',$show);// 赋值分页输出
                $this->assign('lists', $lists);
                $this->assign('member', $member);
                $this->display('maddcash2');
            }
        }
    }
    /**
     *会员消费记录
     */
    public function memberXf(){
        if (!session('?shop')){
            $this->display('shop/login');
        }else {
            if (IS_GET) {
                $member = D('member')->where(array('id'=>I('get.id')))->select();
                $record = D('record');
                $count = $record->where(array('m_id'=>I('get.id')))->where("gradetype = 'N'")->count();// 查询满足要求的总记录数
                $Page = new \Think\Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数(25)
                $show = $Page->show();// 分页显示输出
                $records = $record->field('t_record.grade,t_record.goods,t_record.gradetime,t_record.s_sid')
                                ->join('t_shop on t_record.s_id = t_shop.id')
                                ->where(array('m_id' => I('get.id'),'s_id'=>session('shop.id')))
                                ->where("gradetype = 'N'")
                                ->order('t_record.gradetime desc')
                                ->limit($Page->firstRow.','.$Page->listRows)->select();
                $lists = [];
                foreach ($records as $list){
                    if ($list['s_sid']==0){
                        $s_sid = D('shop')->field('s_name')->where(array('id'=>session('shop.id')))->select();
                    }else{
                        $s_sid = D('shop')->field('s_name')->where(array('id'=>$list['s_sid']))->select();
                    }
                    array_push($list,$s_sid['0']);
                    array_push($lists,$list);
                }
                $this->assign('page',$show);// 赋值分页输出
                $this->assign('lists', $lists);
                $this->assign('member', $member);
                $this->display('usecash2');
            }
        }
    }
    //会员详情
    public function memberinfo(){
        $this->display();
    }
    //会员消费
    public function usemember(){
        if (!session('?shop')){
            $this->display('shop/login');
        }else {
            $this->display('usemember');
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
                    //添加消费记录
                    $data = array(
                        's_id' => session('shop.id'),
                        'm_id' => $m_id[0]['id'],
                        'grade' => I('post.num'),
                        'gradetype' => 'N',
                        's_sid' => session('shop.s_sid'),
                        'goods'=> I('post.goods'),
                        'gradetime' => date('Y-m-d H:i:s')
                    );
                    D('record')->add($data);
//
//                    //商铺积分增加
//                    $data1 = array(
//                        's_num' => $shop[0]['s_num'] + I('post.num')
//                    );
//                    D('shop')->where(array('id' => session('shop.id')))->save($data1);

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
                    $speech = '尊敬的: ' . $showname . ' 会员，您本次成功消费 ' . I('post.num') . ' 元，本店铺余额剩余 ' . $money[0]['num'] .'元,谢谢惠顾！';


                    $print="<table>
                                <tr><td colspan='2' style='text-align: center'>".session('shop.s_name')."</td></tr>
                                <tr><td colspan='2' style='text-align: center'>会员信息</td></tr>
                                <tr><td>会员名:</td><td>".$m_id[0]['m_nickname']."</td></tr>
                                <tr><td>会员卡号:</td><td>".$m_id[0]['m_card']."</td></tr>
                                <tr><td>会员电话:</td><td>".$m_id[0]['m_phone']."</td></tr>
                                <tr><td colspan='2' style='text-align: center'>消费内容</td></tr>
                                <tr><td>".I('post.goods')."</td></tr>
                                <tr><td>本次消费金额:</td><td style='text-align: center'> ".I('post.num')." 元</td></tr>
                                <tr><td>总共剩余金额:</td><td style='text-align: center'> ".$money[0]['num']." 元</td></tr>
                                <tr><td>消费时间:</td><td style='text-align: center'>".date('Y-m-d H:i:s')."</td></tr>
                            </table>";

                    $record = D('record');
                    //店铺总消费金额
                    $max_xf = $record->
                    where(array("s_id"=>session('shop.id'),"gradetype"=>'N'))
                        ->sum('grade');
                    session('max_xf',$max_xf);
                    $this->ajaxReturn(array("status" => "ok", "data" => $infos, "data1" => $speech,'data2'=>$max_xf,'data3'=>$print));
                }
            } else {
                $this->display('Shop/login');
            }
        }
    }
    //修改密码
    public function updata(){
        if (!session('?shop')) {
            $this->display('shop/login');
        } else {
            if (IS_POST) {
                $shop = D('shop')->find(I('post.id'));
                if ($shop['s_password']==I('post.old_password')){
                    if(empty(I('post.s_password'))){
                        $data = array(
                            's_email'=>I('post.n_email'),
                            'n_phone'=>I('post.n_phone')
                        );
                    }else{
                        $data = array(
                            's_email'=>I('post.n_email'),
                            's_phone'=>I('post.n_phone'),
                            's_password'=>I('post.s_password')
                        );
                    }
                    D('shop')->where(array('id'=>I('post.id')))->save($data);
                    session('shop',null);
                    $this->ajaxReturn(array("status" => "ok", "data" => '修改成功'));
                }else{
                    $this->ajaxReturn(array("status" => "no", "data" => '原密码不正确,不能修改!'));
                }
            }else{
                $this->display('shop/login');
            }
        }
    }
    //添加店铺管理员
    public function addshopadmin(){
        if (!session('?shop')) {
            $this->display('shop/login');
        }else{
            $nums = D('shop')->where(array('s_sid'=>session('shop.id')))->count('id');
            $num = $nums + 1;
            $this->assign('num',$num);
            $this->display('addshopadmin');
        }
    }
    public function addshopadmin2(){
        if (!session('?shop')) {
            $this->display('shop/login');
        }else{
            if (IS_POST) {
                $shop = D('shop');
                if (!$shop->autoCheckToken($_POST)) {
                    $this->adminlist();
                }else{
                    if (empty(I('post.s_email'))||empty(I('post.s_name'))||empty(I('post.s_password'))||empty(I('post.s_phone'))){
                        $this->assign('error','请填入完整信息!');
                        $this->addshopadmin();
                    }elseif (strlen(I('post.s_password'))<6||strlen(I('post.s_password'))>10){
                        $this->assign('error','密码长度为6-10位!');
                        $this->addshopadmin();
                    }else{
                        $data = array(
                            's_name' => I('post.s_name'),
                            's_username' => I('post.s_username'),
                            's_password' => I('post.s_password'),
                            's_phone' => I('post.s_phone'),
                            's_email' => I('post.s_email'),
                            's_sid' => session('shop.id')
                        );
                        D('shop')->add($data);
                        $this->adminlist();
                    }
                }
            }else{
                $this->display('shop/login');
            }
        }
    }
    //店铺管理员列表
    public function adminlist(){
        if (!session('?shop')) {
            $this->display('shop/login');
        }else{
            $admins = D('shop')->field('s_name,id,s_username,s_phone,s_email')
                ->where(array('s_sid'=>session('shop.id')))->select();
            $this->assign('admins',$admins);
            $this->display('adminlist');
        }
    }
//    //删除店铺管理员
//    public function admindel(){
//        if (!session('?shop')) {
//            $this->display('shop/login');
//        }else{
//            if (IS_GET) {
//                D('shop')->delete(I('get.id'));
//                $data = array(
//                    's_sid' => session('shop.id')
//                );
//                D('record')->where(array('s_sid'=>I('get.id')))->save($data);
//                $this->adminlist();
//            }else{
//                $this->display('shop/login');
//            }
//        }
//    }


}

