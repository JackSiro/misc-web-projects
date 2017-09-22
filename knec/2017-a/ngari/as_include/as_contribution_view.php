<?php include AS_THEME."as_header.php";

	$contributionid = $results['contribution'];
	$as_db_query = "SELECT * FROM as_contribution WHERE contributionid = '$contributionid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list($contributionid, $contribution_amount, $contribution_date, $contribution_item, $contribution_paidby, $contribution_paid) = $database->get_row( $as_db_query );
}
		
?><div id="site_content">
	<h1>Update a member's contribution</h1> 
		<form role="form" method="post" name="Postcontribution" action="index.php?action=contribution_view&&<?php echo $contributionid ?>" >
                <div class="form_settings">
				
			<p><span>Session</span><input type="text" autocomplete="off" name="session" value="<?php echo $contribution_item ?>"></p>
					
			<p><span>Amount Paid</span><input type="text" autocomplete="off" name="amount" value="<?php echo $contribution_amount ?>"></p>
			<br>
                    <input class="submit" type="submit" name="UpdateItem" value="Update contribution">
					<input class="submit" type="submit" name="DeleteItem" value="Delete contribution">
			  </center><br>
			  </form>
		</div>
		<br>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
