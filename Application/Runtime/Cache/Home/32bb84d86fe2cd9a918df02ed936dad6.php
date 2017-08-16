<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>会员中心</title>

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
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/jscrollpane/style/jquery.jscrollpane.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/ladda/dist/ladda-themeless.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/cleanhtmlaudioplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/cleanhtmlvideoplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/bootstrap-sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/summernote/dist/summernote.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/ionrangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/datatables/media/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/c3/c3.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/chartist/dist/chartist.min.css">
    <!-- v1.4.0 -->
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/jquery-steps/demo/css/jquery.steps.css">
    <!-- v1.4.2 -->
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css">
    <!-- v1.7.0 -->
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/dropify/dist/css/dropify.min.css">

    <!-- Clean UI Styles -->
    <link rel="stylesheet" type="text/css" href="/Public/assets/common/css/source/main.css">

    <!-- Vendors Scripts -->
    <!-- v1.0.0 -->
    <script src="/Public/assets/vendors/jquery/jquery.min.js"></script>
    <script src="/Public/assets/vendors/tether/dist/js/tether.min.js"></script>
    <script src="/Public/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/Public/assets/vendors/jquery-mousewheel/jquery.mousewheel.min.js"></script>
    <script src="/Public/assets/vendors/jscrollpane/script/jquery.jscrollpane.min.js"></script>
    <script src="/Public/assets/vendors/spin.js/spin.js"></script>
    <script src="/Public/assets/vendors/ladda/dist/ladda.min.js"></script>
    <script src="/Public/assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="/Public/assets/vendors/html5-form-validation/dist/jquery.validation.min.js"></script>
    <script src="/Public/assets/vendors/jquery-typeahead/dist/jquery.typeahead.min.js"></script>
    <script src="/Public/assets/vendors/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="/Public/assets/vendors/autosize/dist/autosize.min.js"></script>
    <script src="/Public/assets/vendors/bootstrap-show-password/bootstrap-show-password.min.js"></script>
    <script src="/Public/assets/vendors/moment/min/moment.min.js"></script>
    <script src="/Public/assets/vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/Public/assets/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="/Public/assets/vendors/cleanhtmlaudioplayer/src/jquery.cleanaudioplayer.js"></script>
    <script src="/Public/assets/vendors/cleanhtmlvideoplayer/src/jquery.cleanvideoplayer.js"></script>
    <script src="/Public/assets/vendors/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
    <script src="/Public/assets/vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>
    <script src="/Public/assets/vendors/summernote/dist/summernote.min.js"></script>
    <script src="/Public/assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/Public/assets/vendors/ionrangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="/Public/assets/vendors/nestable/jquery.nestable.js"></script>
    <script src="/Public/assets/vendors/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/Public/assets/vendors/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="/Public/assets/vendors/datatables-fixedcolumns/js/dataTables.fixedColumns.js"></script>
    <script src="/Public/assets/vendors/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="/Public/assets/vendors/editable-table/mindmup-editabletable.js"></script>
    <script src="/Public/assets/vendors/d3/d3.min.js"></script>
    <script src="/Public/assets/vendors/c3/c3.min.js"></script>
    <script src="/Public/assets/vendors/chartist/dist/chartist.min.js"></script>
    <script src="/Public/assets/vendors/peity/jquery.peity.min.js"></script>
    <!-- v1.0.1 -->
    <script src="/Public/assets/vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- v1.1.1 -->
    <script src="/Public/assets/vendors/gsap/src/minified/TweenMax.min.js"></script>
    <script src="/Public/assets/vendors/hackertyper/hackertyper.js"></script>
    <script src="/Public/assets/vendors/jquery-countTo/jquery.countTo.js"></script>
    <!-- v1.4.0 -->
    <script src="/Public/assets/vendors/nprogress/nprogress.js"></script>
    <script src="/Public/assets/vendors/jquery-steps/build/jquery.steps.min.js"></script>
    <!-- v1.4.2 -->
    <script src="/Public/assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/Public/assets/vendors/chart.js/src/Chart.bundle.min.js"></script>
    <!-- v1.7.0 -->
    <script src="/Public/assets/vendors/dropify/dist/js/dropify.min.js"></script>

    <!-- Clean UI Scripts -->
    <script src="/Public/assets/common/js/common.js"></script>
    <script src="/Public/assets/common/js/demo.temp.js"></script>
