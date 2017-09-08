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
    <!-- v1.0.0 -->
    <script src="/Public/assets/vendors/jquery/jquery.min.js"></script>
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
                    商户日志
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
                    <li>
                        <a class="left-menu-link" href="/index.php/Home/shop/getUpdateAll">
                            会员信息变更日志
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

            <!-- 新增店铺管理员说明 -->
            <?php if(session('shop.s_sid') == 0 ): ?><li class="left-menu-list-separator"><!-- --></li>
                <li class="left-menu-list-submenu">
                    <a class="left-menu-link" href="javascript: void(0);">
                        <i class="left-menu-link-icon icmn-files-empty2"><!-- --></i>
                        添加管理员
                    </a>
                    <ul class="left-menu-list list-unstyled">
                        <li>
                            <a class="left-menu-link" href="/index.php/Home/shop/adminlist">
                                管理员列表
                            </a>
                        </li>
                        <li>
                            <a class="left-menu-link" href="/index.php/Home/shop/addshopadmin">
                                新增管理员
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="left-menu-list-separator"><!-- --></li>
                <li class="left-menu-list-submenu">
                    <a class="left-menu-link" target="_blank" href="/index.php/Home/shop/gongdan">
                        <i class="left-menu-link-icon icmn-files-empty2"><!-- --></i>
                        工单系统
                    </a>
                </li><?php endif; ?>

			

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
                    <!-- 按钮触发模态框 -->
                    <a  class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                        <i class="dropdown-icon icmn-user"></i>
                        <?php if(session('shop.s_sid') == 0 ): ?>修改商户信息
                            <?php else: ?>
                            管理员信息<?php endif; ?>
                    </a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-header">资料</div>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> 姓名: <?php echo session('shop.s_username');?></a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> 电话: <?php echo session('shop.s_phone');?></a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> 邮箱: <?php echo session('shop.s_email');?></a>
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
                    <a href="/index.php/Home/shop/messagesnum" id="messagesnums">
                        <i class="fa fa-envelope-o" style="font-size: 20px;">
                            <?php if(session('messagesnum') != 0): ?><span style="color: white;position: relative;right: 9px;background-color: red;top: -12px;text-align: center;font-size: 10px;padding: 2px 3px 1.5px 3px;line-height: 10px;border-radius: 50%;"><?php echo session('messagesnum');?></span><?php endif; ?>
                        </i>
                    </a>
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
                                        $('.page-content').append(msg.data);
                                    }
                                },
                            })
                        }
                    });
                </script>
                </div>
            </div>
        </div>
    </div>
</nav>
 


