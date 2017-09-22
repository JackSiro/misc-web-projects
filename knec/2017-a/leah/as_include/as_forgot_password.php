<?php include AS_THEME."as_header.php" ?>
		<div id="featured">
			<div class="container">
				<div class="row">
					<section class="12u">
						<div class="box">
							
							<h3>Sorry for Loosing your password</h3>
							<?php
							if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
								
							foreach($_SESSION['ERRMSG_ARR'] as $msg) {
							echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
							}
							unset($_SESSION['ERRMSG_ARR']);
							} ?>	  
						  <br>		  
						  <hr><br>
						  <h2>Fill in the form below to get assistance on recovering your password</h2>
						  
							<form action="index.php?action=forgot_password" method="post" >
							  <div class="form_settings">
								<p><input type="text" name="email" id="email" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" /></p>
								<p><input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" /></p>
								<p><input type="submit" id="aalogin-button" name="ForgotPassword" class="button" value="Forgot Password" /></p>
								</div>
							</form>
						</div>
					</section>
				</div>
				<div class="divider"></div>
			</div>
		</div>	
<?php include AS_THEME."as_footer.php" ?>
    
