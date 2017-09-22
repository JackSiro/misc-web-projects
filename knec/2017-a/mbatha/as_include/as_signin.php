<?php include AS_THEME."as_header.php" ?>
	<div id="site_content">	

	  <div id="content"> 
       
		
        <div class="content_item">
		  
		  <form action="index.php?action=signin" method="post" >
		    <?php as_feedback_message() ?>
			<input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" />
			<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" />
			<br><input type="submit" id="aasignin-button" name="SignMeIn" value="Sign In" />
        
		  </form>
		  <hr class="small_hr"><a href="index.php?action=forgot_password">Forgot PassWord?</a>
		   <hr class="small_hr"><a href="index.php?action=forgot_username">Forgot Username?</a>
		  <br>
	    </div>
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
  <?php include AS_THEME."as_footer.php" ?>
    
