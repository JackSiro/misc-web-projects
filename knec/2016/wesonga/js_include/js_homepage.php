<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_user ORDER BY userid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
	  <div id="content"> 
       
        <div class="content_user">
		<?php include "js_slide/index.php" ?>
			   <hr>
				<?php echo js_get_option('description') ?>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_user-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
