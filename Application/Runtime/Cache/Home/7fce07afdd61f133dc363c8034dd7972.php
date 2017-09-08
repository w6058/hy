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

                        <form method="post" action="/index.php/Home/reg/reg" enctype="multipart/form-data">
                            <div class=''><h3 style="text-align: center"><b>使用许可协议</b></h3></div>
                            <div class='' >

                                <p>版权所有 (c)2017，TK Group 保留所有权利。 </p>
                                <p>感谢您选择TK会员系统。</p>
                                <p>为了使您正确并合法的使用本系统，请您在使用前务必阅读清楚下面的协议条款：</p>
                                <p><strong>一、本授权协议适用且仅适用于TK会员系统商户中心， TK Group官方对本授权协议的最终解释权。</strong></p>
                                <p><strong>二、协议许可的权利 </strong></p>
                                <p>1、内部版本，您可以在完全遵守本最终用户授权协议的基础上，而不必支付系统版权授权费用，如后期有所调整，将以公告方式另行通知。 </p>
                                <p>2、您可以在协议规定的约束和限制范围内修改密码及基础资料或界面风格以适应您的操作要求。</p>
                                <p>3、您拥有使用本系统构建的使用管理权，并独立承担与这些内容的相关法律义务。</p>
                                <p>4、遵守TK Group公司内部规定和国家相关保密条例。</p>
                                <p><strong>三、有限担保和免责声明 </strong></p>
                                <p>1、本系统及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。</p>
                                <p>2、用户出于自愿而使用本系统，您必须了解使用本系统的风险，在尚未购买产品技术服务之前，我们不承诺对免费用户提供任何形式的技术支持、使用担保，也不承担任何因使用本系统而产生问题的相关责任。</p>
                                <p>3、电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和等同的法律效力。您一旦开始确认本协议并成功登录，即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。</p>
                                <p><b>协议发布时间：</b> 2017年8月25日</p>
                                <p><b>版本最新更新：</b> 2017年8月25日</p>
                            </div>
                            <div class="form-actions">
                                <input type='checkbox' id="checkbox1">
                                <button type="submit" id="button_jx" class="btn width-150 btn-primary">同意</button>
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

        $('#button_jx').attr('disabled','disabled');
        $('#checkbox1').attr("checked",false);
        $('#checkbox1').on('change',function () {
            var checked = $('#checkbox1').is(':checked');
            if(checked){
                $('#button_jx').removeAttr('disabled');
            }else {
                $('#button_jx').attr('disabled','disabled');
            }
        });

    });
</script>
<!-- End Page Scripts -->
</section>
</body>
</html>