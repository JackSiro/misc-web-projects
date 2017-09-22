<?php 

	$resourceid = $results['beneficiary'];
	$as_db_query = "SELECT * FROM as_resource WHERE resourceid = '$resourceid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $resourceid, $resource_beneficiaryid, $resource_unit, $resource_postedby, $resource_posted, $resource_client, $resource_title, $resource_unit, $resource_img, $resource_updated, $resource_updatedby) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
				<h1> Beneficiary: <?php echo as_beneficiary_beneficiary($resource_beneficiaryid) ?></h1> 
          <br><hr>
				<table>
				<tr><td>
				<center><img src="<?php echo "as_media/".$resource_img ?>" class="iconic_big_i"/></center>
				</td><td>
				<h2>Beneficiary: <?php echo as_beneficiary_beneficiary($resource_beneficiaryid) ?></h2>
				<h2>Quantity: <?php echo $resource_unit.' '.$resource_unit ?>
				<?php echo ', Kshs. '.$resource_title.' each' ?></h2>
				<h2>Client: <?php echo as_client_beneficiary($resource_client) ?></h2>
				<h2>Received on: <?php echo date("j/m/y", strtotime($resource_posted)); ?></h2>
				</td></tr>
				</table>
				<hr>
				<center><h2><a href="index.php?action=resource_edit&&as_resourceid=<?php echo $resourceid ?>">Edit this Beneficiary</a>
				 | <a href="index.php?action=resource_delete&&as_resourceid=<?php echo $resourceid ?>" onclick="return confirm('Are you sure you want to delete this beneficiary from the system? \nBe careful, this action can not be reversed.')">Delete this Beneficiary</a></h2></center>
				 
				<br>
				 <form role="form" method="post" name="PlacePrescription" 
				 action="index.php?action=resource_view&&as_resourceid=<?php echo $resourceid ?>" >
				<input type="hidden" name="resourceid" value="<?php echo $resourceid ?>" />
				<input type="hidden" name="beneficiaryprice" value="<?php echo $resource_title ?>" />
				<input type="hidden" name="beneficiarytitle" value="<?php echo $resource_unit." of ".as_beneficiary_beneficiary($resource_beneficiaryid) ?>" />
				<div class="detail_info">
					<br><br>
					<h1>Place an Prescription for this Beneficiary</h1> 
					  <br><hr><br>
					<table style="width:100%;font-size:20px;">
					<tr>
						<td>Choose Quantity:</td>
						<td>
						<input type="text" autocomplete="off" name="quantity" value="<?php echo $resource_unit ?>" required >
						</td>
					</tr>
					<tr>
						<td>Buyer's Full Name</td>
						<td>
						<input type="text" autocomplete="off" name="fullname" required >
						</td>
					</tr> 
					<tr>
						<td>Buyer's Mobile No.</td>
						<td>
						<input type="text" autocomplete="off" name="mobile" required >
						</td>
					</tr>
					<tr>
						<td>Buyer's Email</td>
						<td>
						<input type="text" autocomplete="off" name="email" required >
						</td>
					</tr>
					<tr>
						<td>Physical Address:</td>
						<td>
						<textarea name="address" autocomplete="off" ></textarea>
						</td>
					</tr>
					<tr>
						<td>Additional Notes (Options):</td>
						<td>
						<textarea name="content" autocomplete="off" ></textarea>
						</td>
					</tr>
					
					</table>
					<br>
                        <center>
						<input type="submit" class="submit_this" name="PrescriptionNow" value="Prescription this Beneficiary">
			  </center><br>
				</form>
				</div>
			</div>
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
