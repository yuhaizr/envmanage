<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
Beyond Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3
Version: 1.0.0
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title>成功页面</title>
    <meta http-equiv='Refresh' content='<?php echo ($waitSecond); ?>;URL=<?php echo ($jumpUrl); ?>'>
    <meta name="description" content="Error 404 - Page Not Found" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/envmanage/Public/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="/envmanage/Public/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="/envmanage/Public/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/envmanage/Public/css/weather-icons.min.css" rel="stylesheet" />


    <!--Beyond styles-->
    <link id="beyond-link" href="/envmanage/Public/css/beyond.min.css" rel="stylesheet" />
    <link href="/envmanage/Public/css/demo.min.css" rel="stylesheet" />
    <link href="/envmanage/Public/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="/envmanage/Public/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body class="body-404" style="background-color: #001940">
    <div class="error-header" style="background-color: #001940"> </div>
    <div class="container ">
        <section class="error-container text-center">
            <h1>success</h1>
            <div class="error-divider">
                <h2><?php echo ($message); ?></h2>
                <p class="description">succss</p>
            </div>
            <a href="index.html" class="return-btn"><i class="fa fa-home"></i>Home</a>
        </section>
    </div>
    <!--Basic Scripts-->
    <script src="/envmanage/Public/js/jquery-2.0.3.min.js"></script>
    <script src="/envmanage/Public/js/bootstrap.min.js"></script>

    <!--Beyond Scripts-->
    <script src="/envmanage/Public/js/beyond.min.js"></script>


</body>
<!--Body Ends-->
</html>