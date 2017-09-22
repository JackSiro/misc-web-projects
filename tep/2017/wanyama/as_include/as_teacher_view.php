<?php 

	$adminid = $results['admin'];
	$as_db_query = "SELECT * FROM as_admin WHERE adminid = '$adminid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $adminid, $admin_name, $admin_fname, $admin_surname, $admin_sex, $admin_password, $admin_email, $admin_group, $admin_joined, $admin_mobile, $admin_web, $admin_avatar) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Teacher Profile</h1> 
          
			<div class="main_content">
				<div class="iconic_infol">
					<img src="<?php echo "as_media/".$admin_avatar ?>" class="iconic_big"/>
					<a href="index.php?action=editadmin&&as_adminid=<?php echo $adminid ?>"><h1>Edit Teacher</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=deleteadmin&&as_adminid=<?php echo $adminid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $admin_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Teacher</h1></a>
			    </div>
				<div class="detail_info">
					<h2><?php echo $admin_fname.' '.$admin_surname ?></h2>
<hr class="detail_info_hr"/>
					<h2>Username: <?php echo $admin_name ?></h2>
					<h2>Email: <?php echo $admin_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($admin_joined)); ?><h2>
				</div>
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
