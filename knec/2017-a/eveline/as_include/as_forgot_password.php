<?php include AS_THEME."as_header.php" ?>
<div id="tooplate_main">
	<div class="col_w900">
        <h2>Sorry for Loosing your password</h2>
        <p>Fill in the form below to get assistance on recovering your pasword</p>
    </div>
	
	<div class="col_w900 col_w900_last">
	
        <div class="col_w420 float_l">
          	<h3>Reset your Password</h3>
          	<div id="cp_contact_form">
                <form action="index.php?action=forgot_password" method="post" >

                	<label for="author">Enter your username (*required)</label> <input type="text" class="input_field" name="username" id="username" autocomplete="off" required autofocus maxlength="20" />
                    <div class="cleaner h10"></div>
                            
                    <label for="email">Enter your email (*required):</label> <input type="text" class="input_field" name="email" id="email" autocomplete="off" required maxlength="20" />
                    <div class="cleaner h10"></div>
                    
                    <!--<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />-->
                    <input type="submit" id="reset" name="ForgotPassword" value="Forgot Password"  class="submit_btn float_r" />
                    
            	</form>

            </div>
        </div>
        
        <div class="col_w420 float_r" id="map">
            <h3>Have a problem signin up?</h3>
            
            <div class="cleaner h30"></div>
            <a href="index.php?action=forgot_password">Forgot PassWord?</a>
			<hr class="small_hr"><a href="index.php?action=forgot_username">Forgot Username?</a>
        </div>
		
        <div class="cleaner"></div>
    </div>
</div>
<?php include AS_THEME."as_footer.php" ?>