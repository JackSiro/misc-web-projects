<?php include AS_THEME."as_header.php" ?>
<?php include AS_THEME."as_header.php" ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Password Recovery Center</h2>
            <div class="col_w340 float_l">
                <div id="contact_form">	
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
				<label for="text">New Password (*required)</td>
				<input input type="password" class="required input_field" name="password" id="password" autocomplete="off" required autofocus  maxlength="20"/></p>
				<tr><td>Confirm Password (*required)</td>
			<td>
			<input input type="password" class="required input_field" name="passwordcon" id="passwordcon" autocomplete="off" required autofocus maxlength="20" />
			</td></tr>
			</table>
			<input type="submit" class="submit_btn float_l" id="submitBtn" name="RecoverPassword" value="Reset Password" />
        
      </form>
                </div> 
            </div>
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div> <!-- end of a content box -->
        
	</div>
<?php include AS_THEME."as_footer.php" ?>