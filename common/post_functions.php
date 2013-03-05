<?php

function get_post_max() {
	$sql = "SELECT MAX( ID ) FROM  `posts` WHERE 1";
	$query = mysql_query ( $sql ) or die ( "GET MAX ID failed" );
	$rs = mysql_fetch_array ( $query );
	return $rs['0'];
}

function get_post_min() {
		$sql = "SELECT MIN( ID ) FROM  `posts` WHERE 1";
		$query = mysql_query ( $sql ) or die ( "GET MIN ID failed" );
		$rs = mysql_fetch_array ( $query );
		return $rs['0'];
}


function have_posts() {
	global $rs;
	if (empty ( $rs ))
		return false;
	return true;
}

function get_post_content() {
	global $rs;
	return $rs ['post_content'];
}

function get_post_title() {
	global $rs;
	return $rs ['post_title'];
}

function get_post_hit() {
	global $rs;
	return $rs ['post_hits'];
}

function get_post_link() {
	global $rs;
	global $ez_url_model;
	$post_id = $rs ['ID'];
	if ($ez_url_model == 1)
		$post_link = "single.php?id=$post_id";
	if ($ez_url_model == 2)
		$post_link = "single-$post_id.html";
	
	
	return $post_link;
}

function get_post_time() {
	global $rs;
	return  $rs ['time'];

}

function get_post_comment_number() {
	global $rs;
	
	return '0';

		//return $rs['ID'];
}

function get_post_content_short($start, $end) {
	global $rs;
	return mb_substr ( strip_tags ( get_post_content () ), $start, $end, "utf-8" );
}

function get_post_title_short($start, $end) {
	global $rs;
	return mb_substr ( strip_tags ( get_post_title () ), $start, $end, "utf-8" );
}

function the_posts() {
	global $rs;
	echo '
	<div class="span4 ds-component"  data-componentid="gridco1"
	style="min-height: 250px; max-height: 450px; border: 0px solid silver; position: relative;">
	<div class="ds-component" data-componentid="content">
	<hr />
	<h3 style="text-align: center">' . get_post_title_short ( 0, 40 ) . '</h3>
	<br />
	<h6>' . get_post_content_short ( 0, 150 ) . '</h6>
	</div>

	<div	class="more-info"  >
	<span class="badge ds-component">浏览 :' . get_post_hit () . '</span>
	<span class="badge ds-component" >评论 : ' . get_post_comment_number () . '</span>
	<a class="btn ds-component"  href="' . get_post_link () . '" data-componentid="button"> 查看详细</a>
	</div>

	</div>
	';

}

function get_other_post() {
	global $rs;
	$sql = "select * from `posts` order by post_hits desc limit 0,10  ";
	$query = mysql_query ( $sql ) or die ( "GET other posts failed" );
	$result='<h3>&nbsp&nbsp&nbsp&nbsp您可能还会对这些最新热门文章感兴趣！</h3>';
	//$a=0;
	for( $i=0;$i<10;$i++) {
		$rs = mysql_fetch_array($query);
		$result.='<ul>
			<span>Views:'.get_post_hit().'</span> &nbsp&nbsp
			<a href="'.get_post_link().'">'. get_post_title().'</a>
		</ul>';
 	 }  
		$result.='<hr />';
	
	
	return $result;
}


function get_post_by_id($id) {

	$sql = "select * from `posts` where `ID`='$id'";
	$query = mysql_query ( $sql );// or die ( "GET ID failed" );

	$rs = mysql_fetch_array ( $query );
	return $rs;
		
}

function	hit_post_by_id($id) {
	$sql = "update `posts` set post_hits=post_hits+1 where `ID`='$id'";
	//echo $sql;
	$query = mysql_query ( $sql ) or die ( "GET ID failed" );
	//echo get_post_hit ();

}

?>