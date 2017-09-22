<?php include AS_THEME."as_header.php" ?>
    <div id="tooplate_main">
        <div id="tooplate_content">
		<h2>Sign In to Your Account to Continue</h2>
                    
          	<div class="col_w570">
                <div id="contact_form">
            
                    
                    <form action="index.php?action=login" method="post" >						
						<label for="subject">Username:</label> <input type="text" class="validate-subject required input_field" name="username" id="username" /> 
						<div class="cleaner h10"></div> 
						
						<label for="password">Password:</label> <input type="password" class="validate-email required input_field" name="password" id="password" /> 
						<div class="cleaner h10"></div> 
	
						<input type="submit" id="submit" name="SignMeIn" value="Sign In" class="submit_btn float_r" /> 
					</form> 
            
                </div> 
            </div> 
        </div>
    </div> 
    
<?php include AS_THEME."as_footer.php" ?>
    
