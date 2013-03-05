  <?php if(is_home()){?>

<hr class="ds-component" data-componentid="hr1">
<div class="row-fluid"></div>
<div class="row-fluid"></div>
<ul class="nav nav-tabs">
	<li></li>
	<li></li>
	<li></li>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="#">返回顶部</a>
				<ul class="nav">
					<li><a href="index.php">首页</a></li>
	                 <?php
			
if (! is_index ()) {
				echo " <li><a href=" . get_page_link ( get_page () - 1 ) . "> 上一页</a></li>";
			}
			for($i = 1; $i <= get_page_num () + 1&&$i <= 20; $i ++) {
				echo "<li><a href=" . get_page_link ( $i ) . " >$i</a></li>";
			}
			
			if (get_page () <= get_page_num ()) {
				echo " <li><a href=" . get_page_link ( get_page () + 1 ) . "> 下一页</a></li>";
			}
			?>
	            </ul>
			</div>
		</div>
	</div>
</ul>
<?php } ?>

  <?php if(is_post()){?>
<hr class="ds-component" data-componentid="hr1">
<div class="row-fluid"></div>
<div class="row-fluid"></div>
<ul class="nav nav-tabs">
	<li></li>
	<li></li>
	<li></li>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="index.php">返回首页</a>
				<ul class="nav">
			<?php
			global $id;
			//$idp = $id - 1;	$idn = $id + 1;
			if (! ($id < get_post_min () + 1)) { //	是不最小的
				$rs = "";
				while ( $rs == "" )
					$rs = get_post_by_id ( $id - 1 );
				echo '<li><a href=' . get_post_link () . '>上一条  ' . get_post_title_short ( 0, 40 ) . '</a></li> ';
			}
			if (! ($id > get_post_max () - 1)) { //	是不最大的
				$rs = "";
				while ( $rs == "" )
					$rs = get_post_by_id ( $id + 1 );
				echo '<li><a href=' . get_post_link () . '>上一篇  ' . get_post_title_short ( 0, 40 ) . '</a></li>';
			
			}
			
			?>     
			 </ul>
			</div>
		</div>
	</div>
</ul>

<?php } ?>