<section class="page-content">
<div class="page-content-inner">

    <!-- Dashboard -->
    <div class="dashboard-container">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                <div class="widget widget-seven background-success">
                    <div class="widget-body">
                        <div href="javascript: void(0);" class="widget-body-inner">
                            <h5 class="text-uppercase">今日消费金额</h5>
                            <i class="counter-icon icmn-cash3"></i>
                            <span class="counter-count">
                                <i class="icmn-arrow-up5"></i>
                               ￥<span class="counter-init" data-from="25" data-to="<?php echo ($today_xf); ?>"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                <div class="widget widget-seven background-default">
                    <div class="widget-body">
                        <div href="javascript: void(0);" class="widget-body-inner">
                            <h5 class="text-uppercase">总计消费金额</h5>
                            <i class="counter-icon icmn-server"></i>
                            <span class="counter-count">
                                <i class="icmn-arrow-down5"></i>
                                ￥<span class="counter-init" data-from="25" data-to="<?php echo ($max_xf); ?>"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                <div class="widget widget-seven">
                    <div class="widget-body">
                        <div href="javascript: void(0);" class="widget-body-inner">
                            <h5 class="text-uppercase">今日新增会员</h5>
                            <i class="counter-icon icmn-users"></i>
                            <span class="counter-count">
                                <i class="icmn-arrow-up5"></i>
                                <span class="counter-init" data-from="0" data-to="<?php echo ($today_vipNum); ?>"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                <div class="widget widget-seven">
                    <div class="widget-body">
                        <div href="javascript: void(0);" class="widget-body-inner">
                            <h5 class="text-uppercase">商户会员数量</h5>
                            <i class="counter-icon icmn-users"></i>
                            <span class="counter-count">
                                <i class="icmn-arrow-up5"></i>
                                <span class="counter-init" data-from="0" data-to="<?php echo ($max_vipNum); ?>"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                <div class="widget widget-seven">
                    <div class="carousel-widget carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <div class="widget-body">
                                    <div class="widget-body-icon">
                                        <i class="icmn-accessibility"></i>
                                    </div>
                                    <a href="javascript: void(0);" class="widget-body-inner">
                                        <h2>今日会员充值金额</h2>
                                        <p><?php echo ($today_cz); ?>元</p>
                                    </a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="widget-body">
                                    <div class="widget-body-icon">
                                        <i class="icmn-download"></i>
                                    </div>
                                    <a href="javascript: void(0);" class="widget-body-inner">
                                        <h2>总共会员充值金额</h2>
                                        <p><?php echo ($max_cz); ?>元</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                <div class="widget widget-seven">
                    <div class="carousel-widget-2 carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <a href="javascript: void(0);" class="widget-body">
                                    <h2>
                                        <i class="icmn-database"></i>最大充值会员
                                    </h2>
                                    <p>
                                        名称: <?php echo ($recordMax["m_nickname"]); ?>
                                        <br />
                                        金额: <?php echo ($recordMax["grade"]); ?> 元
                                    </p>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="javascript: void(0);" class="widget-body">
                                    <h2>
                                        <i class="icmn-users"></i>最小充值会员
                                    </h2>
                                    <p>
                                        名称: <?php echo ($recordMin["m_nickname"]); ?>
                                        <br />
                                        金额: <?php echo ($recordMin["grade"]); ?> 元
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                <div class="widget widget-seven background-danger">
                    <div class="carousel-widget carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <a href="javascript: void(0);" class="widget-body">
                                    <h2>
                                        <i class="icmn-books"></i>最大消费会员
                                    </h2>
                                    <p>
                                        名称: <?php echo ($consumeMax["m_nickname"]); ?>
                                        <br />
                                        金额: <?php echo ($consumeMax["grade"]); ?> 元
                                    </p>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="javascript: void(0);" class="widget-body">
                                    <h2>
                                        <i class="icmn-download"></i>最小消费会员
                                    </h2>
                                    <p>
                                        名称: <?php echo ($consumeMin["m_nickname"]); ?>
                                        <br />
                                        金额: <?php echo ($consumeMin["grade"]); ?> 元
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                <div class="widget widget-seven background-info" style="background-image: url(/Public/assets/common/img/temp/photos/9.jpeg)">
                    <div class="carousel-widget-2 carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <a href="javascript: void(0);" class="widget-body">
                                    <!--<h2>总领卡数</h2>
                                    <p>
                                        21487234 张
                                    </p>-->
                                    <p>
                                        待开发
                                    </p>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="javascript: void(0);" class="widget-body">
                                    <!--<h2>总发卡数</h2>
                                    <p>
                                        347548 张
                                    </p>-->
                                    <p>
                                        待开发
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(!empty($messages)): ?><!-- End Dashboard -->
    <!-- Large modal -->
        <div class="modal fade bs-example-modal-lg" id="message" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×
                        </button>
                        <h2 class="modal-title" id="messageLabel">
                            消息推送
                        </h2>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center">序号</th>
                                <th style="text-align: center">题目</th>
                                <th style="text-align: center">状态</th>
                                <th style="text-align: center">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($messages)): foreach($messages as $key=>$message): ?><!--<?php var_dump($val) ?>-->
                                <tr>
                                    <td style="text-align: center"><?php echo ($key+1); ?></td>
                                    <td style="text-align: center"><a class="list" id="<?php echo ($message["me_id"]); ?>" href="javascript: void(0);"><?php echo ($message["title"]); ?></a></td>
                                    <td style="text-align: center">
                                        <?php if($message["status"] == 0 ): ?>未读
                                            <?php else: ?>
                                            已读<?php endif; ?>
                                    </td>
                                    <td style="text-align: center"><a href="/index.php/Home/shop/messagedel?id=<?php echo ($message["me_id"]); ?>"><span class="label label-primary">不显示</span></a></td>
                                </tr><?php endforeach; endif; ?>
                            <tr><td colspan="4" style="text-align: right;font-size: 15px;"><?php echo ($page); ?></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">关闭
                        </button>
                        <a href="/index.php/Home/shop/today?id=<?php echo ($message["s_id"]); ?>" type="button" class="btn btn-primary">
                            不再显示
                        </a>
                    </div>
                </div>
            </div>
        </div>
