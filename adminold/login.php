<?php 
/*
if(empty($_GET["sub"]))
{ ?>
<div id="login">
<h1>欢迎使用<br><a href="../index.php">轻博客</a>后台管理系统</h1>
<form action="" method="GET"><br>
用户:<input type="text" name="name"><br><br>
密码:<input type="password" name="pass"><br><br>
<input type="submit" name="sub" value="提交"><br>
</form>
</div>
<?php }*/?>

<?php 
/*
if(!empty($_GET["sub"])){ 
	$username=$_GET['name'];$password=md5($_GET['pass']);	
	$sql="select `name` from `user` ";$query=mysql_query($sql);
	$rs1=mysql_fetch_array($query);
	if($rs1[0]==$username){
		$sql="select `password` from `user` ";$query=mysql_query($sql);
		$rs2=mysql_fetch_array($query);
			if($rs2[0]==$password){
				SetCookie("mbloguser", "$username",time()+3600);
				SetCookie("mblogpass", "$password",time()+3600);
				//ob_end_flush();
				echo "<script>alert('登陆成功');location.href='index.php'</script>";
			}
			else{
			echo "<script>alert('密码错误');location.href='index.php'</script>";ob_end_flush();
			}
	}
	else{
		echo "<script>alert('用户名错误');location.href='index.php'</script>";ob_end_flush();
	}
}	*/
?>
<div id="login">
<?php
if (empty ( $_GET ['sub'] )) {
	include ("admin_view.php");
	?>
</div>


<?php
}

?>