  <?php include JS_THEME."js_header.php" ?>
            <div class="container">
                
                <div class="row box-5">
                    <div>
                        <h2><?php echo js_get_option('sitename') ?></h2>
						<div class="page_wrap">
						<h3>Username Recovery</h3><br>
						<div>
                        <form class='mkangara-form' action="index.php?action=forgot_username" method="post">
						<center><h2><b><u>Fill in the form below to get assistance on recovering your username</u></b></h2></center><br>
						<table class="form_table">
						
						<tr>
					<td>Enter your email (*required)</td>
					<td><input type="text" name="username" id="username" autocomplete="off" required autofocus  /></td>
				</tr>
				<tr><td>Enter your password (*required)</td>
					</td><td>
					<input type="password" name="password" id="password" autocomplete="off" required maxlength="20" />
					</td></tr>
						</table><br>
								<center><input type="submit" class="submit_this" name="ForgotUsername" value="Forgot Username" >
					  </center><br></form>
						</div>
                    </div>    
                    </div>
                </div>
            </div>
    <?php include JS_THEME."js_footer.php" ?>
   