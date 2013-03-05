<?php
header ( "content-Type: text/html; charset=utf-8" );
include ("../common/db_config.php");
include ("pre.php");
?>

<div id="wrap">
<?php
include ("header.php");
include ("sidebar.php");
?>

<?php
if (! empty ( $_POST ['sub'] )) {
	$title = $_POST ['title'];
	$contexts = $_POST ['content'];
	$contexts = addslashes ( $contexts ); //stripslashes( )
	$sql = "insert into `posts` (`id`,`title`,`context`,`time`) values (null,'$title','$contexts',now())";
	echo $sql . "<br>";
	mysql_query ( $sql ) or die ( "添加失败" );
	
	echo "INSERT OK !";
	echo "<script>location.href='index.php'</script>";
}

?>
 <div id="content">
		<form action="add.php" method="POST">

			标题<input type="text" name="title"><br>
			<textarea id="editor_id" name="content"
				style="width: 700px; height: 300px;">

</textarea>
			<br> <input type="submit" name="sub" name="发表"><br>
		</form>
	</div>
<?php

include ("footer.php");
?>


</div>
<script charset="utf-8" src="../editor/kindeditor.js"></script>
<script charset="utf-8" src="../editor/lang/zh_CN.js"></script>
<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#editor_id');
               

                
        });
	//	var editor;


   

</script>
</body>
</html>
