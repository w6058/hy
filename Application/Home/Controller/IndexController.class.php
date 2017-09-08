<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    /**
     *
     * 验证码生成
     */
    public function verify_c(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 20;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->codeSet = '0123456789';
        $Verify->imageW = 150;
        $Verify->imageH = 50;
        $Verify->expire = 30;
        $Verify->entry();
    }
    public function index(){
        $this->display('shop/login');
    }
}