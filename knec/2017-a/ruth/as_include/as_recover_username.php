<?php include AS_THEME."as_header.php" ?>
		<div id="site_content">
	<?php include AS_THEME."as_sidebar.php" ?>
	<?php include AS_THEME."as_sidebar.php" ?>
      <div>
        <h1>Username Recovery Center</h1>
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
		
	</div>
</div>	
  <?php include AS_THEME."as_footer.php" ?>
    
