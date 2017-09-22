<?php 

	$userid = $results['user'];
	$js_db_query = "SELECT * FROM js_user WHERE userid = '$userid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $userid, $user_name, $user_fname, $user_surname, $user_location, $user_idno, $user_sex, $user_password, $user_email, $user_group, $user_mobile, $user_web, $user_joined, $user_avatar) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  <h1>User Profile</h1> 
          <br><hr><br>
			<div class="main_content">
				
				<div class="detail_info">
					<h2><?php echo $user_fname.' '.$user_surname ?> (<?php echo $user_name ?>)</h2>
<hr class="detail_info_hr"/>
					<h2>Location: <?php echo $user_location ?></h2>
					<h2>ID. Number: <?php echo $user_idno ?></h2>
					<h2>Sex: <?php echo $user_sex ?></h2>
					<h2>Mobile: <?php echo $user_mobile ?></h2>
					<h2>Email: <?php echo $user_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($user_joined)); ?><h2>
				</div>
				</div>
				<center><h1><a href="index.php?action=user_edit&&js_userid=<?php echo $userid ?>">Edit User</a>
					| <a href="index.php?action=user_delete&&js_userid=<?php echo $userid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $user_name ?> from the system? \nBe careful, this action can not be reversed.')">Delete User</a></h1></center>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
