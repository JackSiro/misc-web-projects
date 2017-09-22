<?php include AS_THEME."as_header.php"; ?>
				</div>
			</div>

			<div id="main" class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2>Register your account now!!!</h2>
					</header>
					<div class="row">
						<div class="12u">
							<section>
          
				<form role="form" method="post" name="PostStudent" action="index.php?action=register" >
                <table style="width:100%;font-size:20px;">
				
				<p><span>First  Name</span>
				<input type="text" autocomplete="off" name="fname"></p>
				<p><span>Second Name</span>
				<input type="text" autocomplete="off" name="surname"></p>
				<p><span>Upload Student Avatar</span>
				<input name="avatar" autocomplete="off" type="file" accept="image/*"></p>
                
				<p><span>Email Address</span>
				<input type="text" autocomplete="off" name="email"></p>
				
				<p><span>Mobile (Optional)</span>
				<input type="text" autocomplete="off" name="mobile"></p>
				
				<p><span>Preferred Username</span>
				<input type="text" autocomplete="off" name="username"></p>
				
				<p><span>Preferred Password</span>
				<input type="password" autocomplete="off" name="password"></p>
				
				<p><span>Confirm Password</span>
				<input type="password" autocomplete="off" name="passwordcon"></p>
				
				<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="submitBtn" name="Register" value="Register">
			  </p>		
			</form>
			</section>
			</div>
		</div>
	</section>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
