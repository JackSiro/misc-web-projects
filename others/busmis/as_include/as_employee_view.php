<?php 

	$employeeid = $results['user'];
	$as_db_query = "SELECT * FROM as_employee WHERE employeeid = '$employeeid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $employeeid, $employee_name, $employee_fname, $employee_surname, $employee_sex, $employee_password, $employee_email, $employee_group, $employee_joined, $employee_mobile, $employee_web, $employee_avatar) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  <h1>User Profile</h1> 
          <br><hr><br>
			<div class="main_content">
				<div class="iconic_infol">
					<img src="<?php echo "as_media/".$employee_avatar ?>" class="iconic_big"/>
					<a href="index.php?page=edituser&&as_employeeid=<?php echo $employeeid ?>"><h1>Edit User</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?page=deleteuser&&as_employeeid=<?php echo $employeeid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $employee_name ?> from the system? \nBe careful, this page can not be reversed.')"><h1>Delete User</h1></a>
			    </div>
				<div class="detail_info">
					<h2><?php echo $employee_fname.' '.$employee_surname ?></h2>
<hr class="detail_info_hr"/>
					<h2>Username: <?php echo $employee_name ?></h2>
					<h2>Email: <?php echo $employee_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($employee_joined)); ?><h2>
				</div>
				</div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
