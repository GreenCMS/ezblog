<?php
header ( "content-Type: text/html; charset=utf-8" );
include ("pre.php");
?>

<?php
include ("../common/db_config.php");
if (! empty ( $_GET ['id'] )) {
	$sql = "select * from `posts` where `id`='" . $_GET ['id'] . "' ";
	$query = mysql_query ( $sql ) or die ( "GET id failed" );
	$rs = mysql_fetch_array ( $query );
	$sql = "update `posts` set hits=hits+1 where `id`='" . $_GET ['id'] . "' ";
	$query = mysql_query ( $sql );

	//	print_r($rs);
}
?>

<body>
	<div id="wrap">


		<!----头部------>
<?php include ("header.php"); ?>
<!----头部------>
<?php include ("sidebar.php");?>
<!----内容------>
<?php include ("detail.php");?>
<!----底部------>
<?php include ("footer.php"); ?>
</div>
</body>
</html>

