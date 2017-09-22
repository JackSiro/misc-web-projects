  <?php include JS_THEME."js_header.php" ?>
            <div class="container">
                
                <div class="row box-5">
                    <div>
                        <h2><?php echo js_get_option('sitename') ?></h2>
						<div class="page_wrap">
						<h3>Username Recovery Center</h3><br>
						<div>
                        <?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
			}
			unset($_SESSION['ERRMSG_ARR']);
			} ?>
						<hr><br>
		  <h2>Username recovery was successful as:</h2>
			<h2><?php echo $_SESSION['recover_username'] ?></h2><hr>
			<a href="index.php"><h1>>> Now Login In >></h1></a>
		  </center>
						</div>
                    </div>    
                    </div>
                </div>
            </div>
    <?php include JS_THEME."js_footer.php" ?>
   