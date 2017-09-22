<?php include JS_THEME."js_header.php" ?>
	<section id="content">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">
            <h2 class="h2-line-2">Sign In to Your Account to Continue</h2>
			 </div>
		  	<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<div class="error" id="error">',$msg,'</div>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
			} ?>	  
		  <center><span class="clr-1 it-bold">
          <form action="index.php?action=login" method="post" >
			<input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" />
			<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" />
			<input type="submit" id="aalogin-button" name="SignMeIn" value="Sign In" />
        
      </form>
	  </span>
	  </center>
		  
		</div>
      </div>
	</div>	
  </div>
  </section>
<?php include JS_THEME."js_footer.php" ?>
    
