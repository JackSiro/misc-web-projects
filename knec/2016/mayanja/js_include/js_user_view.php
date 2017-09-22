<?php 

	$userid = $results['user'];
	$js_db_query = "SELECT * FROM js_user WHERE userid = '$userid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_joined, $user_mobile, $user_web, $user_avatar) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>

	<section id="content">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">
            <h2 class="h2-line-2">User Profile</h1> 
          <br><hr><br>
			<div class="main_content">
				<div class="iconic_infol">
					<img src="<?php echo "js_media/".$user_avatar ?>" class="iconic_big"/>
					<a href="index.php?action=edituser&&js_userid=<?php echo $userid ?>"><h1>Edit User</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deleteuser&&js_userid=<?php echo $userid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $user_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete User</h1></a>
			    </div>
				<div class="detail_info">
					<h2><?php echo $user_fname.' '.$user_surname ?></h2>
<hr class="detail_info_hr"/>
					<h2>Username: <?php echo $user_name ?></h2>
					<h2>Email: <?php echo $user_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($user_joined)); ?><h2>
				</div>
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </section>
<?php include JS_THEME."js_footer.php" ?>
    
