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
    <link rel="stylesheet" type="text/css" href="/Public/assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/assets/common/css/main.min.css">
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
                <!-- <div class="search-block">
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
                                        console.log(msg.data);
                                        console.log(msg.data1);
                //                                        $('.page-content-inner').remove();
                //                                        $('.page-content').append(msg.data1);
                //                                        $('#memberinfo').append(msg.data);
                                    }
                                },
                            })
                        }
                    });
                </script> -->
            </div>

        </div>
    </div>
</nav>
 
<section class="page-content">
<div class="page-content-inner" style="background-image: url(/Public/assets/common/img/temp/login/3.jpg)">

    <!-- Lockscreen Page -->

    <div class="empty-holder"><!-- --></div>
    <div class="single-page-block">
        <div class="single-page-block-inner effect-3d-element">
            <div class="blur-placeholder"><!-- --></div>
            <div class="single-page-block-form">
            <div style="width:100%; text-align: right;">
                <a href="/index.php/Home/shop/updatemembermoney">
                    <i class="fa fa-pencil margin-r-5 " style="color: blue;"></i>
                </a>
            </div>
                <form id="form-validation" name="form-validation" method="POST">
                    <div class="text-center">
                        <h2 class="text-center">
                            会员消费
                        </h2>
                    </div>
                    <div class="form-group">
                        <input id="m_card"
                               class="form-control"
                               placeholder="请刷卡"
                               name="m_card"
                               type="text">
                        <br>
                        <span style="color: black;margin-left: 19px;">刷卡号充值:</span>
                        <input type='radio' class="rel" value="1" name="check" checked>
                        <span style="color: black;margin-left: 19px;">输入卡号充值:</span>
                        <input type='radio' class="rel" value="2" name="check">
                        <span style="color: black;margin-left: 19px;">使用手机号码充值:</span>
                        <input type='radio' class="rel" value="3" name="check">
                    </div>
                    <h2 class="text-center" id="member_info">
                    </h2>
                    <br />
                    <div class="form-group">
                        <span style="color: black;margin-left: 19px;">消费描述:</span>
                        <textarea id="goods" name="goods" placeholder="消费详情" class="form-control" rows="3" cols="45"></textarea>
                    </div>
                    <br />
                    <div class="form-group">
                        <input id="num"
                               class="form-control"
                               placeholder="请输入消费金额"
                               name="num"
                               type="text">
                    </div>
                    <div id="result" style="display: none">

                    </div>


                    <!-- 打印 -->



                    <div class="form-actions text-center">
                        <button id="button_xf" type="button" class="btn btn-success width-150">结算消费</button>
                    </div>

                    <h2 class="text-center" id="member_infos">
                    </h2>

                </form>
            </div>
        </div>
    </div>
    <div class="lockscreen-typer">
        <div class="locksreen-typer-inner" id="console"><!-- --></div>
    </div>
    <div class="empty-holder"><!-- --></div>
    <!-- End Lockscreen Page -->

</div>

