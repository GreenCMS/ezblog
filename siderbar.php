<body>

	<div class="container-fluid"></div>
	<div class="row-fluid"
		style="background-color: white; padding: 10px 10px 10px 10px;">




		<div class="span3">
			<div class="well sidebar-nav">
				<ul class="nav nav-list">
					<li class="nav-header">
						<h2>友情链接</h2>
					</li>
      		  	<?php
							$sql = "select * from `links`  ";
							$query = mysql_query ( $sql ) or die ( "GET LINKS failed" );
							
							
									while ( $rs = mysql_fetch_array ( $query ) ) {
										?>
								<li><a href="<?php echo $rs['url_site']?>"><?php echo $rs['url_name']?></a></li>

	<?php	}	?>
	
	
	
	<li class="nav-header">
						<h2>最新文章</h2>
					</li>
		<?php
		@$sql = "select * from `posts` order by `ID` desc limit 0,10 ";
		$query = mysql_query ( $sql ) or die ( "GET posts failed" );
		for($i=0;$i<10;$i++){
			$rs = mysql_fetch_array ( $query);
			echo "<li><a href=".get_post_link()."> ".get_post_content_short(0, 40)."</a></li>";
		}
		
		 ?>
	
	<li class="nav-header">
						<h2>最热文章</h2>
					</li>
		<?php
		$sql = "select * from `posts` order by post_hits desc limit 0,10 ";
		$query = mysql_query ( $sql ) or die ( "GET posts failed" );
		for($i=0;$i<10;$i++){
			$rs = mysql_fetch_array ( $query);
			echo "<li><a href=".get_post_link()."> ".get_post_content_short(0, 40)."</a></li>";
		}
		?>
	
		<li class="nav-header">
						<h2>管理</h2>
					</li>
					<li><a href="adminold">Dashboard</a></li>
					<li><a href="http://www.zts1993.com">Z BLOG</a></li>
				</ul>
				<br />
			</div>
		</div>
		<!-- </div>
        
        
        <div class="span4"> -->

		<div class="span9">