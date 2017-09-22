<?php include JS_THEME."js_header.php"; ?>
<?php 

	$userid = $results['user'];
	$js_db_query = "SELECT * FROM js_user WHERE userid = '$userid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_joined, $user_mobile, $user_web, $user_avatar) = $database->get_row( $js_db_query );
}
		
?>
	<section id="service">
		<div class="container">
			<div class="row">
				<div class="text-center col-md-12 wow fadeInDown" data-wow-delay="2000">
					<h3>MANAGER PROFILE</h3>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center"> 
				</div>
				<div class="col-md-2"></div>
				<div class="col-sm-6 col-md-6 wow fadeInLeft" data-wow-delay="2000">
					<div class="media">
						<i class="fa fa-cog pull-left media-object"></i>
							<div class="media-body">
								<img src="<?php echo "js_media/".$user_avatar ?>" class="iconic_big"/>
					<a href="index.php?action=edituser&&js_userid=<?php echo $userid ?>"><h1>Edit User</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deleteuser&&js_userid=<?php echo $userid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $user_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete User</h1></a>
			    
							</div>
					</div>
				</div>
				
				<div class="col-sm-6 col-md-6 wow fadeInLeft" data-wow-delay="2000">
					<div class="media">
						<i class="fa fa-cog pull-left media-object"></i>
							<div class="media-body">
								<h2><?php echo $user_fname.' '.$user_surname ?></h2>
<hr class="detail_info_hr"/>
					<h2>Username: <?php echo $user_name ?></h2>
					<h2>Email: <?php echo $user_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($user_joined)); ?><h2>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>		
<?php include JS_THEME."js_footer.php" ?>
    
