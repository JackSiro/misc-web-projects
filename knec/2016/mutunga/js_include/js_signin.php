<?php include JS_THEME."js_header.php" ?>
	<div id="site_content">	

	  <div id="content"> 
       
		
        <div class="content_item">

		  <center> 
         <?php include JS_THEME."js_slide.php" ?>		  
		 	
		 <div class="aboutus">
			<h1>Welcome to <?php echo js_get_option('sitename') ?></h1><hr>
			<p><?php echo js_get_option('description') ?><br>
			Please Login to your account to continue</p>
		</div>
          <form class="signin" action="index.php?action=login" method="post" >
			<input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" />
			<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" />
			<input type="submit" id="aalogin-button" name="SignMeIn" value="Sign In" />
        
      </form></center>
		  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
  <?php include JS_THEME."js_footer.php" ?>
    