</head>
<body class="theme-default">
<nav class="left-menu" left-menu>
    <div class="logo-container">
        <a href="/index.php/Home/Member/memberCenter" class="logo">
            <img src="/Public/assets/common/img/logo.png" alt="Clean UI Admin Template" />
            <img class="logo-inverse" src="/Public/assets/common/img/logo-inverse.png" alt="Clean UI Admin Template" />
        </a>
    </div>
    <div class="left-menu-inner scroll-pane">
        <ul class="left-menu-list left-menu-list-root list-unstyled">
            <li class="left-menu-list-submenu">
                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon icmn-cog util-spin-delayed-pseudo"><!-- --></i>
                    <span class="menu-top-hidden">主题</span> 设置
                </a>
                <ul class="left-menu-list list-unstyled">
                    <li>
                        <div class="left-menu-item">
                            <div class="left-menu-block">
                                <div class="left-menu-block-item">
                                    <small>这个菜单提供了用任意小部件、组件和元素构建自定义块的可能性，就像这个主题设置一样</small>
                                </div>
                                <div class="left-menu-block-item">
                                    <span class="font-weight-600">主题样式:</span>
                                </div>
                                <div class="left-menu-block-item" id="options-theme">
                                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                                        <div class="btn-group">
                                            <label class="btn btn-default active">
                                                <input type="radio" name="options-theme" value="theme-default" autocomplete="off" checked=""> 亮色
                                            </label>
                                        </div>
                                        <div class="btn-group">
                                            <label class="btn btn-default">
                                                <input type="radio" name="options-theme" value="theme-dark" autocomplete="off"> 黑色
                                            </label>
                                        </div>
                                    </div>
                                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                                        <div class="btn-group">
                                            <label class="btn btn-default">
                                                <input type="radio" name="options-theme" value="theme-green" autocomplete="off"> 绿色
                                            </label>
                                        </div>
                                        <div class="btn-group">
                                            <label class="btn btn-default">
                                                <input type="radio" name="options-theme" value="theme-blue" autocomplete="off"> 蓝色
                                            </label>
                                        </div>
                                    </div>
                                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                                        <div class="btn-group">
                                            <label class="btn btn-default">
                                                <input type="radio" name="options-theme" value="theme-red" autocomplete="off"> 红色
                                            </label>
                                        </div>
                                        <div class="btn-group">
                                            <label class="btn btn-default">
                                                <input type="radio" name="options-theme" value="theme-orange" autocomplete="off"> 橘色
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-menu-block-item">
                                    <span class="font-weight-600">固定顶部菜单</sup>:</span>
                                </div>
                                <div class="left-menu-block-item" id="options-menu">
                                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                                        <div class="btn-group">
                                            <label class="btn btn-default active">
                                                <input type="radio" name="options-menu" value="menu-fixed" checked=""> 打开
                                            </label>
                                        </div>
                                        <div class="btn-group">
                                            <label class="btn btn-default">
                                                <input type="radio" name="options-menu" value="menu-static"> 关闭
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-menu-block-item">
                                    <span class="font-weight-600">干净模式:</span>
                                </div>
                                <div class="left-menu-block-item" id="options-mode">
                                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                                        <div class="btn-group">
                                            <label class="btn btn-default active">
                                                <input type="radio" name="options-mode" value="mode-superclean" checked=""> 打开
                                            </label>
                                        </div>
                                        <div class="btn-group">
                                            <label class="btn btn-default">
                                                <input type="radio" name="options-mode" value="mode-default"> 关闭
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-menu-block-item">
                                    <span class="font-weight-600">彩色菜单:</span>
                                </div>
                                <div class="left-menu-block-item" id="options-colorful">
                                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                                        <div class="btn-group">
                                            <label class="btn btn-default active">
                                                <input type="radio" name="options-colorful" value="colorful-enabled" checked=""> 打开
                                            </label>
                                        </div>
                                        <div class="btn-group">
                                            <label class="btn btn-default">
                                                <input type="radio" name="options-colorful" value="colorful-disabled"> 关闭
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-menu-block-item">
                                    <span class="font-weight-600">菜单阴影:</span>
                                </div>
                                <div class="left-menu-block-item" id="mode-box-shadow">
                                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                                        <div class="btn-group">
                                            <label class="btn btn-default">
                                                <input type="radio" name="mode-box-shadow" value="mode-box-shadow"> 打开
                                            </label>
                                        </div>
                                        <div class="btn-group">
                                            <label class="btn btn-default active">
                                                <input type="radio" name="mode-box-shadow" value="mode-box-shadow-disabled" checked=""> 关闭
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-menu-block-item">
                                    <span class="font-weight-600">方角:</span>
                                </div>
                                <div class="left-menu-block-item" id="mode-squared">
                                    <div class="btn-group btn-group-justified" data-toggle="buttons">
                                        <div class="btn-group">
                                            <label class="btn btn-default">
                                                <input type="radio" name="mode-squared" value="mode-squared"> 打开
                                            </label>
                                        </div>
                                        <div class="btn-group">
                                            <label class="btn btn-default active">
                                                <input type="radio" name="mode-squared" value="mode-squared-disabled" checked=""> 关闭
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>

            <li class="left-menu-list-separator "><!-- --></li>
            <li class="left-menu-list-active">
                <a class="left-menu-link" href="/index.php/Home/member/memberCenter">
                    <i class="left-menu-link-icon icmn-home2"><!-- --></i>
                    <span class="menu-top-hidden">会员查询中心</span>
                </a>
            </li>
            <li class="left-menu-list-separator"><!-- --></li>
            <li class="left-menu-list-submenu">
                <a class="left-menu-link" href="/index.php/Home/member/recordY">
                    <i class="left-menu-link-icon icmn-files-empty2"><!-- --></i>
                    充值记录
                </a>
            </li>
            <li class="left-menu-list-separator"><!-- --></li>
            <li class="left-menu-list-submenu">
                <a class="left-menu-link" href="/index.php/Home/member/recordN">
                    <i class="left-menu-link-icon icmn-files-empty2"><!-- --></i>
                    消费记录
                </a>
            </li>
            
            
            <li class="left-menu-list-separator"></li>
            <li class="menu-top-hidden no-colorful-menu">
                <div class="left-menu-item">
                    数据采集中
                </div>
            </li>
            <li class="menu-top-hidden no-colorful-menu">
                <div class="example-left-menu-chart chartist-animated chartist-theme-dark"></div>
                <script>
                    $(function () {
                        // CSS STYLING & ANIMATIONS
                        var cssAnimationData = {
                                labels: ["S", "M", "T", "W", "T", "F", "S"],
                                series: [
                                    [11, 14, 24, 16, 20, 16, 24]
                                ]
                            },
                            cssAnimationOptions = {
                                fullWidth: !0,
                                chartPadding: {
                                    right: 2,
                                    left: 30
                                },
                                axisY: {
                                    position: 'end'
                                }
                            },
                            cssAnimationResponsiveOptions = [
                                [{
                                    axisX: {
                                        labelInterpolationFnc: function(value, index) {
                                            return index % 2 !== 0 ? !1 : value
                                        }
                                    }
                                }]
                            ];

                        new Chartist.Line(".example-left-menu-chart", cssAnimationData, cssAnimationOptions, cssAnimationResponsiveOptions);

                    });
                </script>
            </li>
            <li class="menu-top-hidden no-colorful-menu">
                <div class="left-menu-item">
                    采集商户数据
                </div>
            </li>
            <li class="menu-top-hidden">
                <div class="left-menu-item">
                    <span class="donut donut-success"></span> 采集位置数据A
                </div>
            </li>
            <li class="menu-top-hidden">
                <div class="left-menu-item">
                    <span class="donut donut-primary"></span> 采集位置数据B
                </div>
            </li>
            <li class="menu-top-hidden">
                <div class="left-menu-item">
                    <span class="donut donut-danger"></span> 采集位置数据C
                </div>
            </li>
        </ul>
    </div>
