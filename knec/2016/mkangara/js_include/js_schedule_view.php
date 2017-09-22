<?php 

	$requestid = $results['request'];
	$js_db_query = "SELECT * FROM js_request WHERE requestid = '$requestid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $requestid, $request_type, $request_item, $request_payment, $request_quantity ) = $database->get_row( $js_db_query );
}
		
?>
  <?php include JS_THEME."js_header.php" ?>
	<div class="container">		
		<div class="row box-5">
			<div>
				<h2><?php echo js_get_option('sitename') ?></h2>
				<div class="page_wrap">
				<h1>Schedule: <?php echo $request_type ?></h1>
				<h3>Quantity: <?php echo $request_item ?> | Price: <?php echo $request_payment ?></h3><br><br>
				<div>
				<center><h3><a href="index.php?action=request_delete&&js_requestid=<?php echo $requestid ?>" onclick="return confirm('Are you sure you want to delete this request from the system? \nBe careful, this action can not be reversed.')">Delete this Schedule</a></h3></center><hr>
				 <h2>Edit Schedule</h2>
				 <form class='mkangara-form' method="post" 
				 action="index.php?action=request_edit&&js_requestid=<?php echo $requestid ?>" >
				<fieldset>
				 <table class="form_table">
				<tr>
					<td>Schedule Title:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $request_type ?>" required ></td>
				</tr>
                <tr>
					<td>Quantity of Schedule:</td>
					<td><input type="text" autocomplete="off" name="quantity" value="<?php echo $request_item ?>" required ></td>
				</tr>
						
                <tr>
					<td>Price Per Unit:</td>
					<td><input type="text" autocomplete="off" name="price" value="<?php echo $request_payment ?>" required ></td>
				</tr>
				</table>
				</fieldset> <br>
						<center><input type="submit" class="submit_this" name="SaveChanges" value="Save Changes">
			  </center><br></form>
				</div>    
              </div>
			</div>
        </div>
    </div>
<?php include JS_THEME."js_footer.php" ?>
   
