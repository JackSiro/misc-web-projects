<?php include AS_THEME."as_header.php" ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
					<h2>Sorry for Loosing your username</h2>
				<div class="cleaner_h10"></div>
				<div id="gallery_container">
					<p>Fill in the form below to get assistance on recovering your username</p>
					<div id="contact_form">
						 <form action="index.php?action=forgot_username" method="post" >
							<label for="author">Enter your email (*required)</label> <input type="text" class="input_field" name="username" id="username" autocomplete="off" required autofocus maxlength="20" />
							<div class="cleaner_h10"></div>
									
							<label for="email">Enter your password (*required):</label> <input type="password" class="input_field" name="password" id="password" autocomplete="off" required maxlength="20" />
							<div class="cleaner_h10"></div>
							
							<!--<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />-->
							<input type="submit" id="reset" name="ForgotPassword" value="Forgot Password"  class="submit_btn float_l" />
							
						</form>
					</div>
                </div>
                
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>