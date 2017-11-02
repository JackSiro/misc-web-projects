<?php include AS_THEME."as_header.php" ?>
<div id="tooplate_content">	
	<div class="cleaner_h40"></div>
                
    <div class="col_w460">
       	<div id="contact_form">
		
        	<h4>Sign In to Your Account to Continue</h4>
			<form action="index.php?action=login" method="post" >
				<label for="username">Enter your username:</label> <input type="text" id="username" name="username" class="required input_field" />
				<div class="cleaner_h10"></div>
							
				<label for="password">Enter your password:</label> <input type="password" class="required input_field" name="password" id="password" />
				<div class="cleaner_h10"></div>
				     
				<input type="submit" value="Sign In" id="submit" name="SignMeIn" class="submit_btn float_l" />
	
			</form>

        </div>
   	</div>
    <div class="cleaner"></div>
</div>     		
    <div class="cleaner"></div>
    <div class="cleaner"></div>

<?php include AS_THEME."as_footer.php" ?>
    
