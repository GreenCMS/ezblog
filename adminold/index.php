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

include ("login.php");

include ("footer.php");
?>








</div>
</body>
</html>