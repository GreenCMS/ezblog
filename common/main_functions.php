<?php

require 'settings.php';
include 'common/page_functions.php';
include 'common/post_functions.php';

function get_title() {
	global $ez_title;
	global $ez_description;
	if (strpos ( $_SERVER ["REQUEST_URI"], "single.php" ) != 0) {
		if (! empty ( $_GET ['id'] )) {
			$sql = "select * from `posts` where `ID`='" . $_GET ['id'] . "' ";
			$query = mysql_query ( $sql ) or die ( "GET id failed" );
			$rs = mysql_fetch_array ( $query );
			$query = mysql_query ( $sql );
		
		//	print_r($rs);
		}
		echo mb_substr ( $rs ['post_title'], 0, 50, "utf-8" ) . "--$ez_title";
	
	} else if (@! empty ( $_GET [page] ) && @$_GET [page] != 1) {
		echo $ez_title . '--Page--' . @$_GET [page];
	} else {
		echo $ez_title . '--' . $ez_description;
	}
}

function get_description() {
	global $ez_description;
	if (strpos ( $_SERVER ["REQUEST_URI"], "single.php" ) != 0) {
		if (! empty ( $_GET ['id'] )) {
			$sql = "select * from `posts` where `ID`='" . $_GET ['id'] . "' ";
			$query = mysql_query ( $sql ) or die ( "GET id failed" );
			$rs = mysql_fetch_array ( $query );
			$query = mysql_query ( $sql );
		
		//	print_r($rs);
		}
		echo mb_substr ( strip_tags ( $rs ['post_content'] ), 0, 100, "utf-8" );
	} else {
		echo $ez_description;
	}
}

function get_keyword() {
	global $ez_keyword;
	
	echo $ez_keyword;

}

function get_author() {
	global $ez_author;
	
	echo $ez_author;

}

?>


