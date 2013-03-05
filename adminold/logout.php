<?php
header ( "content-Type: text/html; charset=utf-8" );
include ("../common/db_config.php");

@SetCookie ( "mbloguser", "$username", time () - 1 );
@SetCookie ( "mblogpass", "$password", time () - 1 );
echo '退出成功';
echo "<script>alert('退出成功');location.href='../index.php'</script>";
echo "<br>";
//echo '<script language=\"Javascript\" type=\"text/Javascript\">window.location.href=\"index.php\";</script>';
echo '<a href="index.php">返回管理首页</a>';
echo "<br>";
echo '<a href="../index.php">返回网站首页</a>';

?>

     

