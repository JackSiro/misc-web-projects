<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['nyakeminchasecondary_account'] ) ? $_SESSION['nyakeminchasecondary_account'] : "";
	?>
	<div id="site_content">	

	  <div id="content"> 
        <?php include JS_THEME."js_sidebar.php" ?>
	  
        <div class="content_item">
		<br>
			<div class="main_content" align="center">
			<?php include "js_slide/index.php" ?>
			   
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
