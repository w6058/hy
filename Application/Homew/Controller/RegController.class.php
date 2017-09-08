<?php
namespace Home\Controller;
use Think\Controller;

/**
 * @author asus1
 * 会员控制器
 */
class RegController extends Controller{
//注册
    public function index(){
        $this->display('reg/li');
    }
    public function reg(){
        $this->display('reg/reg');
    }
    public function reg2(){
        if (IS_POST){
            $shop = D('shop');
            $verify = new \Think\Verify();
            if (!$shop->autoCheckToken($_POST)) {
                $this->assign('error','请勿重复提交!');
                $this->display('Shop/login');
            }else {
                if (!$verify->check(I('post.verify'), '')) {
                    $this->assign('error', '验证码错误请重新输入!');
                    $this->display('reg/reg');
                } elseif (!empty(I('post.s_name')) &&!empty(I('post.s_username')) && !empty(I('post.s_password'))&&strlen(I('post.s_password'))>=6&&strlen(I('post.s_password'))<=10) {
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize   =     3145728 ;// 设置附件上传大小
                    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                    $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
                    $upload->savePath  =     I('post.s_username').'/'; // 设置附件上传（子）目录
                    $upload->saveName = array('uniqid', array('', true));
//                    // 上传文件
                    $info   =   $upload->upload();
                    if(!$info) {// 上传错误提示错误信息
                        $this->assign('error','上传失败，请重新操作！');
                        $this->reg();
                    }else{// 上传成功
                        $data = array(
                            's_name' => I('post.s_name'),
                            's_username' => I('post.s_username'),
                            's_password' => I('post.s_password'),
                            's_card' =>I('post.s_card'),
                            's_phone' => I('post.s_phone'),
                            's_address' => I('post.s_address'),
                            's_email' => I('post.s_email'),
                            's_num' => 0,
                            's_sid' => 0,
                            's_license' => I('post.s_license'),
                        );
                        foreach($info as $file){
                            $data[$file['key']] = $file['savepath'].$file['savename'];
                        }
                        D('shop')->add($data);
                        $this->assign('success','创建新商铺成功,请登录!');
                        $this->display('shop/login');
                    }
                }else{
                    $this->assign('error','输入错误! 请重新填表!');
                    $this->display('shop/login');
                }
            }
        }else{
            $this->display('reg');
        }
    }



}
