<?php include AS_THEME."as_header.php" ?>		
		<div id="featured">
			<div class="container">
				<div class="row">
					<section class="12u">
						<div class="box">
							
							<h3>Sign In to Your Account to Continue</h3>
							<p> 
								<form action="index.php?action=login" method="post" >
									<p><input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" /></p>
									<p><input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" /></p><br>
									<p><input type="submit" id="submitBtn" class="button" name="SignMeIn" value="Sign In" /></p>
								</form>
							</p>
						</div>
					</section>
				</div>
				<div class="divider"></div>
			</div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
