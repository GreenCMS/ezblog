
<?php

require_once 'JSON.php';

session_name ( "lscj_session" );
session_start ();
if (! isset ( $_SESSION ['username'] )) {
	session_destroy ();
	alert ( "用户信息丢失，请重新登录！" );
}

if (empty ( $_POST ['imgurl'] )) {
	alert ( "imgurl为空！" );
}

$phpbb_root_path = "../../";
//图片显示路径
$imgShowPath = "http://127.0.0.1/editor/attached/" . date ( 'Y' ) . '/' . date ( 'm' ) . '/';
//图片保存路径
$imgStorePath = $phpbb_root_path . '/editor/attached/' . date ( 'Y' ) . '/';
if (! is_dir ( $imgStorePath )) {
	mkdir ( $imgStorePath, 0777 );
}
$imgStorePath .= date ( 'm' ) . '/';
if (! is_dir ( $imgStorePath )) {
	mkdir ( $imgStorePath, 0777 );
}

$imgurl = $_POST ['imgurl'];
$referbase = $_POST ['referbase'];

if (0 === stripos ( $imgurl, "http" ) || 0 === stripos ( $imgurl, "//" )) {
} else {
	if (empty ( $referbase )) {
		alert ( "referbase为空！" );
	} else {
		$imgurl = $referbase . $imgurl;
	}
}
if (false !== stripos ( $imgurl, "//www.iseexn.com" )) {
	header ( 'Content-type: text/html; charset=utf-8' );
	$json = new Services_JSON ();
	echo $json->encode ( array ('error' => 0, 'url' => $imgurl ) );
}

$filetype = getFiletype ( $imgurl );
if (empty ( $filetype )) {
	alert ( "图片类型为空！" );
}
$newimgname = time () . '_' . rand ( 1000, 9999 ) . "." . $filetype;
$newimgpath = $imgStorePath . $newimgname;

set_time_limit ( 0 );
$get_file = @file_get_contents ( $imgurl );
if ($get_file) {
	$fp = @fopen ( $newimgpath, 'w' );
	@fwrite ( $fp, $get_file );
	@fclose ( $fp );
	
	header ( 'Content-type: text/html; charset=utf-8' );
	$json = new Services_JSON ();
	echo $json->encode ( array ('error' => 0, 'url' => $imgShowPath . $newimgname ) );
	
	exit ();
} else {
	alert ( "获取图片失败！" );
}

function getFiletype($filename) {
	$tempArray = explode ( ".", $filename ); //分割字符串
	if (count ( $tempArray ) > 1) {
		$fileType = $tempArray [count ( $tempArray ) - 1]; //得到文件扩展名
		return $fileType;
	}
	return "";
}

function alert($msg) {
	header ( 'Content-type: text/html; charset=utf-8' );
	$json = new Services_JSON ();
	echo $json->encode ( array ('error' => 1, 'message' => $msg ) );
	exit ();
}
