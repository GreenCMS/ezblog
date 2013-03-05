<div id="detail">
	<h1><?php echo $rs['title'];?></h1>
	<a href='edit.php?id=<?php echo $rs['id'] ?>'>编辑</a>|<a
		href='del.php?id=<?php echo $rs['id'] ?>'>删除</a>
	</h2>
	<h2><?php echo $rs['time'];?>&nbsp&nbsp&nbsp&nbsp点击量:<?php echo $rs['hits']+1;?></h2>
	<p><?php echo $rs['context'];?></p>


	<p class="right">
<?php
include ("../common/db_config.php");
if (! empty ( $_GET ['id'] )) {
	$id = $_GET ['id'];
	$idp = $id - 1;
	$idn = $id + 1;
	//echo $id;
	$sql = "select * from `posts` where `id`='$idp' ";
	$query = mysql_query ( $sql ) or die ( "GET id failed" );
	$rs = mysql_fetch_array ( $query );
	for($i = 0; $i < 10 && $rs == null; $i ++) {
		$idp --;
		$sql = "select * from `posts` where `id`='$idp' ";
		$query = mysql_query ( $sql ) or die ( "GET id failed" );
		$rs = mysql_fetch_array ( $query );
	}
	if ($rs != null) {
		echo "<a href=view.php?id=$idp>下一条：" . $rs ['title'] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a> ";
	}
	
	$sql = "select * from `posts` where `id`='$idn' ";
	$query = mysql_query ( $sql ) or die ( "GET id failed" );
	$rs = mysql_fetch_array ( $query );
	for($i = 0; $i < 10 && $rs == null; $i ++) {
		$idn ++;
		$sql = "select * from `posts` where `id`='$idn' ";
		$query = mysql_query ( $sql ) or die ( "GET id failed" );
		$rs = mysql_fetch_array ( $query );
	}
	if ($rs != null) {
		echo "<br><a href=view.php?id=$idn>上一条：" . $rs ['title'] . "&nbsp&nbsp&nbsp&nbsp</a> ";
	}
}
?>

</p>
</div>


