<?php include JS_THEME."js_header.php" ?>
	<section id="content">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">
            <h2 class="h2-line-2">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">Password Recovery Center</div>
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
			<table style="width:100%;font-size:20px;">
				<tr>
					<td>New Password (*required)</td>
					<td><input type="password" name="password" id="password" autocomplete="off" required autofocus  maxlength="20"/></td>
				</tr>
				<tr><td>Confirm Password (*required)</td>
			<td>
			<input type="password" name="passwordcon" id="passwordcon" autocomplete="off" required autofocus maxlength="20" />
			</td></tr>
			</table>
			<input type="submit" id="aalogin-button" name="RecoverPassword" value="Reset Password" />
        
      </form>
		  </center>
		 
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </section>
  <?php include JS_THEME."js_footer.php" ?>
    
