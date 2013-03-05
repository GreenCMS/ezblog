<?php
include ("common/db_config.php");

include "header.php";
include "header-nav.php";
include "siderbar.php";
@$id=$_GET ['id'];
if (! empty ($id )) {
	$rs=get_post_by_id( $id ) ;
	hit_post_by_id( $id ) ;
	if($rs==''){
		header("location:./404.php");
	}
}
else{
	header("location:./404.php");
}
?>

<div class="content">
	 
	<hr class="ds-component" data-componentid="hr1" />
	<div class="title">
		<h1><?php echo get_post_title() ; ?></h1>
		<h6 align="right">发布于 <?php echo get_post_time() ; ?> 浏览:<?php echo get_post_hit() ; ?></h6>
	</div>
	<hr class="ds-component" data-componentid="hr1" />
	<br />
	<div class="hero-unit ds-component">
		<p><?php echo get_post_content() ; ?></p>

	</div>


	<hr />
	<div class="post-related">
		<?php echo  get_other_post()  ; ?>	
	</div>


</div>
<?php include ("include/duoshuo.php"); ?>



<?php
	include "footer-nav.php";
include "footer.php";
?>
