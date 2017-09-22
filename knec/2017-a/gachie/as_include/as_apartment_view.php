<?php 

	$apartmentid = $results['apartment'];
	$as_db_query = "SELECT * FROM as_apartment WHERE apartmentid = '$apartmentid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $apartmentid, $apartment_name, $apartment_fullname, $apartment_sex, $apartment_email, $apartment_joined, $apartment_mobile, $apartment_address, $apartment_web, $apartment_avatar) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
    <div id="tooplate_main">
				<div id="featured">                            <h1>apartment Information</h1> 
          <br><hr><br>
			<div class="main_content">
				
					<h2><?php echo $apartment_fullname ?></h2>
					<h2>Email: <?php echo $apartment_email ?></h2>
					<h2>Since: <?php echo date("j/m/y", strtotime($apartment_joined)); ?><h2>
				<hr class="detail_info_hr"/>
				<h1><a href="index.php?action=editapartment&&as_apartmentid=<?php echo $apartmentid ?>">Edit User</a> | 
				<a href="index.php?action=apartment_delete&&as_apartmentid=<?php echo $apartmentid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $apartment_name ?> from the system? \nBe careful, this action can not be reversed.')">Delete User</a></h1>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
