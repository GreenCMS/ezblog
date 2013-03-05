<?php
include "header.php";
include "header-nav.php";
include "siderbar.php";
include "common/db_config.php";
include "common/settings.php";
$pageall = get_page_num (); //计算页面总数
$pageval = getpage ();
?>
<div class="span9">
<?php
if (isindex ()) {
	?>
  <div class="hero-unit ds-component" data-componentid="hero1">
		<div class="ds-component" data-componentid="content1">
			<h1>Welcome!</h1>
			<p>
				&nbsp; Welcome to my blog.<br /> &nbsp;&nbsp;This is the official
				blog for the EZ-blog<br />
			</p>
		</div>
		<a class="btn btn-primary ds-component" href="welcome.php"
			data-componentid="button1">Know more about me»</a>
	</div>
        
<?php
}
@$paged = ($pageval - 1) * $ez_pagesize . ',';

@$sql = "select * from `posts` order by id desc limit $paged $ez_pagesize  ";
$query = mysql_query ( $sql );

for($a = 1, $b = 0; $a < $ez_pagesize + 1; $a = $a + 1) {
	$rs = mysql_fetch_array ( $query ); //逐条取出
	

	if ($a % 3 == 1) {
		$b = $b + 1;
		?> 
         <div class="row-fluid ds-component"
		data-componentid="fluidgridrow<?php echo $b ?>">
        <?php
	
	}
	
	if (! empty ( $rs )) {
		?>      
   <div class="span4 ds-component"
			data-componentid="gridco1<?php //echo $a+2 ?>"
			style="min-height: 250px; max-height: 450px; border: 0px solid silver; position: relative;">
			<div class="ds-component"
				data-componentid="content<?php echo $a+2; ?>">
				<hr />
				<h3 style="text-align: center"> <?php echo  iconv_substr(strip_tags($rs['post_title']),0,40,$charset ="utf-8")?></h3>
				<div style="position: absolute; right: 10px; bottom: 10px">
					<hr />
				</div>
				<h6><?php echo mb_substr(strip_tags($rs['post_content']),0,150,"utf-8");  ?></h6>
			</div>

			<div
				style="text-align: right; position: absolute; right: 5px; bottom: 0px">
				<span class="badge ds-component"
					data-componentid="badge<?php echo $a+2; ?>">
            	  Views ： <?php echo $rs['post_hits'] ?></span> <a
					class="btn ds-component"
					href="single.php?id=<?php echo $rs['ID']  ?>"
					data-componentid="button<?php echo $a+2; ?>"> View details </a>
			</div>

		</div> 
      
   		  <?php } ?>           
	<?php if($a%3==0){ ?>
		 </div>
	<br /> <?php }?>          
  
 	 <?php

}
include "footer-nav.php";
include "footer.php";
?>      
       