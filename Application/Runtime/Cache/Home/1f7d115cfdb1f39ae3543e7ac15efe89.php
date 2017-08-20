<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>会员中心登陆</title>

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
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/bootstrap.min.css">
    <!-- Clean UI Styles -->
    <link rel="stylesheet" type="text/css" href="/Public/assets/common/css/main.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/common/css/source/helpers/fonts">

    <!-- Vendors Scripts -->
    <!-- v1.0.0 -->
    <script src="/Public/assets/vendors/jquery.min.js"></script>

</head>
<body class="theme-default">

<section class="page-content">
<div class="page-content-inner single-page-login-alpha" style="background-image: url(/Public/assets/common/img/temp/login/5.jpg)">

    <!-- Login Alpha Page -->
    <div class="single-page-block-header">
        <div class="row">
            <div class="col-lg-4">
                <div class="logo">
                    <a href="/index.php/Home/index/index">
                        <img src="/Public/assets/common/img/logo-inverse.png" alt="Clean UI Admin Template" />
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="single-page-block-header-menu">
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript: void(0);">记得今天笑一笑</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="single-page-block">
        <div class="row">
            <div class="col-xl-12">
                <div class="promo-text">
                    <h1>欢迎来到会员中心</h1>
                    <p>每天都要有好心情哦</p>
                </div>
                <div class="single-page-block-inner">
                    <div class="single-page-block-form">
                        <h3 class="text-center">
                            <i class="icmn-enter margin-right-10"></i>
                            登录
                            <h6 style="color:red;"><?php echo ($error); ?></h6>
                        </h3>
                        <br />
                        <form id="form-validation" name="form-validation" action="/index.php/Home/Member/login" method="POST">
                            <div class="form-group">
                                <label class="form-label">账户</label>
                                <input id="validation-email"
                                       class="form-control"
                                       placeholder="输入您的账户"
                                       name="username"
                                       type="text"
                                       data-validation="[EMAIL]">
                            </div>
                            <div class="form-group">
                                <label class="form-label">密码</label>
                                <input id="validation-password"
                                       class="form-control password"
                                       name="password"
                                       type="password" data-validation="[L>=6]"
                                       data-validation-message="$ must be at least 6 characters"
                                       placeholder="密码">
                            </div>
                            <div class="form-group">
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="example6" checked>
                                        记住我
                                    </label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary width-150">登录</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-page-block-footer text-center">
        <ul class="list-unstyled list-inline">
            <li><a href="javascript: void(0);">会员中心</a></li>
        </ul>
    </div>
    <!-- End Login Alpha Page -->

</div>

<!-- Page Scripts -->
<script>
    $(function() {

        // Add class to body for change layout settings
        $('body').addClass('single-page');

       
//        // Show/Hide Password
//        $('.password').password({
//            eyeClass: '',
//            eyeOpenClass: 'icmn-eye',
//            eyeCloseClass: 'icmn-eye-blocked'
//        });

    });
</script>
<!-- End Page Scripts -->
</section>
</body>
</html>