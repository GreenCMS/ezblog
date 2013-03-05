<?php 
session_start () ;                   //初始session
$error="";
if (isset ($_SESSION['gen']))
{
	header ("Location:index.php") ;    //重新定向到其他页面
	exit ;
}
if(@$_POST['username']!=""&&@$_POST['password']!="" ){
@$username=$_POST['username'] ;    //获取参数
@$password=$_POST['password'] ;
include '../common/db_config.php';
$sql = "select * from `users` where `user_login`='$username' and `user_pass`='$password' ";
$query = mysql_query ( $sql ) or die ( "用户查询失败" );
$rs = mysql_fetch_array ( $query );
if($rs ==""){
	 $error="用户名密码错误";
}else 
	$_SESSION['gen']="zts1993";
header ("Location:index.php") ;    //重新定向到其他页面
	

}

?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>EZ-BLOG登录</title>
<link rel='stylesheet' id='wp-admin-css'
	href='./css/wp-admin.css' type='text/css' media='all' />
<link rel='stylesheet' id='buttons-css'
	href='./css/buttons.min.css'  type=' text/css'  media='all' />
<link rel='stylesheet' id='colors-fresh-css'
	href='./css/colors-fresh.min.css' type='text/css' media='all' />
</head>
<body  class="login login-action-login wp-core-ui">
<div id="login">
		<h1><a href="http://blog.zts1993.com" title="基于 EZ-BLOG">EZ-Blog</a></h1>
		<div style="text-align:center">	<h2><?php  echo $error; ?></h2></div><br />
	
<form name="loginform" id="loginform" action="login.php" method="post">
	<p>
		<label for="username">用户名<br />
		<input type="text" name="username" id="user_login" class="input" value="" size="20" /></label>
	</p>
	<p>
		<label for="password">密码<br />
		<input type="password" name="password" id="user_pass" class="input" value="" size="20" /></label>
	</p>
	<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> 记住我的登录信息</label></p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="登录" />
	</p>
</form>

<p id="nav">
<a href="http://blog.zts1993.com/wp-login.php?action=lostpassword" title="找回密码">忘记密码？</a>
</p>

<script type="text/javascript">
function wp_attempt_focus(){
setTimeout( function(){ try{
d = document.getElementById('user_login');
d.focus();
d.select();
} catch(e){}
}, 200);
}

wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();
</script>

	<p id="backtoblog"><a href="../index.php" title="不知道自己在哪？">&larr; 回到 EZ-Blog</a></p>
	
	</div>

	
	<div class="clear"></div>







</body>
</html>
