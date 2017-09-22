<?php include AS_THEME."as_header.php" ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Username Recovery Center</h2>
            <div class="col_w340 float_l">
                <div id="contact_form">
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
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div> <!-- end of a content box -->
        
	</div>
<?php include AS_THEME."as_footer.php" ?>