<?php
header ( "content-Type: text/html; charset=utf-8" );
include ("../common/db_config.php");
include ("pre.php");
?>
<?php

if (! empty ( $_GET ['id'] )) {
	$sql = "select * from `posts` where `id`='" . $_GET ['id'] . "' " or die ( "GET id failed" );
	$query = mysql_query ( $sql ) or die ( "GET id failed" );
	$rs = mysql_fetch_array ( $query );

	//	print_r($rs);
}

if (! empty ( $_POST ['sub'] )) {
	$title = $_POST ['title'];
	$context = $_POST ['context'];
	$context = mysql_real_escape_string ( $context );
	$hid = $_POST ['hid'];
	$sql = "update `posts` set`title`='$title',`context`='$context' where `id`='$hid' limit 1";
	//	echo $sql;
	mysql_query ( $sql ) or die ( "xxx" );
	echo "修改成功 !";
	echo "<script>alert('更新成功');location.href='index.php'</script>";
}

?>
<div id="wrap">
<?php
include ("header.php");
include ("sidebar.php");
?>
<body>


		<!--边栏 内容<textarea rows="5" cols="50" name="context"></textarea><?php //echo $rs['context']?><br>-->

		<div id="content">
			<form action="edit.php" method="POST">
				<input type="hidden" name="hid" value="<?php echo $rs['id']?>"> 标题<input
					type="text" name="title" value="<?php echo $rs['title']?>"><br>
				<textarea id="editor_id" name="context"
					style="width: 700px; height: 300px;">
&lt;strong&gt;<?php echo $rs['context']?>&lt;/strong&gt;
</textarea>

				<input type="submit" name="sub" name="发表"><br>
			</form>
			<script charset="utf-8" src="../editor/kindeditor.js"></script>
			<script charset="utf-8" src="../editor/lang/zh_CN.js"></script>
			<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#editor_id');
        });

       
</script>
		</div>
<?php


include ("footer.php");
?>
</body>
	</html>