<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>会员系统-控制平台</title>

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

    <!-- v1.0.0 -->
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/bootstrap.min.css">
    <!-- Clean UI Styles -->
    <link rel="stylesheet" type="text/css" href="/Public/assets/common/css/source/main.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/chartist.min.css">
    <script src="/Public/assets/vendors/jquery.min.js"></script>

</head>
<body class="theme-default">
<nav class="left-menu" left-menu>
    <div class="logo-container">
        <a href="/index.php/Home/admin/show" class="logo">
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
            <li>
                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon icmn-books"><!-- --></i>
                    预留菜单位置
                </a>
            </li>
            <li class="left-menu-list-separator "><!-- --></li>
            <li class="left-menu-list-active">
                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon icmn-home2"><!-- --></i>
                    <span class="menu-top-hidden">控制面板</span>
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
                        <a class="left-menu-link" href="/index.php/Home/admin/shoplist">
                            商户列表
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="/index.php/Home/admin/addshop">
                            添加商户
                        </a>
                    </li>
                </ul>
            </li>
			<li class="left-menu-list-separator"><!-- --></li>
            <li class="left-menu-list-submenu">
                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon icmn-files-empty2"><!-- --></i>
                    会员中心
                </a>
                <ul class="left-menu-list list-unstyled">
                    <li>
                        <a class="left-menu-link" href="javascript: void(0);">
                            会员分类
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="/index.php/Home/admin/index">
                            会员列表
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="javascript: void(0);">
                            新增会员
                        </a>
                    </li>
                </ul>
            </li>
			<li class="left-menu-list-separator"><!-- --></li>
            <li class="left-menu-list-submenu">
                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon icmn-files-empty2"><!-- --></i>
                    资金中心
                </a>
                <ul class="left-menu-list list-unstyled">
                    <li>
                        <a class="left-menu-link" href="/index.php/Home/admin/queryRecord">
                            充值记录
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="/index.php/Home/admin/queryRecordN">
                            消费记录
                        </a>
                    </li>
                </ul>
            </li>
            <li class="left-menu-list-separator"><!-- --></li>
			
            <li class="left-menu-list-separator"></li>
            <li class="menu-top-hidden no-colorful-menu">
                <div class="left-menu-item">
                    预留菜单位置
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
                    预留菜单位置
                </div>
            </li>
            <li class="menu-top-hidden">
                <div class="left-menu-item">
                    <span class="donut donut-success"></span> 预留菜单位置
                </div>
            </li>
            <li class="menu-top-hidden">
                <div class="left-menu-item">
                    <span class="donut donut-primary"></span> 预留菜单位置
                </div>
            </li>
            <li class="menu-top-hidden">
                <div class="left-menu-item">
                    <span class="donut donut-danger"></span> 预留菜单位置
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
                    <?php echo session('admin.a_username');?>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="" role="menu">
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-user"></i> 管理员信息</a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-header">资料</div>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> 姓名:<?php echo session('admin.a_username');?></a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> 电话:<?php echo session('admin.a_email');?></a>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-circle-right"></i> 邮箱:<?php echo session('admin.a_email');?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/index.php/Home/admin/logout"><i class="dropdown-icon icmn-exit"></i> 退出</a>
                </ul>
            </div>
        </div>
        
        <div class="menu-info-block">
            <div class="left">
                <div class="header-buttons">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle dropdown-inline-button" data-toggle="dropdown" aria-expanded="false">
                            <i class="dropdown-inline-button-icon icmn-folder-open"></i>
                            <span class="hidden-lg-down">预留菜单</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="" role="menu">
                            <a class="dropdown-item" href="javascript:void(0)">预留菜单</a>
                            <a class="dropdown-item" href="javascript:void(0)">预留菜单</a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-header">预留菜单</div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-checkmark"></i> 预留菜单...</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-checkmark"></i> 预留菜单...</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-clock"></i> 预留菜单...</a>
                            <a class="dropdown-item" href="javascript:void(0)">预留菜单...</a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-header">预留菜单</div>
                            <a class="dropdown-item" href="javascript:void(0)">预留菜单</a>
                            <a class="dropdown-item" href="javascript:void(0)">预留菜单</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">预留菜单</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-cog"></i> 预留菜单</a>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle dropdown-inline-button" data-toggle="dropdown" aria-expanded="false">
                            <i class="dropdown-inline-button-icon icmn-database"></i>
                            <span class="hidden-lg-down">预留菜单</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="" role="menu">
                            <div class="dropdown-header">预留菜单</div>
                            <a class="dropdown-item" href="javascript:void(0)">预留菜单</a>
                            <a class="dropdown-item" href="javascript:void(0)">预留菜单</a>
                            <a class="dropdown-item" href="javascript:void(0)">预留菜单</a>
                            <div class="dropdown-header">预留菜单</div>
                            <a class="dropdown-item" href="javascript:void(0)">预留菜单</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="dropdown-icon icmn-cog"></i> 预留菜单</a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="left hidden-md-down">
                <div class="example-top-menu-chart">
                    <span class="title">资金总计:</span>
                    <span class="chart" id="topMenuChart">1,3,2,0,3,1,2,3,5,2</span>
                    <span class="count"><?php echo session("max_cz");?> 人民币</span>

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
                <div class="search-block">
                    <div class="form-input-icon form-input-icon-right">
                        <i class="icmn-search"></i>
                        <input type="text" class="form-control form-control-sm form-control-rounded" placeholder="搜索...">
                        <button type="submit" class="search-block-submit "></button>
                    </div>
                </div>
            </div>
            <div class="right example-buy-btn hidden-xs-down">
                <a href="javascript:void(0)" target="_blank" class="btn btn-success-outline btn-rounded">
                    预留菜单
                </a>
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
                            <h5 class="text-uppercase">今日充值金额</h5>
                            <i class="counter-icon icmn-cash3"></i>
                            <span class="counter-count">
                                <i class="icmn-arrow-up5"></i>
                               ￥<span class="counter-init" data-from="25" data-to="<?php echo ($today_cz); ?>"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                <div class="widget widget-seven background-default">
                    <div class="widget-body">
                        <div href="javascript: void(0);" class="widget-body-inner">
                            <h5 class="text-uppercase">总计充值金额</h5>
                            <i class="counter-icon icmn-server"></i>
                            <span class="counter-count">
                                <i class="icmn-arrow-down5"></i>
                                ￥<span class="counter-init" data-from="25" data-to="<?php echo ($max_cz); ?>"></span>
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
                                <span class="counter-init" data-from="0" data-to="<?php echo ($today_vip); ?>"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                <div class="widget widget-seven">
                    <div class="widget-body">
                        <div href="javascript: void(0);" class="widget-body-inner">
                            <h5 class="text-uppercase">总计会员数量</h5>
                            <i class="counter-icon icmn-users"></i>
                            <span class="counter-count">
                                <i class="icmn-arrow-up5"></i>
                                <span class="counter-init" data-from="0" data-to="<?php echo ($max_vip); ?>"></span>
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
                                        <h2>服务器环境</h2>
                                        <p>Ngnix</p>
                                    </a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="widget-body">
                                    <div class="widget-body-icon">
                                        <i class="icmn-download"></i>
                                    </div>
                                    <a href="javascript: void(0);" class="widget-body-inner">
                                        <h2>语言环境</h2>
                                        <p>PHP 5.6.14</p>
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
                                        <i class="icmn-database"></i> 最大充值商户
                                    </h2>
                                    <p>
                                        名称: <?php echo ($maxShop["s_name"]); ?>
                                        <br />
                                        金额: <?php echo ($maxShop["num"]); ?> 元
                                    </p>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="javascript: void(0);" class="widget-body">
                                    <h2>
                                        <i class="icmn-users"></i> 最大充值会员
                                    </h2>
                                    <p>
                                        名称: <?php echo ($recordMax["m_nickname"]); ?>
                                        <br />
                                        金额: <?php echo ($recordMax["grade"]); ?> 元
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
                                        <i class="icmn-books"></i> 最大消费商户
                                    </h2>
                                    <p>
                                        名称: <?php echo ($maxShopXf["s_name"]); ?>
                                        <br />
                                        金额: <?php echo ($maxShopXf["grade"]); ?> 元
                                    </p>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="javascript: void(0);" class="widget-body">
                                    <h2>
                                        <i class="icmn-download"></i> 最大消费会员
                                    </h2>
                                    <p>
                                        名称: <?php echo ($maxMemberXf["m_nickname"]); ?>
                                        <br />
                                        金额: <?php echo ($maxMemberXf["grade"]); ?> 元
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
                                    <h2>待开发</h2>
                                    <!-- <p>
                                        预留信息A
                                        <br />
                                        预留信息B
                                    </p> -->
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="javascript: void(0);" class="widget-body">
                                    <h2>待开发</h2>
                                    <!-- <p>
                                        预留信息A
                                        <br />
                                        预留信息B
                                    </p> -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="widget widget-six">
                    <div class="widget-header">
                        <div class="dropdown pull-right">
                            <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="dropdown-inline-button-icon icmn-cog"></i>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="" role="menu">
                                <a class="dropdown-item" href="javascript:void(0)">移除</a>
                                <a class="dropdown-item" href="javascript:void(0)">编辑</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">移除全部</a>
                            </ul>
                        </div>
                        <strong class="margin-right-10">预留图表说明</strong>
                        <span class="margin-right-10 nowrap">
                            <span class="donut donut-success"></span>
                            预留A
                        </span>
                        <span class="margin-right-10 nowrap">
                            <span class="donut donut-primary"></span>
                            预留B
                        </span>
                        <span class="margin-right-10 nowrap">
                            <span class="donut donut-yellow"></span>
                            预留C
                        </span>
                    </div>
                    <div class="widget-body">
                        <div class="chart-line height-250 chartist"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="widget widget-six">
                    <div class="widget-header">
                        <div class="dropdown pull-right">
                            <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="dropdown-inline-button-icon icmn-cog"></i>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="" role="menu">
                                <a class="dropdown-item" href="javascript:void(0)">移除</a>
                                <a class="dropdown-item" href="javascript:void(0)">编辑</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">移除全部</a>
                            </ul>
                        </div>
                        <strong class="margin-right-10">预留图表说明, %</strong>
                        <span class="margin-right-10 nowrap">
                            <span class="donut donut-primary"></span>
                            预留A
                        </span>
                        <span class="margin-right-10 nowrap">
                            <span class="donut donut-success"></span>
                            预留B
                        </span>
                    </div>
                    <div class="widget-body">
                        <div class="chart-overlapping-bar height-250 chartist"></div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="widget widget-four background-transparent">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                    <div class="step-block ">
                        <span class="step-digit">
                            <i class="icmn-database"><!-- --></i>
                        </span>
                        <div class="step-desc">
                            <span class="step-title">充值记录 条</span>
                            <p>
                                总计: <?php echo ($czCount); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                    <div class="step-block">
                        <span class="step-digit">
                            <i class="icmn-users"><!-- --></i>
                        </span>
                        <div class="step-desc">
                            <span class="step-title">消费记录 条</span>
                            <p>总计: <?php echo ($xfCount); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                    <div class="step-block step-warning">
                        <span class="step-digit">
                            <i class="icmn-stats-growth"><!-- --></i>
                        </span>
                        <div class="step-desc">
                            <span class="step-title">每日资金比</span>
                            <p>
                                 +65 %
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xs-12">
                    <div class="step-block step-primary">
                        <span class="step-digit">
                            <i class="icmn-stats-dots"><!-- --></i>
                        </span>
                        <div class="step-desc">
                            <span class="step-title">访问流量</span>
                            <p>
                                <span>160.32 GB/S</span>
                                <span>&nbsp;</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <!-- End Dashboard -->
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
        new Chartist.Line(".chart-line", {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            series: [
                [12, 9, 7, 8, 5],
                [2, 1, 3.5, 7, 3],
                [1, 3, 4, 5, 6]
            ]
        }, {
            fullWidth: !0,
            chartPadding: {
                right: 40
            },
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });

        ///////////////////////////////////////////////////////////
        // CHART 2
        var overlappingData = {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    series: [
                        [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
                        [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
                    ]
                },
                overlappingOptions = {
                    seriesBarDistance: 10,
                    plugins: [
                        Chartist.plugins.tooltip()
                    ]
                },
                overlappingResponsiveOptions = [
                    ["", {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value[0]
                            }
                        }
                    }]
                ];

        new Chartist.Bar(".chart-overlapping-bar", overlappingData, overlappingOptions, overlappingResponsiveOptions);


    });
