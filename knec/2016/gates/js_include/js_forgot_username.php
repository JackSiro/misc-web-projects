<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['gates_account'] ) ? $_SESSION['gates_account'] : "";
	?>
  <div class="inner">
    <div class="main">
      <section id="content">
        
        <div class="padding-2">
          <div class="indent-top">
            <div class="wrapper">
              <article class="col-3">
                <h4><strong>Username</strong> <em>Recovery Center</em></h4>
				
				<hr>
				<p>Sorry for Loosing your username. Fill in the form below to get assistance on recovering your username.</p><br>
				<form action="index.php?page=forgot_username" method="post" >
			<table style="width:100%;font-size:20px;">
				<tr>
					<td>Enter your email (*)</td>
					<td><input type="text" name="username" id="username" autocomplete="off" required autofocus  /></td>
				</tr>
				<tr><td>Enter your password (*)</td>
			</td><td>
			<input type="password" name="password" id="password" autocomplete="off" required maxlength="20" />
			</td></tr>
			</table>
			<input type="submit" id="aalogin-button" name="ForgotUsername" value="Forgot Username" />
        
      </form>
              </article>
			  <?php include JS_THEME."js_sidebar.php" ?>
              
            </div>
          </div>
        </div>

      </section>
      <div class="block"></div>
    </div>
  </div>
</div>


<?php include JS_THEME."js_footer.php" ?>