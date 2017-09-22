<?php include AS_THEME."as_header.php" ?>
<div class="page-top" id="templatemo_contact">
</div> <!-- /.page-header -->

		<div class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 map-wrapper"></div>
                    <div class="col-md-6 col-sm-6">
                        <h3 class="widget-title">Reset Your Password</h3>
                        <div class="contact-form">
                            <form action="index.php?page=recover_password" method="post" >
                                <p><label>New Password (*required)</label>
                                    <input type="password" name="password" id="password" autocomplete="off" required autofocus  maxlength="20"/>
                                </p>
                                <p><label>Confirm Password (*required)</label>
                                    <input type="password" name="passwordcon" id="passwordcon" autocomplete="off" required autofocus maxlength="20" />
                                </p>
                                
                                <input type="submit" class="mainBtn" id="submit" name="RecoverPassword" value="Reset Password" >
                            </form>
                        </div> <!-- /.contact-form -->
                    </div>
					<div class="col-md-3 col-sm-6 map-wrapper"></div>
                </div>
            </div>
        </div>

	
  <?php include AS_THEME."as_footer.php" ?>
    
