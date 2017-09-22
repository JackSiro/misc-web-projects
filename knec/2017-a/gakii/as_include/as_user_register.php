<?php include AS_THEME."as_header.php"; ?>
<div id="tooplate_main">  
    <h2>Register your account now!!!</h2>
		<div id="contact_form">  
			<form role="form" method="post" name="PostUser" action="index.php?action=register">
				<label for="email">First  Name:</label><input type="text" autocomplete="off" name="fname" class="required input_field" /> 
				<div class="cleaner h10"></div>
		
				<label for="email">Second Name:</label><input type="text" autocomplete="off" name="surname" class="required input_field" >
				<div class="cleaner h10"></div>
				
				<label for="email">Email Address:</label><input type="text" autocomplete="off" name="email" class="required input_field" >
				<div class="cleaner h10"></div>
		
				<label for="email">Mobile (Optional):</label><input type="text" autocomplete="off" name="mobile" class="required input_field" >
				<div class="cleaner h10"></div>
		
				<label for="email">Preferred Username:</label><input type="text" autocomplete="off" name="username" class="required input_field" ></p>		
				<label for="email">Preferred Password:</label><input type="password" autocomplete="off" name="password" class="required input_field" >
				<div class="cleaner h10"></div>
		
				<label for="email">Confirm Password:</label><input type="password" autocomplete="off" name="passwordcon" class="required input_field" >
				<div class="cleaner h10"></div>
				<input type="submit" value="Register" id="submit" name="Register" class="submit_btn float_l" />
			</form>	
	</div>          	
	<div class="cleaner"></div>       
</div>
<?php include AS_THEME."as_footer.php" ?>