<?php 

	$resourceid = $results['beneficiary'];
	$as_db_query = "SELECT * FROM as_resource WHERE resourceid = '$resourceid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $resourceid, $resource_beneficiaryid, $resource_unit, $resource_postedby, $resource_posted, $resource_title, $resource_img, $resource_updated, $resource_updatedby) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
		  <h1>Edit a Beneficiary</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="SaveBeneficiary" action="index.php?action=resource_edit&&as_resourceid=<?php echo $resourceid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
								
				<tr>
					<td>Full Name:</td>
					<td><input type="text" autocomplete="off" name="fullname" value="<?php echo $resource_unit ?>" required ></td>
				</tr>
				<tr>
					<td>Beneficiary Beneficiary:</td>
					<td><select name="category" style="padding-left:20px;" required>
						<option value="<?php echo $resource_beneficiaryid ?>" ><?php echo as_beneficiary_beneficiary($resource_beneficiaryid) ?></option>
					<?php $as_db_query = "SELECT * FROM as_beneficiary ORDER BY beneficiaryid ASC";
						$database = new As_Dbconn();			
						$results = $database->get_results( $as_db_query );
					
						foreach( $results as $row ) { ?>
						  <option value="<?php echo $row['beneficiaryid'] ?>">  <?php echo $row['beneficiary_name'] ?></option>
					<?php } ?>
						</select>
					</td>
				</tr>
                <tr>
					<td>Beneficiary Slogan:</td>
					<td><input type="text" autocomplete="off" name="slogan" value="<?php echo $resource_title ?>" required ></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveBeneficiary" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br>
			  </form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div>
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
