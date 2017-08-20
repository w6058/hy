<?php 
    namespace Home\Controller;
    use Think\Controller;
                
    /**
     * @author asus1
     * 会员控制器
     */
    class MemberController extends Controller{
        /**
         *会员基本信息页面 
         */
        function index(){
            if (IS_GET){
                $this->display('memberLogin');
            }
        }
        /**
         *账号登陆 
         */
        function login(){
            $d = D('Member');
            $arr = $d->where(array('m_username'=>I("post.username"),'m_password'=>I("post.password")))->select();
            session('member',$arr[0]);
            if (count($arr)){
                $this->assign('vo',session('member'));
                $this->memberCenter();
            }else{
                $this->assign('error','登录失败,用户名或密码不正确!');
                $this->display('memberLogin');
            }
        }
        function memberCenter (){ //会员中心页面数据查询
            $time = date("Y-m-d");
            $c = D("record");
            $grade = $c->queryById(session('member')['id']);//一共消费了多少钱
            $money = $c->queryByToday($time.'%',"N",session('member')['id']);//今日消费了多少钱
            $countY = $c->queryCountY(session('member')['id']);
            $countN = $c->queryCountN(session('member')['id']);
            $this->assign('countY',$countY);
            $this->assign('countN',$countN);
            $this->assign('money',$money);
            $this->assign("grade",$grade);
            $this->assign('vo',session('member'));
            $this->display('memberHome');
        }
        function recordY(){//充值记录查询
            if (!empty(session('member'))) {
                $d =D('Member');
                $count = $d->join("t_record ON t_record.m_id = t_member.id")->
                join('t_shop ON t_shop.id = t_record.s_id')->where(array('gradetype'=>"Y",'t_member.id'=>session('member')['id']))->count();
                $Page       = new \Think\Page($count,5);//实例化分页类传入总记录数和每页显示的记录数(25)
                $show       = $Page->show();// 分页显示输出
                $arr = $d->join("t_record ON t_record.m_id = t_member.id")->
                join('t_shop ON t_shop.id = t_record.s_id')->where(array('gradetype'=>"Y",'t_member.id'=>session('member')['id']))->order('gradetime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('list',$arr);// 赋值数据集
                $this->assign('page',$show);// 赋值分页输出
                $this->display("memberRecharge");
            }else{
                $this->display('memberLogin');
            }
        }
        function recordN(){//消费记录查询
            if (!empty(session('member'))) {
                $d =D('Member');
                $count = $d->join("t_record ON t_record.m_id = t_member.id")->
                join('t_shop ON t_shop.id = t_record.s_id')->where(array('gradetype'=>"N",'t_member.id'=>session('member')['id']))->count();
                $Page       = new \Think\Page($count,5);//实例化分页类传入总记录数和每页显示的记录数(25)
                $show       = $Page->show();// 分页显示输出
                $arr = $d->join("t_record ON t_record.m_id = t_member.id")->
                join('t_shop ON t_shop.id = t_record.s_id')->where(array('gradetype'=>"N",'t_member.id'=>session('member')['id']))->order('gradetime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('list',$arr);// 赋值数据集
                $this->assign('page',$show);// 赋值分页输出
                $this->display("memberConsumption"); // 输出模板
            }else{
                $this->display('memberLogin');
            }
        }
        function memberOut(){
            if (!empty(session('member'))) {
               session('member',null);
            }
            $this->display("memberLogin");
        }
    }