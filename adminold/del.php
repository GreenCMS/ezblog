<?php
header ( "content-Type: text/html; charset=utf-8" );
include ("../common/db_config.php");
include ("pre.php");

?><?php

if (! empty ( $_GET ['id'] )) {
	$d = $_GET ['id'];
	$sql = "delete from `posts` where `id`='$d'";
	mysql_query ( $sql );
	echo "删除成功!";
	echo "<script>alert('删除成功');location.href='index.php'</script>";
} else {
	echo "";

}
?>
<br>
<a href='index.php'>返回首页</a>