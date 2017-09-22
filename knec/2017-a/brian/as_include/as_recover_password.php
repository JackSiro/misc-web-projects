<?php include AS_THEME."as_header.php" ?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		  <h1>Password Recovery Center</h1>
		  	<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
			} ?>	  
		  <br>		  
		  <hr><br>
		  <h2>Reset Your Password</h2>
			<form action="index.php?action=recover_password" method="post" >
			<input type="hidden" name="username" value="<?php echo $_SESSION['recover_password'] ?>" />
			<div class="form_settings">
				<p><span>New Password (*required)</span><input type="password" name="password" id="password" autocomplete="off" required autofocus  maxlength="20"/></p>
				<p><span>Confirm Password (*required)</span><input type="password" name="passwordcon" id="passwordcon" autocomplete="off" required autofocus maxlength="20" /></p>
			<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="aasignin-button" name="RecoverPassword" value="Reset Password" /></p>
        
      </form>
      </div>
    </div>
  <?php include AS_THEME."as_footer.php" ?>
    
