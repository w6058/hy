<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>商户中心-TK会员系统</title>

    <link href="/hy/Public/assets/common/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="/hy/Public/assets/common/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="/hy/Public/assets/common/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="/hy/Public/assets/common/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="/hy/Public/assets/common/img/favicon.png" rel="icon" type="image/png">
    <link href="favicon.ico" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for < IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Vendors Styles -->
    <!-- v1.0.0 -->
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/jscrollpane/style/jquery.jscrollpane.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/ladda/dist/ladda-themeless.min.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/cleanhtmlaudioplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/cleanhtmlvideoplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/bootstrap-sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/summernote/dist/summernote.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/ionrangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/datatables/media/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/c3/c3.min.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/chartist/dist/chartist.min.css">
    <!-- v1.4.0 -->
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/jquery-steps/demo/css/jquery.steps.css">
    <!-- v1.4.2 -->
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css">
    <!-- v1.7.0 -->
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/vendors/dropify/dist/css/dropify.min.css">

    <!-- Clean UI Styles -->
    <link rel="stylesheet" type="text/css" href="/hy/Public/assets/common/css/source/main.css">

    <!-- Vendors Scripts -->
    <!-- v1.0.0 -->
    <script src="/hy/Public/assets/vendors/jquery/jquery.min.js"></script>
    <script src="/hy/Public/assets/vendors/tether/dist/js/tether.min.js"></script>
    <script src="/hy/Public/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/hy/Public/assets/vendors/jquery-mousewheel/jquery.mousewheel.min.js"></script>
    <script src="/hy/Public/assets/vendors/jscrollpane/script/jquery.jscrollpane.min.js"></script>
    <script src="/hy/Public/assets/vendors/spin.js/spin.js"></script>
    <script src="/hy/Public/assets/vendors/ladda/dist/ladda.min.js"></script>
    <script src="/hy/Public/assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="/hy/Public/assets/vendors/html5-form-validation/dist/jquery.validation.min.js"></script>
    <script src="/hy/Public/assets/vendors/jquery-typeahead/dist/jquery.typeahead.min.js"></script>
    <script src="/hy/Public/assets/vendors/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="/hy/Public/assets/vendors/autosize/dist/autosize.min.js"></script>
    <script src="/hy/Public/assets/vendors/bootstrap-show-password/bootstrap-show-password.min.js"></script>
    <script src="/hy/Public/assets/vendors/moment/min/moment.min.js"></script>
    <script src="/hy/Public/assets/vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/hy/Public/assets/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="/hy/Public/assets/vendors/cleanhtmlaudioplayer/src/jquery.cleanaudioplayer.js"></script>
    <script src="/hy/Public/assets/vendors/cleanhtmlvideoplayer/src/jquery.cleanvideoplayer.js"></script>
    <script src="/hy/Public/assets/vendors/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
    <script src="/hy/Public/assets/vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>
    <script src="/hy/Public/assets/vendors/summernote/dist/summernote.min.js"></script>
    <script src="/hy/Public/assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/hy/Public/assets/vendors/ionrangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="/hy/Public/assets/vendors/nestable/jquery.nestable.js"></script>
    <script src="/hy/Public/assets/vendors/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/hy/Public/assets/vendors/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="/hy/Public/assets/vendors/datatables-fixedcolumns/js/dataTables.fixedColumns.js"></script>
    <script src="/hy/Public/assets/vendors/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="/hy/Public/assets/vendors/editable-table/mindmup-editabletable.js"></script>
    <script src="/hy/Public/assets/vendors/d3/d3.min.js"></script>
    <script src="/hy/Public/assets/vendors/c3/c3.min.js"></script>
    <script src="/hy/Public/assets/vendors/chartist/dist/chartist.min.js"></script>
    <script src="/hy/Public/assets/vendors/peity/jquery.peity.min.js"></script>
    <!-- v1.0.1 -->
    <script src="/hy/Public/assets/vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- v1.1.1 -->
    <script src="/hy/Public/assets/vendors/gsap/src/minified/TweenMax.min.js"></script>
    <script src="/hy/Public/assets/vendors/hackertyper/hackertyper.js"></script>
    <script src="/hy/Public/assets/vendors/jquery-countTo/jquery.countTo.js"></script>
    <!-- v1.4.0 -->
    <script src="/hy/Public/assets/vendors/nprogress/nprogress.js"></script>
    <script src="/hy/Public/assets/vendors/jquery-steps/build/jquery.steps.min.js"></script>
    <!-- v1.4.2 -->
    <script src="/hy/Public/assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/hy/Public/assets/vendors/chart.js/src/Chart.bundle.min.js"></script>
    <!-- v1.7.0 -->
    <script src="/hy/Public/assets/vendors/dropify/dist/js/dropify.min.js"></script>

    <!-- Clean UI Scripts -->
    <script src="/hy/Public/assets/common/js/common.js"></script>
    <script src="/hy/Public/assets/common/js/demo.temp.js"></script>
</head>
<body class="theme-default">

<section class="page-content">
<div class="page-content-inner single-page-login-beta" style="background-image: url(/hy/Public/assets/common/img/temp/login/6.jpg)">

    <!-- Login Beta Page -->
    <div class="single-page-block-header">
        <div class="row">
            <div class="col-lg-4">
                <div class="logo">
                    <a href="javascript: history.back();">
                        <img src="/hy/Public/assets/common/img/logo-inverse.png" alt="Clean UI Admin Template" />
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="single-page-block-header-menu">
                    <ul class="list-unstyled list-inline">
                        <li><a href="/hy/Public/guide.html" target="_blank">使用手册</a></li>
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
                        </h3>
                        <br />
                        <form action="/hy/index.php/Home/shop/index" id="form-validation" name="form-validation" method="POST">
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
                                <a href="javascript: void(0);" class="pull-right link-blue link-underlined">忘记密码请联系管理员</a>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="example6" checked>
                                        记住我
                                    </label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary width-150 margin-inline">登录</button>
                            </div>

                        </form>
                    </div>
                    <div class="single-page-block-sidebar" style="background-image: url(/hy/Public/assets/common/img/temp/login/7.jpg)">
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

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });

        // Show/Hide Password
        $('.password').password({
            eyeClass: '',
            eyeOpenClass: 'icmn-eye',
            eyeCloseClass: 'icmn-eye-blocked'
        });

    });
</script>
<!-- End Page Scripts -->
</section>

<div class="main-backdrop"><!-- --></div>

</body>
</html>