<?php include AS_THEME."as_header.php" ?>
<div id="tooplate_main">
	<div class="col_w900">
        <h2>Username Recovery Center</h2>
    </div>
	
	<div class="col_w900 col_w900_last">
	
        <div class="col_w420 float_l">
          	<h3>Reset your Password</h3>
          	<div id="cp_contact_form">
                <h2>Username recovery was successful as:</h2>
			<h2><?php echo $_SESSION['recover_username'] ?></h2><hr>
			<a href="index.php"><h1>>> Now Sign In In >></h1></a>
		  </center>
            </div>
        </div>
        
        <div class="col_w420 float_r" id="map">
            <h3>Have a problem signin up?</h3>
            
            <div class="cleaner h30"></div>
            <a href="index.php?action=forgot_password">Forgot PassWord?</a>
			<hr class="small_hr"><a href="index.php?action=forgot_username">Forgot Username?</a>
        </div>
		
        <div class="cleaner"></div>
    </div>
</div>
<?php include AS_THEME."as_footer.php" ?>