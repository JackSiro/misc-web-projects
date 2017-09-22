<?php 

	$clientid = $results['client'];
	$as_db_query = "SELECT * FROM as_client WHERE clientid = '$clientid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $clientid, $client_name, $client_fullname, $client_sex, $client_email, $client_joined, $client_mobile, $client_address, $client_web, $client_avatar) = $database->get_row( $as_db_query );
}
	include AS_THEME."as_header.php"; ?>
<div id="site_content">
	<h1>Update a client</h1> 
    <form role="form" method="post" name="Postclient" action="index.php?action=client_view&&" enctype="multipart/form-data" >
                <div class="form_settings">
				
			<p><span>Full Name</span><input type="text" autocomplete="off" name="fullname" value="<?php echo $client_fullname ?>"></p>
				
			<p><span>Email Address</span><input type="text" autocomplete="off" name="email" value="<?php echo $client_email ?>"></p>
				
			<p><span>Mobile (Optional)</span><input type="text" autocomplete="off" name="mobile" value="<?php echo $client_mobile ?>"></p>
				
			<p><span>Physical Address</span><input type="text" autocomplete="off" name="address" value="<?php echo $client_address ?>"></p>
								
			<br><p>
						<input type="submit" class="readmore" name="UpdateItem" value="Update client">
						<input type="submit" class="readmore" name="DeleteItem" value="Delete Client">
			</p></div></form></div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
