<?php
include "header.php";
include "header-nav.php";
include "siderbar.php";
include "common/db_config.php";
include "common/settings.php";
$pageval = 1;
$pageall = get_page_num (); //计算页面总数
$pageval = get_page ();
$paged = ($pageval - 1) * $ez_pagesize . ',';
?>

<?php
if (is_index ())
	include "hello.php";

$query = get_page_query ();
$rs = mysql_fetch_array ( $query ); //逐条取出


if (have_posts ()) {
	for($now = 1; $now < $ez_pagesize + 1; $now ++) {
		$new_row = $now % 3;
		if ($now % 3 == 1)
			echo ' <div class="row-fluid ds-component" data-componentid="fluidgridrow">';
		if (have_posts ()) {
			the_posts ();
		}
		if ($now % 3 == 0)
			echo '  </div><br />  ';
		
		$rs = mysql_fetch_array ( $query ); //逐条取出
	}
} else {
	echo 'No Posts';
}

include "footer-nav.php";
include "footer.php";
?>      
       