<?php include AS_THEME."as_header.php" ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Sign In to Your Account to Continue</h2>
            <div class="col_w340 float_l">
                <div id="contact_form">
					<form action="index.php?action=login" method="post" >
						<label for="text">Enter your username</label> <input type="text" class="required input_field" name="username" id="username" required autofocus maxlength="20"/>
						<div class="cleaner h10"></div>                
						<label for="text">Enter your password</label> <input input type="password" class="required input_field" name="password" id="password" required maxlength="20"/>
						<div class="cleaner h10"></div>                
						<input type="submit" class="submit_btn float_l" id="submitBtn" name="SignMeIn" value="Sign In" />
						              		
					</form>
                </div> 
            </div>
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div>
	</div>
<?php include AS_THEME."as_footer.php" ?>