<?php
session_start();
session_unset();
header ( "Location:index.php" ); //重新定向到其他页面
?>