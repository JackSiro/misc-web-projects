<?php include AS_THEME."as_header.php" ?>
				</div>
			</div>

			<div id="main" class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2>Username Recovery Center</h2>
							<?php
							if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
								
							foreach($_SESSION['ERRMSG_ARR'] as $msg) {
							echo '<div class="error" id="error"><img class="errimg" src="looks/images/cross.png">',$msg,'</div>'; 
							}
							unset($_SESSION['ERRMSG_ARR']);
							} ?>	  
						<span class="byline">Username recovery was successful as:</span>
					</header>
					<div class="row">
						<div class="12u">
							<section>
								<h2><?php echo $_SESSION['recover_username'] ?></h2><hr>
								<a href="index.php"><h1>>> Now Login In >></h1></a>
						</section>
						</div>
					</div>
				</section>
			</div>
  <?php include AS_THEME."as_footer.php" ?>
    
