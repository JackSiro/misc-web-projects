<?php 

	$workerid = $results['worker'];
	$as_db_query = "SELECT * FROM as_worker WHERE workerid = '$workerid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $workerid, $worker_name, $worker_sex, $worker_dept, $worker_unit ) = $database->get_row( $as_db_query );
}
		
?>
  <?php include AS_THEME."as_header.php" ?>
	<div class="container">		
		<div class="row box-5">
			<div>
				<h2 class="sitename"><?php echo as_get_option('sitename') ?></h2>
				<div class="page_wrap">
				<h1>Worker: <?php echo $worker_name ?></h1>
				<h3>Quantity: <?php echo $worker_sex ?> | Price: <?php echo $worker_dept ?></h3><br><br>
				<div>
				<center><h3><a href="index.php?action=worker_delete&&as_workerid=<?php echo $workerid ?>" onclick="return confirm('Are you sure you want to delete this worker from the system? \nBe careful, this action can not be reversed.')">Delete this Worker</a></h3></center><hr>
				 <h2>Edit Worker</h2>
				 <form class='mwangaza-form' method="post" 
				 action="index.php?action=worker_edit&&as_workerid=<?php echo $workerid ?>" >
				<fieldset>
				 <table class="form_table">
				<tr>
					<td>Worker Title:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $worker_name ?>" required ></td>
				</tr>
                <tr>
					<td>Quantity of Worker:</td>
					<td><input type="text" autocomplete="off" name="quantity" value="<?php echo $worker_sex ?>" required ></td>
				</tr>
						
                <tr>
					<td>Price Per Unit:</td>
					<td><input type="text" autocomplete="off" name="price" value="<?php echo $worker_dept ?>" required ></td>
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
<?php include AS_THEME."as_footer.php" ?>
   
