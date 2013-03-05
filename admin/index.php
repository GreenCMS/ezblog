<?php
	session_start();//初始化session
if (!isset($_SESSION['gen']))
{
	header("Location:login.php"); //重新定向到其他页面
	exit();
}else{
	header("Location:home.php"); //重新定向到其他页面
	exit();
	
	
}

?>