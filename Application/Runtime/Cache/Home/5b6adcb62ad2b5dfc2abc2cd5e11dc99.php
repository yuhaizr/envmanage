<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>登入</title>

<link rel="stylesheet" type="text/css" href="/envmanage/Public/css/login_styles.css">

</head>
<body>


<div class="wrapper">

	<div class="container">
		<h1>浔阳区环保网格化管理系统</h1>
		<form class="form" action="/envmanage/index.php/Home/Login/login">
			<input required="required" name='account' type="text" placeholder="账号">
			<input required="required" name='password' type="password" placeholder="密码"><br>
			<button type="submit" id="login-button" ><strong>登陆</strong></button>
			
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		
	</ul>
	
</div>



</body>
</html>