</script>
<!-- End Page Scripts -->
</section>
<div class="cwt__footer visible-footer">
    <div class="cwt__footer__top">
        <div class="row">
            <div class="col-lg-6">
                <div class="cwt__footer__title cwt__footer__title--light">
                    底部菜单说明
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a target="_blank" href="javascript:void(0)" class="cwt__footer__link">预留文字信息预留文字</a></li>
                            <li><a target="_blank" href="javascript:void(0)" class="cwt__footer__link">预留文字信息预留文字</a></li>
                            <li><a target="_blank" href="javascript:void(0)" class="cwt__footer__link">预留文字信息预留文字</a></li>
                            <li><a target="_blank" href="javascript:void(0)" class="cwt__footer__link">预留文字信息预留文字</a></li>
                            <li><a target="_blank" href="javascript:void(0)" class="cwt__footer__link">预留文字信息预留文字</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a target="_blank" href="javascript:void(0)" class="cwt__footer__link">预留文字信息预留文字</a></li>
                            <li><a target="_blank" href="javascript:void(0)" class="cwt__footer__link">预留文字信息预留文字</a></li>
                            <li><a target="_blank" href="javascript:void(0)" class="cwt__footer__link">预留文字信息预留文字</a></li>
                            <li><a target="_blank" href="javascript:void(0)" class="cwt__footer__link">预留文字信息预留文字</a></li>
                            <li><a target="_blank" href="javascript:void(0)" class="cwt__footer__link">预留文字信息预留文字</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cwt__footer__title">
                    会员系统说明
                </div>
                <div class="cwt__footer__description">
                    <p>预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息
                        预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息
                        预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息
                        预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息</p>

                    <p>预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息
                        预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息预留文字信息</p>
                </div>
            </div>
        </div>
    </div>
    <div class="cwt__footer__bottom">
        <div class="row">
            <div class="col-md-4">
                <a href="javascript:void(0)" target="_blank" class="btn btn-primary">
                    预留文字标题
                </a>
            </div>
            <div class="col-md-8">
                <div class="cwt__footer__company">
                    <img class="cwt__footer__company-logo" src="/Public/assets/common/img/temp/mediatec.png" target="_blank" title="Mediatec Software">
                    <span>
                        © 2017 <a href="javascript:void(0)" class="cwt__footer__link" target="_blank">会员系统</a>
                        <br>
                        All rights reserved
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/Public/assets/vendors/tether.min.js"></script>
<script src="/Public/assets/vendors/bootstrap.min.js"></script>
<script src="/Public/assets/vendors/jquery.jscrollpane.min.js"></script>
<script src="/Public/assets/vendors/autosize.min.js"></script>
<script src="/Public/assets/vendors/moment.min.js"></script>
<script src="/Public/assets/vendors/fullcalendar.min.js"></script>
<script src="/Public/assets/vendors/jquery.cleanaudioplayer.js"></script>
<script src="/Public/assets/vendors/jquery.dataTables.min.js"></script>
<script src="/Public/assets/vendors/chartist.min.js"></script>
<script src="/Public/assets/vendors/jquery.peity.min.js"></script>
<!-- v1.0.1 -->
<script src="/Public/assets/vendors/chartist-plugin-tooltip.min.js"></script>
<!-- v1.1.1 -->
<script src="/Public/assets/vendors/jquery.countTo.js"></script>
<!-- Clean UI Scripts -->
<script src="/Public/assets/common/js/common.js"></script>
<script src="/Public/assets/common/js/demo.temp.js"></script>
</body>
</html>