<?php include JS_THEME."js_header.php" ?>
		<section id="newsletter" class="text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wow fadeInDown" data-wow-delay="2000">
						<h3>LOGIN TO YOUR ACCOUNT</h3>
					</div>
					
			<!--<input type="submit" id="aalogin-button" name="SignMeIn" value="Sign In" />-->
       			<div class="col-md-2"></div>
					<div class="col-md-8">
						<p>Please login to continue</p>
					</div>
					<div class="col-md-2"></div>
					<form action="index.php?action=login" method="post" >
						<div class="col-md-12 wow fadeInLeft" data-wow-delay="2000">
							<input type="text" placeholder="Enter your username" name="username" class="form-control" autocomplete="off" required>
						</div>
						<div class="col-md-12 wow fadeInDown" data-wow-delay="2000">
							<input type="password" placeholder="Enter your password" name="password" class="form-control" autocomplete="off" required>
						</div>
						
						<div class="col-md-12 wow fadeInUp" data-wow-delay="2000">
							<input type="submit" name="SignMeIn" value="SIGN IN" />
						</div>
						<div class="col-md-3"></div>
						
						<div class="col-md-3"></div>
					</form>
				</div>
			</div>
			
		</section>

  <?php include JS_THEME."js_footer.php" ?>
    
