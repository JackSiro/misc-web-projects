<?php include AS_THEME."as_header.php" ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
                  <h2>Sign in to your Account</h2>
                <div class="cleaner_h10"></div>
                <div id="gallery_container">
                  <div id="contact_form">
                    <form method="post" name="contact" action="index.php?action=signin" >
						<label for="text">Enter your username:</label><input type="text" class="input_field" name="username" id="username" autocomplete="off" required autofocus maxlength="20" />
						<div class="cleaner_h10"></div>
					     
						<label for="text">Enter your password:</label><input type="password" class="input_field" name="password" id="password" autocomplete="off" required maxlength="20" />
						<div class="cleaner_h10"></div>
					  
					  <div class="cleaner_h10"></div>
					  
                      <input type="submit" class="submit_btn float_l" name="SignMeIn" id="submit" value="Sign In" />
					  
                    </form>
                  </div>
                </div>
                
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
