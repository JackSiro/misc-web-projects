<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();
		
	$as_db_query_i = "SELECT * FROM as_user WHERE user_name = '$loggedin'";
	if( $database->as_num_rows( $as_db_query_i ) > 0 ) {
	list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_joined, $user_mobile, $user_web, $user_avatar) = $database->get_row( $as_db_query_i );
	}
	
	$as_db_query_ii = "SELECT * FROM as_client WHERE client_idno = '$loggedin'";
	if( $database->as_num_rows( $as_db_query_ii ) > 0 ) {
		list( $clientid, $client_fullname, $client_sex, $client_joined, $client_center, $client_idno, $client_number, 
		$client_salesd, $client_avatar ) = $database->get_row( $as_db_query_ii );
	}
	
?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
              <div class="panel" id="home">
                <div class="content_section">
		  <?php if ($myaccount == "user") { ?>
		  
         <h2>Welcome on board <?php echo $user_fname.' '.$user_surname ?>!</h2> 
		 <p><?php if (!$administrator) {
					echo "Since you have not been granted any priviledges on this platform you can not manage anything 
					apart from your own account.<br> Please be sign out and check back later if the admin will have 
					modified your account.";
				}
				?>
          <br><hr>
			<table class="user_profile">
				<tr>
					<td rowspan="7">
					<img src="<?php echo "as_media/".$user_avatar ?>" class="iconic_big"/>
					</td>
					<td>Full Name:</td><td><?php echo $user_fname." ".$user_surname ?></td>
				</tr>
				<tr>
					<td>Username:</td><td><?php echo $user_name ?></td>
				</tr>
				<tr>
					<td>Email Address:</td><td><?php echo $user_email ?></td>
				</tr>
				<tr>
					<td>Mobile Phone:</td><td><?php echo $user_mobile ?></td>
				</tr>
				<tr>
					<td>User Group:</td><td><?php echo $user_group ?></td>
				</tr>
				<tr>
					<td>Joined: </td><td><?php echo date("D j, M, Y", strtotime($user_joined)); ?></td>
				</tr>
				<tr>
					<td></td><td><td>
				</tr>
				
			</table>
			<div class="main_content" >
			
			
			
			</div>
			</p>
		  <?php } else { ?>
			<h1>Welcome on board <?php echo $client_fullname ?>!</h1> 
			<div class="error_log">
			<?php if ($client_salesd==0) { ?>
			<h3>You have not salesd. Please proceed to the ballot box</h3><br>
			<p><a href="index.php?action=sales_now" class="aasignup-button"> > > > VOTE NOW > > > </a><br></p>
			<?php } else if ($client_salesd==1) { ?>
			<h3>You have salesd successfully. Please sign out and wait for the results to be announced to you.</h3><br>
			<p><a href="index.php?action=signout" class="aasignup-button"> > > > SIGN OUT > > > </a><br></p>
			<?php } ?></div>
			<hr>
			  <table class="user_profile">
				<tr>
					<td rowspan="4">
					<img src="<?php echo "as_media/".$client_avatar ?>" class="iconic_big"/>
					</td>
					<td>Client ID. Number:</td><td><?php echo $client_idno ?></td>
				</tr>
				<tr>
					<td>Client Number:</td><td><?php echo $client_number ?></td>
				</tr>
				<tr>
					<td>Voting Center:</td><td><?php echo $client_center ?></td>
				</tr>
				<tr>
					<td>Registered: </td><td><?php echo date("D j, M, Y", strtotime($client_joined)); ?></td>
				</tr>
				<tr>
					<td></td><td><td>
				</tr>
				
			</table>
		  <?php } ?>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
