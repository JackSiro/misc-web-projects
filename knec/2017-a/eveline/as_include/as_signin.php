<?php include AS_THEME."as_header.php" ?>
<div id="tooplate_main">

	<div class="col_w900 col_w900_last">
	
        <div class="col_w420 float_l">
          	<h3>Sign in to your Account</h3>
          	<div id="cp_contact_form">

                <form action="index.php?action=signin" method="post" >

                	<label for="author">User name:</label> <input type="text" class="input_field" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" />
                    <div class="cleaner h10"></div>
                            
                    <label for="email">Password:</label> <input type="password" class="input_field" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" />
                    <div class="cleaner h10"></div>
                    
                    <!--<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />-->
                    <input type="submit" id="reset" name="SignMeIn" value="Sign In" class="submit_btn float_r" />
                    
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
    
