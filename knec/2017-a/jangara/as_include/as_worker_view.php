<?php 

	$workerid = $results['worker'];
	$as_db_query = "SELECT * FROM as_worker WHERE workerid = '$workerid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $workerid, $worker_name, $worker_fullname, $worker_sex, $worker_email, $worker_joined, $worker_mobile, $worker_address, $worker_web, $worker_avatar) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
<div id="content">            <div id="featured">            <h2 class="h2-line-2">worker Information</h1> 
          <br><hr><br>
			<div class="main_content">
				
					<h2><?php echo $worker_fullname ?></h2>
					<h2>Email: <?php echo $worker_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($worker_joined)); ?><h2>
				<hr class="detail_info_hr"/>
				<h1><a href="index.php?action=editworker&&as_workerid=<?php echo $workerid ?>">Edit User</a> | 
				<a href="index.php?action=worker_delete&&as_workerid=<?php echo $workerid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $worker_name ?> from the system? \nBe careful, this action can not be reversed.')">Delete User</a></h1>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
