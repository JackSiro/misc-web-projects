  <?php include AS_THEME."as_header.php" ?>
            <div class="container">
                
                <div class="row box-5">
                    <div>
                        <h2 class="sitename"><?php echo as_get_option('sitename') ?></h2>
						<div class="page_wrap">
						<h3>Recover Your Password</h3><br>
						<div>
                        <form class='mwangaza-form' action="index.php?action=recover_password" method="post" >
                            <div class="contact-form-loader"></div>
                            <fieldset>
							<table class="form_table" >
							<tr>
					<td>New Password (*required)</td>
					<td><input type="password" name="password" id="password" autocomplete="off" required autofocus  maxlength="20"/></td>
				</tr>
				<tr><td>Confirm Password (*required)</td>
			<td>
			<input type="password" name="passwordcon" id="passwordcon" autocomplete="off" required autofocus maxlength="20" />
			</td></tr>
                                <tr><td></td><td>
                                <input type="submit" id="aalogin-button" name="RecoverPassword" value="Reset Password" /></td></tr>
								</table>
                            </fieldset>
                           
                        </form>
						</div>
                    </div>    
                    </div>
                </div>
            </div>
    <?php include AS_THEME."as_footer.php" ?>
   