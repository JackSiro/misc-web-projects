<?php
	$as_db_query = "SELECT * FROM as_billing WHERE billid = '".$results['bill']."'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $billid, $bill_patient, $bill_title, $bill_billing, $bill_expected) = $database->get_row( $as_db_query );
	}
	include AS_THEME."as_header.php" ?>
    <div id="content">
		<div>
			<h1>Add a Patient Billing</h1>
			<div id="account">
				<div>
				
					<form action="index.php?action=billing_view&&as_billingid=<?php echo $billid ?>" method="post">
				<table class="form_table">
				
				<tr> 
					<td>Description:</td>
					<td><input type="text" name="description" value="<?php echo $bill_title ?>"></td>
				</tr>
				<tr>
					<td>Expected:</td>
					<td><input type="text" name="expected" value="<?php echo $bill_expected ?>"></td>
				</tr>
				<tr>
					<td>Amount:</td>
					<td><input type="text" name="amount" value="<?php echo $bill_billing ?>"></td>
				</tr>
						</table>
						<center><input type="submit" class="submitbtn" name="Updatebills" value="Update bills">
			  </center>
					</form>
					<?php } ?>
				</div>
				</div>
			</div>
		</div>
	</div>
    <?php include AS_THEME."as_footer.php" ?>
   