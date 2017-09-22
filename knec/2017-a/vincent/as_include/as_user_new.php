<?php include AS_THEME."as_header.php"; ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Add a User</h2>
            <div class="col_w340 float_l">
                <div id="contact_form">
				<form role="form" method="post" name="PostUser" action="index.php?action=user_new">
					<label for="text">First  Name</label> 
					<input type="text" class="required input_field" autocomplete="off" name="fname"/>
					<div class="cleaner h10"></div>  
					<label for="text">Second Name</label> 
					<input type="text" class="required input_field" autocomplete="off" name="surname"/>
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
					
					<input type="submit" class="submit_btn float_l" id="submitBtn" name="AddUser" value="Save & Add">
					<input type="submit" class="submit_btn float_l" id="submitBtn" name="AddClose" value="Save & Close"/>
					<div class="cleaner h10"></div>
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