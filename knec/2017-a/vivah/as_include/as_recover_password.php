<?php include AS_THEME."as_header.php" ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
        <h2>Password Recovery Center</h2>
    </div>
	
	<div class="col_w900 col_w900_last">
	
        <div class="col_w420 float_l">
          	<h3>Reset your Password</h3>
          	<div id="contact_form">
                <form action="index.php?action=recover_password" method="post" >

                	<label for="author">New Password (*required)</label> <input type="password" class="input_field" name="password" id="password" autocomplete="off" required autofocus maxlength="20" />
                    <div class="cleaner_h10"></div>
                            
                    <label for="email">Confirm Password  (*required):</label> <input type="password" class="input_field" name="password" id="password" autocomplete="off" required maxlength="20" />
                    <div class="cleaner_h10"></div>
                    
                    <!--<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />-->
                    <input type="submit" id="reset" name="RecoverPassword" value="Reset Password"  class="submit_btn float_r" />
                    
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
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>