<!-- Page Scripts -->
<script>
    $(function() {

        // Add class to body for change layout settings
        $('body').addClass('single-page');

        $(".rel").on("click",function(){
            if($(this).val() == 1){
                $('#m_card').val('');
                $('#m_card').attr('placeholder','请刷卡');
                $('#num').val('');
                $('#member_info').html('');
                $('#member_infos').html('');
            }else if($(this).val() == 2){
                $('#m_card').val('');
                $('#m_card').attr('placeholder','请输入卡号');
                $('#num').val('');
                $('#member_info').html('');
                $('#member_infos').html('');
            }else{
                $('#m_card').val('');
                $('#m_card').attr('placeholder','请输入手机号码');
                $('#num').val('');
                $('#member_info').html('');
                $('#member_infos').html('');
            }
        });
        $('#num').on('focus',function () {
            $('#button_xf').removeAttr('disabled');
        });
        $('#m_card').on('change',function () {
            var m_card = $('#m_card').val();
            var checked = $('#checkbox1').is(':checked');
            $.ajax({
                url:'/index.php/Home/shop/findmember',
                type:'post',
                data:{
                    'm_card':m_card,
                    'checked':$(".rel:checked").val()
                },
                success:function(msg){
                    if(msg.status=='no'){
                        $('#button_xf').attr('disabled','disabled');
                        $('#m_card').val('');
                        $('#member_info').html('');
                        window.alert(msg.data);
                    }else {
                        $('#member_info').html(msg.data);
                        $('#button_xf').removeAttr('disabled');
                    }
                }
            })
        });
        var a=1;
        $('#button_xf').keypress(function(e) {
            if (e.keyCode == 13) {
                if (a==2) {
                    e.preventDefault();
                }
            }
            a=2;
            setTimeout(function () {
                a=1;
            },1000);
        });
        $("#button_xf").on('click',function () {
            var m_card = $('#m_card').val();
            var num = $('#num').val();
            var checked = $('#checkbox1').is(':checked');
            var goods = $('#goods').val();
            if(m_card==''){
                window.alert('请输刷卡或输入会员号!');
                $('#button_xf').attr('disabled','disabled');
            }else if (num==''){
                window.alert('请输入消费金额!');
                $('#button_xf').attr('disabled','disabled');
            }else {
                if (a==1) {
                    $.ajax({
                        url:'/index.php/Home/shop/usemember2',
                        type:'post',
                        data:{
                            'm_card':m_card,
                            'checked':$(".rel:checked").val(),
                            'num':num,
                            'goods':goods
                        },
                        beforeSend:function(){
                            a=2;
                        },
                        success:function(msg){
                            if(msg.status=='no'){
                                window.alert(msg.data);
                                $('#button_xf').attr('disabled','disabled');
                                $('#num').on('change',function () {
                                    $('#button_xf').removeAttr('disabled');
                                })
                            }else {
                                a = 1;
//                            $('#button_xf').text('消费');
//                            //改变提交按钮上的文字并将按钮设置为不可点击
//                            $('#button_xf').removeAttr('onclick','javascript:void();');
                                $('#result').html(msg.data1);
                                $('#result').speech({
                                    "speech": false,
                                    "speed": 5
                                });
                                $('#member_infos').html(msg.data);
                                $('#button_xf').attr('disabled','disabled');
                                $('#count_').html(msg.data2);

                                setTimeout(function () {
                                    $('#m_card').val('');
                                    $('#num').val('');
                                    $('#member_info').html('');
                                    $('#member_infos').html('');
                                    $('#goods').val('');
                                    $("#ddd").html('');
                                },3000);
                            }
                        },
                        error:function(){
                            a=1;
                            window.alert('网络中断,请稍后重试!')
                        }
                    })
                }else{
                    window.alert('网络慢,等一下,别按太急!')
                }

            }
        });
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

        // Show/Hide Password
        Typer.speed = 3;
        Typer.file = "/assets/vendors/hackertyper/kernel.txt";
        Typer.init();

        // Set Background Image for Form Block
        function setImage() {
            var imgUrl = $('.page-content-inner').css('background-image');

            $('.blur-placeholder').css('background-image', imgUrl);
        };

        function changeImgPositon() {
            var width = $(window).width(),
                    height = $(window).height(),
                    left = - (width - $('.single-page-block-inner').outerWidth()) / 2,
                    top = - (height - $('.single-page-block-inner').outerHeight()) / 2;


            $('.blur-placeholder').css({
                width: width,
                height: height,
                left: left,
                top: top
            });
        };

        setImage();
        changeImgPositon();

        $(window).on('resize', function(){
            changeImgPositon();
        });

        // Hacker Typer
        (function loop() {
            var rand = Math.round(Math.random() * (600 - 500)) + 100;
            setTimeout(function() {
                Typer.addText();
                loop();
            }, rand);
        }());

        // Mouse Move 3d Effect
        var rotation = function(e){
            var perX = (e.clientX/$(window).width())-0.5;
            var perY = (e.clientY/$(window).height())-0.5;
            TweenMax.to(".effect-3d-element", 0.4, { rotationY:15*perX, rotationX:15*perY,  ease:Linear.easeNone, transformPerspective:1000, transformOrigin:"center" })
        };

        if (!cleanUI.hasTouch) {
            $('body').mousemove(rotation);
        }

    });
</script>
<!-- End Page Scripts -->
</section>



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
<!-- v1.0.0 -->

<script src="/Public/assets/vendors/tether/dist/js/tether.min.js"></script>
<script src="/Public/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/Public/assets/vendors/jscrollpane/script/jquery.jscrollpane.min.js"></script>
<script src="/Public/assets/vendors/html5-form-validation/dist/jquery.validation.min.js"></script>
<script src="/Public/assets/vendors/bootstrap-show-password/bootstrap-show-password.min.js"></script>
<script src="/Public/assets/vendors/chartist/dist/chartist.min.js"></script>
<script src="/Public/assets/vendors/peity/jquery.peity.min.js"></script>
<script src="/Public/assets/vendors/gsap/src/minified/TweenMax.min.js"></script>
<script src="/Public/assets/vendors/hackertyper/hackertyper.js"></script>

<script src="/Public/assets/common/js/common.js"></script>
<script src="/Public/assets/common/js/demo.temp.js"></script>
<!--<script src="/Public/assets/common/js/jquery.jqprint-0.3.js"></script>-->
<script src="/Public/assets/common/js/jquery.jqprint-0.3.js"></script>
<script src="http://www.jq22.com/jquery/jquery-migrate-1.2.1.min.js"></script>
<!-- 语音播报 -->
<script src="/Public/assets/common/js/jQuery.speech.min.js"></script>
</body>
</html>