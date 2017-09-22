<?php include AS_THEME."as_header.php" ?>
<div id="tooplate_main">        
	<h2>Manage Site Options</h2>
	<div id="contact_form">            
		<form method="post" name="contact" action="#"> 
			<label for="author">Username:</label> <input type="text" id="username" name="username" class="required input_field" /> 
		<div class="cleaner h10"></div> 

		<label for="email">Password:</label> <input type="password" class="validate-email required input_field" name="password" id="password" /> 
		<div class="cleaner h10"></div>

		<input type="submit" value="Sign In" id="submit" name="SignMeIn" class="submit_btn float_l" />			
		</form>	
	</div>          	
	<div class="cleaner"></div>       
</div>
<?php include AS_THEME."as_footer.php" ?>