</nav>
<nav class="top-menu">
    <div class="menu-icon-container hidden-md-up">
        <div class="animate-menu-button left-menu-toggle">
            <div><!-- --></div>
        </div>
    </div>
    <div class="menu">
        <div class="menu-user-block">
            <div class="dropdown dropdown-avatar">
                <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="avatar" href="javascript:void(0);">
                        <img src="/Public/assets/common/img/temp/avatars/1.jpg" alt="Alternative text to the image">
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="" role="menu">
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-user"></i> 会员信息</a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-header">资料</div>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> 姓名:<?php echo ($vo["m_nickname"]); ?></a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> 电话:<?php echo ($vo["m_phone"]); ?></a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> 邮箱:<?php echo ($vo["m_email"]); ?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/index.php/Home/member/index"><i class="dropdown-icon icmn-exit"></i> 退出</a>
                </ul>
            </div>
        </div>
        
        <div class="menu-info-block">
            <div class="left">
              <div class="dropdown">
                <h4 style="margin-bottom:10px;margin-top:8px;">TK会员中心</h4>
              </div>
            </div>
        </div>
    </div>
</nav>
 

<section class="page-content">
<div class="page-content-inner">

    <!-- Basic Tables -->
    <section class="panel">
        <div class="panel-heading">
            <h3>会员消费日志</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                
                <div class="col-lg-12">
                    <h4>会员消费日志</h4>
                    <!--<p>Modifier: <code>.table-inverse</code></p>-->
                    <br />
                    <div class="margin-bottom-50">
                        <table class="table table-inverse">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>会员名</th>
                                <th>会员账户</th>
                                <th>联系方式</th>
                                <th>会员卡号</th>
                                <th>消费金额</th>
                                <th>消费日期</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr>
                                        <td><?php echo ($k+1); ?></td>
                                        <td><?php echo ($vo["m_nickname"]); ?></td>
                                        <td><?php echo ($vo["m_username"]); ?></td>
                                        <td><?php echo ($vo["s_phone"]); ?></td>
                                        <td><?php echo ($vo["m_card"]); ?></td>
                                        <td><?php echo ($vo["grade"]); ?></td>
                                        <td><?php echo ($vo["gradetime"]); ?></td>
                                    </tr><?php endforeach; endif; ?>
                                <tr>
                                    <td style="text-align: right;" colspan="7"><?php echo ($page); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- End Basic Tables  -->

