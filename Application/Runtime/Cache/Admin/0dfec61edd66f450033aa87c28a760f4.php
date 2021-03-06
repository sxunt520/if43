<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

<meta charset="utf-8">
<title>如果时尚，爱否时尚!后台管理登录!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- CSS -->

<link rel="stylesheet" href="/Application/Admin/Public/css/supersized.css">
<link rel="stylesheet" href="/Application/Admin/Public/css/login.css">
<link href="/Application/Admin/Public/css/bootstrap.min.css" rel="stylesheet">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	<script src="/Application/Admin/Public/js/html5.js"></script>
<![endif]-->
<script src="/Application/Admin/Public/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Application/Admin/Public/js/jquery.form.js"></script>
<script type="text/javascript" src="/Application/Admin/Public/js/tooltips.js"></script>
<script type="text/javascript" src="/Application/Admin/Public/js/login.js"></script>
</head>

<body>

<div class="page-container">
	<div class="main_box">
		<div class="login_box">
			<div class="login_logo">
				<a href="/" target="_blank"><img src="/Application/Admin/Public/images/logo.png" ></a>
			</div>
		
			<div class="login_form">
				<form action="/Admin/Login/login.html" id="login_form" method="post">
					<div class="form-group">
						<label for="email" class="t">邮　箱：</label> 
						<input id="email" value="" name="email" type="text" class="form-control x319 in" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="password" class="t">密　码：</label> 
						<input id="password" value="" name="password" type="password" class="password form-control x319 in">
					</div>
					<div class="form-group">
						<label for="captcha" class="t">验证码：</label>
						 <input id="captcha" name="captcha" type="text" class="form-control x164 in">
						<img id="yzm" style="display:inline-block;margin-top:0px; width:110px; height:33px; cursor:pointer;" title="点击刷新" src="/Admin/Login/verifyImg" align="absbottom" onClick="this.src='/Admin/Login/verifyImg/'+Math.random()" width="110"></img>
					</div>
					<div class="form-group">
						<label class="t"></label>
						<label for="j_remember" class="m">
						<input id="j_remember" type="checkbox" value="true">&nbsp;记住登陆账号!</label>
					</div>
					<div class="form-group space">
						<label class="t"></label>　　　
						<button type="button"  id="submit_btn" class="btn btn-primary btn-lg">&nbsp;登&nbsp;录&nbsp </button>
						<input type="reset" value="&nbsp;重&nbsp;置&nbsp;" class="btn btn-default btn-lg">
					</div>
				</form>
			</div>
		</div>
		<div class="bottom" style="font-size:14px;">Copyright &copy; 2015 - 2016 <a href="/" target="_blank">爱否时尚</a></div>
	</div>
</div>

<!-- Javascript -->

<script src="/Application/Admin/Public/js/supersized.3.2.7.min.js"></script>
<script src="/Application/Admin/Public/js/supersized-init.js"></script>
<script src="/Application/Admin/Public/js/scripts.js"></script>
<div style="text-align:center; color:#fff; font-size:28px; padding-top:12px;">
<p>爱否时尚后台管理登录</p>
</div>
</body>
</html>