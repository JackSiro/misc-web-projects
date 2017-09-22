<?php include AS_THEME."as_header.php" ?>
<div id="tooplate_main">

	<div class="col_w900 col_w900_last">
		<h1>Sign Up your account now!!!</h1>
		<div id="cp_contact_form">
		<form role="form" method="post" name="Sign_MeUp" action="index.php?action=signup" enctype="multipart/form-data" >
            <label for="author">First  Name:</label> <input  type="text" autocomplete="off" name="fname" required class="input_field"/>
            <div class="cleaner h10"></div>
			<label for="author">Second  Name:</label> <input  type="text" autocomplete="off" name="surname" required class="input_field"/>
            <div class="cleaner h10"></div>
			<label for="author">Email Address:</label> <input  type="text" autocomplete="off" name="email" required class="input_field"/>
                    <div class="cleaner h10"></div>
				
			<label for="author">Mobile (Optional):</label> <input  type="text" autocomplete="off" name="mobile"class="input_field"/>
                    <div class="cleaner h10"></div>
				
			<label for="author">Preferred Username:</label> <input  type="text" autocomplete="off" name="username" required class="input_field"/>
                    <div class="cleaner h10"></div>
				
			<label for="author">Preferred Password:</label> <input  type="password" autocomplete="off" name="password" required class="input_field"/>
                    <div class="cleaner h10"></div>
				
			<label for="author">Confirm Password:</label> <input  type="password" autocomplete="off" name="passwordcon" required class="input_field"/>
                    <div class="cleaner h10"></div>
			 <input type="submit" id="reset" name="SignMeUp" value="Sign Up" class="submit_btn float_r"/>
                    <div class="cleaner h10"></div>	
		</form>
		</div>
        <div class="cleaner"></div>
    </div>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
