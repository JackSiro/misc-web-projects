<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbar">
        <div class="article">
          <h2>Sign In to Your Account to Continue</h2>
		  <center>		  
		  <br>
		  	
          <form action="index.php?action=login" method="post" >
			<input type="text" name="username" class="input_form" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" /><br><br>
			<input type="password" name="password" class="input_form" placeholder="Enter your password" autocomplete="off" required maxlength="20" /><br><br><br>
			<input type="submit" class="submit_form_i" name="SignMeIn" value="Sign In Your Account" />
        
      </form></center>
        </div>
      </div>
		<?php include JS_THEME."js_sidebar.php" ?>
      <div class="clr"></div>
    </div>
  </div>
 
<?php include JS_THEME."js_footer.php" ?>
    
