<?php include AS_THEME."as_header.php" ?>
	<div id="site_content">	

	  <div id="content"> 
        
		
        <div class="content_item">
		  <br>
		  <div class="main_body" >
			  <h1>Sign In to Your Account to Continue</h1>
				<?php
				if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
					
				foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<div class="error" id="error">',$msg,'</div>'; 
				}
				unset($_SESSION['ERRMSG_ARR']);
				} ?>	  
			  <br>		  
			  <hr><br>
			  <form action="index.php?action=login" method="post" >
				<input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" />
				<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" />
				<input type="submit" id="aalogin-button" name="SignMeIn" value="Sign In" />
			
				</form>
				<br>
			</div>
			<div class="left_panel" >
			  <img src="as_media/complaint.png" />				
			</div>
		</div>
      </div>   
	</div><!--close site_content-->  	
  </div><!--close main-->
  <?php include AS_THEME."as_footer.php" ?>