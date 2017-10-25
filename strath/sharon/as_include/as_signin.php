<?php include AS_THEME."as_header.php" ?>
<div id="body">
		<div>
			<div>
				<div>
					<div>
					<h1>Sign In to Continue</h1>
					
					<form action="index.php?action=signin" method="post" >
		    <?php as_feedback_message() ?>
			<input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" />
			<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" />
			<br><input type="submit" id="aasignin-button" name="SignMeIn" value="Sign In" />
        
		  </form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
