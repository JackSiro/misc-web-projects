<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['kawira_account'] ) ? $_SESSION['kawira_account'] : "";
	?>
	<div id="site_content">	

	  <div id="content"> 
        
        <div class="content_item">
		<br>
		  <h1>Site Dashboard</h1> 
          <br><hr><br>
			<div class="main_content" align="center">
				
				<div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_parkingslots = "SELECT * FROM js_parkingslot ORDER BY Parkingslotid DESC LIMIT 5";
						$results_i = $database->get_results( $js_parkingslots );
						?>
					<h1><?php echo $database->js_num_rows( $js_parkingslots ) ?> Parking Slot</h1><hr>
					<?php foreach( $results_i as $row ) { ?>
					<img class="iconic_small" src="js_media/<?php echo $row['parkingslot_icon'] ?>" />
					<span style="font-size: 15px;"><?php echo $row['parkingslot_title'] ?></span><br>			
					<?php } ?>
					<hr>
					<a href="index.php?action=parkingslot_all"><h4>View All Parking Slot</h4></a>
					<a href="index.php?action=parkingslot_new"><h4>Add a Parking Slot</h4></a>
					</div>
					
					<div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_kawira = "SELECT * FROM js_customer ORDER BY customerid DESC LIMIT 5";
						$results_ii = $database->get_results( $js_kawira );
						?>
					<h1><?php echo $database->js_num_rows( $js_kawira ) ?> Customers</h1><hr>
					<?php foreach( $results_ii as $row ) { ?>
					<img class="iconic_small" src="js_media/<?php echo $row['customer_avatar'] ?>" />
					<span style="font-size: 15px;"><?php echo $row['customer_fullname'] ?></span><br>			
					<?php } ?>
					<hr>
					<a href="index.php?action=customer_all"><h4>View All Customers</h4></a>
					<a href="index.php?action=customer_new"><h4>Add a Customers</h4></a>
					</div>
					
					<div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_sessions = "SELECT * FROM js_session ORDER BY sessionid DESC LIMIT 5";
						$results_iv = $database->get_results( $js_sessions );
						?>
					<h1><?php echo $database->js_num_rows( $js_sessions ) ?> Sessions</h1><hr>
					<?php foreach( $results_iv as $row ) { ?>
					
					<span style="font-size: 15px;white-space:nowrap; text-overflow:ellipsis; overflow:hidden;"><img class="iconic_small" src="js_media/session_default.jpg" />
					<?php echo $row['session_qty'].' '.$row['session_title'] ?> sessioned by <?php echo $row['session_fullname'] ?> [<?php echo $row['session_price'] ?>]</span><br>			
					<?php } ?>
					<hr>
					<a href="index.php?action=session_all"><h4>View All Sessions</h4></a>
					<a href="index.php?action=session_all"><h4>Add A New Sessions</h4></a>
					</div>
					
					<div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_users = "SELECT * FROM js_user ORDER BY userid DESC LIMIT 5";
						$results_v = $database->get_results( $js_users );
						?>
					<h1><?php echo $database->js_num_rows( $js_users ) ?> Site Users</h1><hr>
					<?php foreach( $results_v as $row ) { ?>
					<img class="iconic_small" src="js_media/<?php echo $row['user_avatar'] ?>" />
					<span style="font-size: 15px;"><?php echo $row['user_fname'].' '.$row['user_surname'] ?></span><br>			
					<?php } ?>
					<hr>
					<a href="index.php?action=user_all"><h4>View All Users</h4></a>
					<a href="index.php?action=user_new"><h4>Add a User</h4></a>
					</div>
					
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
