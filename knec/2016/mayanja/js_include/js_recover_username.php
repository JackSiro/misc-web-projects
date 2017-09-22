<?php include JS_THEME."js_header.php" ?>
	<section id="content">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">
			<center>
            <h2 class="h2-line-2">Username Recovery Center</h2>
		  	<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
			} ?>	  
		  <br>		  
		  <hr><br>
		  <h2>Username recovery was successful as:</h2>
			<h2><?php echo $_SESSION['recover_username'] ?></h2><hr>
			<a href="index.php"><h1>>> Now Login In >></h1></a>
		  </center>
		  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </section>
  <?php include JS_THEME."js_footer.php" ?>
    
