<?php 

	$visitorid = $results['visitor'];
	$as_db_query = "SELECT * FROM as_visitor WHERE visitorid = '$visitorid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $visitorid, $visitor_name, $visitor_fullname, $visitor_sex, $visitor_email, $visitor_joined, $visitor_mobile, $visitor_address, $visitor_web, $visitor_avatar) = $database->get_row( $as_db_query );
}
	include AS_THEME."as_header.php"; ?>
<div id="site_content">
	<h1>Update a visitor</h1> 
    <form role="form" method="post" name="Postvisitor" action="index.php?action=visitor_view&&" enctype="multipart/form-data" >
                <div class="form_settings">
				
			<p><span>Full Name</span><input type="text" autocomplete="off" name="fullname" value="<?php echo $visitor_fullname ?>"></p>
				
			<p><span>Email Address</span><input type="text" autocomplete="off" name="email" value="<?php echo $visitor_email ?>"></p>
				
			<p><span>Mobile (Optional)</span><input type="text" autocomplete="off" name="mobile" value="<?php echo $visitor_mobile ?>"></p>
				
			<p><span>Physical Address</span><input type="text" autocomplete="off" name="address" value="<?php echo $visitor_address ?>"></p>
								
			<br><p>
						<input type="submit" class="readmore" name="UpdateItem" value="Update visitor">
						<input type="submit" class="readmore" name="DeleteItem" value="Delete Visitor">
			</p></div></form></div>
		<br>
      <h2><center></center></h2>
		
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
