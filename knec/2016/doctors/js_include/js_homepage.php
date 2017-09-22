<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['doctors_account'] ) ? $_SESSION['doctors_account'] : "";
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
						$js_categorys = "SELECT * FROM js_category ORDER BY categoryid DESC LIMIT 5";
						$results_i = $database->get_results( $js_categorys );
						?>
					<h1><?php echo $database->js_num_rows( $js_categorys ) ?> Department</h1><hr>
					<?php foreach( $results_i as $row ) { ?>
					<img class="iconic_small" src="js_media/<?php echo $row['category_icon'] ?>" />
					<span style="font-size: 15px;"><?php echo $row['category_title'] ?></span><br>			
					<?php } ?>
					<hr>
					<a href="index.php?action=category_all"><h4>View All Department</h4></a>
					<a href="index.php?action=category_new"><h4>Add a Department</h4></a>
					</div>
					
					<div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_doctors = "SELECT * FROM js_doctor ORDER BY doctorid DESC LIMIT 5";
						$results_ii = $database->get_results( $js_doctors );
						?>
					<h1><?php echo $database->js_num_rows( $js_doctors ) ?> Doctors</h1><hr>
					<?php foreach( $results_ii as $row ) { ?>
					<img class="iconic_small" src="js_media/<?php echo $row['doctor_avatar'] ?>" />
					<span style="font-size: 15px;"><?php echo $row['doctor_fullname'] ?></span><br>			
					<?php } ?>
					<hr>
					<a href="index.php?action=doctor_all"><h4>View All Doctors</h4></a>
					<a href="index.php?action=doctor_new"><h4>Add a Doctors</h4></a>
					</div>
					
					<div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_appointments = "SELECT * FROM js_appointment ORDER BY appointmentid DESC LIMIT 5";
						$results_iv = $database->get_results( $js_appointments );
						?>
					<h1><?php echo $database->js_num_rows( $js_appointments ) ?> Appointments</h1><hr>
					<?php foreach( $results_iv as $row ) { ?>
					
					<span style="font-size: 15px;white-space:nowrap; text-overflow:ellipsis; overflow:hidden;"><img class="iconic_small" src="js_media/appointment_default.jpg" />
					<?php echo $row['appointment_qty'].' '.$row['appointment_title'] ?> appointmented by <?php echo $row['appointment_fullname'] ?> [<?php echo $row['appointment_price'] ?>]</span><br>			
					<?php } ?>
					<hr>
					<a href="index.php?action=appointment_all"><h4>View All Appointments</h4></a>
					<a href="index.php?action=appointment_all"><h4>Add A New Appointments</h4></a>
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
    
