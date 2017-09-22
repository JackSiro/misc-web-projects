<?php include JS_THEME."js_header.php" ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_leave">
		  <center>		  
		  <br>
		  <h1>Log In to Your Account</h1>
		  	<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
			} ?>	  
		  <br>		  
		  <hr><br>
          <form class="signin" action="index.php?js_pageaction=login" method="post" >
			<input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" />
			<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" />
			<input type="submit" id="aalogin-button" name="SignMeIn" value="Log In" />
        
      </form></center>
		  
		</div><!--close content_leave-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
  <?php include JS_THEME."js_footer.php" ?>
    
