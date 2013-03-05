<!DOCTYPE html>
<html lang="en">
 <?php
 	include ("common/db_config.php");
	include  'common/main_functions.php';
	
	include 'include/runtime.php';
	error_reporting ( E_ALL ^ E_NOTICE );
	
	$runtime = new runtime ();
	$runtime->start ();
	//RewriteEngine On RewriteRule ^/index/([a-z]+)/([0-9]+).html$ /index.php?page=$1
	//&id=$2
	?>

  <head>
<meta charset="utf-8">
<title><?php get_title(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php get_description(); ?>">
<meta name="keyword" content="<?php get_keyword(); ?>">
<meta name="author" content="<?php get_author(); ?>">
<!-- Le styles -->
<link href="./assets/css/bootstrap.css" rel="stylesheet">
<style>
body {
	padding-top: 60px;
	padding-left: 60px;
	padding-right: 60px;
	background-image: url("./assets/img/bg_body.jpg");
	background-repeat: repeat;
}

.post-related {
	overflow: hidden;
	_zoom: 1;
	font-size: 13px;
}

.post-related ul {
	width: 50%;
	float: left;
	height: 30px;
	line-height: 30px;
	overflow: hidden;
	margin: 0;
	padding: 0;
	list-sytle: none;
}

.post-related span {
	width: 100px;
	display: inline-block;
	text-align: right;
	margin-right: 10px;
	color: #888;
	font-size: 12px;
}

.post-related strong {
	color: #006149;
	font-weight: normal
}

.more-info {
	text-align: right;
	position: absolute;
	right: 5px;
	bottom: 0px;
}

.content {
	width: 95%;
	mid-width: 600px;
	margin: 0 auto;
}

.title {
	width: 90%;
	mid-width: 600px;
	margin: 0 auto;
}
</style>

<link href="./assets/css/bootstrap-responsive.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
      </script>
    <![endif]-->
<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="./assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="./assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="./assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="./assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed"
	href="./assets/ico/apple-touch-icon-57-precomposed.png">
<style>
</style>

<!--   <script src="http://1.cdnz.sinaapp.com/wp-content/themes/Z4.2/js/jquery.min.js" > </script> 
   -->

</head>