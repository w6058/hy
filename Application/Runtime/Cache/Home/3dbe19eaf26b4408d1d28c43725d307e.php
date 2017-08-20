<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="/Public/assets/common/css/source/helpers/fonts">
    <!-- v1.0.0 -->

</head>
<body class="theme-default">
<nav class="left-menu" left-menu>
    <div class="logo-container">
        <a href="/index.php/Home/shop/show" class="logo">
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
                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon icmn-home2"><!-- --></i>
                    <span class="menu-top-hidden">商户控制中心</span>
                </a>
            </li>
            <li class="left-menu-list-separator"><!-- --></li>
            <li class="left-menu-list-submenu">
                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon icmn-files-empty2"><!-- --></i>
                    商户中心
                </a>
                <ul class="left-menu-list list-unstyled">
                    <li>
                        <a class="left-menu-link" href="/index.php/Home/shop/maddcash">
                            充值日志
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="/index.php/Home/shop/addcard">
                            办卡日志
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="/index.php/Home/shop/usecash">
                            消费日志
                        </a>
                    </li>
                </ul>
            </li>
            <li class="left-menu-list-separator"><!-- --></li>
            <li class="left-menu-list-submenu">
                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon icmn-files-empty2"><!-- --></i>
                    会员管理
                </a>
                <ul class="left-menu-list list-unstyled">
                    <li>
                        <a class="left-menu-link" href="/index.php/Home/shop/members">
                            会员列表
                        </a>
                    </li>
                </ul>
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
                    <?php echo session('shop.s_name');?>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="" role="menu">
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-user"></i> 商户信息</a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-header">资料</div>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> 姓名<?php echo session('shop.s_username');?></a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> 电话<?php echo session('shop.s_phone');?></a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> 邮箱<?php echo session('shop.s_email');?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/index.php/Home/shop/logout"><i class="dropdown-icon icmn-exit"></i> 退出</a>
                </ul>
            </div>
        </div>

        <div class="menu-info-block">
            <div class="left">
                <div class="header-buttons">
                    <div class="dropdown">
                        <a href="/index.php/Home/shop/usemember" class="dropdown-toggle dropdown-inline-button"  aria-expanded="false">
                            <i class="dropdown-inline-button-icon icmn-folder-open"></i>
                            <span class="hidden-lg-down">收银台</span>

                        </a>

                    </div>
                    <div class="dropdown">
                        <a href="/index.php/Home/shop/addmember" class="dropdown-toggle dropdown-inline-button"  aria-expanded="false">
                            <i class="dropdown-inline-button-icon icmn-database"></i>
                            <span class="hidden-lg-down">新增会员</span>

                        </a>

                    </div>
                    <div class="dropdown">
                        <a href="/index.php/Home/shop/memberadd" class="dropdown-toggle dropdown-inline-button" aria-expanded="false">
                            <i class="dropdown-inline-button-icon icmn-database"></i>
                            <span class="hidden-lg-down">会员充值</span>
                        </a>

                    </div>
                </div>
            </div>
            <div class="left hidden-md-down">
                <div class="example-top-menu-chart">
                    <span class="title">商户消费总计:</span>
                    <span class="chart" id="topMenuChart">1,3,2,0,3,1,2,3,5,2</span>
                    <span class="count" id="count_"><?php echo session('max_xf');?> 人民币</span>

                    <!-- Top Menu Chart Script -->
                    <script>
                        $(function () {

                            var topMenuChart = $("#topMenuChart").peity("bar", {
                                fill: ['#01a8fe'],
                                height: 22,
                                width: 44
                            });

                            setInterval(function() {
                                var random = Math.round(Math.random() * 10);
                                var values = topMenuChart.text().split(",");
                                values.shift();
                                values.push(random);
                                topMenuChart.text(values.join(",")).change()
                            }, 1000);

                        });
                    </script>
                    <!-- Top Menu Chart Script -->
                </div>
            </div>
            <div class="right hidden-md-down margin-left-20">

                <!-- 搜索框 -->
                <div class="search-block">
                    <div class="form-input-icon form-input-icon-right">
                        <i class="icmn-search"></i>
                        <input type="text" id="input_ss" class="form-control form-control-sm form-control-rounded" placeholder="搜索...">
                        <button id="ss" type="button" class="search-block-submit "></button>
                    </div>
                </div>
                <script>
                    $('#ss').on('click',function () {
                        var input_ss = $('#input_ss').val();
                        if(input_ss == ''){
                            window.alert('请输搜索条件!');
                        }else{
                            $.ajax({
                                url:'/index.php/Home/shop/findall',
                                type:'post',
                                data:{
                                    'input_ss':input_ss
                                },
                                success:function(msg){
                                    if(msg.status=='no') {
                                        window.alert(msg.data);
                                    }else{
                                        $('.page-content-inner').remove();
                                        $('.page-content').append(msg.data1);
                                        $('#memberinfo').append(msg.data);
                                    }
                                },
                            })
                        }
                    });
                </script>
            </div>

        </div>
    </div>
</nav>
 

<section class="page-content">
<div class="page-content-inner">

    <!-- Basic Tables -->
    <section class="panel">
        <div class="panel-heading">
            <h3>会员中心 会员列表</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <h4><?php echo session('shop.s_name');?> 的会员:</h4>
                    <!--<p>Element: <code>div.table-responsive</code></p>-->
                    <br />
                    <div class="table-responsive margin-bottom-50">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>姓名</th>
                                    <th>卡号</th>
                                    <th>联系方式</th>
                                    <th>会员等级</th>
                                    <th>会员余额</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($members)): foreach($members as $key=>$member): ?><!--<?php var_dump($val) ?>-->
                                <tr>
                                    <td><?php echo ($key+1); ?></td>
                                    <td><?php echo ($member["m_nickname"]); ?></td>
                                    <td><?php echo ($member["m_card"]); ?></td>
                                    <td><?php echo ($member["m_phone"]); ?></td>
                                    <td><?php echo ($member["m_email"]); ?></td>
                                    <td><?php echo ($member["num"]); ?></td>
                                </tr><?php endforeach; endif; ?>
                            <tr><td colspan="6" style="text-align: right;font-size: 15px;"><?php echo ($page); ?></td></tr>
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
                    会员系统 商户中心 祝您开开心心每一天
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


<!-- Vendors Scripts -->
<script src="/Public/assets/vendors/jquery/jquery.min.js"></script>
<script src="/Public/assets/vendors/tether/dist/js/tether.min.js"></script>
<script src="/Public/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/Public/assets/vendors/jscrollpane/script/jquery.jscrollpane.min.js"></script>
<script src="/Public/assets/vendors/autosize/dist/autosize.min.js"></script>
<script src="/Public/assets/vendors/moment/min/moment.min.js"></script>
<script src="/Public/assets/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="/Public/assets/vendors/cleanhtmlaudioplayer/src/jquery.cleanaudioplayer.js"></script>
<script src="/Public/assets/vendors/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/Public/assets/vendors/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="/Public/assets/vendors/datatables-fixedcolumns/js/dataTables.fixedColumns.js"></script>
<script src="/Public/assets/vendors/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="/Public/assets/vendors/chartist/dist/chartist.min.js"></script>
<script src="/Public/assets/vendors/peity/jquery.peity.min.js"></script>
<script src="/Public/assets/vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
<script src="/Public/assets/vendors/jquery-countTo/jquery.countTo.js"></script>
<!-- Clean UI Scripts -->
<script src="/Public/assets/common/js/common.js"></script>
<script src="/Public/assets/common/js/demo.temp.js"></script>



</body>
</html>