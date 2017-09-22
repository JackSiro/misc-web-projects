<?php include AS_THEME."as_header.php" ?>
				</div>
			</div>

			<div id="main" class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2>Sorry for Loosing your password</h2>
							<?php
							if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
								
							foreach($_SESSION['ERRMSG_ARR'] as $msg) {
							echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
							}
							unset($_SESSION['ERRMSG_ARR']);
							} ?>
						<span class="byline">Fill in the form below to get assistance on recovering your pasword</span>
					</header>
					<div class="row">
						<div class="12u">
							<section>
							  <form action="index.php?action=forgot_password" method="post" >
								<table style="width:100%;font-size:20px;">
									<tr>
										<td>Enter your username (*required)</td>
									<input type="text" name="username" id="username" autocomplete="off" required autofocus  /></td>
									</tr>
									<tr><td>Enter your email (*required)</td>
								</td><td>
								<input type="email" name="email" id="email" autocomplete="off" required autofocus />
								</td></tr>
								</table>
								<input type="submit" id="submitBtn" name="ForgotPassword" value="Forgot Password" />
							
							  </form>
						</section>
						</div>
					</div>
				</section>
			</div>
  <?php include AS_THEME."as_footer.php" ?>
    
