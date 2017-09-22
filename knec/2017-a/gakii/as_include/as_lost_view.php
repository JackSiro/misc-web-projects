<?php 

	$lostid = $results['lost'];
	$as_db_query = "SELECT * FROM as_lost WHERE lostid = '$lostid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $lostid, $lost_title, $lost_content, $lost_place, $lost_email, $lost_joined, $lost_mobile, lost_address, $lost_web, $lost_avatar) = $database->get_row( $as_db_query );
}
	include AS_THEME."as_header.php"; ?>
<div id="site_content">
	<h1>Update a lost</h1> 
    <form role="form" method="post" name="Postlost" action="index.php?action=lost_view&&" enctype="multipart/form-data" >
                <div class="form_settings">
				
			<p><span>Full Name</span><input type="text" autocomplete="off" name="fullname" value="<?php echo $lost_content ?>"></p>
				
			<p><span>Email Address</span><input type="text" autocomplete="off" name="email" value="<?php echo $lost_email ?>"></p>
				
			<p><span>Mobile (Optional)</span><input type="text" autocomplete="off" name="mobile" value="<?php echo $lost_mobile ?>"></p>
				
			<p><span>Physical Address</span><input type="text" autocomplete="off" name="address" value="<?php echo $lost_address ?>"></p>
								
			<br><p>
						<input type="submit" class="readmore" name="UpdateItem" value="Update lost">
						<input type="submit" class="readmore" name="DeleteItem" value="Delete lost">
			</p></div></form></div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
