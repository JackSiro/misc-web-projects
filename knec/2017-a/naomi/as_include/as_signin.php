<?php include AS_THEME."as_header.php" ?>				
				</div>
			</div>

			<div id="main" class="wrapper style1">
				<section class="container">
					<header class="major">
						<h2>Sign In</h2>
						<span class="byline">Sign In to Your Account to Continue</span>
					</header>
					<div class="row">
						<div class="12u">
							<section>
								<?php
									if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
										
									foreach($_SESSION['ERRMSG_ARR'] as $msg) {
									echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
									}
									unset($_SESSION['ERRMSG_ARR']);
									} ?>
									<form action="index.php?action=login" method="post" >
										<p><span>Enter your username</span><input type="text" name="username" id="username" required autofocus maxlength="20" /></p>
										<p><span>Enter your password</span><input type="password" name="password" id="password" required maxlength="20" /></p>
										<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="submitBtn" name="SignMeIn" value="Sign In" /></p>		
									</form>
							</section>
						</div>
					</div>
				</section>
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
