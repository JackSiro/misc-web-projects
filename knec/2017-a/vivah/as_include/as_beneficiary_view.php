<?php 

	$beneficiaryid = $results['category'];
	$as_db_query = "SELECT * FROM as_beneficiary WHERE beneficiaryid = '$beneficiaryid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $beneficiaryid, $beneficiary_code, $beneficiary_name, $beneficiary_institution, $beneficiary_email) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
		  <h1>Edit beneficiary</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" action="index.php?action=beneficiary_view&&as_beneficiaryid=<?php echo $beneficiaryid ?>" enctype="multipart/form-data" >
                <input type="hidden" name="loginid" value="<?php echo $_SESSION['sitefacilitator_facilitator'] ?>"/>
				<table style="width:100%;font-size:20px;">
				<tr>
					<td>Beneficiary Title: </td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $beneficiary_name ?>"></td>
				</tr>
				<tr>
					<td> Beneficiary Unit:</td>
					<td><input type="text" autocomplete="off" name="unit" value="<?php echo $beneficiary_password ?>"></td>
				</tr>
				<tr>
					<td> Beneficiary Price:</td>
					<td><input type="text" autocomplete="off" name="price" value="<?php echo $beneficiary_institution ?>"></td>
				</tr>
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="content" autocomplete="off" ><?php echo $beneficiary_email?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveCart" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br></form>
				
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
    
