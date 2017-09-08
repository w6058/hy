<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>商户中心-TK会员系统</title>

    <link href="/Public/assets/common/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="/Public/assets/common/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="/Public/assets/common/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="/Public/assets/common/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="/Public/assets/common/img/favicon.png" rel="icon" type="image/png">
    <link href="favicon.ico" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for < IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Vendors Styles -->
    <!-- v1.0.0 -->
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <!-- Clean UI Styles -->
    <link rel="stylesheet" type="text/css" href="/Public/assets/common/css/main.min.css">
    <!-- Vendors Scripts -->
    <script src="/Public/assets/vendors/jquery/jquery.min.js"></script>
    <!-- v1.0.0 -->

</head>
<body class="theme-default">

<section class="page-content">
<div class="page-content-inner single-page-login-beta" style="background-image: url(/Public/assets/common/img/temp/login/6.jpg)">

    <!-- Login Beta Page -->
    <div class="single-page-block-header">
        <div class=>
            <div class="col-lg-4">
                <div class="logo">
                    <a href="/index.php/Home/shop/login">
                        <img src="/Public/assets/common/img/logo-inverse.png" alt="Clean UI Admin Template" />
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="single-page-block-header-menu">

                    <ul class="list-unstyled list-inline">
                        <li><a href="/Public/video.html" target="_blank">视频教程</a></li>
                        <li><a href="/Public/guide.html" target="_blank">使用手册</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="single-page-block">
            <div class="col-xl-12">
                <div class="single-page-block-inner" style="height: auto">
                    <div class="single-page-block-form" style="margin: 0">
                        <h3 class="text-center">
                            商户 注册 中心
                            <span class="small">欢迎您!</span>
                        </h3>
                        <br />
                        <form method="post" action="/index.php/Home/reg/reg2" enctype="multipart/form-data">
                            <h5 style="color:red;"><?php echo ($error); ?></h5>
                            <div class="form-group">
                                <label class="form-control-label">商户名称</label>
                                <input type="text" class="form-control" name="s_name" placeholder="商户名称">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">管理员账号</label>
                                <input type="text" class="form-control" name="s_username" placeholder="管理员账号">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">管理员密码</label>
                                <input type="password" class="form-control" name="s_password" placeholder="必须是字母数字,长度为6-10位!">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">管理员身份证号</label>
                                <input type="text" class="form-control" name="s_card" placeholder="管理员身份证号">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">管理员手机号</label>
                                <input type="text" class="form-control" name="s_phone" placeholder="管理员手机号">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">管理员邮箱</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icmn-mail2"></i>
                                    </span>
                                    <input type="email" name="s_email" class="form-control" placeholder="管理员邮箱" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">商户地址</label>
                                <input type="text" class="form-control" name="s_address" placeholder="请输入商户地址" >
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" >商户许可证号码</label>
                                <input type="text" class="form-control" name="s_license" placeholder="请输入许可证号码" >
                            </div>
                            <div class="form-group">
                                <hr />
                                <label class="form-control-label">工商运营有效证件</label>
                                <input type="file" class="form-control"  name='s_document'>
                                <br />
                            </div>
                            <div class="form-group">
                                <hr />
                                <label class="form-control-label" >法人身份证正面扫描件</label>
                                <input type="file"  class="form-control"  name='s_fidcard_f'>
                                <br />
                                <hr />
                                <label class="form-control-label" >法人身份证反面扫描件</label>
                                <input type="file"  class="form-control"  name='s_fidcard_b'>
                                <br />
                            </div>
                            <div class="form-group">
                                <hr />
                                <label class="form-control-label">管理员身份证正面扫描件</label>
                                <input type="file"  class="form-control"  name='s_aidcard_f'>
                                <br />
                                <hr />
                                <label class="form-control-label">管理员身份证反面扫描件</label>
                                <input type="file"  class="form-control"  name='s_aidcard_b'>
                                <br />
                            </div>
                            <div class="form-group">
                                <label class="form-label">验证码</label>
                                <p>
                                    <img width="30%" class="" height="50" alt="验证码" src="<?php echo U('Home/Index/verify_c',array());?>" title="点击刷新">
                                </p>
                                <input id=""
                                       class="form-control password"
                                       name="verify"
                                       placeholder="输入您的验证码">
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn width-150 btn-primary">注册</button>
                                <a href="/index.php/Home/shop/login" class="btn btn-default">返回登录</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
    </div>
    <div class="single-page-block-footer text-center">
        <ul class="list-unstyled list-inline">
            <li><a href="javascript: void(0);">© 2017 TK会员系统 All rights reserved</a></li>
        </ul>
    </div>
    <!-- End Login Beta Page -->

</div>

<script>
    $(function() {
        $('body').addClass('single-page');
        var captcha_img = $('.form-group').find('img');
        var verifyimg = captcha_img.attr("src");
        captcha_img.attr('title', '点击刷新');
        captcha_img.click(function(){
            if( verifyimg.indexOf('?')>0){
                $(this).attr("src", verifyimg+'&random='+Math.random());
            }else{
                $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
        });
    });
</script>
<!-- End Page Scripts -->
</section>
</body>
</html>