<?php include AS_THEME."as_header.php" ?>
				</div>
			</div>

			<div id="main" class="wrapper style1">
				<section class="container">
					<header class="major">
						<h2>Password Recovery Center</h2>
							<?php
							if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
								
							foreach($_SESSION['ERRMSG_ARR'] as $msg) {
							echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
							}
							unset($_SESSION['ERRMSG_ARR']);
							} ?>	
						<span class="byline">Reset Your Password</span>
					</header>
					<div class="row">
						<div class="12u">
							<section>
								<form action="index.php?action=recover_password" method="post" >
								<input type="hidden" name="username" value="<?php echo $_SESSION['recover_password'] ?>" />
								<table style="width:100%;font-size:20px;">
									<p><span>New Password (*required)</td>
									<input type="password" name="password" id="password" autocomplete="off" required autofocus  maxlength="20"/></p>
									<tr><td>Confirm Password (*required)</td>
								<td>
								<input type="password" name="passwordcon" id="passwordcon" autocomplete="off" required autofocus maxlength="20" />
								</td></tr>
								</table>
								<input type="submit" id="submitBtn" name="RecoverPassword" value="Reset Password" />							
						  </form>
						</section>
						</div>
					</div>
				</section>
			</div>
  <?php include AS_THEME."as_footer.php" ?>
    
