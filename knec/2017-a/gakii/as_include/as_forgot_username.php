<?php include AS_THEME."as_header.php" ?><div id="site_content">                         <h1>Sorry for Loosing your username</h2>
		  	<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
			} ?>	  
		  <br>		  
		  <hr><br>
		  <h2>Fill in the form below to get assistance on recovering your username</h2>
          <form action="index.php?action=forgot_username" method="post" >
			<div class="form_settings">
				<p><span>Enter your email (*required)</span><input type="text" name="username" id="username" autocomplete="off" required autofocus  /></p>
				<p><span>Enter your password (*required)</span>
				<input type="password" name="password" id="password" autocomplete="off" required maxlength="20" />
				</p>
			<br>
			<p><input type="submit" id="aalogin-button" name="ForgotUsername" class="readmore" value="Forgot Username" /></p>
        </div>
      </form>	</div></div>	
  <?php include AS_THEME."as_footer.php" ?>
    
