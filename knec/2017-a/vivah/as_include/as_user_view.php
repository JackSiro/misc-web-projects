<?php 

	$facilitatorid = $results['facilitator'];
	$as_db_query = "SELECT * FROM as_facilitator WHERE facilitatorid = '$facilitatorid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $facilitatorid, $facilitator_name, $facilitator_fname, $facilitator_surname, $facilitator_sex, $facilitator_password, $facilitator_email, $facilitator_group, $facilitator_joined, $facilitator_mobile, $facilitator_occupation, $facilitator_organization) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
		  <h1>User Profile</h1> 
          <br><hr><br>
			<div class="main_content">
				<div class="iconic_infol">
					<img src="<?php echo "as_media/".$facilitator_organization ?>" class="iconic_big"/>
					<a href="index.php?action=facilitator_edit&&as_facilitatorid=<?php echo $facilitatorid ?>"><h1>Edit User</h1></a>
					<hr class="detail_info_hr"/>
					<a href="index.php?action=facilitator_delete&&as_facilitatorid=<?php echo $facilitatorid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $facilitator_name ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete User</h1></a>
			    </div>
				<div class="detail_info">
					<h2><?php echo $facilitator_fname.' '.$facilitator_surname ?></h2>
<hr class="detail_info_hr"/>
					<h2>Username: <?php echo $facilitator_name ?></h2>
					<h2>Email: <?php echo $facilitator_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($facilitator_joined)); ?><h2>
				</div>
				</div>
			</div>
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
