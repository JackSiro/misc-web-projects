<?php include AS_THEME."as_header.php" ?>
<div class="page-top" id="templatemo_contact">
</div> <!-- /.page-header -->
		<div class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 map-wrapper"></div>
                    <div class="col-md-6 col-sm-6">
                        <h3 class="widget-title">Recover your password</h3>
                        <div class="contact-form">
                           <form action="index.php?page=forgot_password" method="post" >
							<table style="width:100%;font-size:20px;">
								<tr>
									<td>Your username (*)</td>
									<td><input type="text" name="username" id="username" autocomplete="off" required autofocus  /></td>
								</tr>
								<tr><td>Your email (*)</td>
							</td><td>
							<input type="email" name="email" id="email" autocomplete="off" required autofocus />
							</td></tr>
							</table>
								<input type="submit" class="mainBtn" id="submit" name="ForgotPassword" value="Forgot Password" />
							
						  </form>
							
                        </div> <!-- /.contact-form -->
                    </div>
					<div class="col-md-3 col-sm-6 map-wrapper"></div>
                </div>
            </div>
        </div>
  <?php include AS_THEME."as_footer.php" ?>
    
