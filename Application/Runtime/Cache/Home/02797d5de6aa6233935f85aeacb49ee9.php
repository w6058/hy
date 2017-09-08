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
        <div class="row">
            <div class="col-lg-4">
                <div class="logo">
                    <a href="/index.php/Home/admin/home">
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
        <div class="row">
            <div class="col-xl-12">
                <div class="single-page-block-inner">
                    <div class="single-page-block-form">
                        <h3 class="text-center">
                            商户中心 登录
                            <span class="small">欢迎您!</span>
                            <h6 style="color:red;"><?php echo ($error); ?></h6>
                            <h6 style="color:red;"><?php echo ($success); ?></h6>
                        </h3>
                        <br />
                        <form action="/index.php/Home/shop/index" id="form-validation" name="form-validation" method="POST">
                            <div class="form-group">
                                <label class="form-label">账号</label>
                                <input id="validation-email"
                                       class="form-control"
                                       placeholder="输入您的账号"
                                       name="s_username"
                                       type="text">
                            </div>
                            <div class="form-group">
                                <label class="form-label">密码</label>
                                <input id="validation-password"
                                       class="form-control password"
                                       name="s_password"
                                       type="password" data-validation="[L>=6]"
                                       data-validation-message="$ must be at least 6 characters"
                                       placeholder="输入您的密码">
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
                            <div class="form-group">
                                <a href="/index.php/Home/reg/index" class="pull-left link-blue ">新商户注册</a>
                                <a href="javascript: void(0);" class="pull-right link-blue ">忘记密码请联系管理员</a>
                            </div>
                            <br>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary width-150 margin-inline">登录</button>
                            </div>
                        </form>
                    </div>
                    <div class="single-page-block-sidebar" style="background-image: url(/Public/assets/common/img/temp/login/7.jpg)">
                        <div class="single-page-block-sidebar--shadow"><!-- --></div>
                        <div class="single-page-block-sidebar--content">
                            <div class="single-page-block-sidebar--content--title">
                                TK会员系统
                                <span style="font-size: 14px;">TK.170815</span>
                            </div>
                            <div class="single-page-block-sidebar--content--item">
                                欢迎您使用TK会员管理系统
                            </div>
                            <div class="single-page-block-sidebar--content--item">

                            </div>
                        </div>
                        <div class="single-page-block-sidebar--place">
                            <i class="icmn-location margin-right-5"><!-- --></i>
                            中国 四川 绵阳
                        </div>
                    </div>
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

<!-- Page Scripts -->
<script>
    $(function() {

        // Add class to body for change layout settings
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