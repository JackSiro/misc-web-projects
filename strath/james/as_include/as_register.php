<?php include AS_THEME."as_header.php"; ?>
<div id="tooplate_content">	
	<div class="cleaner_h40"></div>
                
    <div class="col_w460">
       	<div id="contact_form">
        	<h4>Register your account now!</h4>
			<form action="index.php?action=register" method="post"  enctype="multipart/form-data">
				<label for="fname">First Name:</label> <input type="text" id="fname" name="fname" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="surname">Last Name:</label> <input type="text" id="surname" name="surname" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="avatar">Upload User Avatar:</label> <input name="avatar" autocomplete="off" type="file" accept="image/*" class="required input_field"/>
				<div class="cleaner_h10"></div>
				<label for="email">Email Address:</label> <input type="email" id="email" name="email" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="mobile">Mobile (Optional):</label> <input type="text" id="mobile" name="mobile" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="username">Preferred Username:</label> <input type="text" id="username" name="username" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="password">Preferred Password:</label> <input type="password" id="password" name="password" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="passwordcon">Confirm Password:</label> <input type="password" id="passwordcon" name="passwordcon" class="required input_field" />
				<div class="cleaner_h10"></div>
				<input type="submit" value="Register" id="submit" name="Register" class="submit_btn float_l" />
	
			</form>

        </div>
   	</div>
    <div class="cleaner"></div>
</div>     		
    <div class="cleaner"></div>
    <div class="cleaner"></div>

<?php include AS_THEME."as_footer.php" ?>
    
