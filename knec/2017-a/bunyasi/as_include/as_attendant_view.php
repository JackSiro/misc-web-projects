<?php 

	$attendantid = $results['attendant'];
	$as_db_query = "SELECT * FROM as_attendant WHERE attendantid = '$attendantid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $attendantid, $attendant_name, $attendant_fullname, $attendant_sex, $attendant_email, $attendant_joined, $attendant_mobile, attendant_address, $attendant_web, $attendant_avatar) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>

<div id="content">
            <div id="featured">
            <h2 class="h2-line-2">Update a attendant</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="Postattendant" action="index.php?action=attendant_view&&" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				
				<tr>
					<td>Full Name:</td>
					<td><input type="text" autocomplete="off" name="fullname" value="<?php echo $attendant_fullname ?>"></td>
				</tr>
				
				<tr>
					<td>Email Address:</td>
					<td><input type="text" autocomplete="off" name="email" value="<?php echo $attendant_email ?>"></td>
				</tr>
				
				<tr>
					<td>Mobile (Optional):</td>
					<td><input type="text" autocomplete="off" name="mobile" value="<?php echo $attendant_mobile ?>"></td>
				</tr>
				
				<tr>
					<td>Physical Address</td>
					<td><input type="text" autocomplete="off" name="address" value="<?php echo $attendant_address ?>"></td>
				</tr>
								
				</table><br>
                        <center>
						<input type="submit" class="readmore" name="UpdateItem" value="Update attendant">
						<input type="submit" class="readmore" name="DeleteItem" value="Delete Attendant">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
