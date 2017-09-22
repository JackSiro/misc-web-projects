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
                <h4><strong>Password</strong> <em>Recovery Center</em></h4>
				
				<hr>
				<p>Reset Your Password.</p><br>
				<form action="index.php?page=recover_password" method="post" >
			<input type="hidden" name="username" value="<?php echo $_SESSION['recover_password'] ?>" />
			<table style="width:100%;font-size:20px;">
				<tr>
					<td>New Password (*required)</td>
					<td><input type="password" name="password" id="password" autocomplete="off" required autofocus  maxlength="20"/></td>
				</tr>
				<tr><td>Confirm Password (*required)</td>
			<td>
			<input type="password" name="passwordcon" id="passwordcon" autocomplete="off" required autofocus maxlength="20" />
			</td></tr>
			</table>
			<input type="submit" id="aalogin-button" name="RecoverPassword" value="Reset Password" />
        
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