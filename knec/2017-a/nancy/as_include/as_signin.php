<?php include AS_THEME."as_header.php" ?>
<div id="tooplate_main_wrapper">
    <div id="tooplate_top"></div>
	
    <div id="tooplate_main">
        <div id="tooplate_content_wrapper">
        	<div id="tc_top"></div>
			
        	<div id="tooplate_content">
				<div id="contact_form">
               	
                <div class="post_box">
					<h2 class="meta">Sign In to Continue</h2>
                    <div class="cleaner"></div>
                         
                  <form action="index.php?action=signin" method="post" >
					<?php as_feedback_message() ?>
					<input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" class="required input_field"  />
							<div class="cleaner h10"></div>
					<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" class="required input_field" />
							<div class="cleaner h10"></div>
							
					<br><input type="submit" id="submit" name="SignMeIn" value="Sign In"class="submit_btn float_l" />
				  </form>
                    <div class="cleaner"></div>
                </div>
                </div>
            </div>
			
            <div id="tc_bottom"></div>
        </div>         
        <div class="cleaner"></div>
    </div>
    
<?php include AS_THEME."as_footer.php" ?>
    
