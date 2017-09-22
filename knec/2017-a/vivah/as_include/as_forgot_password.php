<?php include AS_THEME."as_header.php" ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
					<h2>Sorry for Loosing your password</h2>
				<div class="cleaner_h10"></div>
				<div id="gallery_container">
					<p>Fill in the form below to get assistance on recovering your pasword</p>
					<div id="contact_form">
						<form action="index.php?action=forgot_password" method="post" >

							<input type="text" class="input_field" name="username" id="username" autocomplete="off" required autofocus maxlength="20" placeholder="Enter your username"/>
							<div class="cleaner_h10"></div>
									
							<input type="text" class="input_field" name="email" id="email" autocomplete="off" required maxlength="20" placeholder="Enter your email"/>
							<div class="cleaner_h10"></div>
							
							<input type="submit" id="reset" name="ForgotPassword" value="Forgot Password"  class="submit_btn float_l" />
							
						</form>
					</div>
                </div>
                
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>