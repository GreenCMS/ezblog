<?php
ob_start ();
header ( "content-Type: text/html; charset=utf-8" );
include ("pre.php");
include ("../common/db_config.php");
?>

<body>

	<div id="wrap">
<?php
//----头部------
include ("header.php");
//----边栏----
include ("sidebar.php");
?>


<?php
if (! empty ( $_POST ['sub'] )) {
	$name = $_POST ['name'];
	$url = $_POST ['url'];
	//$contexts=addslashes($contexts);//stripslashes( )
	$sql = "insert into `links` (`name`,`url`) values ('$name','$url')";
	echo $sql . "<br>";
	mysql_query ( $sql ) or die ( "添加失败" );
	
	echo "INSERT OK !";
	echo "<script>location.href='links.php'</script>";
}

?>
 <div id="content">
			<form action="links.php" method="POST">

				Name:<input type="text" name="name"><br> URL:<input type="text"
					name="url"><br> <input type="submit" name="sub" name="Submit"><br>
			</form>


<?php
@$sql = "select * from `links`";
$query = mysql_query ( $sql );
while ( $rs = mysql_fetch_array ( $query ) ) {
	?>
		<ul><?php echo $rs['name'].'-----'.$rs['url']; ?></ul>
	<?php

}
?>

</div>




<?php
include ("footer.php");
?>
