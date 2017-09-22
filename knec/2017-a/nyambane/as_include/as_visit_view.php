<?php include AS_THEME."as_header.php";

	$visitid = $results['visit'];
	$as_db_query = "SELECT * FROM as_visit WHERE visitid = '$visitid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list($visitid, $visit_amount, $visit_date, $visit_session, $visit_paidby, $visit_paid) = $database->get_row( $as_db_query );
}
		
?><div id="site_content">
	<h1>Update a Visitor's visit</h1> 
		<form role="form" method="post" name="Postvisit" action="index.php?action=visit_view&&<?php echo $visitid ?>" >
                <div class="form_settings">
				
			<p><span>Session</span><input type="text" autocomplete="off" name="session" value="<?php echo $visit_session ?>"></p>
					
			<p><span>Amount Paid</span><input type="text" autocomplete="off" name="amount" value="<?php echo $visit_amount ?>"></p>
			<br>
                    <input type="submit" class="readmore" name="UpdateItem" value="Update visit">
					<input type="submit" class="readmore" name="DeleteItem" value="Delete visit">
			  </center><br>
			  </form>
		</div>
		<br>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
