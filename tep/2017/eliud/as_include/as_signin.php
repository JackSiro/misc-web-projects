<?php include AS_THEME."as_header.php"; ?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbar">
        <div class="article">
          <h2 style="text-transform:uppercase">Sign In to Your Account to Continue</h2>
		  <center>		  
			<br>
			<table style="width:100%;">
			  <tr>
				<td style="width:50%;  border:2px solid #eee; padding:20px;">
					<h3 style="font-size:30px;">Patient Signin</h3>
					<form action="index.php?action=login" method="post" >
						<input type="text" name="username" class="input_form" placeholder="Enter your username or email" autocomplete="off" required autofocus maxlength="20" /><br><br>
						<input type="password" name="password" class="input_form" placeholder="Enter your password" autocomplete="off" required maxlength="20" /><br><br><br>
						<input type="submit" class="submit_form_i" name="PatientSignin" value="Sign In Your Account" />
					</form>
				</td>
				<td style="width:50%; border:2px solid #eee; padding:20px;">
					<h3 style="font-size:30px;">Doctor Signin</h3>
					<form action="index.php?action=login" method="post" >
						<input type="text" name="username" class="input_form" placeholder="Enter your username or email" autocomplete="off" required autofocus maxlength="20" /><br><br>
						<input type="password" name="password" class="input_form" placeholder="Enter your password" autocomplete="off" required maxlength="20" /><br><br><br>
						<input type="submit" class="submit_form_i" name="DoctorSignin" value="Sign In Your Account" />
					</form>
				</td>
			  </tr>
			</table>
		</center>
        </div>
      </div>
		<?php // include AS_THEME."as_sidebar.php" ?>
      <div class="clr"></div>
    </div>
  </div>
 
<?php include AS_THEME."as_footer.php" ?>
    
