  <?php include AS_THEME."as_header.php" ?>
            <div class="container">
                
                <div class="row box-5">
                    <div style="width:70px;padding:20px;margin:20px;">
						<h2 class="sitename"><?php echo as_get_option('sitename') ?></h2>
						<div class="page_wrap">
						<h3>Please login to continue</h3><br>
						<div>
                        <form class='mwangaza-form' action="index.php?action=login" method="post" >
                            <div class="contact-form-loader"></div>
                            <fieldset>
							<table class="form_table"
							><tr><td>Username:</td>
                                <td><input type="text" name="username" id="username" placeholder="Enter your username"                                    data-constraints="@Required @JustLetters"/>                
                                    <span class="empty-message">*This field is required.</span>
                                    <span class="error-message">*This is not a valid name.</span>
                                </td></tr>
                                
                                <tr><td>Password:</td>
                                <td><input type="password" name="password" id="password" placeholder="Enter your password" 
                                           data-constraints="@Required"/>                
                                    <span class="empty-message">*This field is required.</span>
                                    <span class="error-message">*This is not a valid phone.</span>
									</td></tr>
                                <tr><td></td><td>
                                <input type="submit" class="submit_this" name="SignMeIn" value="Sign In" /></td></tr>
								</table>
                            </fieldset>
                           
                        </form>
						</div>
                    </div>    
                    </div>
                </div>
            </div>
    <?php include AS_THEME."as_footer.php" ?>
   