<?php include AS_THEME."as_header.php" ?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		  <h1>Sorry for Loosing your username</h1>
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
				<p><span>Enter your password (*required)</span><input type="password" name="password" id="password" autocomplete="off" required maxlength="20" /></p>
			<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="aasignin-button" name="ForgotUsername" value="Forgot Username" /></p>
        
      </form>
      </div>
    </div>
  <?php include AS_THEME."as_footer.php" ?>
    