<!--消息详情-->
        <div class="modal fade bs-example-modal-lg" id="messageinfo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×
                        </button>
                        <h2 class="modal-title" id="messageinfoLabel">
                            消息详情
                        </h2>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover" id="listinfo">

                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">关闭
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- 按钮触发模态框 -->

        <script src="/Public/assets/vendors/ckeditor/ckeditor.js"></script>
        <script>
            $(function () {
                $('#message').modal({
                    keyboard: true
                })
            });
            $('.list').on('click',function () {
                var id = this.id;
                $.ajax({
                    url:'/index.php/Home/shop/messageinfo',
                    type:'post',
                    data: {
                        'id': id
                    },
                    success:function(msg){
                        $('#listinfo').html(msg.data);
                        $('#messageinfo').modal({keyboard: true});
                        CKEDITOR.replace('content1',{
                            uiColor : '#F8F8FF',
                            height:'200',
                            toolbarCanCollapse: true,
                            toolbarStartupExpanded: false,
                            toolbar: [[]],
                            resize_enabled:false,
                            customConfig: ''
                        });
                        $('#cke_1_top').remove();
                    },
                    error:function(){

                    }

                })
            })
        </script><?php endif; ?>




</div>


<!-- Page Scripts -->
<script>
    $(function() {

    ///////////////////////////////////////////////////////////
        // COUNTERS
        $('.counter-init').countTo({
            speed: 1500
        });

        ///////////////////////////////////////////////////////////
        // ADJUSTABLE TEXTAREA
        autosize($('#textarea'));

        ///////////////////////////////////////////////////////////
        // CUSTOM SCROLL
        if (!cleanUI.hasTouch) {
            $('.custom-scroll').each(function() {
                $(this).jScrollPane({
                    autoReinitialise: true,
                    autoReinitialiseDelay: 100
                });
                var api = $(this).data('jsp'),
                        throttleTimeout;
                $(window).bind('resize', function() {
                    if (!throttleTimeout) {
                        throttleTimeout = setTimeout(function() {
                            api.reinitialise();
                            throttleTimeout = null;
                        }, 50);
                    }
                });
            });
        }

        ///////////////////////////////////////////////////////////
        // CALENDAR
        $('.example-calendar-block').fullCalendar({
            //aspectRatio: 2,
            height: 450,
            header: {
                left: 'prev, next',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            buttonIcons: {
                prev: 'none fa fa-arrow-left',
                next: 'none fa fa-arrow-right',
                prevYear: 'none fa fa-arrow-left',
                nextYear: 'none fa fa-arrow-right'
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            viewRender: function(view, element) {
                if (!cleanUI.hasTouch) {
                    $('.fc-scroller').jScrollPane({
                        autoReinitialise: true,
                        autoReinitialiseDelay: 100
                    });
                }
            },
            defaultDate: '2016-05-12',
            events: [
                {
                    title: 'All Day Event',
                    start: '2016-05-01',
                    className: 'fc-event-success'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2016-05-09T16:00:00',
                    className: 'fc-event-default'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2016-05-16T16:00:00',
                    className: 'fc-event-success'
                },
                {
                    title: 'Conference',
                    start: '2016-05-11',
                    end: '2016-05-14',
                    className: 'fc-event-danger'
                }
            ],
            eventClick: function(calEvent, jsEvent, view) {
                if (!$(this).hasClass('event-clicked')) {
                    $('.fc-event').removeClass('event-clicked');
                    $(this).addClass('event-clicked');
                }
            }
        });

        ///////////////////////////////////////////////////////////
        // CAROUSEL WIDGET
        $('.carousel-widget').carousel({
            interval: 4000
        });

        $('.carousel-widget-2').carousel({
            interval: 6000
        });

        ///////////////////////////////////////////////////////////
        // DATATABLES
        $('#example1').DataTable({
            responsive: true,
            "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]]
        });

        ///////////////////////////////////////////////////////////
        // CHART 1
//        new Chartist.Line(".chart-line", {
//            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
//            series: [
//                [12, 9, 7, 8, 5],
//                [2, 1, 3.5, 7, 3],
//                [1, 3, 4, 5, 6]
//            ]
//        }, {
//            fullWidth: !0,
//            chartPadding: {
//                right: 40
//            },
//            plugins: [
//                Chartist.plugins.tooltip()
//            ]
//        });

        ///////////////////////////////////////////////////////////
        // CHART 2
//        var overlappingData = {
//                    labels: ["Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
//                    series: [
//                        [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
//                        [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
//                    ]
//                },
//                overlappingOptions = {
//                    seriesBarDistance: 10,
//                    plugins: [
//                        Chartist.plugins.tooltip()
//                    ]
//                },
//                overlappingResponsiveOptions = [
//                    ["", {
//                        seriesBarDistance: 5,
//                        axisX: {
//                            labelInterpolationFnc: function(value) {
//                                return value[0]
//                            }
//                        }
//                    }]
//                ];
//
//        new Chartist.Bar(".chart-overlapping-bar", overlappingData, overlappingOptions, overlappingResponsiveOptions);


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


<?php if(session('shop.s_sid') == 0 ): ?><!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">修改商户信息</h4>
            </div>
            <div class="modal-body">
                <form>
                    <input type="text" class="form-control" style="display: none" disabled name="s_id" value="<?php echo session('shop.id');?>">
                    <div class="form-group">
                        <label class="form-control-label">商户名称</label>
                        <input type="text" class="form-control" disabled name="s_name" value="<?php echo session('shop.s_name');?>">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">原密码</label>
                        <input type="password" class="form-control" name="old_password" placeholder="输入原密码进行验证!">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">新密码</label>
                        <input type="password" class="form-control" name="n_password" placeholder="新密码,不修改不用填!">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">确认密码</label>
                        <input type="password" class="form-control" name="c_password" placeholder="确认密码,不修改不用填!">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">电话号码</label>
                        <input type="text" class="form-control" name="n_phone" placeholder="电话号码" value="<?php echo session('shop.s_phone');?>">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">邮箱</label>
                        <input type="text" class="form-control" name="n_email" placeholder="邮箱" value="<?php echo session('shop.s_email');?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                <button type="button" id="button_xg" class="btn btn-primary">修改</button>
            </div>
        </div>
    </div>
</div>
    <script>
    $(function() {
        $('#button_xg').on('click',function () {
            var old_password = $("input[name='old_password']").val();
            var n_password = $("input[name='n_password']").val();
            var c_password = $("input[name='c_password']").val();
            var n_phone = $("input[name='n_phone']").val();
            var n_email = $("input[name='n_email']").val();
            var id = $("input[name='s_id']").val();
            var data = {};
            if (old_password.length){
                if(n_password.length || c_password.length){
                    //新密码不为空
                    console.log('here');
                    if(n_password==c_password && n_password.length>=6 && n_password.length<=10){
                        data={
                            'id':id,
                            's_password' : n_password,
                            'n_phone' : n_phone,
                            'n_email' : n_email,
                            'old_password':old_password
                        }
                    }else{
                        return window.alert('两次密码不同,或密码长度不在6-10之间,请重新输入!');
                    }
                }else{
                    //新密码为空
                    data={
                        'id':id,
                        'old_password':old_password,
                        'n_phone' : n_phone,
                        'n_email' : n_email
                    }
                }
                $.ajax({
                    url:'/index.php/Home/shop/updata',
                    type:'post',
                    data:data,
                    success:function(msg){
                       console.log(msg);
                        if (msg.status=='no'){
                            window.alert(msg.data);
                        }else{
                            window.alert(msg.data);
                            window.location.href='/index.php/Home/admin/shop';
                        }
                    }
                })
            }else{
                window.alert('请输入原密码');
            }
        });
    });
</script><?php endif; ?>
<!-- Vendors Scripts -->
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