<?php include AS_THEME."as_header.php" ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Sorry for Loosing your password</h2>
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
		  <h2>Fill in the form below to get assistance on recovering your pasword</h2>
          <form action="index.php?action=forgot_password" method="post" >
			<table style="width:100%;font-size:20px;">
				<tr>
					<td>Enter your username (*required)</td>
				<input type="text" class="required input_field" name="username" id="username" autocomplete="off" required autofocus  /></td>
				</tr>
				<tr><td>Enter your email (*required)</td>
			</td><td>
			<input type="email" name="email" id="email" autocomplete="off" required autofocus />
			</td></tr>
			</table>
			<input type="submit" class="submit_btn float_l" id="submitBtn" name="ForgotPassword" value="Forgot Password" />
        
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