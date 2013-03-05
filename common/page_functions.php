<?php
function get_page_num() {
	global $ez_pagesize;
	$numq = mysql_query ( "SELECT * FROM `posts`" );
	$num = mysql_num_rows ( $numq ); //得到总条目数量
	$pageall = $num / $ez_pagesize - 0.01;
	return $pageall;
}

function is_index() {
	global $pageval;
	if ($pageval == 1)
		return true;
	else
		return false;
}

function is_home() {
	global $pageval;
	if ($pageval!='')
		return true;
	else
		return false;
}

function is_post() {
	global $id;
	if ($id !='')
		return true;
	else
		return false;
}

function get_page_query() {
	global $paged, $ez_pagesize;
	@$sql = "select * from `posts` order by id desc limit $paged $ez_pagesize  ";
	$query = mysql_query ( $sql );
	return $query;
}

function get_page() {
	$pageval = 1;
	if (! empty ( $_GET [page] ))
		$pageval = $_GET [page];
	return $pageval;
}

function get_page_link($pageval) {
	global $ez_url_model;
	if($ez_url_model==1)
		return "index.php?page=$pageval";
	if($ez_url_model==2)
		return "page-$pageval.html";
}


?>


