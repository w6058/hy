<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <style>
        #loading{
            background-color: #46be8a;
            height: 100%;
            width: 100%;
            position: fixed;
            z-index: 1;
            margin-top: 0px;
            top: 0px;
        }
        #loading-center{
            width: 100%;
            height: 100%;
            position: relative;
        }
        #loading-center-absolute {
            position: absolute;
            left: 50%;
            top: 50%;
            height: 150px;
            width: 150px;
            margin-top: -75px;
            margin-left: -75px;
        }
        .object{
            width: 20px;
            height: 20px;
            background-color: white;
            float: left;
            margin-right: 20px;
            margin-top: 65px;
            -moz-border-radius: 50% 50% 50% 50%;
            -webkit-border-radius: 50% 50% 50% 50%;
            border-radius: 50% 50% 50% 50%;
        }

        #object_one {
            -webkit-animation: object_one 1.5s infinite;
            animation: object_one 1.5s infinite;
        }
        #object_two {
            -webkit-animation: object_two 1.5s infinite;
            animation: object_two 1.5s infinite;
            -webkit-animation-delay: 0.25s;
            animation-delay: 0.25s;
        }
        #object_three {
            -webkit-animation: object_three 1.5s infinite;
            animation: object_three 1.5s infinite;
            -webkit-animation-delay: 0.5s;
            animation-delay: 0.5s;
        }
        @-webkit-keyframes object_one {
            75% { -webkit-transform: scale(0); }
        }
        @keyframes object_one {

            75% {
                transform: scale(0);
                -webkit-transform: scale(0);
            }
        }
        @-webkit-keyframes object_two {
            75% { -webkit-transform: scale(0); }
        }
        @keyframes object_two {
            75% {
                transform: scale(0);
                -webkit-transform:  scale(0);
            }
        }
        @-webkit-keyframes object_three {

            75% { -webkit-transform: scale(0); }
        }
        @keyframes object_three {

            75% {
                transform: scale(0);
                -webkit-transform: scale(0);
            }
        }
    </style>
</head>
<body class="theme-default">
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function(){
            window.location.href = "/index.php/Home/shop/show";
        },2000)
    </script>
</body>
</html>