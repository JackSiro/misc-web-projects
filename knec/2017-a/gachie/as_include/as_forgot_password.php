<?php include AS_THEME."as_header.php" ?>
		<div id="content">
            <div id="featured">
            <h2>Sign In to Your Account to Continue</h2>
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
			<input type="submit" id="aalogin-button" name="SignMeIn" class="submit" value="Sign In" />
        
      </form>
	  </span>
	  </center>
		  
		</div>
      </div>
<?php include AS_THEME."as_footer.php" ?>
    
