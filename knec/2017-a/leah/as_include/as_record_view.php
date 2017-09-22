<?php include AS_THEME."as_header.php";

	$recordid = $results['record'];
	$as_db_query = "SELECT * FROM as_record WHERE recordid = '$recordid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list($recordid, $record_item, $record_place, $record_time, $record_postedby, $record_posted) = $database->get_row( $as_db_query );
}		
?>
		<div id="page">
			<div id="marketing" class="container">
				<div class="row">
					<div class="12u">
						<section>
							<header>
								<h2>pdate a Client's Payment</h2> 
							<form role="form" method="post" name="Postrecord" action="index.php?action=record_view&&<?php echo $recordid ?>" >
									<div class="form_settings">
									
								<p><span>Session</span><input type="text" autocomplete="off" name="session" value="<?php echo $record_time ?>"></p>
										
								<p><span>Amount Paid</span><input type="text" autocomplete="off" name="amount" value="<?php echo $record_item ?>"></p>
								<br>
										<input type="submit" class="button" name="UpdateItem" value="Update Payment">
										<input type="submit" class="button" name="DeleteItem" value="Delete Payment">
								  </center><br>
							</form>
					</section>
				</div>
				<div class="divider"></div>
			</div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
