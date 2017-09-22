<?php include AS_THEME."as_header.php" ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">			
              <div class="panel">
				<h2>Sign Up your account now!!!</h2>
                <div class="cleaner_h10"></div>
				<div class="col_380 float_l">
					<div id="contact_form">
						<form role="form" method="post" name="Sign_MeUp" action="index.php?action=signup" enctype="multipart/form-data" >
							<label for="text">First Name:</label><input  type="text" autocomplete="off" name="fname" required class="input_field" />
							<div class="cleaner_h10"></div>
							<label for="text">Second Name:</label><input  type="text" autocomplete="off" name="surname" required class="input_field" />
							<div class="cleaner_h10"></div>
							<label for="text">Email Address:</label><input  type="text" autocomplete="off" name="email" required class="input_field" />
							<div class="cleaner_h10"></div>
							<label for="text">Mobile (Optional):</label><input  type="text" autocomplete="off" name="mobile"class="input_field" />
							<div class="cleaner_h10"></div>
							<label for="text">Preferred Username:</label><input  type="text" autocomplete="off" name="username" required class="input_field" />
							<div class="cleaner_h10"></div>
							<label for="text">Preferred Password:</label><input  type="password" autocomplete="off" name="password" required class="input_field" />
							<div class="cleaner_h10"></div>
							<label for="text">Confirm Password:</label><input  type="password" autocomplete="off" name="passwordcon" required class="input_field" />
									<div class="cleaner_h10"></div>
							 <input type="submit" id="reset" name="SignMeUp" value="Sign Up" class="submit_btn float_l"/>
									<div class="cleaner_h10"></div>	
						</form>
					</div>
				</div>
				<div class="col_270 float_r">
					<div id="contact_form">
					
					</div>
				</div>
				<div class="cleaner"></div>
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
