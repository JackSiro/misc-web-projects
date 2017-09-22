<?php include AS_THEME."as_header.php" ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Register your account now!!!</h2>
            <div class="col_w340 float_l">
                <div id="contact_form">
				<form role="form" method="post" name="PostUser" action="index.php?action=register">
                <table style="width:100%;font-size:20px;">
				
				<label for="text">First  Name</label> 
				<input type="text" class="required input_field" autocomplete="off" name="fname"/>
						<div class="cleaner h10"></div>  
				<label for="text">Second Name</label> 
				<input type="text" class="required input_field" autocomplete="off" name="surname"/>
						<div class="cleaner h10"></div>  
				<label for="text">Upload User Avatar</label> 
				<input name="avatar" autocomplete="off" type="file" accept="image/*"/>
						<div class="cleaner h10"></div>  
                
				<label for="text">Email Address</label> 
				<input type="text" class="required input_field" autocomplete="off" name="email"/>
						<div class="cleaner h10"></div>  
				
				<label for="text">Mobile (Optional)</label> 
				<input type="text" class="required input_field" autocomplete="off" name="mobile"/>
						<div class="cleaner h10"></div>  
				
				<label for="text">Preferred Username</label> 
				<input type="text" class="required input_field" autocomplete="off" name="username"/>
						<div class="cleaner h10"></div>  
				
				<label for="text">Preferred Password</label> 
				<input input type="password" class="required input_field" autocomplete="off" name="password"/>
						<div class="cleaner h10"></div>  
				
				<label for="text">Confirm Password</label> 
				<input input type="password" class="required input_field" autocomplete="off" name="passwordcon"/>
						<div class="cleaner h10"></div>  
				
				<input type="submit" class="submit_btn float_l" id="submitBtn" name="Register" value="Register">
			  </p>		
			</form>
                </div> 
            </div>
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div> <!-- end of a content box -->
        
	</div>
<?php include AS_THEME."as_footer.php" ?>