</div>

<!-- Page Scripts -->
<script>

    $(function () {

        $("[data-toggle=tooltip]").tooltip();

    });

</script>
<!-- End Page Scripts -->
</section>
<div class="cwt__footer visible-footer">
    <div class="cwt__footer__top">
        <div class="row">
            <div class="col-lg-6">
                <div class="cwt__footer__title cwt__footer__title--light">
                    会员系统 会员中心 祝您开开心心每一天
                </div> 
            </div>
            <div class="col-lg-6">
                <div class="cwt__footer__title">
                    电脑使用 按F11可以全屏哦
                </div>
                <div class="cwt__footer__description">
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <div class="cwt__footer__bottom">
        <div class="row">
            <div class="col-md-4">
                <a href="javascript:void(0)" target="_blank" class="btn btn-primary">
                    记得每天笑一笑
                </a>
            </div>
            <div class="col-md-8">
                <div class="cwt__footer__company">
                    <img class="cwt__footer__company-logo" src="/Public/assets/common/img/temp/mediatec.png" target="_blank" title="Mediatec Software">
                    <span>
                        © 2017 <a href="javascript:void(0)" class="cwt__footer__link" target="_blank">TK会员系统</a>
                        <br>
                        All rights reserved
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="main-backdrop"><!-- --></div>

</body>
</html>