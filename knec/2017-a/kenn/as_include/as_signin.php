<?php include AS_THEME."as_header.php" ?> 
<div class="page-top" id="templatemo_contact">
</div> <!-- /.page-header -->

		<div class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 map-wrapper"></div>
                    <div class="col-md-6 col-sm-6">
                        <h3 class="widget-title">Login to your account</h3>
                        <div class="contact-form">
                            <form action="index.php?page=login" method="post" >
                                <p>
                                    <input type="text" name="username" id="email" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" />
                                </p>
                                <p>
                                    <input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" />
                                </p>
                                
                                <input type="submit" class="mainBtn" id="submit" name="SignMeIn" value="Sign In" >
                            </form>
                        </div> <!-- /.contact-form -->
                    </div>
					<div class="col-md-3 col-sm-6 map-wrapper"></div>
                </div>
            </div>
        </div>
  <?php include AS_THEME."as_footer.php" ?>
    
