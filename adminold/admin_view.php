<h1>欢迎回来admin</h1>
<?php
include ("../common/db_config.php");
$pagesize = 5;
$url = $_SERVER ["REQUEST_URI"];
$url = parse_url ( $url );
//$url=$url[path];
$numq = mysql_query ( "SELECT * FROM `posts`" );
$num = mysql_num_rows ( $numq );
$pageall = $num / $pagesize;
//echo $pageall;


if (! empty ( $_GET ['keys'] )) {
	$w = " `title` like '%" . $_GET ['keys'] . "%'";
} else {
	$w = 1;
}
if (@empty ( $_GET [page] )) {
	$pageval = 1;
	@$page = ($pageval - 1) * $pagesize;
	@$page .= ',';
} 

//if(@!empty($_GET[page]))
else {
	@$pageval = $_GET [page];
	@$page = ($pageval - 1) * $pagesize;
	@$page .= ',';
}

@$sql = "select * from `posts` where $w order by id desc limit $page $pagesize  ";
$query = mysql_query ( $sql );
while ( $rs = mysql_fetch_array ( $query ) ) {
	
	?>


<div id="content">
	<h2>
		<a href='view.php?id=<?php echo $rs['id'] ?>'><?php echo $rs['title'] ?></a>
	</h2>

	<span class="entrydate">
<?php echo $rs['time']?>
</span>
	<p><?php echo iconv_substr($rs['context'],0,250,$charset ="utf-8")?>

	
	
	
	
	
	<p class="right">
		<a href='edit.php?id=<?php echo $rs['id'] ?>'>编辑</a>|<a
			href='del.php?id=<?php echo $rs['id'] ?>'>删除</a>
	</p>
	<br> <br>
<?php

}

?>
 <?php
	if ($num > $pagesize) {
		if (@$pageval <= 1)
			@$pageval = 1;
		
		echo "共 $num 条 ";
		if (@$pageval != 1)
			echo "<a href=index.php?page=" . ($pageval - 1) . ">上一页</a> ";
		echo "<a href=index.php>首页</a> ";
		if (@$pageval <= $pageall)
			echo "<a href=index.php?page=" . ($pageval + 1) . ">下一页</a>";
	
	} else {
		echo "共 $num 条";
	}
	?>
</div>


</div>
