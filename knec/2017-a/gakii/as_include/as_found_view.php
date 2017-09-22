<?php include AS_THEME."as_header.php";

	$foundid = $results['found'];
	$as_db_query = "SELECT * FROM as_found WHERE foundid = '$foundid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list($foundid, $found_title, $found_content, $found_place, $found_postedby, $found_posted) = $database->get_row( $as_db_query );
}
		
?><div id="site_content">
	<h1>Update a lost's found</h1> 
		<form role="form" method="post" name="Postfound" action="index.php?action=found_view&&<?php echo $foundid ?>" >
                <div class="form_settings">
				
			<p><span>Session</span><input type="text" autocomplete="off" name="session" value="<?php echo $found_place ?>"></p>
					
			<p><span>Amount Paid</span><input type="text" autocomplete="off" name="amount" value="<?php echo $found_title ?>"></p>
			<br>
                    <input type="submit" class="readmore" name="UpdateItem" value="Update found">
					<input type="submit" class="readmore" name="DeleteItem" value="Delete found">
			  </center><br>
			  </form>
		</div>
		<br>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
